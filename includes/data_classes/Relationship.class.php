<?php
	require(__DATAGEN_CLASSES__ . '/RelationshipGen.class.php');

	/**
	 * The Relationship class defined here contains any
	 * customized code for the Relationship class in the
	 * Object Relational Model.  It represents the "relationship" table 
	 * in the database, and extends from the code generated abstract RelationshipGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 * 
	 */
	class Relationship extends RelationshipGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objRelationship->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Relationship Object %s',  $this->intId);
		}

		/**
		 * This should be the method called to DELETE a relationship record from the application.
		 * This will ensure any linked records are deleted
		 */
		public function DeleteThisAndLinked() {
			$objPerson = $this->Person;
			$objRelatedPerson = $this->RelatedToPerson;

			// Delete linked (if applicable)
			if ($objLinkedRelationship = Relationship::LoadByPersonIdRelatedToPersonId($objRelatedPerson->Id, $objPerson->Id)) {
				$objLinkedRelationship->Delete();
			}

			// Delete THIS
			$this->Delete();
		}

		/**
		 * Given this relationship record, this will update the "linked" relationship record with the same stats and details.
		 * 
		 * This will CREATE the Linked Relationship record if none yet exists.
		 * 
		 */
		public function UpdateLinkedRelationship() {
			$objPerson = $this->Person;
			$objRelatedPerson = $this->RelatedToPerson;
			$objLinkedRelationship = Relationship::LoadByPersonIdRelatedToPersonId($objRelatedPerson->Id, $objPerson->Id);

			if (!$objLinkedRelationship) {
				$objLinkedRelationship = new Relationship();
				$objLinkedRelationship->Person = $objRelatedPerson;
				$objLinkedRelationship->RelatedToPerson = $objPerson;
			}

			// Figure out the "Opposite" relationship to create
			switch ($this->intRelationshipTypeId) {
				case RelationshipType::Child:
					$objLinkedRelationship->RelationshipTypeId = RelationshipType::Parental;
					break;
				case RelationshipType::Parental:
					$objLinkedRelationship->RelationshipTypeId = RelationshipType::Child;
					break;
				case RelationshipType::Sibling:
					$objLinkedRelationship->RelationshipTypeId = RelationshipType::Sibling;
					break;
				default:
					throw new Exception('Invalid Relationship Type Id: ' . $intRelationshipTypeId);
			}

			$objLinkedRelationship->Save();
		}

		public function __get($strName) {
			switch ($strName) {
				case 'Relation':
					switch ($this->intRelationshipTypeId) {
						case RelationshipType::Child:
							switch ($this->RelatedToPerson->Gender) {
								case 'M':	return 'Son';
								case 'F':	return 'Daughter';
								default:	return 'Child';
							}

						case RelationshipType::Parental:
							switch ($this->RelatedToPerson->Gender) {
								case 'M':	return 'Father';
								case 'F':	return 'Mother';
								default:	return 'Parent';
							}

						case RelationshipType::Sibling:
							switch ($this->RelatedToPerson->Gender) {
								case 'M':	return 'Brother';
								case 'F':	return 'Sister';
								default:	return 'Sibling';
							}

						default:
							throw new QCallerException('Invalid intRelationshipTypeId');
					}

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
		 

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Relationship objects
			return Relationship::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Relationship()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Relationship()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Relationship object
			return Relationship::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Relationship()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Relationship()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Relationship objects
			return Relationship::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Relationship()->Param1, $strParam1),
					QQ::Equal(QQN::Relationship()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Relationship::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`relationship`.*
				FROM
					`relationship` AS `relationship`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Relationship::InstantiateDbResult($objDbResult);
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