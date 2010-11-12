<?php
	require(__DATAGEN_CLASSES__ . '/QueryNodeGen.class.php');

	/**
	 * The QueryNode class defined here contains any
	 * customized code for the QueryNode class in the
	 * Object Relational Model.  It represents the "query_node" table 
	 * in the database, and extends from the code generated abstract QueryNodeGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class QueryNode extends QueryNodeGen {
		protected static $intJoinCount = 0;

		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objQueryNode->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('QueryNode Object %s',  $this->intId);
		}

		/**
		 * Calculate the QcodoQueryNode object that this QueryNode represents.
		 * Be sure to capture any additional QQCondition and/or QQClauses that might be required while rendering
		 * out this QQNode.
		 * @param QQCondition $objQqCondition
		 * @param QQClause[] $objQqClauses
		 * @return QQNode
		 */
		public function GetQqNode(QQCondition &$objQqCondition = null, &$objQqClauses = null, $strValue) {
			// Operation is dependent on the type of QueryNode being used
			switch ($this->QueryNodeTypeId) {
				case QueryNodeType::StandardNode:
					return $this->GetQqNodeForStandardNode($objQqCondition, $objQqClauses);

				case QueryNodeType::AttributeNode:
					return $this->GetQqNodeForAttributeNode($objQqCondition, $objQqClauses, $strValue);

				default:
					throw new Exception('Not Implemented for QueryNodeTypeId');
			}
		}

		/**
		 * Creates a custom ListBox for "Custom" QueryDataTypes given this QueryNodeType
		 * @param QPanel $pnlValue
		 * @param string $strControlId
		 * @return QControl
		 */
		public function GetCustomControl(QPanel $pnlValue, $strControlId, $strCurrentValue) {
			// Control is dependent on the type of QueryNode being used
			switch ($this->QueryNodeTypeId) {
				case QueryNodeType::StandardNode:
					return $this->GetCustomControlForStandardNode($pnlValue, $strControlId, $strCurrentValue);

				case QueryNodeType::AttributeNode:
					return $this->GetCustomControlForAttributeNode($pnlValue, $strControlId, $strCurrentValue);

				default:
					throw new Exception('Not Implemented for QueryNodeTypeId');
			}
		}

		/**
		 * Used by the SearchQuery Description generator
		 * Enter description here ...
		 * @param string $strValue
		 */
		public function GetValueDescriptionForCustomValue($strValue) {
			switch ($this->QueryNodeTypeId) {
				case QueryNodeType::AttributeNode:
					return AttributeOption::Load($strValue)->Name;

				default:
					return $strValue;
			}
		}

		protected function GetCustomControlForStandardNode(QPanel $pnlValue, $strControlId, $strCurrentValue) {
			$ctlValue = new QListBox($pnlValue, $strControlId);
			foreach (explode(',', $this->NodeDetail) as $strValue) {
				$ctlValue->AddItem($strValue, $strValue, $strCurrentValue == $strValue);
			}
			return $ctlValue;
		}
		
		protected function GetCustomControlForAttributeNode(QPanel $pnlValue, $strControlId, $strCurrentValue) {
			// Get the Attribute object we are trying to query against
			$objAttribute = Attribute::Load($this->NodeDetail);

			$ctlValue = new QListBox($pnlValue, $strControlId);
			foreach ($objAttribute->GetAttributeOptionArray(QQ::OrderBy(QQN::AttributeOption()->Name)) as $objOption) {
				$ctlValue->AddItem($objOption->Name, $objOption->Id, $objOption->Id == $strCurrentValue);
			}
			return $ctlValue;
		}
		
		protected function GetQqNodeForStandardNode(QQCondition &$objQqCondition = null, &$objQqClauses = null) {
			// Get the QcodoQuery Node we are operating on for this condition
			$objQqNode = QQN::Person();
			foreach (explode('->', $this->QcodoQueryNode) as $strPropertyName)
				$objQqNode = $objQqNode->__get($strPropertyName);
			return $objQqNode;
		}

		protected function GetQqNodeForAttributeNode(QQCondition &$objQqCondition = null, &$objQqClauses = null, $strValue) {
			// Get the Attribute object we are trying to query against
			$objAttribute = Attribute::Load($this->NodeDetail);

			$strAttributeValueTableAlias = 'av' . self::$intJoinCount++;
			$objQqClauses[] = QQ::CustomJoin('attribute_value', $strAttributeValueTableAlias,
				sprintf('%s%s%s.%sperson_id%s = %st0%s.%sid%s AND %s%s%s.%sattribute_id%s = %s',
					self::GetDatabase()->EscapeIdentifierBegin, $strAttributeValueTableAlias, self::GetDatabase()->EscapeIdentifierEnd,
					self::GetDatabase()->EscapeIdentifierBegin, self::GetDatabase()->EscapeIdentifierEnd,
					self::GetDatabase()->EscapeIdentifierBegin, self::GetDatabase()->EscapeIdentifierEnd,
					self::GetDatabase()->EscapeIdentifierBegin, self::GetDatabase()->EscapeIdentifierEnd,
					self::GetDatabase()->EscapeIdentifierBegin, $strAttributeValueTableAlias, self::GetDatabase()->EscapeIdentifierEnd,
					self::GetDatabase()->EscapeIdentifierBegin, self::GetDatabase()->EscapeIdentifierEnd,
					$objAttribute->Id
				)
			);

			// What is the ATTRIBUTE's type?  Figure out the Custom QQ Node based on that
			switch ($objAttribute->AttributeDataTypeId) {
				case AttributeDataType::Checkbox:
					$objQqNode = QQ::CustomNode(sprintf('%s.boolean_value', $strAttributeValueTableAlias));
					break;

				case AttributeDataType::Date:
					$objQqNode = QQ::CustomNode(sprintf('%s.date_value', $strAttributeValueTableAlias));
					break;

				case AttributeDataType::DateTime:
					$objQqNode = QQ::CustomNode(sprintf('%s.datetime_value', $strAttributeValueTableAlias));
					break;

				case AttributeDataType::Text:
					$objQqNode = QQ::CustomNode(sprintf('%s.text_value', $strAttributeValueTableAlias));
					break;
				
				case AttributeDataType::ImmutableSingleDropdown:
				case AttributeDataType::MutableSingleDropdown:
					$objQqNode = QQ::CustomNode(sprintf('%s.single_attribute_option_id', $strAttributeValueTableAlias));
					break;

				case AttributeDataType::ImmutableMultipleDropdown:
				case AttributeDataType::MutableMultipleDropdown:
					$strAttributeOptionTableAlias = 'avmaoa' . self::$intJoinCount++;
					$objQqClauses[] = QQ::CustomJoin('attributevalue_multipleattributeoption_assn', $strAttributeOptionTableAlias,
						sprintf(
							"%s.attribute_value_id = %s.id AND %s.attribute_option_id = '%s'",
							$strAttributeOptionTableAlias, $strAttributeValueTableAlias,
							$strAttributeOptionTableAlias, $strValue
						)
					);
					$objQqNode = QQ::CustomNode(sprintf('%s.attribute_option_id', $strAttributeOptionTableAlias));
					break;

				default:
					throw new Exception('No Support for Attribute Data Type Id: ' . $objAttribute->AttributeDataTypeId);
			}

			return $objQqNode;
		}

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of QueryNode objects
			return QueryNode::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::QueryNode()->Param1, $strParam1),
					QQ::GreaterThan(QQN::QueryNode()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single QueryNode object
			return QueryNode::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::QueryNode()->Param1, $strParam1),
					QQ::GreaterThan(QQN::QueryNode()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of QueryNode objects
			return QueryNode::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::QueryNode()->Param1, $strParam1),
					QQ::Equal(QQN::QueryNode()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = QueryNode::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`query_node`.*
				FROM
					`query_node` AS `query_node`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return QueryNode::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>