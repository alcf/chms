<?php
	require(__DATAGEN_CLASSES__ . '/PermissionTypeGen.class.php');

	/**
	 * The PermissionType class defined here contains any
	 * customized code for the PermissionType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "permission_type" table in the database,
	 * and extends from the code generated abstract PermissionTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 */
	abstract class PermissionType extends PermissionTypeGen {
	}
?>