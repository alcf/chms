CREATE TABLE tblPeriod (
    lngPeriodID INTEGER NOT NULL,
    strPeriodDesc VARCHAR(50),
    bytWeekday INTEGER,
    dtmStartTime DATETIME,
    blnManualMode BOOLEAN NOT NULL,
    lngSiteID INTEGER NOT NULL,
    PRIMARY KEY (lngPeriodID)
);

CREATE TABLE tblProgram (
    lngProgramID INTEGER NOT NULL,
    strProgram VARCHAR(50),
    strDescription VARCHAR(200),
    blnActive BOOLEAN NOT NULL,
    strMembershipID VARCHAR(50),
    blnPrintAttendantNameTag BOOLEAN NOT NULL,
    blnPrintAttendantWristband BOOLEAN NOT NULL,
    chrProgramCode VARCHAR(3),
    lngSiteID INTEGER NOT NULL,
    PRIMARY KEY (lngProgramID)
);

CREATE TABLE tblPropertyType (
    chrPropertyTypeCode VARCHAR(3) NOT NULL,
    strPropertyType VARCHAR(50) NOT NULL,
    PRIMARY KEY (chrPropertyTypeCode)
);

CREATE TABLE tblPropertyValue (
    lngPropertyValueID INTEGER NOT NULL,
    strPropertyValue VARCHAR(255),
    strPropertyNote VARCHAR(500),
    lngPropertyID INTEGER NOT NULL,
    chrEntityTypeCode VARCHAR(3) NOT NULL,
    lngEntityID INTEGER NOT NULL,
    PRIMARY KEY (lngPropertyValueID)
);

CREATE TABLE tblApplicationV23 (
    strName VARCHAR(50) NOT NULL,
    strVersion VARCHAR(20) NOT NULL,
    strMainFileName VARCHAR(200),
    PRIMARY KEY (strName)
);

CREATE TABLE tblSecurityLevel (
    chrSecurityLevelID VARCHAR(3) NOT NULL,
    strSecurityLevel VARCHAR(15) NOT NULL,
    strDescription VARCHAR(500),
    strPassword VARCHAR(1000),
    PRIMARY KEY (chrSecurityLevelID)
);

CREATE TABLE tblApplicationFileV23 (
    strName VARCHAR(50) NOT NULL,
    lngFileID INTEGER NOT NULL,
    strFileName VARCHAR(200) NOT NULL,
    blobFile MEDIUMBLOB,
    blnMainFile BOOLEAN NOT NULL,
    PRIMARY KEY (strName, lngFileID)
);

CREATE TABLE tblSystemPager (
    lngPagerID INTEGER NOT NULL,
    intPagerID INTEGER NOT NULL,
    strPhoneNumber VARCHAR(50),
    strPagerSerialNo VARCHAR(20),
    strPinNum VARCHAR(50),
    chrPagerType VARCHAR(1) NOT NULL,
    chrProtocol VARCHAR(1),
    strFrequency VARCHAR(50),
    strNote VARCHAR(500),
    intDelaySeconds INTEGER,
    blnActive BOOLEAN NOT NULL,
    strPOCSAGCode VARCHAR(50),
    strMessageType VARCHAR(3),
    strDisplayCardID VARCHAR(12),
    strRawCardID VARCHAR(18),
    lngBaudRate INTEGER NOT NULL,
    lngPagerModelID INTEGER NOT NULL,
    PRIMARY KEY (lngPagerID)
);

CREATE TABLE tblAddress (
    lngAddressID INTEGER NOT NULL,
    lngEntityID INTEGER NOT NULL,
    chrEntityTypeCode VARCHAR(3) NOT NULL,
    strAddress1 VARCHAR(100),
    strAddress2 VARCHAR(100),
    strAddress3 VARCHAR(100),
    strCity VARCHAR(50),
    strState VARCHAR(5),
    strZip VARCHAR(10),
    PRIMARY KEY (lngAddressID)
);

CREATE TABLE tblNoteType (
    chrNoteType VARCHAR(3) NOT NULL,
    chrEntityTypeCode VARCHAR(3),
    strDescription VARCHAR(50),
    strChoices VARCHAR(200),
    PRIMARY KEY (chrNoteType)
);

