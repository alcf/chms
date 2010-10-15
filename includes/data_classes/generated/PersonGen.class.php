<?php
	/**
	 * The abstract PersonGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Person subclass which
	 * extends this PersonGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Person class.
	 * 
	 * @package ALCF ChMS
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $MembershipStatusTypeId the value for intMembershipStatusTypeId (Not Null)
	 * @property integer $MaritalStatusTypeId the value for intMaritalStatusTypeId (Not Null)
	 * @property string $FirstName the value for strFirstName 
	 * @property string $MiddleName the value for strMiddleName 
	 * @property string $LastName the value for strLastName 
	 * @property string $MailingLabel the value for strMailingLabel 
	 * @property string $PriorLastNames the value for strPriorLastNames 
	 * @property string $Nickname the value for strNickname 
	 * @property string $Title the value for strTitle 
	 * @property string $Suffix the value for strSuffix 
	 * @property string $Gender the value for strGender 
	 * @property QDateTime $DateOfBirth the value for dttDateOfBirth 
	 * @property boolean $DobApproximateFlag the value for blnDobApproximateFlag 
	 * @property boolean $DeceasedFlag the value for blnDeceasedFlag (Not Null)
	 * @property QDateTime $DateDeceased the value for dttDateDeceased 
	 * @property integer $CurrentHeadShotId the value for intCurrentHeadShotId (Unique)
	 * @property integer $MailingAddressId the value for intMailingAddressId 
	 * @property integer $StewardshipAddressId the value for intStewardshipAddressId 
	 * @property integer $PrimaryPhoneId the value for intPrimaryPhoneId 
	 * @property integer $PrimaryEmailId the value for intPrimaryEmailId (Unique)
	 * @property boolean $CanMailFlag the value for blnCanMailFlag 
	 * @property boolean $CanPhoneFlag the value for blnCanPhoneFlag 
	 * @property boolean $CanEmailFlag the value for blnCanEmailFlag 
	 * @property string $PrimaryAddressText the value for strPrimaryAddressText 
	 * @property string $PrimaryCityText the value for strPrimaryCityText 
	 * @property string $PrimaryPhoneText the value for strPrimaryPhoneText 
	 * @property HeadShot $CurrentHeadShot the value for the HeadShot object referenced by intCurrentHeadShotId (Unique)
	 * @property Address $MailingAddress the value for the Address object referenced by intMailingAddressId 
	 * @property Address $StewardshipAddress the value for the Address object referenced by intStewardshipAddressId 
	 * @property Phone $PrimaryPhone the value for the Phone object referenced by intPrimaryPhoneId 
	 * @property Email $PrimaryEmail the value for the Email object referenced by intPrimaryEmailId (Unique)
	 * @property Household $HouseholdAsHead the value for the Household object that uniquely references this Person
	 * @property CheckingAccountLookup $_CheckingAccountLookup the value for the private _objCheckingAccountLookup (Read-Only) if set due to an expansion on the checkingaccountlookup_person_assn association table
	 * @property CheckingAccountLookup[] $_CheckingAccountLookupArray the value for the private _objCheckingAccountLookupArray (Read-Only) if set due to an ExpandAsArray on the checkingaccountlookup_person_assn association table
	 * @property CommunicationList $_CommunicationList the value for the private _objCommunicationList (Read-Only) if set due to an expansion on the communicationlist_person_assn association table
	 * @property CommunicationList[] $_CommunicationListArray the value for the private _objCommunicationListArray (Read-Only) if set due to an ExpandAsArray on the communicationlist_person_assn association table
	 * @property NameItem $_NameItem the value for the private _objNameItem (Read-Only) if set due to an expansion on the person_nameitem_assn association table
	 * @property NameItem[] $_NameItemArray the value for the private _objNameItemArray (Read-Only) if set due to an ExpandAsArray on the person_nameitem_assn association table
	 * @property Address $_Address the value for the private _objAddress (Read-Only) if set due to an expansion on the address.person_id reverse relationship
	 * @property Address[] $_AddressArray the value for the private _objAddressArray (Read-Only) if set due to an ExpandAsArray on the address.person_id reverse relationship
	 * @property AttributeValue $_AttributeValue the value for the private _objAttributeValue (Read-Only) if set due to an expansion on the attribute_value.person_id reverse relationship
	 * @property AttributeValue[] $_AttributeValueArray the value for the private _objAttributeValueArray (Read-Only) if set due to an ExpandAsArray on the attribute_value.person_id reverse relationship
	 * @property Comment $_Comment the value for the private _objComment (Read-Only) if set due to an expansion on the comment.person_id reverse relationship
	 * @property Comment[] $_CommentArray the value for the private _objCommentArray (Read-Only) if set due to an ExpandAsArray on the comment.person_id reverse relationship
	 * @property Email $_Email the value for the private _objEmail (Read-Only) if set due to an expansion on the email.person_id reverse relationship
	 * @property Email[] $_EmailArray the value for the private _objEmailArray (Read-Only) if set due to an ExpandAsArray on the email.person_id reverse relationship
	 * @property EmailMessageRoute $_EmailMessageRoute the value for the private _objEmailMessageRoute (Read-Only) if set due to an expansion on the email_message_route.person_id reverse relationship
	 * @property EmailMessageRoute[] $_EmailMessageRouteArray the value for the private _objEmailMessageRouteArray (Read-Only) if set due to an ExpandAsArray on the email_message_route.person_id reverse relationship
	 * @property GroupParticipation $_GroupParticipation the value for the private _objGroupParticipation (Read-Only) if set due to an expansion on the group_participation.person_id reverse relationship
	 * @property GroupParticipation[] $_GroupParticipationArray the value for the private _objGroupParticipationArray (Read-Only) if set due to an ExpandAsArray on the group_participation.person_id reverse relationship
	 * @property HeadShot $_HeadShot the value for the private _objHeadShot (Read-Only) if set due to an expansion on the head_shot.person_id reverse relationship
	 * @property HeadShot[] $_HeadShotArray the value for the private _objHeadShotArray (Read-Only) if set due to an ExpandAsArray on the head_shot.person_id reverse relationship
	 * @property HouseholdParticipation $_HouseholdParticipation the value for the private _objHouseholdParticipation (Read-Only) if set due to an expansion on the household_participation.person_id reverse relationship
	 * @property HouseholdParticipation[] $_HouseholdParticipationArray the value for the private _objHouseholdParticipationArray (Read-Only) if set due to an ExpandAsArray on the household_participation.person_id reverse relationship
	 * @property Marriage $_Marriage the value for the private _objMarriage (Read-Only) if set due to an expansion on the marriage.person_id reverse relationship
	 * @property Marriage[] $_MarriageArray the value for the private _objMarriageArray (Read-Only) if set due to an ExpandAsArray on the marriage.person_id reverse relationship
	 * @property Marriage $_MarriageAsMarriedTo the value for the private _objMarriageAsMarriedTo (Read-Only) if set due to an expansion on the marriage.married_to_person_id reverse relationship
	 * @property Marriage[] $_MarriageAsMarriedToArray the value for the private _objMarriageAsMarriedToArray (Read-Only) if set due to an ExpandAsArray on the marriage.married_to_person_id reverse relationship
	 * @property Membership $_Membership the value for the private _objMembership (Read-Only) if set due to an expansion on the membership.person_id reverse relationship
	 * @property Membership[] $_MembershipArray the value for the private _objMembershipArray (Read-Only) if set due to an ExpandAsArray on the membership.person_id reverse relationship
	 * @property OtherContactInfo $_OtherContactInfo the value for the private _objOtherContactInfo (Read-Only) if set due to an expansion on the other_contact_info.person_id reverse relationship
	 * @property OtherContactInfo[] $_OtherContactInfoArray the value for the private _objOtherContactInfoArray (Read-Only) if set due to an ExpandAsArray on the other_contact_info.person_id reverse relationship
	 * @property Phone $_Phone the value for the private _objPhone (Read-Only) if set due to an expansion on the phone.person_id reverse relationship
	 * @property Phone[] $_PhoneArray the value for the private _objPhoneArray (Read-Only) if set due to an ExpandAsArray on the phone.person_id reverse relationship
	 * @property Relationship $_Relationship the value for the private _objRelationship (Read-Only) if set due to an expansion on the relationship.person_id reverse relationship
	 * @property Relationship[] $_RelationshipArray the value for the private _objRelationshipArray (Read-Only) if set due to an ExpandAsArray on the relationship.person_id reverse relationship
	 * @property Relationship $_RelationshipAsRelatedTo the value for the private _objRelationshipAsRelatedTo (Read-Only) if set due to an expansion on the relationship.related_to_person_id reverse relationship
	 * @property Relationship[] $_RelationshipAsRelatedToArray the value for the private _objRelationshipAsRelatedToArray (Read-Only) if set due to an ExpandAsArray on the relationship.related_to_person_id reverse relationship
	 * @property StewardshipContribution $_StewardshipContribution the value for the private _objStewardshipContribution (Read-Only) if set due to an expansion on the stewardship_contribution.person_id reverse relationship
	 * @property StewardshipContribution[] $_StewardshipContributionArray the value for the private _objStewardshipContributionArray (Read-Only) if set due to an ExpandAsArray on the stewardship_contribution.person_id reverse relationship
	 * @property StewardshipPledge $_StewardshipPledge the value for the private _objStewardshipPledge (Read-Only) if set due to an expansion on the stewardship_pledge.person_id reverse relationship
	 * @property StewardshipPledge[] $_StewardshipPledgeArray the value for the private _objStewardshipPledgeArray (Read-Only) if set due to an ExpandAsArray on the stewardship_pledge.person_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PersonGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column person.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.membership_status_type_id
		 * @var integer intMembershipStatusTypeId
		 */
		protected $intMembershipStatusTypeId;
		const MembershipStatusTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.marital_status_type_id
		 * @var integer intMaritalStatusTypeId
		 */
		protected $intMaritalStatusTypeId;
		const MaritalStatusTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 100;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column person.middle_name
		 * @var string strMiddleName
		 */
		protected $strMiddleName;
		const MiddleNameMaxLength = 100;
		const MiddleNameDefault = null;


		/**
		 * Protected member variable that maps to the database column person.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 100;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column person.mailing_label
		 * @var string strMailingLabel
		 */
		protected $strMailingLabel;
		const MailingLabelMaxLength = 200;
		const MailingLabelDefault = null;


		/**
		 * Protected member variable that maps to the database column person.prior_last_names
		 * @var string strPriorLastNames
		 */
		protected $strPriorLastNames;
		const PriorLastNamesMaxLength = 255;
		const PriorLastNamesDefault = null;


		/**
		 * Protected member variable that maps to the database column person.nickname
		 * @var string strNickname
		 */
		protected $strNickname;
		const NicknameMaxLength = 100;
		const NicknameDefault = null;


		/**
		 * Protected member variable that maps to the database column person.title
		 * @var string strTitle
		 */
		protected $strTitle;
		const TitleMaxLength = 40;
		const TitleDefault = null;


		/**
		 * Protected member variable that maps to the database column person.suffix
		 * @var string strSuffix
		 */
		protected $strSuffix;
		const SuffixMaxLength = 40;
		const SuffixDefault = null;


		/**
		 * Protected member variable that maps to the database column person.gender
		 * @var string strGender
		 */
		protected $strGender;
		const GenderMaxLength = 1;
		const GenderDefault = null;


		/**
		 * Protected member variable that maps to the database column person.date_of_birth
		 * @var QDateTime dttDateOfBirth
		 */
		protected $dttDateOfBirth;
		const DateOfBirthDefault = null;


		/**
		 * Protected member variable that maps to the database column person.dob_approximate_flag
		 * @var boolean blnDobApproximateFlag
		 */
		protected $blnDobApproximateFlag;
		const DobApproximateFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column person.deceased_flag
		 * @var boolean blnDeceasedFlag
		 */
		protected $blnDeceasedFlag;
		const DeceasedFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column person.date_deceased
		 * @var QDateTime dttDateDeceased
		 */
		protected $dttDateDeceased;
		const DateDeceasedDefault = null;


		/**
		 * Protected member variable that maps to the database column person.current_head_shot_id
		 * @var integer intCurrentHeadShotId
		 */
		protected $intCurrentHeadShotId;
		const CurrentHeadShotIdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.mailing_address_id
		 * @var integer intMailingAddressId
		 */
		protected $intMailingAddressId;
		const MailingAddressIdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.stewardship_address_id
		 * @var integer intStewardshipAddressId
		 */
		protected $intStewardshipAddressId;
		const StewardshipAddressIdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.primary_phone_id
		 * @var integer intPrimaryPhoneId
		 */
		protected $intPrimaryPhoneId;
		const PrimaryPhoneIdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.primary_email_id
		 * @var integer intPrimaryEmailId
		 */
		protected $intPrimaryEmailId;
		const PrimaryEmailIdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.can_mail_flag
		 * @var boolean blnCanMailFlag
		 */
		protected $blnCanMailFlag;
		const CanMailFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column person.can_phone_flag
		 * @var boolean blnCanPhoneFlag
		 */
		protected $blnCanPhoneFlag;
		const CanPhoneFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column person.can_email_flag
		 * @var boolean blnCanEmailFlag
		 */
		protected $blnCanEmailFlag;
		const CanEmailFlagDefault = null;


		/**
		 * Protected member variable that maps to the database column person.primary_address_text
		 * @var string strPrimaryAddressText
		 */
		protected $strPrimaryAddressText;
		const PrimaryAddressTextMaxLength = 255;
		const PrimaryAddressTextDefault = null;


		/**
		 * Protected member variable that maps to the database column person.primary_city_text
		 * @var string strPrimaryCityText
		 */
		protected $strPrimaryCityText;
		const PrimaryCityTextMaxLength = 100;
		const PrimaryCityTextDefault = null;


		/**
		 * Protected member variable that maps to the database column person.primary_phone_text
		 * @var string strPrimaryPhoneText
		 */
		protected $strPrimaryPhoneText;
		const PrimaryPhoneTextMaxLength = 20;
		const PrimaryPhoneTextDefault = null;


		/**
		 * Private member variable that stores a reference to a single CheckingAccountLookup object
		 * (of type CheckingAccountLookup), if this Person object was restored with
		 * an expansion on the checkingaccountlookup_person_assn association table.
		 * @var CheckingAccountLookup _objCheckingAccountLookup;
		 */
		private $_objCheckingAccountLookup;

		/**
		 * Private member variable that stores a reference to an array of CheckingAccountLookup objects
		 * (of type CheckingAccountLookup[]), if this Person object was restored with
		 * an ExpandAsArray on the checkingaccountlookup_person_assn association table.
		 * @var CheckingAccountLookup[] _objCheckingAccountLookupArray;
		 */
		private $_objCheckingAccountLookupArray = array();

		/**
		 * Private member variable that stores a reference to a single CommunicationList object
		 * (of type CommunicationList), if this Person object was restored with
		 * an expansion on the communicationlist_person_assn association table.
		 * @var CommunicationList _objCommunicationList;
		 */
		private $_objCommunicationList;

		/**
		 * Private member variable that stores a reference to an array of CommunicationList objects
		 * (of type CommunicationList[]), if this Person object was restored with
		 * an ExpandAsArray on the communicationlist_person_assn association table.
		 * @var CommunicationList[] _objCommunicationListArray;
		 */
		private $_objCommunicationListArray = array();

		/**
		 * Private member variable that stores a reference to a single NameItem object
		 * (of type NameItem), if this Person object was restored with
		 * an expansion on the person_nameitem_assn association table.
		 * @var NameItem _objNameItem;
		 */
		private $_objNameItem;

		/**
		 * Private member variable that stores a reference to an array of NameItem objects
		 * (of type NameItem[]), if this Person object was restored with
		 * an ExpandAsArray on the person_nameitem_assn association table.
		 * @var NameItem[] _objNameItemArray;
		 */
		private $_objNameItemArray = array();

		/**
		 * Private member variable that stores a reference to a single Address object
		 * (of type Address), if this Person object was restored with
		 * an expansion on the address association table.
		 * @var Address _objAddress;
		 */
		private $_objAddress;

		/**
		 * Private member variable that stores a reference to an array of Address objects
		 * (of type Address[]), if this Person object was restored with
		 * an ExpandAsArray on the address association table.
		 * @var Address[] _objAddressArray;
		 */
		private $_objAddressArray = array();

		/**
		 * Private member variable that stores a reference to a single AttributeValue object
		 * (of type AttributeValue), if this Person object was restored with
		 * an expansion on the attribute_value association table.
		 * @var AttributeValue _objAttributeValue;
		 */
		private $_objAttributeValue;

		/**
		 * Private member variable that stores a reference to an array of AttributeValue objects
		 * (of type AttributeValue[]), if this Person object was restored with
		 * an ExpandAsArray on the attribute_value association table.
		 * @var AttributeValue[] _objAttributeValueArray;
		 */
		private $_objAttributeValueArray = array();

		/**
		 * Private member variable that stores a reference to a single Comment object
		 * (of type Comment), if this Person object was restored with
		 * an expansion on the comment association table.
		 * @var Comment _objComment;
		 */
		private $_objComment;

		/**
		 * Private member variable that stores a reference to an array of Comment objects
		 * (of type Comment[]), if this Person object was restored with
		 * an ExpandAsArray on the comment association table.
		 * @var Comment[] _objCommentArray;
		 */
		private $_objCommentArray = array();

		/**
		 * Private member variable that stores a reference to a single Email object
		 * (of type Email), if this Person object was restored with
		 * an expansion on the email association table.
		 * @var Email _objEmail;
		 */
		private $_objEmail;

		/**
		 * Private member variable that stores a reference to an array of Email objects
		 * (of type Email[]), if this Person object was restored with
		 * an ExpandAsArray on the email association table.
		 * @var Email[] _objEmailArray;
		 */
		private $_objEmailArray = array();

		/**
		 * Private member variable that stores a reference to a single EmailMessageRoute object
		 * (of type EmailMessageRoute), if this Person object was restored with
		 * an expansion on the email_message_route association table.
		 * @var EmailMessageRoute _objEmailMessageRoute;
		 */
		private $_objEmailMessageRoute;

		/**
		 * Private member variable that stores a reference to an array of EmailMessageRoute objects
		 * (of type EmailMessageRoute[]), if this Person object was restored with
		 * an ExpandAsArray on the email_message_route association table.
		 * @var EmailMessageRoute[] _objEmailMessageRouteArray;
		 */
		private $_objEmailMessageRouteArray = array();

		/**
		 * Private member variable that stores a reference to a single GroupParticipation object
		 * (of type GroupParticipation), if this Person object was restored with
		 * an expansion on the group_participation association table.
		 * @var GroupParticipation _objGroupParticipation;
		 */
		private $_objGroupParticipation;

		/**
		 * Private member variable that stores a reference to an array of GroupParticipation objects
		 * (of type GroupParticipation[]), if this Person object was restored with
		 * an ExpandAsArray on the group_participation association table.
		 * @var GroupParticipation[] _objGroupParticipationArray;
		 */
		private $_objGroupParticipationArray = array();

		/**
		 * Private member variable that stores a reference to a single HeadShot object
		 * (of type HeadShot), if this Person object was restored with
		 * an expansion on the head_shot association table.
		 * @var HeadShot _objHeadShot;
		 */
		private $_objHeadShot;

		/**
		 * Private member variable that stores a reference to an array of HeadShot objects
		 * (of type HeadShot[]), if this Person object was restored with
		 * an ExpandAsArray on the head_shot association table.
		 * @var HeadShot[] _objHeadShotArray;
		 */
		private $_objHeadShotArray = array();

		/**
		 * Private member variable that stores a reference to a single HouseholdParticipation object
		 * (of type HouseholdParticipation), if this Person object was restored with
		 * an expansion on the household_participation association table.
		 * @var HouseholdParticipation _objHouseholdParticipation;
		 */
		private $_objHouseholdParticipation;

		/**
		 * Private member variable that stores a reference to an array of HouseholdParticipation objects
		 * (of type HouseholdParticipation[]), if this Person object was restored with
		 * an ExpandAsArray on the household_participation association table.
		 * @var HouseholdParticipation[] _objHouseholdParticipationArray;
		 */
		private $_objHouseholdParticipationArray = array();

		/**
		 * Private member variable that stores a reference to a single Marriage object
		 * (of type Marriage), if this Person object was restored with
		 * an expansion on the marriage association table.
		 * @var Marriage _objMarriage;
		 */
		private $_objMarriage;

		/**
		 * Private member variable that stores a reference to an array of Marriage objects
		 * (of type Marriage[]), if this Person object was restored with
		 * an ExpandAsArray on the marriage association table.
		 * @var Marriage[] _objMarriageArray;
		 */
		private $_objMarriageArray = array();

		/**
		 * Private member variable that stores a reference to a single MarriageAsMarriedTo object
		 * (of type Marriage), if this Person object was restored with
		 * an expansion on the marriage association table.
		 * @var Marriage _objMarriageAsMarriedTo;
		 */
		private $_objMarriageAsMarriedTo;

		/**
		 * Private member variable that stores a reference to an array of MarriageAsMarriedTo objects
		 * (of type Marriage[]), if this Person object was restored with
		 * an ExpandAsArray on the marriage association table.
		 * @var Marriage[] _objMarriageAsMarriedToArray;
		 */
		private $_objMarriageAsMarriedToArray = array();

		/**
		 * Private member variable that stores a reference to a single Membership object
		 * (of type Membership), if this Person object was restored with
		 * an expansion on the membership association table.
		 * @var Membership _objMembership;
		 */
		private $_objMembership;

		/**
		 * Private member variable that stores a reference to an array of Membership objects
		 * (of type Membership[]), if this Person object was restored with
		 * an ExpandAsArray on the membership association table.
		 * @var Membership[] _objMembershipArray;
		 */
		private $_objMembershipArray = array();

		/**
		 * Private member variable that stores a reference to a single OtherContactInfo object
		 * (of type OtherContactInfo), if this Person object was restored with
		 * an expansion on the other_contact_info association table.
		 * @var OtherContactInfo _objOtherContactInfo;
		 */
		private $_objOtherContactInfo;

		/**
		 * Private member variable that stores a reference to an array of OtherContactInfo objects
		 * (of type OtherContactInfo[]), if this Person object was restored with
		 * an ExpandAsArray on the other_contact_info association table.
		 * @var OtherContactInfo[] _objOtherContactInfoArray;
		 */
		private $_objOtherContactInfoArray = array();

		/**
		 * Private member variable that stores a reference to a single Phone object
		 * (of type Phone), if this Person object was restored with
		 * an expansion on the phone association table.
		 * @var Phone _objPhone;
		 */
		private $_objPhone;

		/**
		 * Private member variable that stores a reference to an array of Phone objects
		 * (of type Phone[]), if this Person object was restored with
		 * an ExpandAsArray on the phone association table.
		 * @var Phone[] _objPhoneArray;
		 */
		private $_objPhoneArray = array();

		/**
		 * Private member variable that stores a reference to a single Relationship object
		 * (of type Relationship), if this Person object was restored with
		 * an expansion on the relationship association table.
		 * @var Relationship _objRelationship;
		 */
		private $_objRelationship;

		/**
		 * Private member variable that stores a reference to an array of Relationship objects
		 * (of type Relationship[]), if this Person object was restored with
		 * an ExpandAsArray on the relationship association table.
		 * @var Relationship[] _objRelationshipArray;
		 */
		private $_objRelationshipArray = array();

		/**
		 * Private member variable that stores a reference to a single RelationshipAsRelatedTo object
		 * (of type Relationship), if this Person object was restored with
		 * an expansion on the relationship association table.
		 * @var Relationship _objRelationshipAsRelatedTo;
		 */
		private $_objRelationshipAsRelatedTo;

		/**
		 * Private member variable that stores a reference to an array of RelationshipAsRelatedTo objects
		 * (of type Relationship[]), if this Person object was restored with
		 * an ExpandAsArray on the relationship association table.
		 * @var Relationship[] _objRelationshipAsRelatedToArray;
		 */
		private $_objRelationshipAsRelatedToArray = array();

		/**
		 * Private member variable that stores a reference to a single StewardshipContribution object
		 * (of type StewardshipContribution), if this Person object was restored with
		 * an expansion on the stewardship_contribution association table.
		 * @var StewardshipContribution _objStewardshipContribution;
		 */
		private $_objStewardshipContribution;

		/**
		 * Private member variable that stores a reference to an array of StewardshipContribution objects
		 * (of type StewardshipContribution[]), if this Person object was restored with
		 * an ExpandAsArray on the stewardship_contribution association table.
		 * @var StewardshipContribution[] _objStewardshipContributionArray;
		 */
		private $_objStewardshipContributionArray = array();

		/**
		 * Private member variable that stores a reference to a single StewardshipPledge object
		 * (of type StewardshipPledge), if this Person object was restored with
		 * an expansion on the stewardship_pledge association table.
		 * @var StewardshipPledge _objStewardshipPledge;
		 */
		private $_objStewardshipPledge;

		/**
		 * Private member variable that stores a reference to an array of StewardshipPledge objects
		 * (of type StewardshipPledge[]), if this Person object was restored with
		 * an ExpandAsArray on the stewardship_pledge association table.
		 * @var StewardshipPledge[] _objStewardshipPledgeArray;
		 */
		private $_objStewardshipPledgeArray = array();

		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column person.current_head_shot_id.
		 *
		 * NOTE: Always use the CurrentHeadShot property getter to correctly retrieve this HeadShot object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var HeadShot objCurrentHeadShot
		 */
		protected $objCurrentHeadShot;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column person.mailing_address_id.
		 *
		 * NOTE: Always use the MailingAddress property getter to correctly retrieve this Address object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Address objMailingAddress
		 */
		protected $objMailingAddress;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column person.stewardship_address_id.
		 *
		 * NOTE: Always use the StewardshipAddress property getter to correctly retrieve this Address object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Address objStewardshipAddress
		 */
		protected $objStewardshipAddress;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column person.primary_phone_id.
		 *
		 * NOTE: Always use the PrimaryPhone property getter to correctly retrieve this Phone object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Phone objPrimaryPhone
		 */
		protected $objPrimaryPhone;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column person.primary_email_id.
		 *
		 * NOTE: Always use the PrimaryEmail property getter to correctly retrieve this Email object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Email objPrimaryEmail
		 */
		protected $objPrimaryEmail;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column household.head_person_id.
		 *
		 * NOTE: Always use the HouseholdAsHead property getter to correctly retrieve this Household object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Household objHouseholdAsHead
		 */
		protected $objHouseholdAsHead;
		
		/**
		 * Used internally to manage whether the adjoined HouseholdAsHead object
		 * needs to be updated on save.
		 * 
		 * NOTE: Do not manually update this value 
		 */
		protected $blnDirtyHouseholdAsHead;





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a Person from PK Info
		 * @param integer $intId
		 * @return Person
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Person::QuerySingle(
				QQ::Equal(QQN::Person()->Id, $intId)
			);
		}

		/**
		 * Load all People
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadAll query
			try {
				return Person::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all People
		 * @return int
		 */
		public static function CountAll() {
			// Call Person::QueryCount to perform the CountAll query
			return Person::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Create/Build out the QueryBuilder object with Person-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'person');
			Person::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('person');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single Person object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Person the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Person::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Person object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Person::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return Person::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Person objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Person[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Person::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Person::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = Person::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of Person objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Person::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'person_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Person-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Person::GetSelectFields($objQueryBuilder);
				Person::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Person::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Person
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'person';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'membership_status_type_id', $strAliasPrefix . 'membership_status_type_id');
			$objBuilder->AddSelectItem($strTableName, 'marital_status_type_id', $strAliasPrefix . 'marital_status_type_id');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'middle_name', $strAliasPrefix . 'middle_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'mailing_label', $strAliasPrefix . 'mailing_label');
			$objBuilder->AddSelectItem($strTableName, 'prior_last_names', $strAliasPrefix . 'prior_last_names');
			$objBuilder->AddSelectItem($strTableName, 'nickname', $strAliasPrefix . 'nickname');
			$objBuilder->AddSelectItem($strTableName, 'title', $strAliasPrefix . 'title');
			$objBuilder->AddSelectItem($strTableName, 'suffix', $strAliasPrefix . 'suffix');
			$objBuilder->AddSelectItem($strTableName, 'gender', $strAliasPrefix . 'gender');
			$objBuilder->AddSelectItem($strTableName, 'date_of_birth', $strAliasPrefix . 'date_of_birth');
			$objBuilder->AddSelectItem($strTableName, 'dob_approximate_flag', $strAliasPrefix . 'dob_approximate_flag');
			$objBuilder->AddSelectItem($strTableName, 'deceased_flag', $strAliasPrefix . 'deceased_flag');
			$objBuilder->AddSelectItem($strTableName, 'date_deceased', $strAliasPrefix . 'date_deceased');
			$objBuilder->AddSelectItem($strTableName, 'current_head_shot_id', $strAliasPrefix . 'current_head_shot_id');
			$objBuilder->AddSelectItem($strTableName, 'mailing_address_id', $strAliasPrefix . 'mailing_address_id');
			$objBuilder->AddSelectItem($strTableName, 'stewardship_address_id', $strAliasPrefix . 'stewardship_address_id');
			$objBuilder->AddSelectItem($strTableName, 'primary_phone_id', $strAliasPrefix . 'primary_phone_id');
			$objBuilder->AddSelectItem($strTableName, 'primary_email_id', $strAliasPrefix . 'primary_email_id');
			$objBuilder->AddSelectItem($strTableName, 'can_mail_flag', $strAliasPrefix . 'can_mail_flag');
			$objBuilder->AddSelectItem($strTableName, 'can_phone_flag', $strAliasPrefix . 'can_phone_flag');
			$objBuilder->AddSelectItem($strTableName, 'can_email_flag', $strAliasPrefix . 'can_email_flag');
			$objBuilder->AddSelectItem($strTableName, 'primary_address_text', $strAliasPrefix . 'primary_address_text');
			$objBuilder->AddSelectItem($strTableName, 'primary_city_text', $strAliasPrefix . 'primary_city_text');
			$objBuilder->AddSelectItem($strTableName, 'primary_phone_text', $strAliasPrefix . 'primary_phone_text');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Person from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Person::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Person
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'person__';

				$strAlias = $strAliasPrefix . 'checkingaccountlookup__checking_account_lookup_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCheckingAccountLookupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCheckingAccountLookupArray[$intPreviousChildItemCount - 1];
						$objChildItem = CheckingAccountLookup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'checkingaccountlookup__checking_account_lookup_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCheckingAccountLookupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCheckingAccountLookupArray[] = CheckingAccountLookup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'checkingaccountlookup__checking_account_lookup_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'communicationlist__communication_list_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCommunicationListArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCommunicationListArray[$intPreviousChildItemCount - 1];
						$objChildItem = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__communication_list_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCommunicationListArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCommunicationListArray[] = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__communication_list_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'nameitem__name_item_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objNameItemArray)) {
						$objPreviousChildItem = $objPreviousItem->_objNameItemArray[$intPreviousChildItemCount - 1];
						$objChildItem = NameItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nameitem__name_item_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objNameItemArray[] = $objChildItem;
					} else
						$objPreviousItem->_objNameItemArray[] = NameItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nameitem__name_item_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				$strAlias = $strAliasPrefix . 'address__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAddressArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAddressArray[$intPreviousChildItemCount - 1];
						$objChildItem = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAddressArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAddressArray[] = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'attributevalue__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objAttributeValueArray)) {
						$objPreviousChildItem = $objPreviousItem->_objAttributeValueArray[$intPreviousChildItemCount - 1];
						$objChildItem = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalue__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objAttributeValueArray[] = $objChildItem;
					} else
						$objPreviousItem->_objAttributeValueArray[] = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'comment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCommentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCommentArray[$intPreviousChildItemCount - 1];
						$objChildItem = Comment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'comment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCommentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCommentArray[] = Comment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'comment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'email__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objEmailArray)) {
						$objPreviousChildItem = $objPreviousItem->_objEmailArray[$intPreviousChildItemCount - 1];
						$objChildItem = Email::InstantiateDbRow($objDbRow, $strAliasPrefix . 'email__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objEmailArray[] = $objChildItem;
					} else
						$objPreviousItem->_objEmailArray[] = Email::InstantiateDbRow($objDbRow, $strAliasPrefix . 'email__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'emailmessageroute__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objEmailMessageRouteArray)) {
						$objPreviousChildItem = $objPreviousItem->_objEmailMessageRouteArray[$intPreviousChildItemCount - 1];
						$objChildItem = EmailMessageRoute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailmessageroute__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objEmailMessageRouteArray[] = $objChildItem;
					} else
						$objPreviousItem->_objEmailMessageRouteArray[] = EmailMessageRoute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailmessageroute__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'groupparticipation__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objGroupParticipationArray)) {
						$objPreviousChildItem = $objPreviousItem->_objGroupParticipationArray[$intPreviousChildItemCount - 1];
						$objChildItem = GroupParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupparticipation__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objGroupParticipationArray[] = $objChildItem;
					} else
						$objPreviousItem->_objGroupParticipationArray[] = GroupParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'headshot__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objHeadShotArray)) {
						$objPreviousChildItem = $objPreviousItem->_objHeadShotArray[$intPreviousChildItemCount - 1];
						$objChildItem = HeadShot::InstantiateDbRow($objDbRow, $strAliasPrefix . 'headshot__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objHeadShotArray[] = $objChildItem;
					} else
						$objPreviousItem->_objHeadShotArray[] = HeadShot::InstantiateDbRow($objDbRow, $strAliasPrefix . 'headshot__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'householdparticipation__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objHouseholdParticipationArray)) {
						$objPreviousChildItem = $objPreviousItem->_objHouseholdParticipationArray[$intPreviousChildItemCount - 1];
						$objChildItem = HouseholdParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdparticipation__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objHouseholdParticipationArray[] = $objChildItem;
					} else
						$objPreviousItem->_objHouseholdParticipationArray[] = HouseholdParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'marriage__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objMarriageArray)) {
						$objPreviousChildItem = $objPreviousItem->_objMarriageArray[$intPreviousChildItemCount - 1];
						$objChildItem = Marriage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'marriage__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objMarriageArray[] = $objChildItem;
					} else
						$objPreviousItem->_objMarriageArray[] = Marriage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'marriage__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'marriageasmarriedto__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objMarriageAsMarriedToArray)) {
						$objPreviousChildItem = $objPreviousItem->_objMarriageAsMarriedToArray[$intPreviousChildItemCount - 1];
						$objChildItem = Marriage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'marriageasmarriedto__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objMarriageAsMarriedToArray[] = $objChildItem;
					} else
						$objPreviousItem->_objMarriageAsMarriedToArray[] = Marriage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'marriageasmarriedto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'membership__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objMembershipArray)) {
						$objPreviousChildItem = $objPreviousItem->_objMembershipArray[$intPreviousChildItemCount - 1];
						$objChildItem = Membership::InstantiateDbRow($objDbRow, $strAliasPrefix . 'membership__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objMembershipArray[] = $objChildItem;
					} else
						$objPreviousItem->_objMembershipArray[] = Membership::InstantiateDbRow($objDbRow, $strAliasPrefix . 'membership__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'othercontactinfo__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objOtherContactInfoArray)) {
						$objPreviousChildItem = $objPreviousItem->_objOtherContactInfoArray[$intPreviousChildItemCount - 1];
						$objChildItem = OtherContactInfo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'othercontactinfo__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objOtherContactInfoArray[] = $objChildItem;
					} else
						$objPreviousItem->_objOtherContactInfoArray[] = OtherContactInfo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'othercontactinfo__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'phone__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPhoneArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPhoneArray[$intPreviousChildItemCount - 1];
						$objChildItem = Phone::InstantiateDbRow($objDbRow, $strAliasPrefix . 'phone__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPhoneArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPhoneArray[] = Phone::InstantiateDbRow($objDbRow, $strAliasPrefix . 'phone__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'relationship__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRelationshipArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRelationshipArray[$intPreviousChildItemCount - 1];
						$objChildItem = Relationship::InstantiateDbRow($objDbRow, $strAliasPrefix . 'relationship__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRelationshipArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRelationshipArray[] = Relationship::InstantiateDbRow($objDbRow, $strAliasPrefix . 'relationship__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'relationshipasrelatedto__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRelationshipAsRelatedToArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRelationshipAsRelatedToArray[$intPreviousChildItemCount - 1];
						$objChildItem = Relationship::InstantiateDbRow($objDbRow, $strAliasPrefix . 'relationshipasrelatedto__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRelationshipAsRelatedToArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRelationshipAsRelatedToArray[] = Relationship::InstantiateDbRow($objDbRow, $strAliasPrefix . 'relationshipasrelatedto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'stewardshipcontribution__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStewardshipContributionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStewardshipContributionArray[$intPreviousChildItemCount - 1];
						$objChildItem = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStewardshipContributionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStewardshipContributionArray[] = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'stewardshippledge__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStewardshipPledgeArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStewardshipPledgeArray[$intPreviousChildItemCount - 1];
						$objChildItem = StewardshipPledge::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippledge__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStewardshipPledgeArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStewardshipPledgeArray[] = StewardshipPledge::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippledge__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'person__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Person object
			$objToReturn = new Person();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'membership_status_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'membership_status_type_id'] : $strAliasPrefix . 'membership_status_type_id';
			$objToReturn->intMembershipStatusTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'marital_status_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'marital_status_type_id'] : $strAliasPrefix . 'marital_status_type_id';
			$objToReturn->intMaritalStatusTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'middle_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'middle_name'] : $strAliasPrefix . 'middle_name';
			$objToReturn->strMiddleName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'mailing_label', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'mailing_label'] : $strAliasPrefix . 'mailing_label';
			$objToReturn->strMailingLabel = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'prior_last_names', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'prior_last_names'] : $strAliasPrefix . 'prior_last_names';
			$objToReturn->strPriorLastNames = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'nickname', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'nickname'] : $strAliasPrefix . 'nickname';
			$objToReturn->strNickname = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'title', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'title'] : $strAliasPrefix . 'title';
			$objToReturn->strTitle = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'suffix', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'suffix'] : $strAliasPrefix . 'suffix';
			$objToReturn->strSuffix = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'gender', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'gender'] : $strAliasPrefix . 'gender';
			$objToReturn->strGender = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_of_birth', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_of_birth'] : $strAliasPrefix . 'date_of_birth';
			$objToReturn->dttDateOfBirth = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'dob_approximate_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'dob_approximate_flag'] : $strAliasPrefix . 'dob_approximate_flag';
			$objToReturn->blnDobApproximateFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'deceased_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'deceased_flag'] : $strAliasPrefix . 'deceased_flag';
			$objToReturn->blnDeceasedFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_deceased', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_deceased'] : $strAliasPrefix . 'date_deceased';
			$objToReturn->dttDateDeceased = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'current_head_shot_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'current_head_shot_id'] : $strAliasPrefix . 'current_head_shot_id';
			$objToReturn->intCurrentHeadShotId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'mailing_address_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'mailing_address_id'] : $strAliasPrefix . 'mailing_address_id';
			$objToReturn->intMailingAddressId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'stewardship_address_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'stewardship_address_id'] : $strAliasPrefix . 'stewardship_address_id';
			$objToReturn->intStewardshipAddressId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'primary_phone_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'primary_phone_id'] : $strAliasPrefix . 'primary_phone_id';
			$objToReturn->intPrimaryPhoneId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'primary_email_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'primary_email_id'] : $strAliasPrefix . 'primary_email_id';
			$objToReturn->intPrimaryEmailId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'can_mail_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'can_mail_flag'] : $strAliasPrefix . 'can_mail_flag';
			$objToReturn->blnCanMailFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'can_phone_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'can_phone_flag'] : $strAliasPrefix . 'can_phone_flag';
			$objToReturn->blnCanPhoneFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'can_email_flag', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'can_email_flag'] : $strAliasPrefix . 'can_email_flag';
			$objToReturn->blnCanEmailFlag = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'primary_address_text', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'primary_address_text'] : $strAliasPrefix . 'primary_address_text';
			$objToReturn->strPrimaryAddressText = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'primary_city_text', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'primary_city_text'] : $strAliasPrefix . 'primary_city_text';
			$objToReturn->strPrimaryCityText = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'primary_phone_text', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'primary_phone_text'] : $strAliasPrefix . 'primary_phone_text';
			$objToReturn->strPrimaryPhoneText = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'person__';

			// Check for CurrentHeadShot Early Binding
			$strAlias = $strAliasPrefix . 'current_head_shot_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCurrentHeadShot = HeadShot::InstantiateDbRow($objDbRow, $strAliasPrefix . 'current_head_shot_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for MailingAddress Early Binding
			$strAlias = $strAliasPrefix . 'mailing_address_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objMailingAddress = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'mailing_address_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for StewardshipAddress Early Binding
			$strAlias = $strAliasPrefix . 'stewardship_address_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStewardshipAddress = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardship_address_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for PrimaryPhone Early Binding
			$strAlias = $strAliasPrefix . 'primary_phone_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPrimaryPhone = Phone::InstantiateDbRow($objDbRow, $strAliasPrefix . 'primary_phone_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for PrimaryEmail Early Binding
			$strAlias = $strAliasPrefix . 'primary_email_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objPrimaryEmail = Email::InstantiateDbRow($objDbRow, $strAliasPrefix . 'primary_email_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);


			// Check for HouseholdAsHead Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'householdashead__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName)))
					$objToReturn->objHouseholdAsHead = Household::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdashead__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objHouseholdAsHead = false;
			}


			// Check for CheckingAccountLookup Virtual Binding
			$strAlias = $strAliasPrefix . 'checkingaccountlookup__checking_account_lookup_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCheckingAccountLookupArray[] = CheckingAccountLookup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'checkingaccountlookup__checking_account_lookup_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCheckingAccountLookup = CheckingAccountLookup::InstantiateDbRow($objDbRow, $strAliasPrefix . 'checkingaccountlookup__checking_account_lookup_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for CommunicationList Virtual Binding
			$strAlias = $strAliasPrefix . 'communicationlist__communication_list_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCommunicationListArray[] = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__communication_list_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCommunicationList = CommunicationList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'communicationlist__communication_list_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for NameItem Virtual Binding
			$strAlias = $strAliasPrefix . 'nameitem__name_item_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objNameItemArray[] = NameItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nameitem__name_item_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objNameItem = NameItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nameitem__name_item_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for Address Virtual Binding
			$strAlias = $strAliasPrefix . 'address__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAddressArray[] = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAddress = Address::InstantiateDbRow($objDbRow, $strAliasPrefix . 'address__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for AttributeValue Virtual Binding
			$strAlias = $strAliasPrefix . 'attributevalue__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objAttributeValueArray[] = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objAttributeValue = AttributeValue::InstantiateDbRow($objDbRow, $strAliasPrefix . 'attributevalue__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Comment Virtual Binding
			$strAlias = $strAliasPrefix . 'comment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCommentArray[] = Comment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'comment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objComment = Comment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'comment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Email Virtual Binding
			$strAlias = $strAliasPrefix . 'email__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objEmailArray[] = Email::InstantiateDbRow($objDbRow, $strAliasPrefix . 'email__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objEmail = Email::InstantiateDbRow($objDbRow, $strAliasPrefix . 'email__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for EmailMessageRoute Virtual Binding
			$strAlias = $strAliasPrefix . 'emailmessageroute__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objEmailMessageRouteArray[] = EmailMessageRoute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailmessageroute__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objEmailMessageRoute = EmailMessageRoute::InstantiateDbRow($objDbRow, $strAliasPrefix . 'emailmessageroute__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for GroupParticipation Virtual Binding
			$strAlias = $strAliasPrefix . 'groupparticipation__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objGroupParticipationArray[] = GroupParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objGroupParticipation = GroupParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for HeadShot Virtual Binding
			$strAlias = $strAliasPrefix . 'headshot__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objHeadShotArray[] = HeadShot::InstantiateDbRow($objDbRow, $strAliasPrefix . 'headshot__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objHeadShot = HeadShot::InstantiateDbRow($objDbRow, $strAliasPrefix . 'headshot__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for HouseholdParticipation Virtual Binding
			$strAlias = $strAliasPrefix . 'householdparticipation__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objHouseholdParticipationArray[] = HouseholdParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objHouseholdParticipation = HouseholdParticipation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'householdparticipation__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Marriage Virtual Binding
			$strAlias = $strAliasPrefix . 'marriage__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objMarriageArray[] = Marriage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'marriage__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objMarriage = Marriage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'marriage__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for MarriageAsMarriedTo Virtual Binding
			$strAlias = $strAliasPrefix . 'marriageasmarriedto__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objMarriageAsMarriedToArray[] = Marriage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'marriageasmarriedto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objMarriageAsMarriedTo = Marriage::InstantiateDbRow($objDbRow, $strAliasPrefix . 'marriageasmarriedto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Membership Virtual Binding
			$strAlias = $strAliasPrefix . 'membership__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objMembershipArray[] = Membership::InstantiateDbRow($objDbRow, $strAliasPrefix . 'membership__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objMembership = Membership::InstantiateDbRow($objDbRow, $strAliasPrefix . 'membership__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for OtherContactInfo Virtual Binding
			$strAlias = $strAliasPrefix . 'othercontactinfo__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objOtherContactInfoArray[] = OtherContactInfo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'othercontactinfo__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objOtherContactInfo = OtherContactInfo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'othercontactinfo__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Phone Virtual Binding
			$strAlias = $strAliasPrefix . 'phone__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPhoneArray[] = Phone::InstantiateDbRow($objDbRow, $strAliasPrefix . 'phone__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPhone = Phone::InstantiateDbRow($objDbRow, $strAliasPrefix . 'phone__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Relationship Virtual Binding
			$strAlias = $strAliasPrefix . 'relationship__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRelationshipArray[] = Relationship::InstantiateDbRow($objDbRow, $strAliasPrefix . 'relationship__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRelationship = Relationship::InstantiateDbRow($objDbRow, $strAliasPrefix . 'relationship__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RelationshipAsRelatedTo Virtual Binding
			$strAlias = $strAliasPrefix . 'relationshipasrelatedto__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRelationshipAsRelatedToArray[] = Relationship::InstantiateDbRow($objDbRow, $strAliasPrefix . 'relationshipasrelatedto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRelationshipAsRelatedTo = Relationship::InstantiateDbRow($objDbRow, $strAliasPrefix . 'relationshipasrelatedto__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StewardshipContribution Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshipcontribution__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipContributionArray[] = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipContribution = StewardshipContribution::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshipcontribution__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StewardshipPledge Virtual Binding
			$strAlias = $strAliasPrefix . 'stewardshippledge__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStewardshipPledgeArray[] = StewardshipPledge::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippledge__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStewardshipPledge = StewardshipPledge::InstantiateDbRow($objDbRow, $strAliasPrefix . 'stewardshippledge__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of People from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Person[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Person::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Person::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Person object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Person next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return Person::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Person object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Person
		*/
		public static function LoadById($intId) {
			return Person::QuerySingle(
				QQ::Equal(QQN::Person()->Id, $intId)
			);
		}
			
		/**
		 * Load a single Person object,
		 * by CurrentHeadShotId Index(es)
		 * @param integer $intCurrentHeadShotId
		 * @return Person
		*/
		public static function LoadByCurrentHeadShotId($intCurrentHeadShotId) {
			return Person::QuerySingle(
				QQ::Equal(QQN::Person()->CurrentHeadShotId, $intCurrentHeadShotId)
			);
		}
			
		/**
		 * Load a single Person object,
		 * by PrimaryEmailId Index(es)
		 * @param integer $intPrimaryEmailId
		 * @return Person
		*/
		public static function LoadByPrimaryEmailId($intPrimaryEmailId) {
			return Person::QuerySingle(
				QQ::Equal(QQN::Person()->PrimaryEmailId, $intPrimaryEmailId)
			);
		}
			
		/**
		 * Load an array of Person objects,
		 * by MembershipStatusTypeId Index(es)
		 * @param integer $intMembershipStatusTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByMembershipStatusTypeId($intMembershipStatusTypeId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByMembershipStatusTypeId query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->MembershipStatusTypeId, $intMembershipStatusTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People
		 * by MembershipStatusTypeId Index(es)
		 * @param integer $intMembershipStatusTypeId
		 * @return int
		*/
		public static function CountByMembershipStatusTypeId($intMembershipStatusTypeId) {
			// Call Person::QueryCount to perform the CountByMembershipStatusTypeId query
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->MembershipStatusTypeId, $intMembershipStatusTypeId)
			);
		}
			
		/**
		 * Load an array of Person objects,
		 * by MaritalStatusTypeId Index(es)
		 * @param integer $intMaritalStatusTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByMaritalStatusTypeId($intMaritalStatusTypeId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByMaritalStatusTypeId query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->MaritalStatusTypeId, $intMaritalStatusTypeId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People
		 * by MaritalStatusTypeId Index(es)
		 * @param integer $intMaritalStatusTypeId
		 * @return int
		*/
		public static function CountByMaritalStatusTypeId($intMaritalStatusTypeId) {
			// Call Person::QueryCount to perform the CountByMaritalStatusTypeId query
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->MaritalStatusTypeId, $intMaritalStatusTypeId)
			);
		}
			
		/**
		 * Load an array of Person objects,
		 * by MailingAddressId Index(es)
		 * @param integer $intMailingAddressId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByMailingAddressId($intMailingAddressId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByMailingAddressId query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->MailingAddressId, $intMailingAddressId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People
		 * by MailingAddressId Index(es)
		 * @param integer $intMailingAddressId
		 * @return int
		*/
		public static function CountByMailingAddressId($intMailingAddressId) {
			// Call Person::QueryCount to perform the CountByMailingAddressId query
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->MailingAddressId, $intMailingAddressId)
			);
		}
			
		/**
		 * Load an array of Person objects,
		 * by StewardshipAddressId Index(es)
		 * @param integer $intStewardshipAddressId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByStewardshipAddressId($intStewardshipAddressId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByStewardshipAddressId query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->StewardshipAddressId, $intStewardshipAddressId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People
		 * by StewardshipAddressId Index(es)
		 * @param integer $intStewardshipAddressId
		 * @return int
		*/
		public static function CountByStewardshipAddressId($intStewardshipAddressId) {
			// Call Person::QueryCount to perform the CountByStewardshipAddressId query
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->StewardshipAddressId, $intStewardshipAddressId)
			);
		}
			
		/**
		 * Load an array of Person objects,
		 * by PrimaryPhoneId Index(es)
		 * @param integer $intPrimaryPhoneId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByPrimaryPhoneId($intPrimaryPhoneId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByPrimaryPhoneId query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->PrimaryPhoneId, $intPrimaryPhoneId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People
		 * by PrimaryPhoneId Index(es)
		 * @param integer $intPrimaryPhoneId
		 * @return int
		*/
		public static function CountByPrimaryPhoneId($intPrimaryPhoneId) {
			// Call Person::QueryCount to perform the CountByPrimaryPhoneId query
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->PrimaryPhoneId, $intPrimaryPhoneId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of CheckingAccountLookup objects for a given CheckingAccountLookup
		 * via the checkingaccountlookup_person_assn table
		 * @param integer $intCheckingAccountLookupId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByCheckingAccountLookup($intCheckingAccountLookupId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByCheckingAccountLookup query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->CheckingAccountLookup->CheckingAccountLookupId, $intCheckingAccountLookupId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People for a given CheckingAccountLookup
		 * via the checkingaccountlookup_person_assn table
		 * @param integer $intCheckingAccountLookupId
		 * @return int
		*/
		public static function CountByCheckingAccountLookup($intCheckingAccountLookupId) {
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->CheckingAccountLookup->CheckingAccountLookupId, $intCheckingAccountLookupId)
			);
		}
			/**
		 * Load an array of CommunicationList objects for a given CommunicationList
		 * via the communicationlist_person_assn table
		 * @param integer $intCommunicationListId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByCommunicationList($intCommunicationListId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByCommunicationList query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->CommunicationList->CommunicationListId, $intCommunicationListId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People for a given CommunicationList
		 * via the communicationlist_person_assn table
		 * @param integer $intCommunicationListId
		 * @return int
		*/
		public static function CountByCommunicationList($intCommunicationListId) {
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->CommunicationList->CommunicationListId, $intCommunicationListId)
			);
		}
			/**
		 * Load an array of NameItem objects for a given NameItem
		 * via the person_nameitem_assn table
		 * @param integer $intNameItemId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByNameItem($intNameItemId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByNameItem query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->NameItem->NameItemId, $intNameItemId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People for a given NameItem
		 * via the person_nameitem_assn table
		 * @param integer $intNameItemId
		 * @return int
		*/
		public static function CountByNameItem($intNameItemId) {
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->NameItem->NameItemId, $intNameItemId)
			);
		}




		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			QApplication::$Database[2]->NonQuery('
				INSERT INTO `person` (
					`id`,
					`membership_status_type_id`,
					`marital_status_type_id`,
					`first_name`,
					`middle_name`,
					`last_name`,
					`mailing_label`,
					`prior_last_names`,
					`nickname`,
					`title`,
					`suffix`,
					`gender`,
					`date_of_birth`,
					`dob_approximate_flag`,
					`deceased_flag`,
					`date_deceased`,
					`current_head_shot_id`,
					`mailing_address_id`,
					`stewardship_address_id`,
					`primary_phone_id`,
					`primary_email_id`,
					`can_mail_flag`,
					`can_phone_flag`,
					`can_email_flag`,
					`primary_address_text`,
					`primary_city_text`,
					`primary_phone_text`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intMembershipStatusTypeId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intMaritalStatusTypeId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strFirstName) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strMiddleName) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strLastName) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strMailingLabel) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strPriorLastNames) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strNickname) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strTitle) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strSuffix) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strGender) . ',
					' . QApplication::$Database[2]->SqlVariable($this->dttDateOfBirth) . ',
					' . QApplication::$Database[2]->SqlVariable($this->blnDobApproximateFlag) . ',
					' . QApplication::$Database[2]->SqlVariable($this->blnDeceasedFlag) . ',
					' . QApplication::$Database[2]->SqlVariable($this->dttDateDeceased) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intCurrentHeadShotId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intMailingAddressId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intStewardshipAddressId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intPrimaryPhoneId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->intPrimaryEmailId) . ',
					' . QApplication::$Database[2]->SqlVariable($this->blnCanMailFlag) . ',
					' . QApplication::$Database[2]->SqlVariable($this->blnCanPhoneFlag) . ',
					' . QApplication::$Database[2]->SqlVariable($this->blnCanEmailFlag) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strPrimaryAddressText) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strPrimaryCityText) . ',
					' . QApplication::$Database[2]->SqlVariable($this->strPrimaryPhoneText) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intId
		 * @return Person[]
		 */
		public static function GetJournalForId($intId) {
			$objResult = QApplication::$Database[2]->Query('SELECT * FROM person WHERE id = ' .
				QApplication::$Database[2]->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Person::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Person[]
		 */
		public function GetJournal() {
			return Person::GetJournalForId($this->intId);
		}

		/**
		 * Save this Person
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `person` (
							`membership_status_type_id`,
							`marital_status_type_id`,
							`first_name`,
							`middle_name`,
							`last_name`,
							`mailing_label`,
							`prior_last_names`,
							`nickname`,
							`title`,
							`suffix`,
							`gender`,
							`date_of_birth`,
							`dob_approximate_flag`,
							`deceased_flag`,
							`date_deceased`,
							`current_head_shot_id`,
							`mailing_address_id`,
							`stewardship_address_id`,
							`primary_phone_id`,
							`primary_email_id`,
							`can_mail_flag`,
							`can_phone_flag`,
							`can_email_flag`,
							`primary_address_text`,
							`primary_city_text`,
							`primary_phone_text`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intMembershipStatusTypeId) . ',
							' . $objDatabase->SqlVariable($this->intMaritalStatusTypeId) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strMiddleName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strMailingLabel) . ',
							' . $objDatabase->SqlVariable($this->strPriorLastNames) . ',
							' . $objDatabase->SqlVariable($this->strNickname) . ',
							' . $objDatabase->SqlVariable($this->strTitle) . ',
							' . $objDatabase->SqlVariable($this->strSuffix) . ',
							' . $objDatabase->SqlVariable($this->strGender) . ',
							' . $objDatabase->SqlVariable($this->dttDateOfBirth) . ',
							' . $objDatabase->SqlVariable($this->blnDobApproximateFlag) . ',
							' . $objDatabase->SqlVariable($this->blnDeceasedFlag) . ',
							' . $objDatabase->SqlVariable($this->dttDateDeceased) . ',
							' . $objDatabase->SqlVariable($this->intCurrentHeadShotId) . ',
							' . $objDatabase->SqlVariable($this->intMailingAddressId) . ',
							' . $objDatabase->SqlVariable($this->intStewardshipAddressId) . ',
							' . $objDatabase->SqlVariable($this->intPrimaryPhoneId) . ',
							' . $objDatabase->SqlVariable($this->intPrimaryEmailId) . ',
							' . $objDatabase->SqlVariable($this->blnCanMailFlag) . ',
							' . $objDatabase->SqlVariable($this->blnCanPhoneFlag) . ',
							' . $objDatabase->SqlVariable($this->blnCanEmailFlag) . ',
							' . $objDatabase->SqlVariable($this->strPrimaryAddressText) . ',
							' . $objDatabase->SqlVariable($this->strPrimaryCityText) . ',
							' . $objDatabase->SqlVariable($this->strPrimaryPhoneText) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('person', 'id');

					// Journaling
					$this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`person`
						SET
							`membership_status_type_id` = ' . $objDatabase->SqlVariable($this->intMembershipStatusTypeId) . ',
							`marital_status_type_id` = ' . $objDatabase->SqlVariable($this->intMaritalStatusTypeId) . ',
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`middle_name` = ' . $objDatabase->SqlVariable($this->strMiddleName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`mailing_label` = ' . $objDatabase->SqlVariable($this->strMailingLabel) . ',
							`prior_last_names` = ' . $objDatabase->SqlVariable($this->strPriorLastNames) . ',
							`nickname` = ' . $objDatabase->SqlVariable($this->strNickname) . ',
							`title` = ' . $objDatabase->SqlVariable($this->strTitle) . ',
							`suffix` = ' . $objDatabase->SqlVariable($this->strSuffix) . ',
							`gender` = ' . $objDatabase->SqlVariable($this->strGender) . ',
							`date_of_birth` = ' . $objDatabase->SqlVariable($this->dttDateOfBirth) . ',
							`dob_approximate_flag` = ' . $objDatabase->SqlVariable($this->blnDobApproximateFlag) . ',
							`deceased_flag` = ' . $objDatabase->SqlVariable($this->blnDeceasedFlag) . ',
							`date_deceased` = ' . $objDatabase->SqlVariable($this->dttDateDeceased) . ',
							`current_head_shot_id` = ' . $objDatabase->SqlVariable($this->intCurrentHeadShotId) . ',
							`mailing_address_id` = ' . $objDatabase->SqlVariable($this->intMailingAddressId) . ',
							`stewardship_address_id` = ' . $objDatabase->SqlVariable($this->intStewardshipAddressId) . ',
							`primary_phone_id` = ' . $objDatabase->SqlVariable($this->intPrimaryPhoneId) . ',
							`primary_email_id` = ' . $objDatabase->SqlVariable($this->intPrimaryEmailId) . ',
							`can_mail_flag` = ' . $objDatabase->SqlVariable($this->blnCanMailFlag) . ',
							`can_phone_flag` = ' . $objDatabase->SqlVariable($this->blnCanPhoneFlag) . ',
							`can_email_flag` = ' . $objDatabase->SqlVariable($this->blnCanEmailFlag) . ',
							`primary_address_text` = ' . $objDatabase->SqlVariable($this->strPrimaryAddressText) . ',
							`primary_city_text` = ' . $objDatabase->SqlVariable($this->strPrimaryCityText) . ',
							`primary_phone_text` = ' . $objDatabase->SqlVariable($this->strPrimaryPhoneText) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					$this->Journal('UPDATE');
				}

		
		
				// Update the adjoined HouseholdAsHead object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyHouseholdAsHead) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = Household::LoadByHeadPersonId($this->intId)) {
						$objAssociated->HeadPersonId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objHouseholdAsHead) {
						$this->objHouseholdAsHead->HeadPersonId = $this->intId;
						$this->objHouseholdAsHead->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyHouseholdAsHead = false;
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Person
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Person with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			
			
			// Update the adjoined HouseholdAsHead object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = Household::LoadByHeadPersonId($this->intId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			$this->Journal('DELETE');
		}

		/**
		 * Delete all People
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`');
		}

		/**
		 * Truncate person table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `person`');
		}

		/**
		 * Reload this Person from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Person object.');

			// Reload the Object
			$objReloaded = Person::Load($this->intId);

			// Update $this's local variables to match
			$this->MembershipStatusTypeId = $objReloaded->MembershipStatusTypeId;
			$this->MaritalStatusTypeId = $objReloaded->MaritalStatusTypeId;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strMiddleName = $objReloaded->strMiddleName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strMailingLabel = $objReloaded->strMailingLabel;
			$this->strPriorLastNames = $objReloaded->strPriorLastNames;
			$this->strNickname = $objReloaded->strNickname;
			$this->strTitle = $objReloaded->strTitle;
			$this->strSuffix = $objReloaded->strSuffix;
			$this->strGender = $objReloaded->strGender;
			$this->dttDateOfBirth = $objReloaded->dttDateOfBirth;
			$this->blnDobApproximateFlag = $objReloaded->blnDobApproximateFlag;
			$this->blnDeceasedFlag = $objReloaded->blnDeceasedFlag;
			$this->dttDateDeceased = $objReloaded->dttDateDeceased;
			$this->CurrentHeadShotId = $objReloaded->CurrentHeadShotId;
			$this->MailingAddressId = $objReloaded->MailingAddressId;
			$this->StewardshipAddressId = $objReloaded->StewardshipAddressId;
			$this->PrimaryPhoneId = $objReloaded->PrimaryPhoneId;
			$this->PrimaryEmailId = $objReloaded->PrimaryEmailId;
			$this->blnCanMailFlag = $objReloaded->blnCanMailFlag;
			$this->blnCanPhoneFlag = $objReloaded->blnCanPhoneFlag;
			$this->blnCanEmailFlag = $objReloaded->blnCanEmailFlag;
			$this->strPrimaryAddressText = $objReloaded->strPrimaryAddressText;
			$this->strPrimaryCityText = $objReloaded->strPrimaryCityText;
			$this->strPrimaryPhoneText = $objReloaded->strPrimaryPhoneText;
		}



		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Id':
					// Gets the value for intId (Read-Only PK)
					// @return integer
					return $this->intId;

				case 'MembershipStatusTypeId':
					// Gets the value for intMembershipStatusTypeId (Not Null)
					// @return integer
					return $this->intMembershipStatusTypeId;

				case 'MaritalStatusTypeId':
					// Gets the value for intMaritalStatusTypeId (Not Null)
					// @return integer
					return $this->intMaritalStatusTypeId;

				case 'FirstName':
					// Gets the value for strFirstName 
					// @return string
					return $this->strFirstName;

				case 'MiddleName':
					// Gets the value for strMiddleName 
					// @return string
					return $this->strMiddleName;

				case 'LastName':
					// Gets the value for strLastName 
					// @return string
					return $this->strLastName;

				case 'MailingLabel':
					// Gets the value for strMailingLabel 
					// @return string
					return $this->strMailingLabel;

				case 'PriorLastNames':
					// Gets the value for strPriorLastNames 
					// @return string
					return $this->strPriorLastNames;

				case 'Nickname':
					// Gets the value for strNickname 
					// @return string
					return $this->strNickname;

				case 'Title':
					// Gets the value for strTitle 
					// @return string
					return $this->strTitle;

				case 'Suffix':
					// Gets the value for strSuffix 
					// @return string
					return $this->strSuffix;

				case 'Gender':
					// Gets the value for strGender 
					// @return string
					return $this->strGender;

				case 'DateOfBirth':
					// Gets the value for dttDateOfBirth 
					// @return QDateTime
					return $this->dttDateOfBirth;

				case 'DobApproximateFlag':
					// Gets the value for blnDobApproximateFlag 
					// @return boolean
					return $this->blnDobApproximateFlag;

				case 'DeceasedFlag':
					// Gets the value for blnDeceasedFlag (Not Null)
					// @return boolean
					return $this->blnDeceasedFlag;

				case 'DateDeceased':
					// Gets the value for dttDateDeceased 
					// @return QDateTime
					return $this->dttDateDeceased;

				case 'CurrentHeadShotId':
					// Gets the value for intCurrentHeadShotId (Unique)
					// @return integer
					return $this->intCurrentHeadShotId;

				case 'MailingAddressId':
					// Gets the value for intMailingAddressId 
					// @return integer
					return $this->intMailingAddressId;

				case 'StewardshipAddressId':
					// Gets the value for intStewardshipAddressId 
					// @return integer
					return $this->intStewardshipAddressId;

				case 'PrimaryPhoneId':
					// Gets the value for intPrimaryPhoneId 
					// @return integer
					return $this->intPrimaryPhoneId;

				case 'PrimaryEmailId':
					// Gets the value for intPrimaryEmailId (Unique)
					// @return integer
					return $this->intPrimaryEmailId;

				case 'CanMailFlag':
					// Gets the value for blnCanMailFlag 
					// @return boolean
					return $this->blnCanMailFlag;

				case 'CanPhoneFlag':
					// Gets the value for blnCanPhoneFlag 
					// @return boolean
					return $this->blnCanPhoneFlag;

				case 'CanEmailFlag':
					// Gets the value for blnCanEmailFlag 
					// @return boolean
					return $this->blnCanEmailFlag;

				case 'PrimaryAddressText':
					// Gets the value for strPrimaryAddressText 
					// @return string
					return $this->strPrimaryAddressText;

				case 'PrimaryCityText':
					// Gets the value for strPrimaryCityText 
					// @return string
					return $this->strPrimaryCityText;

				case 'PrimaryPhoneText':
					// Gets the value for strPrimaryPhoneText 
					// @return string
					return $this->strPrimaryPhoneText;


				///////////////////
				// Member Objects
				///////////////////
				case 'CurrentHeadShot':
					// Gets the value for the HeadShot object referenced by intCurrentHeadShotId (Unique)
					// @return HeadShot
					try {
						if ((!$this->objCurrentHeadShot) && (!is_null($this->intCurrentHeadShotId)))
							$this->objCurrentHeadShot = HeadShot::Load($this->intCurrentHeadShotId);
						return $this->objCurrentHeadShot;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MailingAddress':
					// Gets the value for the Address object referenced by intMailingAddressId 
					// @return Address
					try {
						if ((!$this->objMailingAddress) && (!is_null($this->intMailingAddressId)))
							$this->objMailingAddress = Address::Load($this->intMailingAddressId);
						return $this->objMailingAddress;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipAddress':
					// Gets the value for the Address object referenced by intStewardshipAddressId 
					// @return Address
					try {
						if ((!$this->objStewardshipAddress) && (!is_null($this->intStewardshipAddressId)))
							$this->objStewardshipAddress = Address::Load($this->intStewardshipAddressId);
						return $this->objStewardshipAddress;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimaryPhone':
					// Gets the value for the Phone object referenced by intPrimaryPhoneId 
					// @return Phone
					try {
						if ((!$this->objPrimaryPhone) && (!is_null($this->intPrimaryPhoneId)))
							$this->objPrimaryPhone = Phone::Load($this->intPrimaryPhoneId);
						return $this->objPrimaryPhone;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimaryEmail':
					// Gets the value for the Email object referenced by intPrimaryEmailId (Unique)
					// @return Email
					try {
						if ((!$this->objPrimaryEmail) && (!is_null($this->intPrimaryEmailId)))
							$this->objPrimaryEmail = Email::Load($this->intPrimaryEmailId);
						return $this->objPrimaryEmail;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

		
		
				case 'HouseholdAsHead':
					// Gets the value for the Household object that uniquely references this Person
					// by objHouseholdAsHead (Unique)
					// @return Household
					try {
						if ($this->objHouseholdAsHead === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objHouseholdAsHead)
							$this->objHouseholdAsHead = Household::LoadByHeadPersonId($this->intId);
						return $this->objHouseholdAsHead;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_CheckingAccountLookup':
					// Gets the value for the private _objCheckingAccountLookup (Read-Only)
					// if set due to an expansion on the checkingaccountlookup_person_assn association table
					// @return CheckingAccountLookup
					return $this->_objCheckingAccountLookup;

				case '_CheckingAccountLookupArray':
					// Gets the value for the private _objCheckingAccountLookupArray (Read-Only)
					// if set due to an ExpandAsArray on the checkingaccountlookup_person_assn association table
					// @return CheckingAccountLookup[]
					return (array) $this->_objCheckingAccountLookupArray;

				case '_CommunicationList':
					// Gets the value for the private _objCommunicationList (Read-Only)
					// if set due to an expansion on the communicationlist_person_assn association table
					// @return CommunicationList
					return $this->_objCommunicationList;

				case '_CommunicationListArray':
					// Gets the value for the private _objCommunicationListArray (Read-Only)
					// if set due to an ExpandAsArray on the communicationlist_person_assn association table
					// @return CommunicationList[]
					return (array) $this->_objCommunicationListArray;

				case '_NameItem':
					// Gets the value for the private _objNameItem (Read-Only)
					// if set due to an expansion on the person_nameitem_assn association table
					// @return NameItem
					return $this->_objNameItem;

				case '_NameItemArray':
					// Gets the value for the private _objNameItemArray (Read-Only)
					// if set due to an ExpandAsArray on the person_nameitem_assn association table
					// @return NameItem[]
					return (array) $this->_objNameItemArray;

				case '_Address':
					// Gets the value for the private _objAddress (Read-Only)
					// if set due to an expansion on the address.person_id reverse relationship
					// @return Address
					return $this->_objAddress;

				case '_AddressArray':
					// Gets the value for the private _objAddressArray (Read-Only)
					// if set due to an ExpandAsArray on the address.person_id reverse relationship
					// @return Address[]
					return (array) $this->_objAddressArray;

				case '_AttributeValue':
					// Gets the value for the private _objAttributeValue (Read-Only)
					// if set due to an expansion on the attribute_value.person_id reverse relationship
					// @return AttributeValue
					return $this->_objAttributeValue;

				case '_AttributeValueArray':
					// Gets the value for the private _objAttributeValueArray (Read-Only)
					// if set due to an ExpandAsArray on the attribute_value.person_id reverse relationship
					// @return AttributeValue[]
					return (array) $this->_objAttributeValueArray;

				case '_Comment':
					// Gets the value for the private _objComment (Read-Only)
					// if set due to an expansion on the comment.person_id reverse relationship
					// @return Comment
					return $this->_objComment;

				case '_CommentArray':
					// Gets the value for the private _objCommentArray (Read-Only)
					// if set due to an ExpandAsArray on the comment.person_id reverse relationship
					// @return Comment[]
					return (array) $this->_objCommentArray;

				case '_Email':
					// Gets the value for the private _objEmail (Read-Only)
					// if set due to an expansion on the email.person_id reverse relationship
					// @return Email
					return $this->_objEmail;

				case '_EmailArray':
					// Gets the value for the private _objEmailArray (Read-Only)
					// if set due to an ExpandAsArray on the email.person_id reverse relationship
					// @return Email[]
					return (array) $this->_objEmailArray;

				case '_EmailMessageRoute':
					// Gets the value for the private _objEmailMessageRoute (Read-Only)
					// if set due to an expansion on the email_message_route.person_id reverse relationship
					// @return EmailMessageRoute
					return $this->_objEmailMessageRoute;

				case '_EmailMessageRouteArray':
					// Gets the value for the private _objEmailMessageRouteArray (Read-Only)
					// if set due to an ExpandAsArray on the email_message_route.person_id reverse relationship
					// @return EmailMessageRoute[]
					return (array) $this->_objEmailMessageRouteArray;

				case '_GroupParticipation':
					// Gets the value for the private _objGroupParticipation (Read-Only)
					// if set due to an expansion on the group_participation.person_id reverse relationship
					// @return GroupParticipation
					return $this->_objGroupParticipation;

				case '_GroupParticipationArray':
					// Gets the value for the private _objGroupParticipationArray (Read-Only)
					// if set due to an ExpandAsArray on the group_participation.person_id reverse relationship
					// @return GroupParticipation[]
					return (array) $this->_objGroupParticipationArray;

				case '_HeadShot':
					// Gets the value for the private _objHeadShot (Read-Only)
					// if set due to an expansion on the head_shot.person_id reverse relationship
					// @return HeadShot
					return $this->_objHeadShot;

				case '_HeadShotArray':
					// Gets the value for the private _objHeadShotArray (Read-Only)
					// if set due to an ExpandAsArray on the head_shot.person_id reverse relationship
					// @return HeadShot[]
					return (array) $this->_objHeadShotArray;

				case '_HouseholdParticipation':
					// Gets the value for the private _objHouseholdParticipation (Read-Only)
					// if set due to an expansion on the household_participation.person_id reverse relationship
					// @return HouseholdParticipation
					return $this->_objHouseholdParticipation;

				case '_HouseholdParticipationArray':
					// Gets the value for the private _objHouseholdParticipationArray (Read-Only)
					// if set due to an ExpandAsArray on the household_participation.person_id reverse relationship
					// @return HouseholdParticipation[]
					return (array) $this->_objHouseholdParticipationArray;

				case '_Marriage':
					// Gets the value for the private _objMarriage (Read-Only)
					// if set due to an expansion on the marriage.person_id reverse relationship
					// @return Marriage
					return $this->_objMarriage;

				case '_MarriageArray':
					// Gets the value for the private _objMarriageArray (Read-Only)
					// if set due to an ExpandAsArray on the marriage.person_id reverse relationship
					// @return Marriage[]
					return (array) $this->_objMarriageArray;

				case '_MarriageAsMarriedTo':
					// Gets the value for the private _objMarriageAsMarriedTo (Read-Only)
					// if set due to an expansion on the marriage.married_to_person_id reverse relationship
					// @return Marriage
					return $this->_objMarriageAsMarriedTo;

				case '_MarriageAsMarriedToArray':
					// Gets the value for the private _objMarriageAsMarriedToArray (Read-Only)
					// if set due to an ExpandAsArray on the marriage.married_to_person_id reverse relationship
					// @return Marriage[]
					return (array) $this->_objMarriageAsMarriedToArray;

				case '_Membership':
					// Gets the value for the private _objMembership (Read-Only)
					// if set due to an expansion on the membership.person_id reverse relationship
					// @return Membership
					return $this->_objMembership;

				case '_MembershipArray':
					// Gets the value for the private _objMembershipArray (Read-Only)
					// if set due to an ExpandAsArray on the membership.person_id reverse relationship
					// @return Membership[]
					return (array) $this->_objMembershipArray;

				case '_OtherContactInfo':
					// Gets the value for the private _objOtherContactInfo (Read-Only)
					// if set due to an expansion on the other_contact_info.person_id reverse relationship
					// @return OtherContactInfo
					return $this->_objOtherContactInfo;

				case '_OtherContactInfoArray':
					// Gets the value for the private _objOtherContactInfoArray (Read-Only)
					// if set due to an ExpandAsArray on the other_contact_info.person_id reverse relationship
					// @return OtherContactInfo[]
					return (array) $this->_objOtherContactInfoArray;

				case '_Phone':
					// Gets the value for the private _objPhone (Read-Only)
					// if set due to an expansion on the phone.person_id reverse relationship
					// @return Phone
					return $this->_objPhone;

				case '_PhoneArray':
					// Gets the value for the private _objPhoneArray (Read-Only)
					// if set due to an ExpandAsArray on the phone.person_id reverse relationship
					// @return Phone[]
					return (array) $this->_objPhoneArray;

				case '_Relationship':
					// Gets the value for the private _objRelationship (Read-Only)
					// if set due to an expansion on the relationship.person_id reverse relationship
					// @return Relationship
					return $this->_objRelationship;

				case '_RelationshipArray':
					// Gets the value for the private _objRelationshipArray (Read-Only)
					// if set due to an ExpandAsArray on the relationship.person_id reverse relationship
					// @return Relationship[]
					return (array) $this->_objRelationshipArray;

				case '_RelationshipAsRelatedTo':
					// Gets the value for the private _objRelationshipAsRelatedTo (Read-Only)
					// if set due to an expansion on the relationship.related_to_person_id reverse relationship
					// @return Relationship
					return $this->_objRelationshipAsRelatedTo;

				case '_RelationshipAsRelatedToArray':
					// Gets the value for the private _objRelationshipAsRelatedToArray (Read-Only)
					// if set due to an ExpandAsArray on the relationship.related_to_person_id reverse relationship
					// @return Relationship[]
					return (array) $this->_objRelationshipAsRelatedToArray;

				case '_StewardshipContribution':
					// Gets the value for the private _objStewardshipContribution (Read-Only)
					// if set due to an expansion on the stewardship_contribution.person_id reverse relationship
					// @return StewardshipContribution
					return $this->_objStewardshipContribution;

				case '_StewardshipContributionArray':
					// Gets the value for the private _objStewardshipContributionArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_contribution.person_id reverse relationship
					// @return StewardshipContribution[]
					return (array) $this->_objStewardshipContributionArray;

				case '_StewardshipPledge':
					// Gets the value for the private _objStewardshipPledge (Read-Only)
					// if set due to an expansion on the stewardship_pledge.person_id reverse relationship
					// @return StewardshipPledge
					return $this->_objStewardshipPledge;

				case '_StewardshipPledgeArray':
					// Gets the value for the private _objStewardshipPledgeArray (Read-Only)
					// if set due to an ExpandAsArray on the stewardship_pledge.person_id reverse relationship
					// @return StewardshipPledge[]
					return (array) $this->_objStewardshipPledgeArray;


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'MembershipStatusTypeId':
					// Sets the value for intMembershipStatusTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intMembershipStatusTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MaritalStatusTypeId':
					// Sets the value for intMaritalStatusTypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intMaritalStatusTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FirstName':
					// Sets the value for strFirstName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFirstName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MiddleName':
					// Sets the value for strMiddleName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strMiddleName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastName':
					// Sets the value for strLastName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLastName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MailingLabel':
					// Sets the value for strMailingLabel 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strMailingLabel = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PriorLastNames':
					// Sets the value for strPriorLastNames 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPriorLastNames = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Nickname':
					// Sets the value for strNickname 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strNickname = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Title':
					// Sets the value for strTitle 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTitle = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Suffix':
					// Sets the value for strSuffix 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strSuffix = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Gender':
					// Sets the value for strGender 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strGender = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateOfBirth':
					// Sets the value for dttDateOfBirth 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateOfBirth = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DobApproximateFlag':
					// Sets the value for blnDobApproximateFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnDobApproximateFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeceasedFlag':
					// Sets the value for blnDeceasedFlag (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnDeceasedFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateDeceased':
					// Sets the value for dttDateDeceased 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateDeceased = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CurrentHeadShotId':
					// Sets the value for intCurrentHeadShotId (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCurrentHeadShot = null;
						return ($this->intCurrentHeadShotId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MailingAddressId':
					// Sets the value for intMailingAddressId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objMailingAddress = null;
						return ($this->intMailingAddressId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StewardshipAddressId':
					// Sets the value for intStewardshipAddressId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStewardshipAddress = null;
						return ($this->intStewardshipAddressId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimaryPhoneId':
					// Sets the value for intPrimaryPhoneId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPrimaryPhone = null;
						return ($this->intPrimaryPhoneId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimaryEmailId':
					// Sets the value for intPrimaryEmailId (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objPrimaryEmail = null;
						return ($this->intPrimaryEmailId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CanMailFlag':
					// Sets the value for blnCanMailFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnCanMailFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CanPhoneFlag':
					// Sets the value for blnCanPhoneFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnCanPhoneFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CanEmailFlag':
					// Sets the value for blnCanEmailFlag 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnCanEmailFlag = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimaryAddressText':
					// Sets the value for strPrimaryAddressText 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPrimaryAddressText = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimaryCityText':
					// Sets the value for strPrimaryCityText 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPrimaryCityText = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimaryPhoneText':
					// Sets the value for strPrimaryPhoneText 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPrimaryPhoneText = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CurrentHeadShot':
					// Sets the value for the HeadShot object referenced by intCurrentHeadShotId (Unique)
					// @param HeadShot $mixValue
					// @return HeadShot
					if (is_null($mixValue)) {
						$this->intCurrentHeadShotId = null;
						$this->objCurrentHeadShot = null;
						return null;
					} else {
						// Make sure $mixValue actually is a HeadShot object
						try {
							$mixValue = QType::Cast($mixValue, 'HeadShot');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED HeadShot object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved CurrentHeadShot for this Person');

						// Update Local Member Variables
						$this->objCurrentHeadShot = $mixValue;
						$this->intCurrentHeadShotId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'MailingAddress':
					// Sets the value for the Address object referenced by intMailingAddressId 
					// @param Address $mixValue
					// @return Address
					if (is_null($mixValue)) {
						$this->intMailingAddressId = null;
						$this->objMailingAddress = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Address object
						try {
							$mixValue = QType::Cast($mixValue, 'Address');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Address object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved MailingAddress for this Person');

						// Update Local Member Variables
						$this->objMailingAddress = $mixValue;
						$this->intMailingAddressId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'StewardshipAddress':
					// Sets the value for the Address object referenced by intStewardshipAddressId 
					// @param Address $mixValue
					// @return Address
					if (is_null($mixValue)) {
						$this->intStewardshipAddressId = null;
						$this->objStewardshipAddress = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Address object
						try {
							$mixValue = QType::Cast($mixValue, 'Address');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Address object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved StewardshipAddress for this Person');

						// Update Local Member Variables
						$this->objStewardshipAddress = $mixValue;
						$this->intStewardshipAddressId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'PrimaryPhone':
					// Sets the value for the Phone object referenced by intPrimaryPhoneId 
					// @param Phone $mixValue
					// @return Phone
					if (is_null($mixValue)) {
						$this->intPrimaryPhoneId = null;
						$this->objPrimaryPhone = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Phone object
						try {
							$mixValue = QType::Cast($mixValue, 'Phone');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Phone object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved PrimaryPhone for this Person');

						// Update Local Member Variables
						$this->objPrimaryPhone = $mixValue;
						$this->intPrimaryPhoneId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'PrimaryEmail':
					// Sets the value for the Email object referenced by intPrimaryEmailId (Unique)
					// @param Email $mixValue
					// @return Email
					if (is_null($mixValue)) {
						$this->intPrimaryEmailId = null;
						$this->objPrimaryEmail = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Email object
						try {
							$mixValue = QType::Cast($mixValue, 'Email');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Email object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved PrimaryEmail for this Person');

						// Update Local Member Variables
						$this->objPrimaryEmail = $mixValue;
						$this->intPrimaryEmailId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'HouseholdAsHead':
					// Sets the value for the Household object referenced by objHouseholdAsHead (Unique)
					// @param Household $mixValue
					// @return Household
					if (is_null($mixValue)) {
						$this->objHouseholdAsHead = null;

						// Make sure we update the adjoined Household object the next time we call Save()
						$this->blnDirtyHouseholdAsHead = true;

						return null;
					} else {
						// Make sure $mixValue actually is a Household object
						try {
							$mixValue = QType::Cast($mixValue, 'Household');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objHouseholdAsHead to a DIFFERENT $mixValue?
						if ((!$this->HouseholdAsHead) || ($this->HouseholdAsHead->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined Household object the next time we call Save()
							$this->blnDirtyHouseholdAsHead = true;

							// Update Local Member Variable
							$this->objHouseholdAsHead = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////

			
		
		// Related Objects' Methods for Address
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Addresses as an array of Address objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		*/ 
		public function GetAddressArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Address::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Addresses
		 * @return int
		*/ 
		public function CountAddresses() {
			if ((is_null($this->intId)))
				return 0;

			return Address::CountByPersonId($this->intId);
		}

		/**
		 * Associates a Address
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function AssociateAddress(Address $objAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAddress on this unsaved Person.');
			if ((is_null($objAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAddress on this Person with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAddress->Id) . '
			');

			// Journaling
			$objAddress->PersonId = $this->intId;
			$objAddress->Journal('UPDATE');
		}

		/**
		 * Unassociates a Address
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function UnassociateAddress(Address $objAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Person.');
			if ((is_null($objAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this Person with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAddress->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objAddress->PersonId = null;
			$objAddress->Journal('UPDATE');
		}

		/**
		 * Unassociates all Addresses
		 * @return void
		*/ 
		public function UnassociateAllAddresses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Address::LoadArrayByPersonId($this->intId) as $objAddress) {
				$objAddress->PersonId = null;
				$objAddress->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`address`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Address
		 * @param Address $objAddress
		 * @return void
		*/ 
		public function DeleteAssociatedAddress(Address $objAddress) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Person.');
			if ((is_null($objAddress->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this Person with an unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAddress->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objAddress->Journal('DELETE');
		}

		/**
		 * Deletes all associated Addresses
		 * @return void
		*/ 
		public function DeleteAllAddresses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAddress on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Address::LoadArrayByPersonId($this->intId) as $objAddress) {
				$objAddress->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for AttributeValue
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AttributeValues as an array of AttributeValue objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AttributeValue[]
		*/ 
		public function GetAttributeValueArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return AttributeValue::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AttributeValues
		 * @return int
		*/ 
		public function CountAttributeValues() {
			if ((is_null($this->intId)))
				return 0;

			return AttributeValue::CountByPersonId($this->intId);
		}

		/**
		 * Associates a AttributeValue
		 * @param AttributeValue $objAttributeValue
		 * @return void
		*/ 
		public function AssociateAttributeValue(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeValue on this unsaved Person.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAttributeValue on this Person with an unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_value`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeValue->Id) . '
			');

			// Journaling
			$objAttributeValue->PersonId = $this->intId;
			$objAttributeValue->Journal('UPDATE');
		}

		/**
		 * Unassociates a AttributeValue
		 * @param AttributeValue $objAttributeValue
		 * @return void
		*/ 
		public function UnassociateAttributeValue(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this unsaved Person.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this Person with an unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_value`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeValue->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objAttributeValue->PersonId = null;
			$objAttributeValue->Journal('UPDATE');
		}

		/**
		 * Unassociates all AttributeValues
		 * @return void
		*/ 
		public function UnassociateAllAttributeValues() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (AttributeValue::LoadArrayByPersonId($this->intId) as $objAttributeValue) {
				$objAttributeValue->PersonId = null;
				$objAttributeValue->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`attribute_value`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated AttributeValue
		 * @param AttributeValue $objAttributeValue
		 * @return void
		*/ 
		public function DeleteAssociatedAttributeValue(AttributeValue $objAttributeValue) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this unsaved Person.');
			if ((is_null($objAttributeValue->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this Person with an unsaved AttributeValue.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_value`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAttributeValue->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objAttributeValue->Journal('DELETE');
		}

		/**
		 * Deletes all associated AttributeValues
		 * @return void
		*/ 
		public function DeleteAllAttributeValues() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAttributeValue on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (AttributeValue::LoadArrayByPersonId($this->intId) as $objAttributeValue) {
				$objAttributeValue->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`attribute_value`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Comment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Comments as an array of Comment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Comment[]
		*/ 
		public function GetCommentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Comment::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Comments
		 * @return int
		*/ 
		public function CountComments() {
			if ((is_null($this->intId)))
				return 0;

			return Comment::CountByPersonId($this->intId);
		}

		/**
		 * Associates a Comment
		 * @param Comment $objComment
		 * @return void
		*/ 
		public function AssociateComment(Comment $objComment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateComment on this unsaved Person.');
			if ((is_null($objComment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateComment on this Person with an unsaved Comment.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`comment`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objComment->Id) . '
			');

			// Journaling
			$objComment->PersonId = $this->intId;
			$objComment->Journal('UPDATE');
		}

		/**
		 * Unassociates a Comment
		 * @param Comment $objComment
		 * @return void
		*/ 
		public function UnassociateComment(Comment $objComment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateComment on this unsaved Person.');
			if ((is_null($objComment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateComment on this Person with an unsaved Comment.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`comment`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objComment->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objComment->PersonId = null;
			$objComment->Journal('UPDATE');
		}

		/**
		 * Unassociates all Comments
		 * @return void
		*/ 
		public function UnassociateAllComments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateComment on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Comment::LoadArrayByPersonId($this->intId) as $objComment) {
				$objComment->PersonId = null;
				$objComment->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`comment`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Comment
		 * @param Comment $objComment
		 * @return void
		*/ 
		public function DeleteAssociatedComment(Comment $objComment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateComment on this unsaved Person.');
			if ((is_null($objComment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateComment on this Person with an unsaved Comment.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`comment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objComment->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objComment->Journal('DELETE');
		}

		/**
		 * Deletes all associated Comments
		 * @return void
		*/ 
		public function DeleteAllComments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateComment on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Comment::LoadArrayByPersonId($this->intId) as $objComment) {
				$objComment->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`comment`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Email
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Emails as an array of Email objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Email[]
		*/ 
		public function GetEmailArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Email::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Emails
		 * @return int
		*/ 
		public function CountEmails() {
			if ((is_null($this->intId)))
				return 0;

			return Email::CountByPersonId($this->intId);
		}

		/**
		 * Associates a Email
		 * @param Email $objEmail
		 * @return void
		*/ 
		public function AssociateEmail(Email $objEmail) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmail on this unsaved Person.');
			if ((is_null($objEmail->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmail on this Person with an unsaved Email.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmail->Id) . '
			');

			// Journaling
			$objEmail->PersonId = $this->intId;
			$objEmail->Journal('UPDATE');
		}

		/**
		 * Unassociates a Email
		 * @param Email $objEmail
		 * @return void
		*/ 
		public function UnassociateEmail(Email $objEmail) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmail on this unsaved Person.');
			if ((is_null($objEmail->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmail on this Person with an unsaved Email.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmail->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objEmail->PersonId = null;
			$objEmail->Journal('UPDATE');
		}

		/**
		 * Unassociates all Emails
		 * @return void
		*/ 
		public function UnassociateAllEmails() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmail on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Email::LoadArrayByPersonId($this->intId) as $objEmail) {
				$objEmail->PersonId = null;
				$objEmail->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Email
		 * @param Email $objEmail
		 * @return void
		*/ 
		public function DeleteAssociatedEmail(Email $objEmail) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmail on this unsaved Person.');
			if ((is_null($objEmail->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmail on this Person with an unsaved Email.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmail->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objEmail->Journal('DELETE');
		}

		/**
		 * Deletes all associated Emails
		 * @return void
		*/ 
		public function DeleteAllEmails() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmail on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Email::LoadArrayByPersonId($this->intId) as $objEmail) {
				$objEmail->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for EmailMessageRoute
		//-------------------------------------------------------------------

		/**
		 * Gets all associated EmailMessageRoutes as an array of EmailMessageRoute objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmailMessageRoute[]
		*/ 
		public function GetEmailMessageRouteArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return EmailMessageRoute::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EmailMessageRoutes
		 * @return int
		*/ 
		public function CountEmailMessageRoutes() {
			if ((is_null($this->intId)))
				return 0;

			return EmailMessageRoute::CountByPersonId($this->intId);
		}

		/**
		 * Associates a EmailMessageRoute
		 * @param EmailMessageRoute $objEmailMessageRoute
		 * @return void
		*/ 
		public function AssociateEmailMessageRoute(EmailMessageRoute $objEmailMessageRoute) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmailMessageRoute on this unsaved Person.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmailMessageRoute on this Person with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . '
			');

			// Journaling
			$objEmailMessageRoute->PersonId = $this->intId;
			$objEmailMessageRoute->Journal('UPDATE');
		}

		/**
		 * Unassociates a EmailMessageRoute
		 * @param EmailMessageRoute $objEmailMessageRoute
		 * @return void
		*/ 
		public function UnassociateEmailMessageRoute(EmailMessageRoute $objEmailMessageRoute) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved Person.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this Person with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objEmailMessageRoute->PersonId = null;
			$objEmailMessageRoute->Journal('UPDATE');
		}

		/**
		 * Unassociates all EmailMessageRoutes
		 * @return void
		*/ 
		public function UnassociateAllEmailMessageRoutes() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (EmailMessageRoute::LoadArrayByPersonId($this->intId) as $objEmailMessageRoute) {
				$objEmailMessageRoute->PersonId = null;
				$objEmailMessageRoute->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`email_message_route`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EmailMessageRoute
		 * @param EmailMessageRoute $objEmailMessageRoute
		 * @return void
		*/ 
		public function DeleteAssociatedEmailMessageRoute(EmailMessageRoute $objEmailMessageRoute) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved Person.');
			if ((is_null($objEmailMessageRoute->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this Person with an unsaved EmailMessageRoute.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message_route`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmailMessageRoute->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objEmailMessageRoute->Journal('DELETE');
		}

		/**
		 * Deletes all associated EmailMessageRoutes
		 * @return void
		*/ 
		public function DeleteAllEmailMessageRoutes() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmailMessageRoute on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (EmailMessageRoute::LoadArrayByPersonId($this->intId) as $objEmailMessageRoute) {
				$objEmailMessageRoute->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`email_message_route`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for GroupParticipation
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GroupParticipations as an array of GroupParticipation objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GroupParticipation[]
		*/ 
		public function GetGroupParticipationArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GroupParticipation::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GroupParticipations
		 * @return int
		*/ 
		public function CountGroupParticipations() {
			if ((is_null($this->intId)))
				return 0;

			return GroupParticipation::CountByPersonId($this->intId);
		}

		/**
		 * Associates a GroupParticipation
		 * @param GroupParticipation $objGroupParticipation
		 * @return void
		*/ 
		public function AssociateGroupParticipation(GroupParticipation $objGroupParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGroupParticipation on this unsaved Person.');
			if ((is_null($objGroupParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGroupParticipation on this Person with an unsaved GroupParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group_participation`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroupParticipation->Id) . '
			');

			// Journaling
			$objGroupParticipation->PersonId = $this->intId;
			$objGroupParticipation->Journal('UPDATE');
		}

		/**
		 * Unassociates a GroupParticipation
		 * @param GroupParticipation $objGroupParticipation
		 * @return void
		*/ 
		public function UnassociateGroupParticipation(GroupParticipation $objGroupParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this unsaved Person.');
			if ((is_null($objGroupParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this Person with an unsaved GroupParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group_participation`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroupParticipation->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objGroupParticipation->PersonId = null;
			$objGroupParticipation->Journal('UPDATE');
		}

		/**
		 * Unassociates all GroupParticipations
		 * @return void
		*/ 
		public function UnassociateAllGroupParticipations() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (GroupParticipation::LoadArrayByPersonId($this->intId) as $objGroupParticipation) {
				$objGroupParticipation->PersonId = null;
				$objGroupParticipation->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`group_participation`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GroupParticipation
		 * @param GroupParticipation $objGroupParticipation
		 * @return void
		*/ 
		public function DeleteAssociatedGroupParticipation(GroupParticipation $objGroupParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this unsaved Person.');
			if ((is_null($objGroupParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this Person with an unsaved GroupParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group_participation`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGroupParticipation->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objGroupParticipation->Journal('DELETE');
		}

		/**
		 * Deletes all associated GroupParticipations
		 * @return void
		*/ 
		public function DeleteAllGroupParticipations() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupParticipation on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (GroupParticipation::LoadArrayByPersonId($this->intId) as $objGroupParticipation) {
				$objGroupParticipation->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group_participation`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for HeadShot
		//-------------------------------------------------------------------

		/**
		 * Gets all associated HeadShots as an array of HeadShot objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HeadShot[]
		*/ 
		public function GetHeadShotArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return HeadShot::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated HeadShots
		 * @return int
		*/ 
		public function CountHeadShots() {
			if ((is_null($this->intId)))
				return 0;

			return HeadShot::CountByPersonId($this->intId);
		}

		/**
		 * Associates a HeadShot
		 * @param HeadShot $objHeadShot
		 * @return void
		*/ 
		public function AssociateHeadShot(HeadShot $objHeadShot) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHeadShot on this unsaved Person.');
			if ((is_null($objHeadShot->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHeadShot on this Person with an unsaved HeadShot.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`head_shot`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHeadShot->Id) . '
			');

			// Journaling
			$objHeadShot->PersonId = $this->intId;
			$objHeadShot->Journal('UPDATE');
		}

		/**
		 * Unassociates a HeadShot
		 * @param HeadShot $objHeadShot
		 * @return void
		*/ 
		public function UnassociateHeadShot(HeadShot $objHeadShot) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHeadShot on this unsaved Person.');
			if ((is_null($objHeadShot->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHeadShot on this Person with an unsaved HeadShot.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`head_shot`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHeadShot->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objHeadShot->PersonId = null;
			$objHeadShot->Journal('UPDATE');
		}

		/**
		 * Unassociates all HeadShots
		 * @return void
		*/ 
		public function UnassociateAllHeadShots() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHeadShot on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (HeadShot::LoadArrayByPersonId($this->intId) as $objHeadShot) {
				$objHeadShot->PersonId = null;
				$objHeadShot->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`head_shot`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated HeadShot
		 * @param HeadShot $objHeadShot
		 * @return void
		*/ 
		public function DeleteAssociatedHeadShot(HeadShot $objHeadShot) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHeadShot on this unsaved Person.');
			if ((is_null($objHeadShot->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHeadShot on this Person with an unsaved HeadShot.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`head_shot`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHeadShot->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objHeadShot->Journal('DELETE');
		}

		/**
		 * Deletes all associated HeadShots
		 * @return void
		*/ 
		public function DeleteAllHeadShots() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHeadShot on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (HeadShot::LoadArrayByPersonId($this->intId) as $objHeadShot) {
				$objHeadShot->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`head_shot`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for HouseholdParticipation
		//-------------------------------------------------------------------

		/**
		 * Gets all associated HouseholdParticipations as an array of HouseholdParticipation objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HouseholdParticipation[]
		*/ 
		public function GetHouseholdParticipationArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return HouseholdParticipation::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated HouseholdParticipations
		 * @return int
		*/ 
		public function CountHouseholdParticipations() {
			if ((is_null($this->intId)))
				return 0;

			return HouseholdParticipation::CountByPersonId($this->intId);
		}

		/**
		 * Associates a HouseholdParticipation
		 * @param HouseholdParticipation $objHouseholdParticipation
		 * @return void
		*/ 
		public function AssociateHouseholdParticipation(HouseholdParticipation $objHouseholdParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHouseholdParticipation on this unsaved Person.');
			if ((is_null($objHouseholdParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHouseholdParticipation on this Person with an unsaved HouseholdParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_participation`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdParticipation->Id) . '
			');

			// Journaling
			$objHouseholdParticipation->PersonId = $this->intId;
			$objHouseholdParticipation->Journal('UPDATE');
		}

		/**
		 * Unassociates a HouseholdParticipation
		 * @param HouseholdParticipation $objHouseholdParticipation
		 * @return void
		*/ 
		public function UnassociateHouseholdParticipation(HouseholdParticipation $objHouseholdParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this unsaved Person.');
			if ((is_null($objHouseholdParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this Person with an unsaved HouseholdParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_participation`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdParticipation->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objHouseholdParticipation->PersonId = null;
			$objHouseholdParticipation->Journal('UPDATE');
		}

		/**
		 * Unassociates all HouseholdParticipations
		 * @return void
		*/ 
		public function UnassociateAllHouseholdParticipations() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (HouseholdParticipation::LoadArrayByPersonId($this->intId) as $objHouseholdParticipation) {
				$objHouseholdParticipation->PersonId = null;
				$objHouseholdParticipation->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`household_participation`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated HouseholdParticipation
		 * @param HouseholdParticipation $objHouseholdParticipation
		 * @return void
		*/ 
		public function DeleteAssociatedHouseholdParticipation(HouseholdParticipation $objHouseholdParticipation) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this unsaved Person.');
			if ((is_null($objHouseholdParticipation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this Person with an unsaved HouseholdParticipation.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household_participation`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHouseholdParticipation->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objHouseholdParticipation->Journal('DELETE');
		}

		/**
		 * Deletes all associated HouseholdParticipations
		 * @return void
		*/ 
		public function DeleteAllHouseholdParticipations() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHouseholdParticipation on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (HouseholdParticipation::LoadArrayByPersonId($this->intId) as $objHouseholdParticipation) {
				$objHouseholdParticipation->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`household_participation`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Marriage
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Marriages as an array of Marriage objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Marriage[]
		*/ 
		public function GetMarriageArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Marriage::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Marriages
		 * @return int
		*/ 
		public function CountMarriages() {
			if ((is_null($this->intId)))
				return 0;

			return Marriage::CountByPersonId($this->intId);
		}

		/**
		 * Associates a Marriage
		 * @param Marriage $objMarriage
		 * @return void
		*/ 
		public function AssociateMarriage(Marriage $objMarriage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMarriage on this unsaved Person.');
			if ((is_null($objMarriage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMarriage on this Person with an unsaved Marriage.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`marriage`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMarriage->Id) . '
			');

			// Journaling
			$objMarriage->PersonId = $this->intId;
			$objMarriage->Journal('UPDATE');
		}

		/**
		 * Unassociates a Marriage
		 * @param Marriage $objMarriage
		 * @return void
		*/ 
		public function UnassociateMarriage(Marriage $objMarriage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriage on this unsaved Person.');
			if ((is_null($objMarriage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriage on this Person with an unsaved Marriage.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`marriage`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMarriage->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objMarriage->PersonId = null;
			$objMarriage->Journal('UPDATE');
		}

		/**
		 * Unassociates all Marriages
		 * @return void
		*/ 
		public function UnassociateAllMarriages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriage on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Marriage::LoadArrayByPersonId($this->intId) as $objMarriage) {
				$objMarriage->PersonId = null;
				$objMarriage->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`marriage`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Marriage
		 * @param Marriage $objMarriage
		 * @return void
		*/ 
		public function DeleteAssociatedMarriage(Marriage $objMarriage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriage on this unsaved Person.');
			if ((is_null($objMarriage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriage on this Person with an unsaved Marriage.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`marriage`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMarriage->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objMarriage->Journal('DELETE');
		}

		/**
		 * Deletes all associated Marriages
		 * @return void
		*/ 
		public function DeleteAllMarriages() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriage on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Marriage::LoadArrayByPersonId($this->intId) as $objMarriage) {
				$objMarriage->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`marriage`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for MarriageAsMarriedTo
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MarriagesAsMarriedTo as an array of Marriage objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Marriage[]
		*/ 
		public function GetMarriageAsMarriedToArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Marriage::LoadArrayByMarriedToPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MarriagesAsMarriedTo
		 * @return int
		*/ 
		public function CountMarriagesAsMarriedTo() {
			if ((is_null($this->intId)))
				return 0;

			return Marriage::CountByMarriedToPersonId($this->intId);
		}

		/**
		 * Associates a MarriageAsMarriedTo
		 * @param Marriage $objMarriage
		 * @return void
		*/ 
		public function AssociateMarriageAsMarriedTo(Marriage $objMarriage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMarriageAsMarriedTo on this unsaved Person.');
			if ((is_null($objMarriage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMarriageAsMarriedTo on this Person with an unsaved Marriage.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`marriage`
				SET
					`married_to_person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMarriage->Id) . '
			');

			// Journaling
			$objMarriage->MarriedToPersonId = $this->intId;
			$objMarriage->Journal('UPDATE');
		}

		/**
		 * Unassociates a MarriageAsMarriedTo
		 * @param Marriage $objMarriage
		 * @return void
		*/ 
		public function UnassociateMarriageAsMarriedTo(Marriage $objMarriage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriageAsMarriedTo on this unsaved Person.');
			if ((is_null($objMarriage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriageAsMarriedTo on this Person with an unsaved Marriage.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`marriage`
				SET
					`married_to_person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMarriage->Id) . ' AND
					`married_to_person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objMarriage->MarriedToPersonId = null;
			$objMarriage->Journal('UPDATE');
		}

		/**
		 * Unassociates all MarriagesAsMarriedTo
		 * @return void
		*/ 
		public function UnassociateAllMarriagesAsMarriedTo() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriageAsMarriedTo on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Marriage::LoadArrayByMarriedToPersonId($this->intId) as $objMarriage) {
				$objMarriage->MarriedToPersonId = null;
				$objMarriage->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`marriage`
				SET
					`married_to_person_id` = null
				WHERE
					`married_to_person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated MarriageAsMarriedTo
		 * @param Marriage $objMarriage
		 * @return void
		*/ 
		public function DeleteAssociatedMarriageAsMarriedTo(Marriage $objMarriage) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriageAsMarriedTo on this unsaved Person.');
			if ((is_null($objMarriage->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriageAsMarriedTo on this Person with an unsaved Marriage.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`marriage`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMarriage->Id) . ' AND
					`married_to_person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objMarriage->Journal('DELETE');
		}

		/**
		 * Deletes all associated MarriagesAsMarriedTo
		 * @return void
		*/ 
		public function DeleteAllMarriagesAsMarriedTo() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMarriageAsMarriedTo on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Marriage::LoadArrayByMarriedToPersonId($this->intId) as $objMarriage) {
				$objMarriage->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`marriage`
				WHERE
					`married_to_person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Membership
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Memberships as an array of Membership objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Membership[]
		*/ 
		public function GetMembershipArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Membership::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Memberships
		 * @return int
		*/ 
		public function CountMemberships() {
			if ((is_null($this->intId)))
				return 0;

			return Membership::CountByPersonId($this->intId);
		}

		/**
		 * Associates a Membership
		 * @param Membership $objMembership
		 * @return void
		*/ 
		public function AssociateMembership(Membership $objMembership) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMembership on this unsaved Person.');
			if ((is_null($objMembership->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMembership on this Person with an unsaved Membership.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`membership`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMembership->Id) . '
			');

			// Journaling
			$objMembership->PersonId = $this->intId;
			$objMembership->Journal('UPDATE');
		}

		/**
		 * Unassociates a Membership
		 * @param Membership $objMembership
		 * @return void
		*/ 
		public function UnassociateMembership(Membership $objMembership) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMembership on this unsaved Person.');
			if ((is_null($objMembership->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMembership on this Person with an unsaved Membership.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`membership`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMembership->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objMembership->PersonId = null;
			$objMembership->Journal('UPDATE');
		}

		/**
		 * Unassociates all Memberships
		 * @return void
		*/ 
		public function UnassociateAllMemberships() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMembership on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Membership::LoadArrayByPersonId($this->intId) as $objMembership) {
				$objMembership->PersonId = null;
				$objMembership->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`membership`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Membership
		 * @param Membership $objMembership
		 * @return void
		*/ 
		public function DeleteAssociatedMembership(Membership $objMembership) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMembership on this unsaved Person.');
			if ((is_null($objMembership->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMembership on this Person with an unsaved Membership.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`membership`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMembership->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objMembership->Journal('DELETE');
		}

		/**
		 * Deletes all associated Memberships
		 * @return void
		*/ 
		public function DeleteAllMemberships() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMembership on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Membership::LoadArrayByPersonId($this->intId) as $objMembership) {
				$objMembership->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`membership`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for OtherContactInfo
		//-------------------------------------------------------------------

		/**
		 * Gets all associated OtherContactInfos as an array of OtherContactInfo objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OtherContactInfo[]
		*/ 
		public function GetOtherContactInfoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return OtherContactInfo::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OtherContactInfos
		 * @return int
		*/ 
		public function CountOtherContactInfos() {
			if ((is_null($this->intId)))
				return 0;

			return OtherContactInfo::CountByPersonId($this->intId);
		}

		/**
		 * Associates a OtherContactInfo
		 * @param OtherContactInfo $objOtherContactInfo
		 * @return void
		*/ 
		public function AssociateOtherContactInfo(OtherContactInfo $objOtherContactInfo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOtherContactInfo on this unsaved Person.');
			if ((is_null($objOtherContactInfo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOtherContactInfo on this Person with an unsaved OtherContactInfo.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`other_contact_info`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOtherContactInfo->Id) . '
			');

			// Journaling
			$objOtherContactInfo->PersonId = $this->intId;
			$objOtherContactInfo->Journal('UPDATE');
		}

		/**
		 * Unassociates a OtherContactInfo
		 * @param OtherContactInfo $objOtherContactInfo
		 * @return void
		*/ 
		public function UnassociateOtherContactInfo(OtherContactInfo $objOtherContactInfo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOtherContactInfo on this unsaved Person.');
			if ((is_null($objOtherContactInfo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOtherContactInfo on this Person with an unsaved OtherContactInfo.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`other_contact_info`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOtherContactInfo->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objOtherContactInfo->PersonId = null;
			$objOtherContactInfo->Journal('UPDATE');
		}

		/**
		 * Unassociates all OtherContactInfos
		 * @return void
		*/ 
		public function UnassociateAllOtherContactInfos() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOtherContactInfo on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (OtherContactInfo::LoadArrayByPersonId($this->intId) as $objOtherContactInfo) {
				$objOtherContactInfo->PersonId = null;
				$objOtherContactInfo->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`other_contact_info`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated OtherContactInfo
		 * @param OtherContactInfo $objOtherContactInfo
		 * @return void
		*/ 
		public function DeleteAssociatedOtherContactInfo(OtherContactInfo $objOtherContactInfo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOtherContactInfo on this unsaved Person.');
			if ((is_null($objOtherContactInfo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOtherContactInfo on this Person with an unsaved OtherContactInfo.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`other_contact_info`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOtherContactInfo->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objOtherContactInfo->Journal('DELETE');
		}

		/**
		 * Deletes all associated OtherContactInfos
		 * @return void
		*/ 
		public function DeleteAllOtherContactInfos() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOtherContactInfo on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (OtherContactInfo::LoadArrayByPersonId($this->intId) as $objOtherContactInfo) {
				$objOtherContactInfo->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`other_contact_info`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Phone
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Phones as an array of Phone objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Phone[]
		*/ 
		public function GetPhoneArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Phone::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Phones
		 * @return int
		*/ 
		public function CountPhones() {
			if ((is_null($this->intId)))
				return 0;

			return Phone::CountByPersonId($this->intId);
		}

		/**
		 * Associates a Phone
		 * @param Phone $objPhone
		 * @return void
		*/ 
		public function AssociatePhone(Phone $objPhone) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePhone on this unsaved Person.');
			if ((is_null($objPhone->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePhone on this Person with an unsaved Phone.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`phone`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPhone->Id) . '
			');

			// Journaling
			$objPhone->PersonId = $this->intId;
			$objPhone->Journal('UPDATE');
		}

		/**
		 * Unassociates a Phone
		 * @param Phone $objPhone
		 * @return void
		*/ 
		public function UnassociatePhone(Phone $objPhone) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this unsaved Person.');
			if ((is_null($objPhone->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this Person with an unsaved Phone.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`phone`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPhone->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objPhone->PersonId = null;
			$objPhone->Journal('UPDATE');
		}

		/**
		 * Unassociates all Phones
		 * @return void
		*/ 
		public function UnassociateAllPhones() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Phone::LoadArrayByPersonId($this->intId) as $objPhone) {
				$objPhone->PersonId = null;
				$objPhone->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`phone`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Phone
		 * @param Phone $objPhone
		 * @return void
		*/ 
		public function DeleteAssociatedPhone(Phone $objPhone) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this unsaved Person.');
			if ((is_null($objPhone->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this Person with an unsaved Phone.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`phone`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPhone->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objPhone->Journal('DELETE');
		}

		/**
		 * Deletes all associated Phones
		 * @return void
		*/ 
		public function DeleteAllPhones() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePhone on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Phone::LoadArrayByPersonId($this->intId) as $objPhone) {
				$objPhone->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`phone`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Relationship
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Relationships as an array of Relationship objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Relationship[]
		*/ 
		public function GetRelationshipArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Relationship::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Relationships
		 * @return int
		*/ 
		public function CountRelationships() {
			if ((is_null($this->intId)))
				return 0;

			return Relationship::CountByPersonId($this->intId);
		}

		/**
		 * Associates a Relationship
		 * @param Relationship $objRelationship
		 * @return void
		*/ 
		public function AssociateRelationship(Relationship $objRelationship) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRelationship on this unsaved Person.');
			if ((is_null($objRelationship->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRelationship on this Person with an unsaved Relationship.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`relationship`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRelationship->Id) . '
			');

			// Journaling
			$objRelationship->PersonId = $this->intId;
			$objRelationship->Journal('UPDATE');
		}

		/**
		 * Unassociates a Relationship
		 * @param Relationship $objRelationship
		 * @return void
		*/ 
		public function UnassociateRelationship(Relationship $objRelationship) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationship on this unsaved Person.');
			if ((is_null($objRelationship->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationship on this Person with an unsaved Relationship.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`relationship`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRelationship->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objRelationship->PersonId = null;
			$objRelationship->Journal('UPDATE');
		}

		/**
		 * Unassociates all Relationships
		 * @return void
		*/ 
		public function UnassociateAllRelationships() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationship on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Relationship::LoadArrayByPersonId($this->intId) as $objRelationship) {
				$objRelationship->PersonId = null;
				$objRelationship->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`relationship`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Relationship
		 * @param Relationship $objRelationship
		 * @return void
		*/ 
		public function DeleteAssociatedRelationship(Relationship $objRelationship) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationship on this unsaved Person.');
			if ((is_null($objRelationship->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationship on this Person with an unsaved Relationship.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`relationship`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRelationship->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objRelationship->Journal('DELETE');
		}

		/**
		 * Deletes all associated Relationships
		 * @return void
		*/ 
		public function DeleteAllRelationships() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationship on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Relationship::LoadArrayByPersonId($this->intId) as $objRelationship) {
				$objRelationship->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`relationship`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for RelationshipAsRelatedTo
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RelationshipsAsRelatedTo as an array of Relationship objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Relationship[]
		*/ 
		public function GetRelationshipAsRelatedToArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Relationship::LoadArrayByRelatedToPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RelationshipsAsRelatedTo
		 * @return int
		*/ 
		public function CountRelationshipsAsRelatedTo() {
			if ((is_null($this->intId)))
				return 0;

			return Relationship::CountByRelatedToPersonId($this->intId);
		}

		/**
		 * Associates a RelationshipAsRelatedTo
		 * @param Relationship $objRelationship
		 * @return void
		*/ 
		public function AssociateRelationshipAsRelatedTo(Relationship $objRelationship) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRelationshipAsRelatedTo on this unsaved Person.');
			if ((is_null($objRelationship->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRelationshipAsRelatedTo on this Person with an unsaved Relationship.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`relationship`
				SET
					`related_to_person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRelationship->Id) . '
			');

			// Journaling
			$objRelationship->RelatedToPersonId = $this->intId;
			$objRelationship->Journal('UPDATE');
		}

		/**
		 * Unassociates a RelationshipAsRelatedTo
		 * @param Relationship $objRelationship
		 * @return void
		*/ 
		public function UnassociateRelationshipAsRelatedTo(Relationship $objRelationship) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationshipAsRelatedTo on this unsaved Person.');
			if ((is_null($objRelationship->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationshipAsRelatedTo on this Person with an unsaved Relationship.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`relationship`
				SET
					`related_to_person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRelationship->Id) . ' AND
					`related_to_person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objRelationship->RelatedToPersonId = null;
			$objRelationship->Journal('UPDATE');
		}

		/**
		 * Unassociates all RelationshipsAsRelatedTo
		 * @return void
		*/ 
		public function UnassociateAllRelationshipsAsRelatedTo() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationshipAsRelatedTo on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Relationship::LoadArrayByRelatedToPersonId($this->intId) as $objRelationship) {
				$objRelationship->RelatedToPersonId = null;
				$objRelationship->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`relationship`
				SET
					`related_to_person_id` = null
				WHERE
					`related_to_person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated RelationshipAsRelatedTo
		 * @param Relationship $objRelationship
		 * @return void
		*/ 
		public function DeleteAssociatedRelationshipAsRelatedTo(Relationship $objRelationship) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationshipAsRelatedTo on this unsaved Person.');
			if ((is_null($objRelationship->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationshipAsRelatedTo on this Person with an unsaved Relationship.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`relationship`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRelationship->Id) . ' AND
					`related_to_person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objRelationship->Journal('DELETE');
		}

		/**
		 * Deletes all associated RelationshipsAsRelatedTo
		 * @return void
		*/ 
		public function DeleteAllRelationshipsAsRelatedTo() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRelationshipAsRelatedTo on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (Relationship::LoadArrayByRelatedToPersonId($this->intId) as $objRelationship) {
				$objRelationship->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`relationship`
				WHERE
					`related_to_person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StewardshipContribution
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StewardshipContributions as an array of StewardshipContribution objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipContribution[]
		*/ 
		public function GetStewardshipContributionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StewardshipContribution::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StewardshipContributions
		 * @return int
		*/ 
		public function CountStewardshipContributions() {
			if ((is_null($this->intId)))
				return 0;

			return StewardshipContribution::CountByPersonId($this->intId);
		}

		/**
		 * Associates a StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function AssociateStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContribution on this unsaved Person.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipContribution on this Person with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . '
			');

			// Journaling
			$objStewardshipContribution->PersonId = $this->intId;
			$objStewardshipContribution->Journal('UPDATE');
		}

		/**
		 * Unassociates a StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function UnassociateStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved Person.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this Person with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objStewardshipContribution->PersonId = null;
			$objStewardshipContribution->Journal('UPDATE');
		}

		/**
		 * Unassociates all StewardshipContributions
		 * @return void
		*/ 
		public function UnassociateAllStewardshipContributions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (StewardshipContribution::LoadArrayByPersonId($this->intId) as $objStewardshipContribution) {
				$objStewardshipContribution->PersonId = null;
				$objStewardshipContribution->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_contribution`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipContribution
		 * @param StewardshipContribution $objStewardshipContribution
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipContribution(StewardshipContribution $objStewardshipContribution) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved Person.');
			if ((is_null($objStewardshipContribution->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this Person with an unsaved StewardshipContribution.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipContribution->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objStewardshipContribution->Journal('DELETE');
		}

		/**
		 * Deletes all associated StewardshipContributions
		 * @return void
		*/ 
		public function DeleteAllStewardshipContributions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipContribution on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (StewardshipContribution::LoadArrayByPersonId($this->intId) as $objStewardshipContribution) {
				$objStewardshipContribution->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_contribution`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StewardshipPledge
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StewardshipPledges as an array of StewardshipPledge objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StewardshipPledge[]
		*/ 
		public function GetStewardshipPledgeArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StewardshipPledge::LoadArrayByPersonId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StewardshipPledges
		 * @return int
		*/ 
		public function CountStewardshipPledges() {
			if ((is_null($this->intId)))
				return 0;

			return StewardshipPledge::CountByPersonId($this->intId);
		}

		/**
		 * Associates a StewardshipPledge
		 * @param StewardshipPledge $objStewardshipPledge
		 * @return void
		*/ 
		public function AssociateStewardshipPledge(StewardshipPledge $objStewardshipPledge) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPledge on this unsaved Person.');
			if ((is_null($objStewardshipPledge->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStewardshipPledge on this Person with an unsaved StewardshipPledge.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_pledge`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPledge->Id) . '
			');

			// Journaling
			$objStewardshipPledge->PersonId = $this->intId;
			$objStewardshipPledge->Journal('UPDATE');
		}

		/**
		 * Unassociates a StewardshipPledge
		 * @param StewardshipPledge $objStewardshipPledge
		 * @return void
		*/ 
		public function UnassociateStewardshipPledge(StewardshipPledge $objStewardshipPledge) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this unsaved Person.');
			if ((is_null($objStewardshipPledge->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this Person with an unsaved StewardshipPledge.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_pledge`
				SET
					`person_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPledge->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objStewardshipPledge->PersonId = null;
			$objStewardshipPledge->Journal('UPDATE');
		}

		/**
		 * Unassociates all StewardshipPledges
		 * @return void
		*/ 
		public function UnassociateAllStewardshipPledges() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (StewardshipPledge::LoadArrayByPersonId($this->intId) as $objStewardshipPledge) {
				$objStewardshipPledge->PersonId = null;
				$objStewardshipPledge->Journal('UPDATE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`stewardship_pledge`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StewardshipPledge
		 * @param StewardshipPledge $objStewardshipPledge
		 * @return void
		*/ 
		public function DeleteAssociatedStewardshipPledge(StewardshipPledge $objStewardshipPledge) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this unsaved Person.');
			if ((is_null($objStewardshipPledge->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this Person with an unsaved StewardshipPledge.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_pledge`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStewardshipPledge->Id) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			$objStewardshipPledge->Journal('DELETE');
		}

		/**
		 * Deletes all associated StewardshipPledges
		 * @return void
		*/ 
		public function DeleteAllStewardshipPledges() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStewardshipPledge on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			foreach (StewardshipPledge::LoadArrayByPersonId($this->intId) as $objStewardshipPledge) {
				$objStewardshipPledge->Journal('DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`stewardship_pledge`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for CheckingAccountLookup
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated CheckingAccountLookups as an array of CheckingAccountLookup objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CheckingAccountLookup[]
		*/ 
		public function GetCheckingAccountLookupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CheckingAccountLookup::LoadArrayByPerson($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated CheckingAccountLookups
		 * @return int
		*/ 
		public function CountCheckingAccountLookups() {
			if ((is_null($this->intId)))
				return 0;

			return CheckingAccountLookup::CountByPerson($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific CheckingAccountLookup
		 * @param CheckingAccountLookup $objCheckingAccountLookup
		 * @return bool
		*/
		public function IsCheckingAccountLookupAssociated(CheckingAccountLookup $objCheckingAccountLookup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCheckingAccountLookupAssociated on this unsaved Person.');
			if ((is_null($objCheckingAccountLookup->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCheckingAccountLookupAssociated on this Person with an unsaved CheckingAccountLookup.');

			$intRowCount = Person::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Id, $this->intId),
					QQ::Equal(QQN::Person()->CheckingAccountLookup->CheckingAccountLookupId, $objCheckingAccountLookup->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the CheckingAccountLookup relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalCheckingAccountLookupAssociation($intAssociatedId, $strJournalCommand) {
			QApplication::$Database[2]->NonQuery('
				INSERT INTO `checkingaccountlookup_person_assn` (
					`person_id`,
					`checking_account_lookup_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($intAssociatedId) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object's CheckingAccountLookup relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalCheckingAccountLookupAssociationForId($intId) {
			return QApplication::$Database[2]->Query('SELECT * FROM checkingaccountlookup_person_assn WHERE person_id = ' .
				QApplication::$Database[2]->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's CheckingAccountLookup relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalCheckingAccountLookupAssociation() {
			return Person::GetJournalCheckingAccountLookupAssociationForId($this->intId);
		}

		/**
		 * Associates a CheckingAccountLookup
		 * @param CheckingAccountLookup $objCheckingAccountLookup
		 * @return void
		*/ 
		public function AssociateCheckingAccountLookup(CheckingAccountLookup $objCheckingAccountLookup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCheckingAccountLookup on this unsaved Person.');
			if ((is_null($objCheckingAccountLookup->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCheckingAccountLookup on this Person with an unsaved CheckingAccountLookup.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `checkingaccountlookup_person_assn` (
					`person_id`,
					`checking_account_lookup_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objCheckingAccountLookup->Id) . '
				)
			');

			// Journaling
			$this->JournalCheckingAccountLookupAssociation($objCheckingAccountLookup->Id, 'INSERT');
		}

		/**
		 * Unassociates a CheckingAccountLookup
		 * @param CheckingAccountLookup $objCheckingAccountLookup
		 * @return void
		*/ 
		public function UnassociateCheckingAccountLookup(CheckingAccountLookup $objCheckingAccountLookup) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCheckingAccountLookup on this unsaved Person.');
			if ((is_null($objCheckingAccountLookup->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCheckingAccountLookup on this Person with an unsaved CheckingAccountLookup.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`checkingaccountlookup_person_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`checking_account_lookup_id` = ' . $objDatabase->SqlVariable($objCheckingAccountLookup->Id) . '
			');

			// Journaling
			$this->JournalCheckingAccountLookupAssociation($objCheckingAccountLookup->Id, 'DELETE');
		}

		/**
		 * Unassociates all CheckingAccountLookups
		 * @return void
		*/ 
		public function UnassociateAllCheckingAccountLookups() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllCheckingAccountLookupArray on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();


			// Journaling
			$objResult = $objDatabase->Query('SELECT `checking_account_lookup_id` AS associated_id FROM `checkingaccountlookup_person_assn` WHERE `person_id` = ' . $objDatabase->SqlVariable($this->intId));
			while ($objRow = $objResult->GetNextRow()) {
				$this->JournalCheckingAccountLookupAssociation($objRow->GetColumn('associated_id'), 'DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`checkingaccountlookup_person_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for CommunicationList
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated CommunicationLists as an array of CommunicationList objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CommunicationList[]
		*/ 
		public function GetCommunicationListArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CommunicationList::LoadArrayByPerson($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated CommunicationLists
		 * @return int
		*/ 
		public function CountCommunicationLists() {
			if ((is_null($this->intId)))
				return 0;

			return CommunicationList::CountByPerson($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific CommunicationList
		 * @param CommunicationList $objCommunicationList
		 * @return bool
		*/
		public function IsCommunicationListAssociated(CommunicationList $objCommunicationList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCommunicationListAssociated on this unsaved Person.');
			if ((is_null($objCommunicationList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCommunicationListAssociated on this Person with an unsaved CommunicationList.');

			$intRowCount = Person::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Id, $this->intId),
					QQ::Equal(QQN::Person()->CommunicationList->CommunicationListId, $objCommunicationList->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the CommunicationList relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalCommunicationListAssociation($intAssociatedId, $strJournalCommand) {
			QApplication::$Database[2]->NonQuery('
				INSERT INTO `communicationlist_person_assn` (
					`person_id`,
					`communication_list_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($intAssociatedId) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object's CommunicationList relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalCommunicationListAssociationForId($intId) {
			return QApplication::$Database[2]->Query('SELECT * FROM communicationlist_person_assn WHERE person_id = ' .
				QApplication::$Database[2]->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's CommunicationList relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalCommunicationListAssociation() {
			return Person::GetJournalCommunicationListAssociationForId($this->intId);
		}

		/**
		 * Associates a CommunicationList
		 * @param CommunicationList $objCommunicationList
		 * @return void
		*/ 
		public function AssociateCommunicationList(CommunicationList $objCommunicationList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCommunicationList on this unsaved Person.');
			if ((is_null($objCommunicationList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCommunicationList on this Person with an unsaved CommunicationList.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `communicationlist_person_assn` (
					`person_id`,
					`communication_list_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objCommunicationList->Id) . '
				)
			');

			// Journaling
			$this->JournalCommunicationListAssociation($objCommunicationList->Id, 'INSERT');
		}

		/**
		 * Unassociates a CommunicationList
		 * @param CommunicationList $objCommunicationList
		 * @return void
		*/ 
		public function UnassociateCommunicationList(CommunicationList $objCommunicationList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCommunicationList on this unsaved Person.');
			if ((is_null($objCommunicationList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCommunicationList on this Person with an unsaved CommunicationList.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`communicationlist_person_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`communication_list_id` = ' . $objDatabase->SqlVariable($objCommunicationList->Id) . '
			');

			// Journaling
			$this->JournalCommunicationListAssociation($objCommunicationList->Id, 'DELETE');
		}

		/**
		 * Unassociates all CommunicationLists
		 * @return void
		*/ 
		public function UnassociateAllCommunicationLists() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllCommunicationListArray on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();


			// Journaling
			$objResult = $objDatabase->Query('SELECT `communication_list_id` AS associated_id FROM `communicationlist_person_assn` WHERE `person_id` = ' . $objDatabase->SqlVariable($this->intId));
			while ($objRow = $objResult->GetNextRow()) {
				$this->JournalCommunicationListAssociation($objRow->GetColumn('associated_id'), 'DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`communicationlist_person_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for NameItem
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated NameItems as an array of NameItem objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NameItem[]
		*/ 
		public function GetNameItemArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NameItem::LoadArrayByPerson($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated NameItems
		 * @return int
		*/ 
		public function CountNameItems() {
			if ((is_null($this->intId)))
				return 0;

			return NameItem::CountByPerson($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific NameItem
		 * @param NameItem $objNameItem
		 * @return bool
		*/
		public function IsNameItemAssociated(NameItem $objNameItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsNameItemAssociated on this unsaved Person.');
			if ((is_null($objNameItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsNameItemAssociated on this Person with an unsaved NameItem.');

			$intRowCount = Person::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Person()->Id, $this->intId),
					QQ::Equal(QQN::Person()->NameItem->NameItemId, $objNameItem->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the NameItem relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalNameItemAssociation($intAssociatedId, $strJournalCommand) {
			QApplication::$Database[2]->NonQuery('
				INSERT INTO `person_nameitem_assn` (
					`person_id`,
					`name_item_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . QApplication::$Database[2]->SqlVariable($this->intId) . ',
					' . QApplication::$Database[2]->SqlVariable($intAssociatedId) . ',
					' . ((QApplication::$Login) ? QApplication::$Login->Id : 'NULL') . ',
					' . QApplication::$Database[2]->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object's NameItem relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalNameItemAssociationForId($intId) {
			return QApplication::$Database[2]->Query('SELECT * FROM person_nameitem_assn WHERE person_id = ' .
				QApplication::$Database[2]->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's NameItem relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalNameItemAssociation() {
			return Person::GetJournalNameItemAssociationForId($this->intId);
		}

		/**
		 * Associates a NameItem
		 * @param NameItem $objNameItem
		 * @return void
		*/ 
		public function AssociateNameItem(NameItem $objNameItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNameItem on this unsaved Person.');
			if ((is_null($objNameItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNameItem on this Person with an unsaved NameItem.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `person_nameitem_assn` (
					`person_id`,
					`name_item_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objNameItem->Id) . '
				)
			');

			// Journaling
			$this->JournalNameItemAssociation($objNameItem->Id, 'INSERT');
		}

		/**
		 * Unassociates a NameItem
		 * @param NameItem $objNameItem
		 * @return void
		*/ 
		public function UnassociateNameItem(NameItem $objNameItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNameItem on this unsaved Person.');
			if ((is_null($objNameItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNameItem on this Person with an unsaved NameItem.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person_nameitem_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`name_item_id` = ' . $objDatabase->SqlVariable($objNameItem->Id) . '
			');

			// Journaling
			$this->JournalNameItemAssociation($objNameItem->Id, 'DELETE');
		}

		/**
		 * Unassociates all NameItems
		 * @return void
		*/ 
		public function UnassociateAllNameItems() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllNameItemArray on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();


			// Journaling
			$objResult = $objDatabase->Query('SELECT `name_item_id` AS associated_id FROM `person_nameitem_assn` WHERE `person_id` = ' . $objDatabase->SqlVariable($this->intId));
			while ($objRow = $objResult->GetNextRow()) {
				$this->JournalNameItemAssociation($objRow->GetColumn('associated_id'), 'DELETE');
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person_nameitem_assn`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Person"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="MembershipStatusTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="MaritalStatusTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="MiddleName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="MailingLabel" type="xsd:string"/>';
			$strToReturn .= '<element name="PriorLastNames" type="xsd:string"/>';
			$strToReturn .= '<element name="Nickname" type="xsd:string"/>';
			$strToReturn .= '<element name="Title" type="xsd:string"/>';
			$strToReturn .= '<element name="Suffix" type="xsd:string"/>';
			$strToReturn .= '<element name="Gender" type="xsd:string"/>';
			$strToReturn .= '<element name="DateOfBirth" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DobApproximateFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="DeceasedFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="DateDeceased" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CurrentHeadShot" type="xsd1:HeadShot"/>';
			$strToReturn .= '<element name="MailingAddress" type="xsd1:Address"/>';
			$strToReturn .= '<element name="StewardshipAddress" type="xsd1:Address"/>';
			$strToReturn .= '<element name="PrimaryPhone" type="xsd1:Phone"/>';
			$strToReturn .= '<element name="PrimaryEmail" type="xsd1:Email"/>';
			$strToReturn .= '<element name="CanMailFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="CanPhoneFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="CanEmailFlag" type="xsd:boolean"/>';
			$strToReturn .= '<element name="PrimaryAddressText" type="xsd:string"/>';
			$strToReturn .= '<element name="PrimaryCityText" type="xsd:string"/>';
			$strToReturn .= '<element name="PrimaryPhoneText" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Person', $strComplexTypeArray)) {
				$strComplexTypeArray['Person'] = Person::GetSoapComplexTypeXml();
				HeadShot::AlterSoapComplexTypeArray($strComplexTypeArray);
				Address::AlterSoapComplexTypeArray($strComplexTypeArray);
				Address::AlterSoapComplexTypeArray($strComplexTypeArray);
				Phone::AlterSoapComplexTypeArray($strComplexTypeArray);
				Email::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Person::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Person();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'MembershipStatusTypeId'))
				$objToReturn->intMembershipStatusTypeId = $objSoapObject->MembershipStatusTypeId;
			if (property_exists($objSoapObject, 'MaritalStatusTypeId'))
				$objToReturn->intMaritalStatusTypeId = $objSoapObject->MaritalStatusTypeId;
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'MiddleName'))
				$objToReturn->strMiddleName = $objSoapObject->MiddleName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'MailingLabel'))
				$objToReturn->strMailingLabel = $objSoapObject->MailingLabel;
			if (property_exists($objSoapObject, 'PriorLastNames'))
				$objToReturn->strPriorLastNames = $objSoapObject->PriorLastNames;
			if (property_exists($objSoapObject, 'Nickname'))
				$objToReturn->strNickname = $objSoapObject->Nickname;
			if (property_exists($objSoapObject, 'Title'))
				$objToReturn->strTitle = $objSoapObject->Title;
			if (property_exists($objSoapObject, 'Suffix'))
				$objToReturn->strSuffix = $objSoapObject->Suffix;
			if (property_exists($objSoapObject, 'Gender'))
				$objToReturn->strGender = $objSoapObject->Gender;
			if (property_exists($objSoapObject, 'DateOfBirth'))
				$objToReturn->dttDateOfBirth = new QDateTime($objSoapObject->DateOfBirth);
			if (property_exists($objSoapObject, 'DobApproximateFlag'))
				$objToReturn->blnDobApproximateFlag = $objSoapObject->DobApproximateFlag;
			if (property_exists($objSoapObject, 'DeceasedFlag'))
				$objToReturn->blnDeceasedFlag = $objSoapObject->DeceasedFlag;
			if (property_exists($objSoapObject, 'DateDeceased'))
				$objToReturn->dttDateDeceased = new QDateTime($objSoapObject->DateDeceased);
			if ((property_exists($objSoapObject, 'CurrentHeadShot')) &&
				($objSoapObject->CurrentHeadShot))
				$objToReturn->CurrentHeadShot = HeadShot::GetObjectFromSoapObject($objSoapObject->CurrentHeadShot);
			if ((property_exists($objSoapObject, 'MailingAddress')) &&
				($objSoapObject->MailingAddress))
				$objToReturn->MailingAddress = Address::GetObjectFromSoapObject($objSoapObject->MailingAddress);
			if ((property_exists($objSoapObject, 'StewardshipAddress')) &&
				($objSoapObject->StewardshipAddress))
				$objToReturn->StewardshipAddress = Address::GetObjectFromSoapObject($objSoapObject->StewardshipAddress);
			if ((property_exists($objSoapObject, 'PrimaryPhone')) &&
				($objSoapObject->PrimaryPhone))
				$objToReturn->PrimaryPhone = Phone::GetObjectFromSoapObject($objSoapObject->PrimaryPhone);
			if ((property_exists($objSoapObject, 'PrimaryEmail')) &&
				($objSoapObject->PrimaryEmail))
				$objToReturn->PrimaryEmail = Email::GetObjectFromSoapObject($objSoapObject->PrimaryEmail);
			if (property_exists($objSoapObject, 'CanMailFlag'))
				$objToReturn->blnCanMailFlag = $objSoapObject->CanMailFlag;
			if (property_exists($objSoapObject, 'CanPhoneFlag'))
				$objToReturn->blnCanPhoneFlag = $objSoapObject->CanPhoneFlag;
			if (property_exists($objSoapObject, 'CanEmailFlag'))
				$objToReturn->blnCanEmailFlag = $objSoapObject->CanEmailFlag;
			if (property_exists($objSoapObject, 'PrimaryAddressText'))
				$objToReturn->strPrimaryAddressText = $objSoapObject->PrimaryAddressText;
			if (property_exists($objSoapObject, 'PrimaryCityText'))
				$objToReturn->strPrimaryCityText = $objSoapObject->PrimaryCityText;
			if (property_exists($objSoapObject, 'PrimaryPhoneText'))
				$objToReturn->strPrimaryPhoneText = $objSoapObject->PrimaryPhoneText;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Person::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttDateOfBirth)
				$objObject->dttDateOfBirth = $objObject->dttDateOfBirth->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateDeceased)
				$objObject->dttDateDeceased = $objObject->dttDateDeceased->__toString(QDateTime::FormatSoap);
			if ($objObject->objCurrentHeadShot)
				$objObject->objCurrentHeadShot = HeadShot::GetSoapObjectFromObject($objObject->objCurrentHeadShot, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCurrentHeadShotId = null;
			if ($objObject->objMailingAddress)
				$objObject->objMailingAddress = Address::GetSoapObjectFromObject($objObject->objMailingAddress, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intMailingAddressId = null;
			if ($objObject->objStewardshipAddress)
				$objObject->objStewardshipAddress = Address::GetSoapObjectFromObject($objObject->objStewardshipAddress, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStewardshipAddressId = null;
			if ($objObject->objPrimaryPhone)
				$objObject->objPrimaryPhone = Phone::GetSoapObjectFromObject($objObject->objPrimaryPhone, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPrimaryPhoneId = null;
			if ($objObject->objPrimaryEmail)
				$objObject->objPrimaryEmail = Email::GetSoapObjectFromObject($objObject->objPrimaryEmail, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPrimaryEmailId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	class QQNodePersonCheckingAccountLookup extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'checkingaccountlookup';

		protected $strTableName = 'checkingaccountlookup_person_assn';
		protected $strPrimaryKey = 'person_id';
		protected $strClassName = 'CheckingAccountLookup';

		public function __get($strName) {
			switch ($strName) {
				case 'CheckingAccountLookupId':
					return new QQNode('checking_account_lookup_id', 'CheckingAccountLookupId', 'integer', $this);
				case 'CheckingAccountLookup':
					return new QQNodeCheckingAccountLookup('checking_account_lookup_id', 'CheckingAccountLookupId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeCheckingAccountLookup('checking_account_lookup_id', 'CheckingAccountLookupId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

	class QQNodePersonCommunicationList extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'communicationlist';

		protected $strTableName = 'communicationlist_person_assn';
		protected $strPrimaryKey = 'person_id';
		protected $strClassName = 'CommunicationList';

		public function __get($strName) {
			switch ($strName) {
				case 'CommunicationListId':
					return new QQNode('communication_list_id', 'CommunicationListId', 'integer', $this);
				case 'CommunicationList':
					return new QQNodeCommunicationList('communication_list_id', 'CommunicationListId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeCommunicationList('communication_list_id', 'CommunicationListId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

	class QQNodePersonNameItem extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'nameitem';

		protected $strTableName = 'person_nameitem_assn';
		protected $strPrimaryKey = 'person_id';
		protected $strClassName = 'NameItem';

		public function __get($strName) {
			switch ($strName) {
				case 'NameItemId':
					return new QQNode('name_item_id', 'NameItemId', 'integer', $this);
				case 'NameItem':
					return new QQNodeNameItem('name_item_id', 'NameItemId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeNameItem('name_item_id', 'NameItemId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

	class QQNodePerson extends QQNode {
		protected $strTableName = 'person';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Person';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'MembershipStatusTypeId':
					return new QQNode('membership_status_type_id', 'MembershipStatusTypeId', 'integer', $this);
				case 'MaritalStatusTypeId':
					return new QQNode('marital_status_type_id', 'MaritalStatusTypeId', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'MiddleName':
					return new QQNode('middle_name', 'MiddleName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'MailingLabel':
					return new QQNode('mailing_label', 'MailingLabel', 'string', $this);
				case 'PriorLastNames':
					return new QQNode('prior_last_names', 'PriorLastNames', 'string', $this);
				case 'Nickname':
					return new QQNode('nickname', 'Nickname', 'string', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Suffix':
					return new QQNode('suffix', 'Suffix', 'string', $this);
				case 'Gender':
					return new QQNode('gender', 'Gender', 'string', $this);
				case 'DateOfBirth':
					return new QQNode('date_of_birth', 'DateOfBirth', 'QDateTime', $this);
				case 'DobApproximateFlag':
					return new QQNode('dob_approximate_flag', 'DobApproximateFlag', 'boolean', $this);
				case 'DeceasedFlag':
					return new QQNode('deceased_flag', 'DeceasedFlag', 'boolean', $this);
				case 'DateDeceased':
					return new QQNode('date_deceased', 'DateDeceased', 'QDateTime', $this);
				case 'CurrentHeadShotId':
					return new QQNode('current_head_shot_id', 'CurrentHeadShotId', 'integer', $this);
				case 'CurrentHeadShot':
					return new QQNodeHeadShot('current_head_shot_id', 'CurrentHeadShot', 'integer', $this);
				case 'MailingAddressId':
					return new QQNode('mailing_address_id', 'MailingAddressId', 'integer', $this);
				case 'MailingAddress':
					return new QQNodeAddress('mailing_address_id', 'MailingAddress', 'integer', $this);
				case 'StewardshipAddressId':
					return new QQNode('stewardship_address_id', 'StewardshipAddressId', 'integer', $this);
				case 'StewardshipAddress':
					return new QQNodeAddress('stewardship_address_id', 'StewardshipAddress', 'integer', $this);
				case 'PrimaryPhoneId':
					return new QQNode('primary_phone_id', 'PrimaryPhoneId', 'integer', $this);
				case 'PrimaryPhone':
					return new QQNodePhone('primary_phone_id', 'PrimaryPhone', 'integer', $this);
				case 'PrimaryEmailId':
					return new QQNode('primary_email_id', 'PrimaryEmailId', 'integer', $this);
				case 'PrimaryEmail':
					return new QQNodeEmail('primary_email_id', 'PrimaryEmail', 'integer', $this);
				case 'CanMailFlag':
					return new QQNode('can_mail_flag', 'CanMailFlag', 'boolean', $this);
				case 'CanPhoneFlag':
					return new QQNode('can_phone_flag', 'CanPhoneFlag', 'boolean', $this);
				case 'CanEmailFlag':
					return new QQNode('can_email_flag', 'CanEmailFlag', 'boolean', $this);
				case 'PrimaryAddressText':
					return new QQNode('primary_address_text', 'PrimaryAddressText', 'string', $this);
				case 'PrimaryCityText':
					return new QQNode('primary_city_text', 'PrimaryCityText', 'string', $this);
				case 'PrimaryPhoneText':
					return new QQNode('primary_phone_text', 'PrimaryPhoneText', 'string', $this);
				case 'CheckingAccountLookup':
					return new QQNodePersonCheckingAccountLookup($this);
				case 'CommunicationList':
					return new QQNodePersonCommunicationList($this);
				case 'NameItem':
					return new QQNodePersonNameItem($this);
				case 'Address':
					return new QQReverseReferenceNodeAddress($this, 'address', 'reverse_reference', 'person_id');
				case 'AttributeValue':
					return new QQReverseReferenceNodeAttributeValue($this, 'attributevalue', 'reverse_reference', 'person_id');
				case 'Comment':
					return new QQReverseReferenceNodeComment($this, 'comment', 'reverse_reference', 'person_id');
				case 'Email':
					return new QQReverseReferenceNodeEmail($this, 'email', 'reverse_reference', 'person_id');
				case 'EmailMessageRoute':
					return new QQReverseReferenceNodeEmailMessageRoute($this, 'emailmessageroute', 'reverse_reference', 'person_id');
				case 'GroupParticipation':
					return new QQReverseReferenceNodeGroupParticipation($this, 'groupparticipation', 'reverse_reference', 'person_id');
				case 'HeadShot':
					return new QQReverseReferenceNodeHeadShot($this, 'headshot', 'reverse_reference', 'person_id');
				case 'HouseholdAsHead':
					return new QQReverseReferenceNodeHousehold($this, 'householdashead', 'reverse_reference', 'head_person_id', 'HouseholdAsHead');
				case 'HouseholdParticipation':
					return new QQReverseReferenceNodeHouseholdParticipation($this, 'householdparticipation', 'reverse_reference', 'person_id');
				case 'Marriage':
					return new QQReverseReferenceNodeMarriage($this, 'marriage', 'reverse_reference', 'person_id');
				case 'MarriageAsMarriedTo':
					return new QQReverseReferenceNodeMarriage($this, 'marriageasmarriedto', 'reverse_reference', 'married_to_person_id');
				case 'Membership':
					return new QQReverseReferenceNodeMembership($this, 'membership', 'reverse_reference', 'person_id');
				case 'OtherContactInfo':
					return new QQReverseReferenceNodeOtherContactInfo($this, 'othercontactinfo', 'reverse_reference', 'person_id');
				case 'Phone':
					return new QQReverseReferenceNodePhone($this, 'phone', 'reverse_reference', 'person_id');
				case 'Relationship':
					return new QQReverseReferenceNodeRelationship($this, 'relationship', 'reverse_reference', 'person_id');
				case 'RelationshipAsRelatedTo':
					return new QQReverseReferenceNodeRelationship($this, 'relationshipasrelatedto', 'reverse_reference', 'related_to_person_id');
				case 'StewardshipContribution':
					return new QQReverseReferenceNodeStewardshipContribution($this, 'stewardshipcontribution', 'reverse_reference', 'person_id');
				case 'StewardshipPledge':
					return new QQReverseReferenceNodeStewardshipPledge($this, 'stewardshippledge', 'reverse_reference', 'person_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

	class QQReverseReferenceNodePerson extends QQReverseReferenceNode {
		protected $strTableName = 'person';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Person';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'MembershipStatusTypeId':
					return new QQNode('membership_status_type_id', 'MembershipStatusTypeId', 'integer', $this);
				case 'MaritalStatusTypeId':
					return new QQNode('marital_status_type_id', 'MaritalStatusTypeId', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'MiddleName':
					return new QQNode('middle_name', 'MiddleName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'MailingLabel':
					return new QQNode('mailing_label', 'MailingLabel', 'string', $this);
				case 'PriorLastNames':
					return new QQNode('prior_last_names', 'PriorLastNames', 'string', $this);
				case 'Nickname':
					return new QQNode('nickname', 'Nickname', 'string', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Suffix':
					return new QQNode('suffix', 'Suffix', 'string', $this);
				case 'Gender':
					return new QQNode('gender', 'Gender', 'string', $this);
				case 'DateOfBirth':
					return new QQNode('date_of_birth', 'DateOfBirth', 'QDateTime', $this);
				case 'DobApproximateFlag':
					return new QQNode('dob_approximate_flag', 'DobApproximateFlag', 'boolean', $this);
				case 'DeceasedFlag':
					return new QQNode('deceased_flag', 'DeceasedFlag', 'boolean', $this);
				case 'DateDeceased':
					return new QQNode('date_deceased', 'DateDeceased', 'QDateTime', $this);
				case 'CurrentHeadShotId':
					return new QQNode('current_head_shot_id', 'CurrentHeadShotId', 'integer', $this);
				case 'CurrentHeadShot':
					return new QQNodeHeadShot('current_head_shot_id', 'CurrentHeadShot', 'integer', $this);
				case 'MailingAddressId':
					return new QQNode('mailing_address_id', 'MailingAddressId', 'integer', $this);
				case 'MailingAddress':
					return new QQNodeAddress('mailing_address_id', 'MailingAddress', 'integer', $this);
				case 'StewardshipAddressId':
					return new QQNode('stewardship_address_id', 'StewardshipAddressId', 'integer', $this);
				case 'StewardshipAddress':
					return new QQNodeAddress('stewardship_address_id', 'StewardshipAddress', 'integer', $this);
				case 'PrimaryPhoneId':
					return new QQNode('primary_phone_id', 'PrimaryPhoneId', 'integer', $this);
				case 'PrimaryPhone':
					return new QQNodePhone('primary_phone_id', 'PrimaryPhone', 'integer', $this);
				case 'PrimaryEmailId':
					return new QQNode('primary_email_id', 'PrimaryEmailId', 'integer', $this);
				case 'PrimaryEmail':
					return new QQNodeEmail('primary_email_id', 'PrimaryEmail', 'integer', $this);
				case 'CanMailFlag':
					return new QQNode('can_mail_flag', 'CanMailFlag', 'boolean', $this);
				case 'CanPhoneFlag':
					return new QQNode('can_phone_flag', 'CanPhoneFlag', 'boolean', $this);
				case 'CanEmailFlag':
					return new QQNode('can_email_flag', 'CanEmailFlag', 'boolean', $this);
				case 'PrimaryAddressText':
					return new QQNode('primary_address_text', 'PrimaryAddressText', 'string', $this);
				case 'PrimaryCityText':
					return new QQNode('primary_city_text', 'PrimaryCityText', 'string', $this);
				case 'PrimaryPhoneText':
					return new QQNode('primary_phone_text', 'PrimaryPhoneText', 'string', $this);
				case 'CheckingAccountLookup':
					return new QQNodePersonCheckingAccountLookup($this);
				case 'CommunicationList':
					return new QQNodePersonCommunicationList($this);
				case 'NameItem':
					return new QQNodePersonNameItem($this);
				case 'Address':
					return new QQReverseReferenceNodeAddress($this, 'address', 'reverse_reference', 'person_id');
				case 'AttributeValue':
					return new QQReverseReferenceNodeAttributeValue($this, 'attributevalue', 'reverse_reference', 'person_id');
				case 'Comment':
					return new QQReverseReferenceNodeComment($this, 'comment', 'reverse_reference', 'person_id');
				case 'Email':
					return new QQReverseReferenceNodeEmail($this, 'email', 'reverse_reference', 'person_id');
				case 'EmailMessageRoute':
					return new QQReverseReferenceNodeEmailMessageRoute($this, 'emailmessageroute', 'reverse_reference', 'person_id');
				case 'GroupParticipation':
					return new QQReverseReferenceNodeGroupParticipation($this, 'groupparticipation', 'reverse_reference', 'person_id');
				case 'HeadShot':
					return new QQReverseReferenceNodeHeadShot($this, 'headshot', 'reverse_reference', 'person_id');
				case 'HouseholdAsHead':
					return new QQReverseReferenceNodeHousehold($this, 'householdashead', 'reverse_reference', 'head_person_id', 'HouseholdAsHead');
				case 'HouseholdParticipation':
					return new QQReverseReferenceNodeHouseholdParticipation($this, 'householdparticipation', 'reverse_reference', 'person_id');
				case 'Marriage':
					return new QQReverseReferenceNodeMarriage($this, 'marriage', 'reverse_reference', 'person_id');
				case 'MarriageAsMarriedTo':
					return new QQReverseReferenceNodeMarriage($this, 'marriageasmarriedto', 'reverse_reference', 'married_to_person_id');
				case 'Membership':
					return new QQReverseReferenceNodeMembership($this, 'membership', 'reverse_reference', 'person_id');
				case 'OtherContactInfo':
					return new QQReverseReferenceNodeOtherContactInfo($this, 'othercontactinfo', 'reverse_reference', 'person_id');
				case 'Phone':
					return new QQReverseReferenceNodePhone($this, 'phone', 'reverse_reference', 'person_id');
				case 'Relationship':
					return new QQReverseReferenceNodeRelationship($this, 'relationship', 'reverse_reference', 'person_id');
				case 'RelationshipAsRelatedTo':
					return new QQReverseReferenceNodeRelationship($this, 'relationshipasrelatedto', 'reverse_reference', 'related_to_person_id');
				case 'StewardshipContribution':
					return new QQReverseReferenceNodeStewardshipContribution($this, 'stewardshipcontribution', 'reverse_reference', 'person_id');
				case 'StewardshipPledge':
					return new QQReverseReferenceNodeStewardshipPledge($this, 'stewardshippledge', 'reverse_reference', 'person_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>