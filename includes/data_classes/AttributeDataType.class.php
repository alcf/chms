<?php
	require(__DATAGEN_CLASSES__ . '/AttributeDataTypeGen.class.php');

	/**
	 * The AttributeDataType class defined here contains any
	 * customized code for the AttributeDataType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "attribute_data_type" table in the database,
	 * and extends from the code generated abstract AttributeDataTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 */
	abstract class AttributeDataType extends AttributeDataTypeGen {
		public static $QueryDataTypeArray = array(
			AttributeDataType::Checkbox 				=> QueryDataType::BooleanValue,
			AttributeDataType::Date						=> QueryDataType::DateValue,
			AttributeDataType::DateTime					=> QueryDataType::DateValue,
			AttributeDataType::Text						=> QueryDataType::StringValue,
			AttributeDataType::ImmutableSingleDropdown	=> QueryDataType::CustomValue,
			AttributeDataType::ImmutableMultipleDropdown => QueryDataType::CustomValue,
			AttributeDataType::MutableSingleDropdown	=> QueryDataType::CustomValue,
			AttributeDataType::MutableMultipleDropdown	=> QueryDataType::CustomValue
		);
	}
?>