CREATE TABLE tblProperty (
    lngPropertyID INTEGER NOT NULL,
    strProperty VARCHAR(50) NOT NULL,
    strDescription VARCHAR(200),
    intOrder INTEGER,
    chrPropertyTypeCode VARCHAR(3),
    intSize INTEGER,
    strChoices TEXT,
    blnHousehold BOOLEAN,
    blnGuardian BOOLEAN,
    blnChild BOOLEAN,
    blnAttendant BOOLEAN,
    PRIMARY KEY (lngPropertyID)
);

CREATE TABLE tblPropertyCategory (
    chrPropertyCategoryCode VARCHAR(3) NOT NULL,
    strPropertyCategory VARCHAR(50) NOT NULL,
    chrEntityTypeCode VARCHAR(3) NOT NULL,
    PRIMARY KEY (chrPropertyCategoryCode)
);

CREATE TABLE tblFingerChangeAudit (
    lngFingerChangeID INTEGER NOT NULL,
    lngIndividualID INTEGER NOT NULL,
    blnDelete BOOLEAN NOT NULL
);

CREATE TABLE tblStation (
    lngStationID INTEGER NOT NULL,
    strStation VARCHAR(50) NOT NULL,
    strDescription VARCHAR(1000),
    blnActive BOOLEAN NOT NULL,
    lngProgramID INTEGER,
    strLocation VARCHAR(100),
    strCloseMessage VARCHAR(100),
    dblMaxCARatio FLOAT,
    dblWarningCARatio FLOAT,
    blnChildSelfCheckIn BOOLEAN NOT NULL,
    strMembershipID VARCHAR(50),
    blnCheckInSlip BOOLEAN NOT NULL,
    blnCheckOutSlip BOOLEAN NOT NULL,
    intMinStaff INTEGER NOT NULL,
    blnCloseOnMaxCARatio BOOLEAN NOT NULL,
    intWarningNbrKids INTEGER NOT NULL,
    intMaxNbrKids INTEGER NOT NULL,
    blnCloseOnMaxKids BOOLEAN NOT NULL,
    strMaxKidsCloseMessage VARCHAR(100),
    lngOverflowStationID INTEGER,
    intMinNbrAttendant INTEGER NOT NULL,
    blnCloseOnMinAttendant BOOLEAN NOT NULL,
    strMinAttendantCloseMessage VARCHAR(100),
    blnPrintChildNameTag BOOLEAN NOT NULL,
    blnPrintChildWristband BOOLEAN NOT NULL,
    blnPrintAttendantNameTag BOOLEAN NOT NULL,
    blnPrintAttendantWristband BOOLEAN NOT NULL,
    blnPrintItemLabel BOOLEAN NOT NULL,
    blnPrintItemWristband BOOLEAN NOT NULL,
    blnPrintHouseholdLabel BOOLEAN NOT NULL,
    blnPrintHouseholdWristband BOOLEAN NOT NULL,
    blnPrintRoomSign BOOLEAN NOT NULL,
    chrStationCode VARCHAR(3),
    intMinAge INTEGER,
    intMaxAge INTEGER,
    blnClosed BOOLEAN NOT NULL,
    bytStationChildList INTEGER NOT NULL,
    blnAutoMove BOOLEAN NOT NULL,
    blnSMQuickCheckout BOOLEAN,
    strGrades VARCHAR(50),
    bytFilterCriteria INTEGER NOT NULL,
    blnChildSelfCheckOut BOOLEAN NOT NULL,
    bytPagers INTEGER NOT NULL,
    PRIMARY KEY (lngStationID)
);

CREATE TABLE tblSystemPagerAssign (
    lngPagerID INTEGER NOT NULL,
    lngHouseholdID INTEGER NOT NULL,
    dtmDateTimeOut DATETIME NOT NULL,
    blnDayPager BOOLEAN NOT NULL,
    PRIMARY KEY (lngPagerID)
);

CREATE TABLE tblSystemPagerAssignHistory (
    lngPagerHistoryID INTEGER NOT NULL,
    lngPagerID INTEGER NOT NULL,
    lngHouseholdID INTEGER NOT NULL,
    dtmDateTimeOut DATETIME NOT NULL,
    dtmDateTimeIn DATETIME NOT NULL,
    PRIMARY KEY (lngPagerHistoryID)
);

