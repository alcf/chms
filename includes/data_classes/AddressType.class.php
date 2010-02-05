<?php
	require(__DATAGEN_CLASSES__ . '/AddressTypeGen.class.php');

	/**
	 * The AddressType class defined here contains any
	 * customized code for the AddressType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "address_type" table in the database,
	 * and extends from the code generated abstract AddressTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 */
	abstract class AddressType extends AddressTypeGen {
	}
?>