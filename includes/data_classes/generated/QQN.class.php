<?php
	class QQN {
		/**
		 * @return QQNodeAddress
		 */
		static public function Address() {
			return new QQNodeAddress('address', null, null);
		}
		/**
		 * @return QQNodeAttribute
		 */
		static public function Attribute() {
			return new QQNodeAttribute('attribute', null, null);
		}
		/**
		 * @return QQNodeAttributeOption
		 */
		static public function AttributeOption() {
			return new QQNodeAttributeOption('attribute_option', null, null);
		}
		/**
		 * @return QQNodeAttributeValue
		 */
		static public function AttributeValue() {
			return new QQNodeAttributeValue('attribute_value', null, null);
		}
		/**
		 * @return QQNodeComment
		 */
		static public function Comment() {
			return new QQNodeComment('comment', null, null);
		}
		/**
		 * @return QQNodeCommentCategory
		 */
		static public function CommentCategory() {
			return new QQNodeCommentCategory('comment_category', null, null);
		}
		/**
		 * @return QQNodeCommunicationList
		 */
		static public function CommunicationList() {
			return new QQNodeCommunicationList('communication_list', null, null);
		}
		/**
		 * @return QQNodeCommunicationListEntry
		 */
		static public function CommunicationListEntry() {
			return new QQNodeCommunicationListEntry('communication_list_entry', null, null);
		}
		/**
		 * @return QQNodeCountry
		 */
		static public function Country() {
			return new QQNodeCountry('country', null, null);
		}
		/**
		 * @return QQNodeEmail
		 */
		static public function Email() {
			return new QQNodeEmail('email', null, null);
		}
		/**
		 * @return QQNodeHeadShot
		 */
		static public function HeadShot() {
			return new QQNodeHeadShot('head_shot', null, null);
		}
		/**
		 * @return QQNodeHousehold
		 */
		static public function Household() {
			return new QQNodeHousehold('household', null, null);
		}
		/**
		 * @return QQNodeHouseholdParticipation
		 */
		static public function HouseholdParticipation() {
			return new QQNodeHouseholdParticipation('household_participation', null, null);
		}
		/**
		 * @return QQNodeLogin
		 */
		static public function Login() {
			return new QQNodeLogin('login', null, null);
		}
		/**
		 * @return QQNodeMarriage
		 */
		static public function Marriage() {
			return new QQNodeMarriage('marriage', null, null);
		}
		/**
		 * @return QQNodeMembership
		 */
		static public function Membership() {
			return new QQNodeMembership('membership', null, null);
		}
		/**
		 * @return QQNodeMinistry
		 */
		static public function Ministry() {
			return new QQNodeMinistry('ministry', null, null);
		}
		/**
		 * @return QQNodeNameItem
		 */
		static public function NameItem() {
			return new QQNodeNameItem('name_item', null, null);
		}
		/**
		 * @return QQNodeOtherContactInfo
		 */
		static public function OtherContactInfo() {
			return new QQNodeOtherContactInfo('other_contact_info', null, null);
		}
		/**
		 * @return QQNodeOtherContactMethod
		 */
		static public function OtherContactMethod() {
			return new QQNodeOtherContactMethod('other_contact_method', null, null);
		}
		/**
		 * @return QQNodePerson
		 */
		static public function Person() {
			return new QQNodePerson('person', null, null);
		}
		/**
		 * @return QQNodePhone
		 */
		static public function Phone() {
			return new QQNodePhone('phone', null, null);
		}
		/**
		 * @return QQNodeRegistry
		 */
		static public function Registry() {
			return new QQNodeRegistry('registry', null, null);
		}
		/**
		 * @return QQNodeRelationship
		 */
		static public function Relationship() {
			return new QQNodeRelationship('relationship', null, null);
		}
		/**
		 * @return QQNodeUsState
		 */
		static public function UsState() {
			return new QQNodeUsState('us_state', null, null);
		}
	}
?>