CREATE TABLE tblIndividual (
    lngIndividualID INTEGER NOT NULL,
    lngHouseholdID INTEGER,
    lngCustID INTEGER,
    strPrefix VARCHAR(20),
    strFirstName VARCHAR(50) NOT NULL,
    strLastName VARCHAR(50),
    strMiddleName VARCHAR(50),
    strSuffix VARCHAR(20),
    strNickName VARCHAR(50),
    strSSN VARCHAR(11),
    lngRelationshipID INTEGER,
    lngPositionID INTEGER,
    dtBirthDate DATETIME,
    chrGender VARCHAR(1),
    imgPicture MEDIUMBLOB,
    blnChild BOOLEAN NOT NULL,
    blnGuardian BOOLEAN NOT NULL,
    blnAttendent BOOLEAN NOT NULL,
    blnInActive BOOLEAN NOT NULL,
    strRestrictionNote VARCHAR(1000),
    blnBackgroundCheck BOOLEAN NOT NULL,
    strDriversLicenceNum VARCHAR(50),
    blnLegalGuardian BOOLEAN NOT NULL,
    blnSendMedicalAlert BOOLEAN NOT NULL,
    dtmLastUpdated DATETIME,
    lngStationID INTEGER,
    blnNoCheckIn BOOLEAN NOT NULL,
    strDisplayCardID VARCHAR(12),
    strRawCardID VARCHAR(18),
    lngMembershipID INTEGER,
    blnSyncMembership BOOLEAN NOT NULL,
    strNameTagMessage VARCHAR(20),
    bytChildPosition INTEGER,
    sintGraduationYear INTEGER,
    bytPager INTEGER NOT NULL,
    PRIMARY KEY (lngIndividualID)
);

CREATE TABLE tblNote (
    lngNoteID INTEGER NOT NULL,
    chrNoteType VARCHAR(3),
    lngEntityID INTEGER,
    strNote VARCHAR(1000),
    dtDate DATETIME,
    strChoice VARCHAR(50),
    PRIMARY KEY (lngNoteID)
);

CREATE TABLE tblActivity (
    lngActivityID INTEGER NOT NULL,
    lngActivityTypeID INTEGER,
    dtmDate DATETIME,
    dtmStartTime DATETIME,
    dtmEndTime DATETIME,
    strDescription VARCHAR(4000),
    blnIncident BOOLEAN NOT NULL,
    lngEnteredByID INTEGER,
    PRIMARY KEY (lngActivityID)
);

CREATE TABLE tblAttendantInStation (
    lngIndividualID INTEGER NOT NULL,
    lngStationID INTEGER,
    dtmStartDateTime DATETIME NOT NULL,
    dtmStartDateTimeStamp DATETIME,
    lngProgramID INTEGER,
    bytStatusID INTEGER,
    lngCalledToStationID INTEGER,
    lngHHPager INTEGER,
    lngPeriodID INTEGER,
    PRIMARY KEY (lngIndividualID)
);

CREATE TABLE tblFingerScanLog (
    lngID INTEGER NOT NULL,
    dtmLog DATETIME NOT NULL,
    lngClientID INTEGER NOT NULL,
    intMsg INTEGER NOT NULL,
    intFoundID INTEGER NOT NULL,
    intRegisterID INTEGER NOT NULL,
    imgRaw MEDIUMBLOB,
    imgProcessed MEDIUMBLOB,
    PRIMARY KEY (lngID)
);

CREATE TABLE tblAttendantInStationHistory (
    lngAttendantHistoryID INTEGER NOT NULL,
    lngIndividualID INTEGER NOT NULL,
    lngStationID INTEGER,
    dtmStartDateTime DATETIME NOT NULL,
    dtmStartDateTimeStamp DATETIME,
    dtmEndDateTime DATETIME NOT NULL,
    dtmEndDateTimeStamp DATETIME,
    lngProgramID INTEGER,
    bytStatusID INTEGER,
    lngPeriodID INTEGER,
    PRIMARY KEY (lngAttendantHistoryID)
);

CREATE TABLE tblAttendantPager (
    lngPagerID INTEGER NOT NULL,
    lngIndividualID INTEGER NOT NULL,
    dtmDateTimeOut DATETIME,
    blndaypager BOOLEAN NOT NULL,
    PRIMARY KEY (lngPagerID)
);

