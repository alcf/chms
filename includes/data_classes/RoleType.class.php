<?php
	require(__DATAGEN_CLASSES__ . '/RoleTypeGen.class.php');

	/**
	 * The RoleType class defined here contains any
	 * customized code for the RoleType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "role_type" table in the database,
	 * and extends from the code generated abstract RoleTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 */
	abstract class RoleType extends RoleTypeGen {
	}
?>