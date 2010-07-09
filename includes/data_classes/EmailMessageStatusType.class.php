<?php
	require(__DATAGEN_CLASSES__ . '/EmailMessageStatusTypeGen.class.php');

	/**
	 * The EmailMessageStatusType class defined here contains any
	 * customized code for the EmailMessageStatusType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "email_message_status_type" table in the database,
	 * and extends from the code generated abstract EmailMessageStatusTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package ALCF ChMS
	 * @subpackage DataObjects
	 */
	abstract class EmailMessageStatusType extends EmailMessageStatusTypeGen {
	}
?>