CREATE TABLE tblAuthorized (
    lngIndividualID INTEGER NOT NULL,
    lngHouseholdID INTEGER NOT NULL,
    lngRelationshipID INTEGER,
    strRestrictionNote VARCHAR(1000),
    PRIMARY KEY (lngIndividualID, lngHouseholdID)
);

CREATE TABLE tblSite (
    lngSiteID INTEGER NOT NULL,
    strSite VARCHAR(50) NOT NULL,
    strSiteAddress VARCHAR(50),
    strSiteCityStateZip VARCHAR(50),
    strSitePhoneNumber VARCHAR(20),
    blnActive BOOLEAN NOT NULL,
    bytPrintSlipInfo INTEGER NOT NULL,
    PRIMARY KEY (lngSiteID)
);

CREATE TABLE tblChildInStation (
    lngIndividualID INTEGER NOT NULL,
    lngStationID INTEGER,
    strDropOffByID VARCHAR(100),
    lngDropOffByID INTEGER,
    dtmCheckInDateTime DATETIME NOT NULL,
    lngPeriodID INTEGER,
    lngCheckinGroup INTEGER NOT NULL,
    dtmInitialCheckInDateTime DATETIME NOT NULL,
    PRIMARY KEY (lngIndividualID)
);

CREATE TABLE tblChildInStationHistory (
    lngChildHistoryID INTEGER NOT NULL,
    lngIndividualID INTEGER NOT NULL,
    lngStationID INTEGER NOT NULL,
    strDropOffByID VARCHAR(100),
    lngDropOffByID INTEGER,
    dtmCheckInDateTime DATETIME NOT NULL,
    lngPickupByID INTEGER NOT NULL,
    dtmCheckOutDateTime DATETIME NOT NULL,
    lngPeriodID INTEGER,
    lngCheckinGroup INTEGER,
    PRIMARY KEY (lngChildHistoryID)
);

CREATE TABLE tblChildItem (
    lngChildID INTEGER NOT NULL,
    strItem VARCHAR(50) NOT NULL,
    dtmDateTime DATETIME NOT NULL,
    PRIMARY KEY (lngChildID, strItem)
);

CREATE TABLE tblChildItemHistory (
    lngChildID INTEGER NOT NULL,
    strItem VARCHAR(50) NOT NULL,
    dtmDateTime DATETIME NOT NULL,
    PRIMARY KEY (lngChildID, strItem, dtmDateTime)
);

CREATE TABLE tblIndividualPager (
    lngIndividualPagerID INTEGER NOT NULL,
    lngIndividualID INTEGER NOT NULL,
    strPhoneNum VARCHAR(50),
    strPinNum VARCHAR(50),
    intDelaySeconds INTEGER,
    chrPagerType VARCHAR(1),
    chrProtocol VARCHAR(1),
    blnActive BOOLEAN NOT NULL,
    PRIMARY KEY (lngIndividualPagerID)
);

CREATE TABLE tblIndividualPeriod (
    lngIndividualID INTEGER NOT NULL,
    lngPeriodID INTEGER NOT NULL,
    lngStationID INTEGER,
    sintIndType INTEGER NOT NULL,
    PRIMARY KEY (lngIndividualID, sintIndType, lngPeriodID)
);

CREATE TABLE tblAttendantInActivity (
    lngActivityID INTEGER NOT NULL,
    lngIndividualID INTEGER NOT NULL,
    PRIMARY KEY (lngActivityID, lngIndividualID)
);

CREATE TABLE tblChildInActivity (
    lngActivityID INTEGER NOT NULL,
    lngIndividualID INTEGER NOT NULL,
    PRIMARY KEY (lngActivityID, lngIndividualID)
);

CREATE TABLE tblChildInStationList (
    lngIndividualID INTEGER NOT NULL,
    lngStationID INTEGER NOT NULL,
    PRIMARY KEY (lngIndividualID, lngStationID)
);

CREATE TABLE tblApplication (
    strName VARCHAR(50) NOT NULL,
    strVersion VARCHAR(20) NOT NULL,
    strMainFileName VARCHAR(200),
    PRIMARY KEY (strName)
);

