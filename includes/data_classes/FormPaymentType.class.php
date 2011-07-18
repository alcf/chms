<?php
	require(__DATAGEN_CLASSES__ . '/FormPaymentTypeGen.class.php');

	/**
	 * The FormPaymentType class defined here contains any
	 * customized code for the FormPaymentType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "form_payment_type" table in the database,
	 * and extends from the code generated abstract FormPaymentTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 */
	abstract class FormPaymentType extends FormPaymentTypeGen {
	}
?>