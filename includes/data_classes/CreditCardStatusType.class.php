<?php
	require(__DATAGEN_CLASSES__ . '/CreditCardStatusTypeGen.class.php');

	/**
	 * The CreditCardStatusType class defined here contains any
	 * customized code for the CreditCardStatusType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "credit_card_status_type" table in the database,
	 * and extends from the code generated abstract CreditCardStatusTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 */
	abstract class CreditCardStatusType extends CreditCardStatusTypeGen {
	}
?>