CREATE TABLE tblApplicationFile (
    strName VARCHAR(50) NOT NULL,
    lngFileID INTEGER NOT NULL,
    strFileName VARCHAR(200) NOT NULL,
    blobFile MEDIUMBLOB,
    blnMainFile BOOLEAN NOT NULL,
    PRIMARY KEY (strName, lngFileID)
);

CREATE TABLE tblAttendantIn (
    lngIndividualID INTEGER NOT NULL,
    lngStationID INTEGER NOT NULL,
    dtmDeleteDateTime DATETIME NOT NULL,
    PRIMARY KEY (lngIndividualID, lngStationID)
);

CREATE TABLE tblChildIn (
    lngIndividualID INTEGER NOT NULL,
    lngStationID INTEGER NOT NULL,
    dtmDeleteDateTime DATETIME NOT NULL,
    PRIMARY KEY (lngIndividualID)
);

CREATE TABLE tblController (
    lngControllerID INTEGER NOT NULL,
    strName VARCHAR(50) NOT NULL,
    strDescription VARCHAR(100),
    strLocation VARCHAR(100),
    strIPAddress VARCHAR(16) NOT NULL,
    strMask VARCHAR(16),
    strGateway VARCHAR(16),
    strMACAddress VARCHAR(50),
    lngModelID INTEGER,
    intRev INTEGER,
    PRIMARY KEY (lngControllerID)
);

CREATE TABLE tblDoor (
    lngDoorID INTEGER NOT NULL,
    strName VARCHAR(50) NOT NULL,
    strDescription VARCHAR(100),
    strLocation VARCHAR(100),
    lngControllerID INTEGER NOT NULL,
    intPort INTEGER NOT NULL,
    intReleaseDuration INTEGER NOT NULL,
    blnActive BOOLEAN NOT NULL,
    strFingerReaderIP VARCHAR(20),
    PRIMARY KEY (lngDoorID)
);

CREATE TABLE tblDoorStationPeriod (
    lngDoorID INTEGER NOT NULL,
    lngStationID INTEGER NOT NULL,
    lngPeriodID INTEGER NOT NULL,
    PRIMARY KEY (lngDoorID, lngStationID, lngPeriodID)
);

CREATE TABLE tblStaticIndividualToDoors (
    lngIndividualID INTEGER NOT NULL,
    lngDoorID INTEGER NOT NULL,
    PRIMARY KEY (lngIndividualID, lngDoorID)
);

CREATE TABLE tblAccessLog (
    lngAccessLogID INTEGER NOT NULL,
    dtmAccessEntry DATETIME NOT NULL,
    strControllerName VARCHAR(50),
    strIPAddress VARCHAR(16),
    intPort INTEGER,
    strDoorName VARCHAR(50),
    strDisplayCardID VARCHAR(40),
    strCardType VARCHAR(20),
    strName VARCHAR(100),
    strAccessStatus VARCHAR(10),
    PRIMARY KEY (lngAccessLogID)
);

CREATE TABLE tblPagerModel (
    lngPagerModelID INTEGER NOT NULL,
    strDescription VARCHAR(20) NOT NULL
);

CREATE TABLE dtproperties (
    id INTEGER NOT NULL,
    objectid INTEGER,
    property VARCHAR(64) NOT NULL,
    value VARCHAR(255),
    uvalue VARCHAR(255),
    lvalue MEDIUMBLOB,
    version INTEGER NOT NULL,
    PRIMARY KEY (id, property)
);

CREATE TABLE tblPosition (
    lngPositionID INTEGER NOT NULL,
    chrPositionType VARCHAR(3) NOT NULL,
    strPosition VARCHAR(20) NOT NULL
);

CREATE TABLE tblGrades (
    sintGrade INTEGER NOT NULL,
    strDescription VARCHAR(20) NOT NULL
);

CREATE TABLE tblCityStatebyZip (
    strZip VARCHAR(10) NOT NULL,
    strCity VARCHAR(50),
    strState VARCHAR(5),
    PRIMARY KEY (strZip)
);

CREATE TABLE tblInactiveIndividual (
    lngHouseholdID INTEGER,
    lngIndividualID INTEGER,
    blnToBeInActivated BOOLEAN NOT NULL
);

CREATE TABLE tblFingerDBChange (
    dtFingerDBChange DATETIME NOT NULL
);

