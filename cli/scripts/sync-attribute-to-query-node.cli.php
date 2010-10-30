<?php
	foreach (Attribute::LoadAll() as $objAttribute) {
		$objNodes = QueryNode::QueryArray(QQ::AndCondition(
			QQ::Equal(QQN::QueryNode()->QueryNodeTypeId, QueryNodeType::AttributeNode),
			QQ::Equal(QQN::QueryNode()->NodeDetail, $objAttribute->Id)
		));

		if (count($objNodes)) {
			foreach ($objNodes as $objQueryNode) {
				$objQueryNode->Name = $objAttribute->Name;
				$objQueryNode->QcodoQueryNode = null;
				$objQueryNode->QueryNodeTypeId = QueryNodeType::AttributeNode;
				$objQueryNode->QueryDataTypeId = AttributeDataType::$QueryDataTypeArray[$objAttribute->AttributeDataTypeId];
				$objQueryNode->NodeDetail = $objAttribute->Id;
				$objQueryNode->Save();
			}
		} else {
			$objQueryNode = new QueryNode();
			$objQueryNode->Name = $objAttribute->Name;
			$objQueryNode->QcodoQueryNode = null;
			$objQueryNode->QueryNodeTypeId = QueryNodeType::AttributeNode;
			$objQueryNode->QueryDataTypeId = AttributeDataType::$QueryDataTypeArray[$objAttribute->AttributeDataTypeId];
			$objQueryNode->NodeDetail = $objAttribute->Id;
			$objQueryNode->Save();
		}
	}
?>