CREATE TABLE tblScanner (
    strScannerID VARCHAR(50) NOT NULL,
    strSerialNumber VARCHAR(50) NOT NULL,
    strRegistrationCode VARCHAR(50) NOT NULL
);

CREATE TABLE tblFingers (
    lngFingerID INTEGER NOT NULL,
    lngIndividualID INTEGER NOT NULL,
    sintFingerPos INTEGER NOT NULL,
    lngG INTEGER NOT NULL,
    imgFeature MEDIUMBLOB NOT NULL
);

CREATE TABLE tblClient (
    lngClientID INTEGER NOT NULL,
    strClientName VARCHAR(50) NOT NULL,
    strIPAddress VARCHAR(17) NOT NULL,
    dtmInitial DATETIME,
    dtmRenew DATETIME,
    blnActive BOOLEAN NOT NULL,
    strGUID VARCHAR(50)
);

CREATE TABLE tblSlipMessage (
    lngSlipMsgID INTEGER NOT NULL,
    lngStationID INTEGER NOT NULL,
    dtStartMsgDate DATETIME NOT NULL,
    dtEndMsgDate DATETIME NOT NULL,
    strMsg VARCHAR(2000) NOT NULL,
    blnInSlip BOOLEAN NOT NULL,
    blnOutSlip BOOLEAN NOT NULL,
    PRIMARY KEY (lngSlipMsgID)
);

CREATE TABLE tblPagerCannedMessage (
    lngMsgID INTEGER NOT NULL,
    chrType VARCHAR(3) NOT NULL,
    strDisplayMessage VARCHAR(50),
    strMessage VARCHAR(80) NOT NULL,
    bytBeepCode INTEGER NOT NULL,
    blnMedicalAlert BOOLEAN NOT NULL,
    bytDisplayOrder INTEGER NOT NULL
);

CREATE TABLE tblActivityType (
    lngActivityTypeID INTEGER NOT NULL,
    strActivityType VARCHAR(50),
    blnIncident BOOLEAN NOT NULL,
    PRIMARY KEY (lngActivityTypeID)
);

CREATE TABLE tblAttendantStatus (
    bytStatusID INTEGER NOT NULL,
    strStatusDesc VARCHAR(50),
    PRIMARY KEY (bytStatusID)
);

CREATE TABLE tblConfig (
    strItem VARCHAR(100) NOT NULL,
    strValue VARCHAR(75),
    imgValue MEDIUMBLOB,
    intOptionType INTEGER,
    PRIMARY KEY (strItem)
);

CREATE TABLE tblEntityType (
    chrEntityTypeCode VARCHAR(3) NOT NULL,
    strEntityType VARCHAR(50) NOT NULL,
    blnCanHaveProperties BOOLEAN NOT NULL,
    PRIMARY KEY (chrEntityTypeCode)
);

CREATE TABLE tblHouseHold (
    lngHouseHoldID INTEGER NOT NULL,
    strHouseHold VARCHAR(75) NOT NULL,
    dtStartDate DATETIME,
    strHomePhone VARCHAR(50),
    blnActive BOOLEAN NOT NULL,
    strDisplayCardID VARCHAR(12),
    strRawCardID VARCHAR(18),
    lngMembershipID INTEGER,
    blnSyncMembership BOOLEAN NOT NULL,
    blnExpressDisabled BOOLEAN NOT NULL,
    strExpressMessage VARCHAR(255),
    PRIMARY KEY (lngHouseHoldID)
);

CREATE TABLE tblItemList (
    strItem VARCHAR(15) NOT NULL,
    intOrder INTEGER,
    PRIMARY KEY (strItem)
);

CREATE TABLE tblPageQueue (
    lngPageQueueID INTEGER NOT NULL,
    strName VARCHAR(50),
    chrPagerType VARCHAR(1),
    intDelaySecs INTEGER,
    strPinNum VARCHAR(50),
    strPagerMessage VARCHAR(255),
    strPhoneNum VARCHAR(50),
    chrStatus VARCHAR(1) NOT NULL,
    dtmPage DATETIME NOT NULL,
    intRetryCount INTEGER,
    strError VARCHAR(255),
    strMessageType VARCHAR(3),
    lngBaudRate INTEGER NOT NULL,
    bytBeepType INTEGER NOT NULL,
    PRIMARY KEY (lngPageQueueID)
);

