CREATE TABLE `achdetl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `idnum` VARCHAR(255),
    `error` BOOLEAN,
    `sortname` VARCHAR(255),
    `envelope` INTEGER,
    `name` VARCHAR(255),
    `acctname` VARCHAR(255),
    `acctnum` VARCHAR(255),
    `rtnum` VARCHAR(255),
    `accttype` INTEGER,
    `amt` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awbmadc1` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `zip_group` VARCHAR(255),
    `zip_from` INT,
    `zip_to` INT,
    `zip_link` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awbmadc2` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `zip_group` VARCHAR(255),
    `zip_link` VARCHAR(255),
    `standard` VARCHAR(255),
    `first_class` VARCHAR(255),
    `periodicals` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awbmcnfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `username` VARCHAR(255),
    `description` VARCHAR(255),
    `maxit` BOOLEAN,
    `default` BOOLEAN,
    `public` BOOLEAN,
    `bmsettings` TEXT,
    `maxitsettings` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awbmcnty` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `zip` VARCHAR(255),
    `countytype` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awbmlog` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `username` VARCHAR(255),
    `sortdate` TIMESTAMP,
    `caller` VARCHAR(255),
    `maxit` BOOLEAN,
    `bmsettingsreport` TEXT,
    `bmreports` TEXT,
    `maxpostagestatement` TEXT,
    `maxjobsummary` TEXT,
    `maxmailsortlisting` TEXT,
    `maxzipcodelisting` TEXT,
    `maxuspsqualreport` TEXT,
    `traysacklabelsdata` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awbmscf` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `state1` VARCHAR(255),
    `filename` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awbmzone` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `prefix1` VARCHAR(255),
    `prefix2` VARCHAR(255),
    `zone` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcassit` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255),
    `filename` VARCHAR(255),
    `filenumber` VARCHAR(255),
    `dateuploaded` TIMESTAMP,
    `downloaded` BOOLEAN,
    `ncoafile` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbawit` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `usingdw` BOOLEAN,
    `rdfi` VARCHAR(255),
    `rdfiname` VARCHAR(255),
    `odfi` VARCHAR(255),
    `odfiname` VARCHAR(255),
    `fedtax` VARCHAR(255),
    `difrecbank` BOOLEAN,
    `rdfi2` VARCHAR(255),
    `rdfi2name` VARCHAR(255),
    `createbalfile` BOOLEAN,
    `balpromptoncreate` BOOLEAN,
    `acctdfi` VARCHAR(255),
    `account` VARCHAR(255),
    `effectiveentry` INT,
    `nextbatch` INTEGER,
    `nextbatchseq` INTEGER,
    `lastbatchdate` DATE,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbcimg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `imgid` INTEGER,
    `tranid` VARCHAR(255),
    `checknumber` VARCHAR(255),
    `indvid` INTEGER,
    `filename` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbcnfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `postyear` VARCHAR(255),
    `fiscal_month` VARCHAR(255),
    `fiscal_year` INT,
    `lastpostdate` DATE,
    `calendar_year` INT,
    `interface_g/l` VARCHAR(255),
    `source_code` VARCHAR(255),
    `display_pledges` VARCHAR(255),
    `enter_check#` VARCHAR(255),
    `post_arrears` VARCHAR(255),
    `use_giving_program` VARCHAR(255),
    `location_of_acsdos` VARCHAR(255),
    `avanumberlimit` INTEGER,
    `posting_seq` VARCHAR(255),
    `envflag` INT,
    `icmsuser` VARCHAR(255),
    `pledgeopt` VARCHAR(255),
    `displayyear` VARCHAR(255),
    `detailflag` BOOLEAN,
    `defaultlocate` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbdet1` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255),
    `posted_flag` VARCHAR(255),
    `family_number` INT,
    `individual_number` INT,
    `transaction_date` DATE,
    `transaction_time` VARCHAR(255),
    `transaction_year` VARCHAR(255),
    `fund_number` INT,
    `tcount` INT,
    `fund_amount` FLOAT,
    `value_of_service` FLOAT,
    `gift_description` VARCHAR(255),
    `transaction_type` VARCHAR(255),
    `check_number` VARCHAR(255),
    `posted_date` DATE,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbgimp` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `loginid` INTEGER,
    `batchid` INTEGER,
    `indvid` INTEGER,
    `tranid` INTEGER,
    `trandate` TIMESTAMP,
    `depositdate` DATE,
    `gifttype` VARCHAR(255),
    `amount` FLOAT,
    `description` TEXT,
    `lastdigits` VARCHAR(255),
    `checkno` VARCHAR(255),
    `fundsplit` TEXT,
    `lastname` VARCHAR(255),
    `firstname` VARCHAR(255),
    `address1` VARCHAR(255),
    `address2` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    `zipcode` VARCHAR(255),
    `family_number` INT,
    `individual_number` INTEGER,
    `nonmember` BOOLEAN,
    `isorg` BOOLEAN,
    `selected` BOOLEAN,
    `importdate` TIMESTAMP,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbgiv2` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fund_number` INT,
    `giving_plan` VARCHAR(255),
    `counter` INTEGER,
    `acct1` INTEGER,
    `per1` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbgive` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fund_number` INT,
    `giving_plan` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbglch` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `acctid` INTEGER,
    `acctcode` VARCHAR(255),
    `acctname` VARCHAR(255),
    `fbudget` FLOAT,
    `actype` VARCHAR(255),
    `ffund` VARCHAR(255),
    `fdept` VARCHAR(255),
    `checkingflag` BOOLEAN,
    `fresrvd` VARCHAR(255),
    `accttype` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbglto` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fund_number` INT,
    `giving_plan` VARCHAR(255),
    `acct1` INTEGER,
    `amt1` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbglup` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `filedate` DATE,
    `filetime` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbgrph` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fund` INTEGER,
    `description` VARCHAR(255),
    `total_gifts` FLOAT,
    `gift_count` INTEGER,
    `total_pledges` FLOAT,
    `pledge_count` INTEGER,
    `pledge_to_date` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbhold` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `glcnt` INT,
    `glrcnt` VARCHAR(255),
    `glacctno` INTEGER,
    `gldesc` VARCHAR(255),
    `glmod` VARCHAR(255),
    `glcomp` VARCHAR(255),
    `glrefno` VARCHAR(255),
    `glmonth` VARCHAR(255),
    `glday` VARCHAR(255),
    `glyear` VARCHAR(255),
    `glsource` VARCHAR(255),
    `gldebit` FLOAT,
    `glcredit` FLOAT,
    `glpayee` VARCHAR(255),
    `glbookmo` VARCHAR(255),
    `gltrsrce` VARCHAR(255),
    `gltractv` VARCHAR(255),
    `glextra` VARCHAR(255),
    `glicms` VARCHAR(255),
    `glcentury` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbnenv` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `envelope_number` INTEGER,
    `oldnumber` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbpled` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `pledge_year` VARCHAR(255),
    `fund_num` INT,
    `start_date` DATE,
    `stop_date` DATE,
    `frequency` VARCHAR(255),
    `term` INT,
    `pledge_per_period` FLOAT,
    `total_pledge` FLOAT,
    `pre-payment` FLOAT,
    `initial_payment` FLOAT,
    `giving_plan` VARCHAR(255),
    `arrears` VARCHAR(255),
    `paid_in_full` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbrdsav` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `username` VARCHAR(255),
    `batchname` VARCHAR(255),
    `batchid` VARCHAR(255),
    `tranid` VARCHAR(255),
    `checkdate` VARCHAR(255),
    `amount` VARCHAR(255),
    `rt` VARCHAR(255),
    `bankaccountno` VARCHAR(255),
    `checkno` VARCHAR(255),
    `envnum` INTEGER,
    `fundsplit` TEXT,
    `family_number` INT,
    `individual_number` INTEGER,
    `isorg` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbref` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `check_number` VARCHAR(255),
    `family_number` INT,
    `individual_number` INT,
    `sortfield` VARCHAR(255),
    `acctname` VARCHAR(255),
    `achfile` BOOLEAN,
    `accttype` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbtabl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fund_number` INT,
    `fund_description` VARCHAR(255),
    `income_account` INTEGER,
    `checking_account` INTEGER,
    `income_account-none` INTEGER,
    `checking_account-none` INTEGER,
    `income_account-past` INTEGER,
    `checking_account-past` INTEGER,
    `income_account-future` INTEGER,
    `checking_account-future` INTEGER,
    `use_giving_plans` VARCHAR(255),
    `arrears_fund` VARCHAR(255),
    `gltotal` FLOAT,
    `glnone` FLOAT,
    `glpast` FLOAT,
    `glfuture` FLOAT,
    `icmscode` VARCHAR(255),
    `fund_code` VARCHAR(255),
    `fund_memo` TEXT,
    `fundactiveflag` BOOLEAN,
    `fund_grouping` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbtot1` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `pledgeyear` VARCHAR(255),
    `fundnum` INT,
    `familynumber` VARCHAR(255),
    `individualnumber` INT,
    `pledgetodate` FLOAT,
    `totalpledge` FLOAT,
    `totalpayment` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbtotl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `envelope_number` INTEGER,
    `amount1` FLOAT,
    `amount1_to_date` FLOAT,
    `amount2` FLOAT,
    `amount2_to_date` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcbyrs` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `type` VARCHAR(255),
    `year` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcpbadg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `badgeid` INTEGER,
    `name` VARCHAR(255),
    `lines` TEXT,
    `indvpict` INT,
    `backgroundpict` VARCHAR(255),
    `alignment` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcpcrc` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `importcrc` VARCHAR(255),
    `importtime` TIMESTAMP,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcplloc` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    `sessionid` INTEGER,
    `rosterid` INTEGER,
    `locationid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcppend` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    `sessionid` INTEGER,
    `date` DATE,
    `time` TIMESTAMP,
    `rosterid` INTEGER,
    `locationid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcppost` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `postid` INTEGER,
    `sessionid` INTEGER,
    `postdate` DATE,
    `indvid` INTEGER,
    `rosterid` INTEGER,
    `temproster` BOOLEAN,
    `timein` TIME,
    `timeout` TIME,
    `locationid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcprost` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `iorosterid` INTEGER,
    `indvid` INTEGER,
    `sessionid` INTEGER,
    `groupid` INTEGER,
    `status` INT,
    `reserveid1` INTEGER,
    `reserveid2` INTEGER,
    `reserveid3` INTEGER,
    `reserveid4` INTEGER,
    `reserveid5` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcpsec` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    `sessionid` INTEGER,
    `securityid` VARCHAR(255),
    `dateadded` DATE,
    `combined` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcpsess` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `sessionid` INTEGER,
    `name` VARCHAR(255),
    `groupid` INTEGER,
    `eventid` INTEGER,
    `badgeid` INTEGER,
    `familypositions` INT,
    `printpagernumber` INT,
    `printsecurityid` INT,
    `forcepager` BOOLEAN,
    `copies` INTEGER,
    `image` VARCHAR(255),
    `selectedgroups` TEXT,
    `rosterdefaults` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awcpset` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `graceperiod` INT,
    `password` VARCHAR(255),
    `cleartime` INT,
    `refreshtime` INT,
    `note` TEXT,
    `memberstatus` VARCHAR(255),
    `recordtype` VARCHAR(255),
    `newsletter` INT,
    `labeltype` INT,
    `nameoptions` INT,
    `colors` TEXT,
    `searchby` INTEGER,
    `showaddress` BOOLEAN,
    `returnindv` BOOLEAN,
    `showpicture` BOOLEAN,
    `securityidsize` INTEGER,
    `disconnected` BOOLEAN,
    `otherrelations` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awdatmnd` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `versioncode` INTEGER,
    `dataset` VARCHAR(255),
    `processid` INTEGER,
    `processdesc` TEXT,
    `complete` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awdatmng` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `major` INTEGER,
    `minor` INTEGER,
    `success` BOOLEAN,
    `convdate` TIMESTAMP,
    `version` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awemacct` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `accountid` INTEGER,
    `accountname` VARCHAR(255),
    `accountinfo` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awemail` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INT,
    `name` VARCHAR(255),
    `emailstyle` VARCHAR(255),
    `moduleid` INT,
    `smtpid` INTEGER,
    `sendhow` VARCHAR(255),
    `from` VARCHAR(255),
    `subject` VARCHAR(255),
    `body` TEXT,
    `attachment` TEXT,
    `lastsent` DATE,
    `options` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awemsmtp` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INT,
    `server` VARCHAR(255),
    `port` VARCHAR(255),
    `username` VARCHAR(255),
    `password` VARCHAR(255),
    `authenticate` BOOLEAN,
    `verifyonsend` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aweparch` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `year` INTEGER,
    `totalmembers` INTEGER,
    `parishrptname` VARCHAR(255),
    `detailrptname` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awepcnfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `settingid` INTEGER,
    `value` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awepevnt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `serviceid` INTEGER,
    `servicedate` DATE,
    `dayid` INTEGER,
    `servicetypeid` INTEGER,
    `locationid` INTEGER,
    `hour` TIME,
    `spresent` INTEGER,
    `ytdspresent` INTEGER,
    `wpresent` INTEGER,
    `ytdwpresent` INTEGER,
    `communion` INTEGER,
    `ytdcommunion` INTEGER,
    `private` BOOLEAN,
    `officiantid` INTEGER,
    `preacherid` INTEGER,
    `serverid` INTEGER,
    `ytdhesunday` INTEGER,
    `ytdheweekday` INTEGER,
    `ytdheprivate` INTEGER,
    `ytddosunday` INTEGER,
    `ytddoweekday` INTEGER,
    `ytdother` INTEGER,
    `ytdsunday` INTEGER,
    `ytdweekday` INTEGER,
    `ytdmarriage` INTEGER,
    `ytdburial` INTEGER,
    `aversattendance` INTEGER,
    `easterattendance` INTEGER,
    `week` INTEGER,
    `memo` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awepfcfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `settingid` INTEGER,
    `acctid` INTEGER,
    `balancetype` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awepline` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `year` INTEGER,
    `lineid` INTEGER,
    `value` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aweplist` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `listid` INTEGER,
    `fieldname` VARCHAR(255),
    `description` VARCHAR(255),
    `fieldtype` INTEGER,
    `active` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aweplnov` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `year` INTEGER,
    `lineid` INTEGER,
    `value` FLOAT,
    `description` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awepmain` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `year` INTEGER,
    `name` VARCHAR(255),
    `diocese` VARCHAR(255),
    `street` VARCHAR(255),
    `scity` VARCHAR(255),
    `sstate` VARCHAR(255),
    `scounty` VARCHAR(255),
    `szip` VARCHAR(255),
    `mail` VARCHAR(255),
    `mcity` VARCHAR(255),
    `mstate` VARCHAR(255),
    `mcounty` VARCHAR(255),
    `mzip` VARCHAR(255),
    `taxid` VARCHAR(255),
    `email` VARCHAR(255),
    `p1name` VARCHAR(255),
    `p1phone` VARCHAR(255),
    `p2name` VARCHAR(255),
    `p2phone` VARCHAR(255),
    `cname` VARCHAR(255),
    `cdate` DATE,
    `tname` VARCHAR(255),
    `tdate` DATE,
    `rname` VARCHAR(255),
    `pphone` VARCHAR(255),
    `rdate` DATE,
    `vdate` DATE,
    `m0message` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awepyrs` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `year` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgecass` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `moduleid` INT,
    `last_cass_date` TIMESTAMP,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgeclog` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INT,
    `userid` INTEGER,
    `username` VARCHAR(255),
    `entityid` INTEGER,
    `moduleid` INT,
    `datechanged` TIMESTAMP,
    `information` TEXT,
    `action` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgecont` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INT,
    `moduleid` INT,
    `linkid` VARCHAR(255),
    `contacttype` INT,
    `dateadded` TIMESTAMP,
    `description` VARCHAR(255),
    `info` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgedlt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `last_name` VARCHAR(255),
    `first_name` VARCHAR(255),
    `middle_name` VARCHAR(255),
    `title` VARCHAR(255),
    `suffix` VARCHAR(255),
    `address` VARCHAR(255),
    `address2` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    `zip_code` VARCHAR(255),
    `phone` VARCHAR(255),
    `date_deleted` DATE,
    `user_name` VARCHAR(255),
    `reason` VARCHAR(255),
    `indvid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgednum` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `next_del_number` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgedocs` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `documentid` INTEGER,
    `description` VARCHAR(255),
    `fileextension` VARCHAR(255),
    `filename` VARCHAR(255),
    `entitytype` VARCHAR(255),
    `entityid` INTEGER,
    `dateadded` DATE,
    `datemodified` DATE,
    `modifiedby` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgedpdt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fieldid` INTEGER,
    `entityid` INTEGER,
    `value` DATE,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgedpfd` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fieldid` INTEGER,
    `moduleid` INTEGER,
    `fieldname` VARCHAR(255),
    `datatype` INT,
    `enabled` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgedpmp` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `sectionid` INTEGER,
    `description` VARCHAR(255),
    `parentid` INTEGER,
    `fieldid` INTEGER,
    `sectiontype` INT,
    `sectionorder` INTEGER,
    `fieldcount` INT,
    `columnflag` INT,
    `boldflag` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgedpvl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fieldid` INTEGER,
    `entityid` INTEGER,
    `value` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgeele` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `description_type` VARCHAR(255),
    `field_name` VARCHAR(255),
    `element_description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgeemap` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `field_name` VARCHAR(255),
    `element_description` VARCHAR(255),
    `map_description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgefld` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `description type` VARCHAR(255),
    `field type` VARCHAR(255),
    `field name` VARCHAR(255),
    `open description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgeflds` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fieldid` INTEGER,
    `moduleid` INTEGER,
    `fieldname` VARCHAR(255),
    `tablename` VARCHAR(255),
    `description` VARCHAR(255),
    `datatype` INT,
    `searchdatatype` INT,
    `enabled` BOOLEAN,
    `searchvisible` BOOLEAN,
    `locatevisible` BOOLEAN,
    `candisable` BOOLEAN,
    `canchangedesc` BOOLEAN,
    `pageid` INT,
    `order` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgefltr` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `username` VARCHAR(255),
    `description` VARCHAR(255),
    `filter` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgefltw` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255),
    `description` VARCHAR(255),
    `public` BOOLEAN,
    `filter` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgefnum` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `next_family_number` FLOAT,
    `next_id` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgeldtm` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `description` VARCHAR(255),
    `category` INTEGER,
    `group` INT,
    `user` VARCHAR(255),
    `default` BOOLEAN,
    `public` BOOLEAN,
    `notes` VARCHAR(255),
    `template` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgelist` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `listid` INTEGER,
    `moduleid` INT,
    `fieldname` VARCHAR(255),
    `description` VARCHAR(255),
    `altdescription` VARCHAR(255),
    `order` INTEGER,
    `code` VARCHAR(255),
    `positionflag` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgellnk` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `listid` INTEGER,
    `linklistid` INTEGER,
    `order` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgelucf` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `requirelogin` BOOLEAN,
    `enablecomments` BOOLEAN,
    `requiregroupslogin` BOOLEAN,
    `caption` CHAR,
    `peopledefemail` CHAR,
    `peopletabcaption` CHAR,
    `peoplepanel1caption` CHAR,
    `peopleorgcaption` CHAR,
    `peoplegroupcaption` CHAR,
    `peoplemodfld1` INT,
    `peoplefld1` CHAR,
    `peoplemodfld2` INT,
    `peoplefld2` CHAR,
    `peoplemodfld3` INT,
    `peoplefld3` CHAR,
    `peoplemodfld4` INT,
    `peoplefld4` CHAR,
    `peoplemodfld5` INT,
    `peoplefld5` CHAR,
    `peoplemodfld6` INT,
    `peoplefld6` CHAR,
    `peoplemodfld7` INT,
    `peoplefld7` CHAR,
    `peoplemodfld8` INT,
    `peoplefld8` CHAR,
    `peoplemodfld9` INT,
    `peoplefld9` CHAR,
    `peoplemodfld10` INT,
    `peoplefld10` CHAR,
    `statsyear` INT,
    `orgdefemail` CHAR,
    `orgtabcaption` CHAR,
    `orgpanel1caption` CHAR,
    `orgpanel2caption` CHAR,
    `orgpanel3caption` CHAR,
    `orgpanel4caption` CHAR,
    `orgstaffcaption` CHAR,
    `orgfldid1` INTEGER,
    `orgfldid2` INTEGER,
    `orgfldid3` INTEGER,
    `orgfldid4` INTEGER,
    `orgfldid5` INTEGER,
    `orgfldid6` INTEGER,
    `orgfldid7` INTEGER,
    `orgfldid8` INTEGER,
    `orgfldid9` INTEGER,
    `orgfldid10` INTEGER,
    `orgstatid1` INTEGER,
    `orgstatid2` INTEGER,
    `orgstatid3` INTEGER,
    `orgstatid4` INTEGER,
    `orgstatid5` INTEGER,
    `orgstatid6` INTEGER,
    `orgstatid7` INTEGER,
    `orgstatid8` INTEGER,
    `orgstatid9` INTEGER,
    `orgstatid10` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgemele` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `description_type` VARCHAR(255),
    `field_name` VARCHAR(255),
    `field_number` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgemods` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `moduleid` INT,
    `module` VARCHAR(255),
    `activeflag` INT,
    `installdate` DATE,
    `daystoexpire` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgename` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `sitenumber` VARCHAR(255),
    `name` VARCHAR(255),
    `registrationcode` VARCHAR(255),
    `installdate` DATE,
    `company` VARCHAR(255),
    `address1` VARCHAR(255),
    `address2` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    `zipcode` VARCHAR(255),
    `phone1` VARCHAR(255),
    `phone2` VARCHAR(255),
    `phone3` VARCHAR(255),
    `email` VARCHAR(255),
    `contact1` VARCHAR(255),
    `contact2` VARCHAR(255),
    `id1` VARCHAR(255),
    `id2` VARCHAR(255),
    `id3` VARCHAR(255),
    `id4` VARCHAR(255),
    `id5` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgenid` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255),
    `nextid` INTEGER,
    `modifieddate` TIMESTAMP,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgepctl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255),
    `reporttype` VARCHAR(255),
    `reportname` VARCHAR(255),
    `options` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgeprnt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `lastname` VARCHAR(255),
    `goesby` VARCHAR(255),
    `title` VARCHAR(255),
    `middlename` VARCHAR(255),
    `unlistedphone` VARCHAR(255),
    `areacode` VARCHAR(255),
    `areacodenumber` VARCHAR(255),
    `birthyear` VARCHAR(255),
    `businessphne` VARCHAR(255),
    `memberprospect` VARCHAR(255),
    `m1` VARCHAR(255),
    `m2` VARCHAR(255),
    `m3` VARCHAR(255),
    `m4` VARCHAR(255),
    `m5` VARCHAR(255),
    `m6` VARCHAR(255),
    `m7` VARCHAR(255),
    `m8` VARCHAR(255),
    `m9` VARCHAR(255),
    `m10` VARCHAR(255),
    `d1` DATE,
    `d2` DATE,
    `d3` DATE,
    `d4` DATE,
    `d5` DATE,
    `ioc1` VARCHAR(255),
    `ioc2` VARCHAR(255),
    `ioc3` VARCHAR(255),
    `ioc4` VARCHAR(255),
    `ioc5` VARCHAR(255),
    `ioc6` VARCHAR(255),
    `ioc7` VARCHAR(255),
    `ioc8` VARCHAR(255),
    `ioc9` VARCHAR(255),
    `ioc10` VARCHAR(255),
    `ioc11` VARCHAR(255),
    `ioc12` VARCHAR(255),
    `foc1` VARCHAR(255),
    `foc2` VARCHAR(255),
    `foc3` VARCHAR(255),
    `iof1` VARCHAR(255),
    `iof2` VARCHAR(255),
    `iof3` VARCHAR(255),
    `iof4` VARCHAR(255),
    `fof1` VARCHAR(255),
    `fof2` VARCHAR(255),
    `fof3` VARCHAR(255),
    `iod1` VARCHAR(255),
    `iod2` VARCHAR(255),
    `iod3` VARCHAR(255),
    `iod4` VARCHAR(255),
    `iod5` VARCHAR(255),
    `iod6` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgerecon` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(255),
    `reconciletype` INT,
    `location` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgerpt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `level` INTEGER,
    `reportname` VARCHAR(255),
    `module` VARCHAR(255),
    `type` VARCHAR(255),
    `user` VARCHAR(255),
    `comment` VARCHAR(255),
    `reportinformation` TEXT,
    `formsettings` TEXT,
    `selection` TEXT,
    `filter` TEXT,
    `printer` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgeslog` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `changeid` INTEGER,
    `id` INTEGER,
    `action` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgesort` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `address_number` INT,
    `suffix` VARCHAR(255),
    `last_name` VARCHAR(255),
    `first_name` VARCHAR(255),
    `middle_name` VARCHAR(255),
    `title` VARCHAR(255),
    `family_position` VARCHAR(255),
    `goes_by_name` VARCHAR(255),
    `gender` VARCHAR(255),
    `date_of_birth` VARCHAR(255),
    `marital_status` VARCHAR(255),
    `member_status` VARCHAR(255),
    `date_joined` DATE,
    `joined_how` VARCHAR(255),
    `entry_date` DATE,
    `date_last_change` DATE,
    `envelope_number` INTEGER,
    `active` VARCHAR(255),
    `newsletter` VARCHAR(255),
    `record_type` VARCHAR(255),
    `active_address` VARCHAR(255),
    `mailaddressnumber` INT,
    `mail_address` VARCHAR(255),
    `statementaddressnumber` INT,
    `statement_address` VARCHAR(255),
    `open_field_1` VARCHAR(255),
    `open_field_2` VARCHAR(255),
    `open_field_3` VARCHAR(255),
    `open_field_4` VARCHAR(255),
    `open_category_1` VARCHAR(255),
    `open_category_2` VARCHAR(255),
    `open_category_3` VARCHAR(255),
    `open_category_4` VARCHAR(255),
    `open_category_5` VARCHAR(255),
    `open_category_6` VARCHAR(255),
    `open_category_7` VARCHAR(255),
    `open_category_8` VARCHAR(255),
    `open_category_9` VARCHAR(255),
    `open_category_10` VARCHAR(255),
    `open_category_11` VARCHAR(255),
    `open_category_12` VARCHAR(255),
    `open_date_1` DATE,
    `open_date_2` DATE,
    `open_date_3` DATE,
    `open_date_4` DATE,
    `open_date_5` DATE,
    `open_date_6` DATE,
    `contrib_record_type` VARCHAR(255),
    `statement` VARCHAR(255),
    `active_contributor` VARCHAR(255),
    `family_link_number` INT,
    `contrib_link_number` INT,
    `sortfield` VARCHAR(255),
    `labellink` INT,
    `labeltype` VARCHAR(255),
    `bulksort` INT,
    `prospect_source` VARCHAR(255),
    `recall_date` DATE,
    `assigned_family` VARCHAR(255),
    `assigned_individual` INT,
    `date_last_attended` DATE,
    `date_last_visited` DATE,
    `date_last_contacted` DATE,
    `date_last_contributed` DATE,
    `mail_to_org` BOOLEAN,
    `ssn` VARCHAR(255),
    `indvid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgetplt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(255),
    `required` VARCHAR(255),
    `line1` VARCHAR(255),
    `line2` VARCHAR(255),
    `line3` VARCHAR(255),
    `line4` VARCHAR(255),
    `line5` VARCHAR(255),
    `line6` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgeuscf` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255),
    `module` VARCHAR(255),
    `filter` TEXT,
    `background` VARCHAR(255),
    `open1` VARCHAR(255),
    `open2` VARCHAR(255),
    `open3` VARCHAR(255),
    `open4` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgexcrt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(255),
    `ec1` VARCHAR(255),
    `ec2` VARCHAR(255),
    `ec3` VARCHAR(255),
    `ec4` VARCHAR(255),
    `ec5` VARCHAR(255),
    `ec6` VARCHAR(255),
    `ec7` VARCHAR(255),
    `ec8` VARCHAR(255),
    `ec9` VARCHAR(255),
    `ec10` VARCHAR(255),
    `ec11` VARCHAR(255),
    `ec12` VARCHAR(255),
    `ec13` VARCHAR(255),
    `ec14` VARCHAR(255),
    `ec15` VARCHAR(255),
    `ec16` VARCHAR(255),
    `ec17` VARCHAR(255),
    `ec18` VARCHAR(255),
    `ec19` VARCHAR(255),
    `ec20` VARCHAR(255),
    `ectbl1` VARCHAR(255),
    `ectbl2` VARCHAR(255),
    `ectbl3` VARCHAR(255),
    `ectbl4` VARCHAR(255),
    `ectbl5` VARCHAR(255),
    `ectbl6` VARCHAR(255),
    `ectbl7` VARCHAR(255),
    `ectbl8` VARCHAR(255),
    `ectbl9` VARCHAR(255),
    `ectbl10` VARCHAR(255),
    `ectbl11` VARCHAR(255),
    `ectbl12` VARCHAR(255),
    `ectbl13` VARCHAR(255),
    `ectbl14` VARCHAR(255),
    `ectbl15` VARCHAR(255),
    `ectbl16` VARCHAR(255),
    `ectbl17` VARCHAR(255),
    `ectbl18` VARCHAR(255),
    `ectbl19` VARCHAR(255),
    `ectbl20` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgexprt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(255),
    `filename` VARCHAR(255),
    `required` VARCHAR(255),
    `exportformat` VARCHAR(255),
    `exportstyle` INT,
    `option1` VARCHAR(255),
    `option2` VARCHAR(255),
    `option3` VARCHAR(255),
    `option4` VARCHAR(255),
    `flag1` VARCHAR(255),
    `flag2` VARCHAR(255),
    `flag3` VARCHAR(255),
    `logicalflag1` VARCHAR(255),
    `logicalflag2` VARCHAR(255),
    `cs1` VARCHAR(255),
    `cs2` VARCHAR(255),
    `cs3` VARCHAR(255),
    `cs4` VARCHAR(255),
    `cs5` VARCHAR(255),
    `cs6` VARCHAR(255),
    `cs7` VARCHAR(255),
    `cs8` VARCHAR(255),
    `cs9` VARCHAR(255),
    `cs10` VARCHAR(255),
    `tbl1` VARCHAR(255),
    `tbl2` VARCHAR(255),
    `tbl3` VARCHAR(255),
    `tbl4` VARCHAR(255),
    `tbl5` VARCHAR(255),
    `tbl6` VARCHAR(255),
    `tbl7` VARCHAR(255),
    `tbl8` VARCHAR(255),
    `tbl9` VARCHAR(255),
    `tbl10` VARCHAR(255),
    `sf1` VARCHAR(255),
    `sf2` VARCHAR(255),
    `sf3` VARCHAR(255),
    `sf4` VARCHAR(255),
    `sf5` VARCHAR(255),
    `sf6` VARCHAR(255),
    `sf7` VARCHAR(255),
    `sf8` VARCHAR(255),
    `sf9` VARCHAR(255),
    `sf10` VARCHAR(255),
    `stbl1` VARCHAR(255),
    `stbl2` VARCHAR(255),
    `stbl3` VARCHAR(255),
    `stbl4` VARCHAR(255),
    `stbl5` VARCHAR(255),
    `stbl6` VARCHAR(255),
    `stbl7` VARCHAR(255),
    `stbl8` VARCHAR(255),
    `stbl9` VARCHAR(255),
    `stbl10` VARCHAR(255),
    `ms1` VARCHAR(255),
    `ms2` VARCHAR(255),
    `ms3` VARCHAR(255),
    `ms4` VARCHAR(255),
    `ms5` VARCHAR(255),
    `ms6` VARCHAR(255),
    `ms7` VARCHAR(255),
    `ms8` VARCHAR(255),
    `ms9` VARCHAR(255),
    `ms10` VARCHAR(255),
    `salutation` VARCHAR(255),
    `destination` VARCHAR(255),
    `postalreg` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgezip` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `zipcode` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgezip2` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `zipcode` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    `country` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrcfde` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `postid` INTEGER,
    `indvid` INTEGER,
    `fieldid` INTEGER,
    `value` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrcfsu` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `postid` INTEGER,
    `fieldid` INTEGER,
    `value` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrcurr` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `curriculumid` INTEGER,
    `groupid` INTEGER,
    `startdate` DATE,
    `stopdate` DATE,
    `description` TEXT,
    `links` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrdel` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `deleteid` INTEGER,
    `name` VARCHAR(255),
    `groupid` INTEGER,
    `primaryflag` BOOLEAN,
    `status` INT,
    `dateadded` DATE,
    `datemodified` DATE,
    `dateremoved` DATE,
    `datedeleted` DATE,
    `reserveid1` INTEGER,
    `reserveid2` INTEGER,
    `reserveid3` INTEGER,
    `reserveid4` INTEGER,
    `reserveid5` INTEGER,
    `sortorder` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrdlog` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `userid` INTEGER,
    `groupid` INTEGER,
    `reserveid1` INTEGER,
    `reserveid2` INTEGER,
    `eventid` INTEGER,
    `postdate` DATE,
    `indvid` INTEGER,
    `mark` INTEGER,
    `detailfields` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrevnt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `eventid` INTEGER,
    `masterid` INTEGER,
    `value` VARCHAR(255),
    `sortorder` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrfdef` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fieldid` INTEGER,
    `groupid` INTEGER,
    `name` VARCHAR(255),
    `datatype` INT,
    `fieldtype` INT,
    `addtocount` BOOLEAN,
    `sortorder` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrgrp` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `groupid` INTEGER,
    `parentid` INTEGER,
    `masterid` INTEGER,
    `name` VARCHAR(255),
    `comment` TEXT,
    `quickcode` VARCHAR(255),
    `location` VARCHAR(255),
    `allowrosters` BOOLEAN,
    `directions` TEXT,
    `closedate` DATE,
    `active` BOOLEAN,
    `dayofweek` INT,
    `frequencyid` INTEGER,
    `starttime` TIME,
    `stoptime` TIME,
    `childcare` BOOLEAN,
    `rosterfields` TEXT,
    `maxrosters` INT,
    `leaderid` INTEGER,
    `sortorder` INTEGER,
    `agestart` FLOAT,
    `ageend` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrgrre` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `masterid` INTEGER,
    `reservetype` INTEGER,
    `name` VARCHAR(255),
    `definedatmaster` BOOLEAN,
    `required` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrindv` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    `title` VARCHAR(255),
    `first_name` VARCHAR(255),
    `middle_name` VARCHAR(255),
    `last_name` VARCHAR(255),
    `suffix` VARCHAR(255),
    `goes_by_name` VARCHAR(255),
    `member_status` VARCHAR(255),
    `record_type` VARCHAR(255),
    `active` VARCHAR(255),
    `family_number` INT,
    `individual_number` INT,
    `sortfield` VARCHAR(255),
    `barcode` VARCHAR(255),
    `note` VARCHAR(255),
    `isorg` BOOLEAN,
    `constituentid` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrkey` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `groupid` INTEGER,
    `keywordid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrlast` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    `groupid` INTEGER,
    `lastattended` DATE,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrlead` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `leaderid` INTEGER,
    `masterid` INTEGER,
    `indvid` INTEGER,
    `leadertype` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrlist` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `listid` INTEGER,
    `listtype` INTEGER,
    `value` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrlvl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `masterid` INTEGER,
    `level` INTEGER,
    `name` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrmark` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `markid` INTEGER,
    `indvid` INTEGER,
    `groupid` INTEGER,
    `reserveid1` INTEGER,
    `reserveid2` INTEGER,
    `markyear` INT,
    `eventid` INTEGER,
    `m1` VARCHAR(255),
    `m2` VARCHAR(255),
    `m3` VARCHAR(255),
    `m4` VARCHAR(255),
    `m5` VARCHAR(255),
    `m6` VARCHAR(255),
    `m7` VARCHAR(255),
    `m8` VARCHAR(255),
    `m9` VARCHAR(255),
    `m10` VARCHAR(255),
    `m11` VARCHAR(255),
    `m12` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrmast` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `masterid` INTEGER,
    `grouptype` INT,
    `levels` INTEGER,
    `startdate` DATE,
    `stopdate` DATE,
    `ispromoting` BOOLEAN,
    `usecomment` BOOLEAN,
    `uselocation` BOOLEAN,
    `usequickcode` BOOLEAN,
    `markdetail` BOOLEAN,
    `marksummary` BOOLEAN,
    `markassociate` BOOLEAN,
    `markprospect` BOOLEAN,
    `markcommunion` BOOLEAN,
    `singlegrid` BOOLEAN,
    `popdetail` BOOLEAN,
    `rosterorder` INT,
    `statusdesc1` VARCHAR(255),
    `statusdesc2` VARCHAR(255),
    `nextquickcode` INTEGER,
    `locatereturn` BOOLEAN,
    `autorefresh` BOOLEAN,
    `lastpost` TIMESTAMP,
    `multiplelocations` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrmsta` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `masterid` INTEGER,
    `memberstatus` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrnrol` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `nonenrolledid` INTEGER,
    `indvid` INTEGER,
    `groupid` INTEGER,
    `reserveid1` INTEGER,
    `reserveid2` INTEGER,
    `markyear` INT,
    `eventid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrploc` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `locationid` INT,
    `groupid` INTEGER,
    `description` VARCHAR(255),
    `maximum` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrpost` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `postid` INTEGER,
    `postdate` DATE,
    `groupid` INTEGER,
    `reserveid1` INTEGER,
    `reserveid2` INTEGER,
    `eventid` INTEGER,
    `totalstatus1present` INTEGER,
    `totalstatus2present` INTEGER,
    `totalnonenrolledpresent` INTEGER,
    `totalstatus1communion` INTEGER,
    `totalstatus2communion` INTEGER,
    `totalnonenrolledcommunion` INTEGER,
    `totalstatus1absent` INTEGER,
    `totalstatus2absent` INTEGER,
    `totaldetailheadcount` INTEGER,
    `totalsummaryheadcount` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrpro` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `masterid` INTEGER,
    `newmasterid` INTEGER,
    `startdate` DATE,
    `modifieddate` DATE,
    `map` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrpror` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `rosterid` INTEGER,
    `indvid` INTEGER,
    `groupid` INTEGER,
    `reserveid1` INTEGER,
    `reserveid2` INTEGER,
    `reserveid3` INTEGER,
    `reserveid4` INTEGER,
    `reserveid5` INTEGER,
    `primaryflag` BOOLEAN,
    `status` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrresf` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `reserveid` INTEGER,
    `groupid` INTEGER,
    `reservetype` INT,
    `value` VARCHAR(255),
    `sortorder` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrroac` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `rosterid` INTEGER,
    `alpha1` VARCHAR(255),
    `alpha2` VARCHAR(255),
    `date1` DATE,
    `date2` DATE,
    `currency` FLOAT,
    `count` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrrost` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `rosterid` INTEGER,
    `indvid` INTEGER,
    `groupid` INTEGER,
    `primaryflag` BOOLEAN,
    `status` INT,
    `dateadded` DATE,
    `datemodified` DATE,
    `dateremoved` DATE,
    `reserveid1` INTEGER,
    `reserveid2` INTEGER,
    `reserveid3` INTEGER,
    `reserveid4` INTEGER,
    `reserveid5` INTEGER,
    `barcode` VARCHAR(255),
    `sortorder` INTEGER,
    `historyid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrrtyp` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `masterid` INTEGER,
    `recordtype` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrsgmk` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `groupid` INTEGER,
    `rosterid` INTEGER,
    `indvid` INTEGER,
    `marking` INT,
    `markdate` DATE,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrslog` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `userid` INTEGER,
    `groupid` INTEGER,
    `reserveid1` INTEGER,
    `reserveid2` INTEGER,
    `eventid` INTEGER,
    `postdate` DATE,
    `summaryfields` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrtmlv` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `grouptype` INTEGER,
    `level` INTEGER,
    `name` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrtmpl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `grouptype` INT,
    `maxlevels` INTEGER,
    `usecomment` BOOLEAN,
    `uselocation` BOOLEAN,
    `usequickcode` BOOLEAN,
    `markdetail` BOOLEAN,
    `marksummary` BOOLEAN,
    `markassociate` BOOLEAN,
    `markprospect` BOOLEAN,
    `markcommunion` BOOLEAN,
    `singlegrid` BOOLEAN,
    `popdetail` BOOLEAN,
    `rosterorder` INT,
    `statusdesc1` VARCHAR(255),
    `statusdesc2` VARCHAR(255),
    `nextquickcode` INTEGER,
    `locatereturn` BOOLEAN,
    `autorefresh` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrtmre` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `grouptype` INTEGER,
    `reservetype` INTEGER,
    `name` VARCHAR(255),
    `definedatmaster` BOOLEAN,
    `required` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrtran` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `tranid` INTEGER,
    `rosterid` INTEGER,
    `trandate` DATE,
    `trantype` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awgrtree` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `groupid` INTEGER,
    `parentid` INTEGER,
    `level` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awimptfd` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INT,
    `fielddescription` VARCHAR(255),
    `field` VARCHAR(255),
    `table` VARCHAR(255),
    `type` VARCHAR(255),
    `linkfield` INT,
    `linkpath` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awmmdocs` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `module` INTEGER,
    `user` VARCHAR(255),
    `description` VARCHAR(255),
    `path` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awnstatn` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `nextstationnumber` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworcfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `envelopeflag` BOOLEAN,
    `enforcehierarchy` BOOLEAN,
    `enablechangeslog` BOOLEAN,
    `enablecircuits` BOOLEAN,
    `defaultnewsletter` VARCHAR(255),
    `defaultstatement` VARCHAR(255),
    `statsstartyear` INT,
    `statsendyear` INT,
    `nextorgfamilynumber` INTEGER,
    `nextstaffid` INTEGER,
    `nextstatid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworcrct` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `circutid` INTEGER,
    `orgid` INTEGER,
    `description` VARCHAR(255),
    `dateadded` DATE,
    `datemodifiied` DATE,
    `dateremoved` DATE,
    `modifiedid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworflts` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `filterid` INTEGER,
    `username` VARCHAR(255),
    `description` VARCHAR(255),
    `filter` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworfltw` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255),
    `description` VARCHAR(255),
    `public` BOOLEAN,
    `filter` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworinpn` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `pin` VARCHAR(255),
    `description` VARCHAR(255),
    `errorline` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworlvl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `levelid` INTEGER,
    `parentid` INTEGER,
    `description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworname` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `orgid` INTEGER,
    `parentid` INTEGER,
    `levelid` INTEGER,
    `name` VARCHAR(255),
    `refname` VARCHAR(255),
    `family_number` INT,
    `orgaddresstype` VARCHAR(255),
    `orgaddressid` INTEGER,
    `meetingaddresstype` VARCHAR(255),
    `meetingaddressid` INTEGER,
    `mailingaddresstype` VARCHAR(255),
    `mailingaddressid` INTEGER,
    `statementaddresstype` VARCHAR(255),
    `statementaddressid` INTEGER,
    `pin` VARCHAR(255),
    `id2` VARCHAR(255),
    `id3` VARCHAR(255),
    `id4` VARCHAR(255),
    `id5` VARCHAR(255),
    `yearest` INT,
    `contactindvid` INTEGER,
    `notes` TEXT,
    `keynoteflag` BOOLEAN,
    `statusid` INTEGER,
    `ethnicityid` INTEGER,
    `languageid` INTEGER,
    `contactlistid` INTEGER,
    `date1` DATE,
    `date2` DATE,
    `date3` DATE,
    `date4` DATE,
    `date5` DATE,
    `field1` VARCHAR(255),
    `field2` VARCHAR(255),
    `field3` VARCHAR(255),
    `field4` VARCHAR(255),
    `field5` VARCHAR(255),
    `listid1` INTEGER,
    `listid2` INTEGER,
    `listid3` INTEGER,
    `listid4` INTEGER,
    `listid5` INTEGER,
    `listid6` INTEGER,
    `listid7` INTEGER,
    `listid8` INTEGER,
    `listid9` INTEGER,
    `listid10` INTEGER,
    `intfield1` INTEGER,
    `intfield2` INTEGER,
    `intfield3` INTEGER,
    `intfield4` INTEGER,
    `intfield5` INTEGER,
    `assignedindvid` INTEGER,
    `newsletterflag` VARCHAR(255),
    `envnbr` INTEGER,
    `contributorstatus` VARCHAR(255),
    `statementflag` VARCHAR(255),
    `orgmailflag` BOOLEAN,
    `datevisited` DATE,
    `datecontacted` DATE,
    `datecontributed` DATE,
    `reviewdate` DATE,
    `dateadded` DATE,
    `datemodified` DATE,
    `modifiedby` INTEGER,
    `activeflag` BOOLEAN,
    `datedeactivated` DATE,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworporg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    `orgid` INTEGER,
    `primaryflag` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworsbln` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `statid` INTEGER,
    `fieldid` INTEGER,
    `value` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworscfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fieldsetupid` INTEGER,
    `description` VARCHAR(255),
    `fieldid` INTEGER,
    `tabid` INT,
    `positionid` INT,
    `headerflag` BOOLEAN,
    `boldcaptionflag` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworscur` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `statid` INTEGER,
    `value` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworsdat` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `statid` INTEGER,
    `value` DATE,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworsfld` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fieldid` INTEGER,
    `fieldname` VARCHAR(255),
    `datatype` INT,
    `historyid` INTEGER,
    `year` INT,
    `month` INT,
    `totalflag` BOOLEAN,
    `enabled` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworsint` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `statid` INTEGER,
    `value` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworsmap` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `sectionid` INTEGER,
    `description` VARCHAR(255),
    `parentid` INTEGER,
    `fieldid` INTEGER,
    `sectiontype` INT,
    `sectionorder` INTEGER,
    `fieldcount` INT,
    `columnflag` INT,
    `boldflag` BOOLEAN,
    `year` INT,
    `month` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworsmem` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `statid` INTEGER,
    `value` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworspsr` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `orgid` INTEGER,
    `sponsororgid` INTEGER,
    `relationshipid` INTEGER,
    `notes` TEXT,
    `dateadded` DATE,
    `dateremoved` DATE,
    `datemodified` DATE,
    `modifiedby` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworsstr` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `statid` INTEGER,
    `value` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworstaf` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `staffid` INTEGER,
    `indvid` INTEGER,
    `orgid` INTEGER,
    `circuitid` INTEGER,
    `positionid` INTEGER,
    `positionlevelid` INTEGER,
    `mailtoorg` BOOLEAN,
    `departmentid` INTEGER,
    `staffstatusid` INTEGER,
    `notes` TEXT,
    `laystaff` BOOLEAN,
    `ordained` BOOLEAN,
    `dateordained` DATE,
    `licensed` BOOLEAN,
    `datelicensed` DATE,
    `dateadded` DATE,
    `dateremoved` DATE,
    `datemodified` DATE,
    `modifiedby` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworstat` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `statid` INTEGER,
    `entityid` INTEGER,
    `fieldid` INTEGER,
    `year` INT,
    `month` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworstot` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `fieldid` INTEGER,
    `totfieldid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworsvw` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `viewid` INTEGER,
    `year` INT,
    `name` VARCHAR(255),
    `formheight` INT,
    `formwidth` INT,
    `columncount` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworsvwd` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `viewid` INTEGER,
    `colid` INT,
    `fieldid` INTEGER,
    `sortorder` INT,
    `sortindex` INT,
    `colwidth` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `aworsyr` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `entityid` INTEGER,
    `year` INT,
    `month` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awortree` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `orgid` INTEGER,
    `parentid` INTEGER,
    `level` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpeadch` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `change_type` VARCHAR(255),
    `change_date` DATE,
    `family_number` INT,
    `individual_number` INT,
    `label_type` VARCHAR(255),
    `address_type` VARCHAR(255),
    `company` VARCHAR(255),
    `address_1` VARCHAR(255),
    `address_2` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    `zip_code` VARCHAR(255),
    `carrier_code` VARCHAR(255),
    `phone` VARCHAR(255),
    `listed` VARCHAR(255),
    `start_date` DATE,
    `stop_date` DATE,
    `geographic_zone` VARCHAR(255),
    `sub_zone` VARCHAR(255),
    `mappage` VARCHAR(255),
    `mapx` VARCHAR(255),
    `mapy` VARCHAR(255),
    `delivery_point` VARCHAR(255),
    `aactive` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpeaddr` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `address_type` VARCHAR(255),
    `company` VARCHAR(255),
    `address_1` VARCHAR(255),
    `address_2` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    `zip_code` VARCHAR(255),
    `carrier_code` VARCHAR(255),
    `phone` VARCHAR(255),
    `listed` VARCHAR(255),
    `start_date` DATE,
    `stop_date` DATE,
    `geographic_zone` VARCHAR(255),
    `sub_zone` VARCHAR(255),
    `mappage` VARCHAR(255),
    `mapx` VARCHAR(255),
    `mapy` VARCHAR(255),
    `country` VARCHAR(255),
    `delivery_point` VARCHAR(255),
    `lot` VARCHAR(255),
    `ad` VARCHAR(255),
    `dp_sort` VARCHAR(255),
    `latitude` VARCHAR(255),
    `longitude` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpeadps` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `address_type` VARCHAR(255),
    `suggestioncount` INT,
    `address_1` VARCHAR(255),
    `address_2` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    `zip_code` VARCHAR(255),
    `carrier_code` VARCHAR(255),
    `country` VARCHAR(255),
    `delivery_point` VARCHAR(255),
    `lot` VARCHAR(255),
    `dp_sort` VARCHAR(255),
    `errorcode` TEXT,
    `company` VARCHAR(255),
    `sortfield` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpecnfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `defcountry` VARCHAR(255),
    `enablechangeslog` BOOLEAN,
    `defmember_status` VARCHAR(255),
    `defnewsletter` VARCHAR(255),
    `autocass` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpecnty` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `address_type` VARCHAR(255),
    `pcounty` VARCHAR(255),
    `county` VARCHAR(255),
    `fipscnty` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpecomt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `comment_date` DATE,
    `comment_time` VARCHAR(255),
    `comment_type` VARCHAR(255),
    `comment` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpeenv` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `next_envelope_number` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpefaml` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `open_field_1` VARCHAR(255),
    `open_field_2` VARCHAR(255),
    `open_field_3` VARCHAR(255),
    `open_category_1` VARCHAR(255),
    `open_category_2` VARCHAR(255),
    `open_category_3` VARCHAR(255),
    `recall_date` DATE,
    `date_last_visited` DATE,
    `date_last_contacted` DATE,
    `pagernumber` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpeindv` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `address_number` INT,
    `suffix` VARCHAR(255),
    `last_name` VARCHAR(255),
    `first_name` VARCHAR(255),
    `middle_name` VARCHAR(255),
    `title` VARCHAR(255),
    `family_position` VARCHAR(255),
    `goes_by_name` VARCHAR(255),
    `gender` VARCHAR(255),
    `date_of_birth` VARCHAR(255),
    `marital_status` VARCHAR(255),
    `member_status` VARCHAR(255),
    `date_joined` DATE,
    `joined_how` VARCHAR(255),
    `entry_date` DATE,
    `date_last_change` DATE,
    `envelope_number` INTEGER,
    `active` VARCHAR(255),
    `newsletter` VARCHAR(255),
    `record_type` VARCHAR(255),
    `active_address` VARCHAR(255),
    `mailaddressnumber` INT,
    `mail_address` VARCHAR(255),
    `statementaddressnumber` INT,
    `statement_address` VARCHAR(255),
    `open_field_1` VARCHAR(255),
    `open_field_2` VARCHAR(255),
    `open_field_3` VARCHAR(255),
    `open_field_4` VARCHAR(255),
    `open_category_1` VARCHAR(255),
    `open_category_2` VARCHAR(255),
    `open_category_3` VARCHAR(255),
    `open_category_4` VARCHAR(255),
    `open_category_5` VARCHAR(255),
    `open_category_6` VARCHAR(255),
    `open_category_7` VARCHAR(255),
    `open_category_8` VARCHAR(255),
    `open_category_9` VARCHAR(255),
    `open_category_10` VARCHAR(255),
    `open_category_11` VARCHAR(255),
    `open_category_12` VARCHAR(255),
    `open_date_1` DATE,
    `open_date_2` DATE,
    `open_date_3` DATE,
    `open_date_4` DATE,
    `open_date_5` DATE,
    `open_date_6` DATE,
    `contrib_record_type` VARCHAR(255),
    `statement` VARCHAR(255),
    `active_contributor` VARCHAR(255),
    `family_link_number` INT,
    `contrib_link_number` INT,
    `sortfield` VARCHAR(255),
    `labellink` INT,
    `labeltype` VARCHAR(255),
    `bulksort` INT,
    `prospect_source` VARCHAR(255),
    `recall_date` DATE,
    `assigned_family` VARCHAR(255),
    `assigned_individual` INT,
    `date_last_attended` DATE,
    `date_last_visited` DATE,
    `date_last_contacted` DATE,
    `date_last_contributed` DATE,
    `mail_to_org` BOOLEAN,
    `ssn` VARCHAR(255),
    `indvid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpelabl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `label_type` VARCHAR(255),
    `label` VARCHAR(255),
    `stopupdates` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpephne` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `phone_flag` VARCHAR(255),
    `description` VARCHAR(255),
    `phone_number` VARCHAR(255),
    `ext` VARCHAR(255),
    `listed` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpepict` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INTEGER,
    `filename` VARCHAR(255),
    `thumbnail` VARCHAR(255),
    `uploaded` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awperelt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    `reltindvid` INTEGER,
    `relationship` VARCHAR(255),
    `mailflag` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awperptsav` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `reportid` INTEGER,
    `datasetid` INTEGER,
    `reportname` VARCHAR(255),
    `title` VARCHAR(255),
    `description` TEXT,
    `user` VARCHAR(255),
    `ispublic` BOOLEAN,
    `isdefault` BOOLEAN,
    `settings` TEXT,
    `selection` TEXT,
    `filter` TEXT,
    `printer` TEXT,
    `layout` TEXT,
    `version` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awperptscu` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `suite` INTEGER,
    `sectiontype` INT,
    `name` VARCHAR(255),
    `public` BOOLEAN,
    `user` VARCHAR(255),
    `layout` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awperptvw` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `suite` INTEGER,
    `datasetid` INTEGER,
    `name` VARCHAR(255),
    `selectiontype` INT,
    `shared` BOOLEAN,
    `user` VARCHAR(255),
    `groupby` INT,
    `groupsavedbyparent` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awperptvwd` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `viewid` INTEGER,
    `reportid` INTEGER,
    `settingsid` INTEGER,
    `sortorder` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpesgtk` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `indvid` INTEGER,
    `descriptionid` INTEGER,
    `statusid` INTEGER,
    `datecompleted` DATE,
    `comment` TEXT,
    `dateadded` DATE,
    `datechanged` DATE,
    `dateremoved` DATE,
    `userid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpewcmt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `counter` INTEGER,
    `comment_date` DATE,
    `comment_type` VARCHAR(255),
    `comment` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awpldent` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `keyfield` INTEGER,
    `familynumber` VARCHAR(255),
    `indvnumber` INTEGER,
    `pledgeyear` VARCHAR(255),
    `lastname` VARCHAR(255),
    `envelope` INTEGER,
    `fundnum` INTEGER,
    `fundname` VARCHAR(255),
    `name` VARCHAR(255),
    `startdate` DATE,
    `enddate` DATE,
    `freq` VARCHAR(255),
    `total` FLOAT,
    `fund_code` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awprintd` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255),
    `report` VARCHAR(255),
    `module` VARCHAR(255),
    `mf1` TEXT,
    `mf2` TEXT,
    `mf3` TEXT,
    `mf4` TEXT,
    `mf5` TEXT,
    `mf6` TEXT,
    `mf7` TEXT,
    `mf8` TEXT,
    `mf9` TEXT,
    `mf10` TEXT,
    `mf11` TEXT,
    `f1` TEXT,
    `f2` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awreport` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `rpt_id` INTEGER,
    `parent_id` INTEGER,
    `rpt_type` INT,
    `module` INT,
    `category` VARCHAR(255),
    `name` VARCHAR(255),
    `description` TEXT,
    `user` VARCHAR(255),
    `public_flag` BOOLEAN,
    `classname` VARCHAR(255),
    `information` TEXT,
    `settings` TEXT,
    `filter` TEXT,
    `printer` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awrvcat` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `cat_numb` INTEGER,
    `act_numb` INTEGER,
    `description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awrvctlg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `clg_numb` INTEGER,
    `act_numb` INTEGER,
    `dtl_desc` VARCHAR(255),
    `dtl_cost` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awrvdtl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `dtl_numb` INTEGER,
    `act_numb` INTEGER,
    `rst_numb` INTEGER,
    `clg_numb` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awrvele` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `ele_numb` INTEGER,
    `cat_numb` INTEGER,
    `act_numb` INTEGER,
    `description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awrvevnt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `act_numb` INTEGER,
    `act_desc` VARCHAR(255),
    `start_date` DATE,
    `end_date` DATE,
    `location` VARCHAR(255),
    `maximum` INTEGER,
    `signed_up` INTEGER,
    `corrd_fnumb` VARCHAR(255),
    `corrd_inumb` INT,
    `corrd_fname` VARCHAR(255),
    `qf1desc` VARCHAR(255),
    `qf2desc` VARCHAR(255),
    `qf3desc` VARCHAR(255),
    `od1desc` VARCHAR(255),
    `od2desc` VARCHAR(255),
    `yndesc` VARCHAR(255),
    `corrd_lname` VARCHAR(255),
    `corrd_phone` VARCHAR(255),
    `corrd_add1` VARCHAR(255),
    `corrd_add2` VARCHAR(255),
    `corrd_city` VARCHAR(255),
    `corrd_state` VARCHAR(255),
    `corrd_zip` VARCHAR(255),
    `notes` TEXT,
    `frecact` VARCHAR(255),
    `faddress` VARCHAR(255),
    `fname` VARCHAR(255),
    `fphone` VARCHAR(255),
    `fnotes` VARCHAR(255),
    `fcontact` VARCHAR(255),
    `fqf1` VARCHAR(255),
    `fqf1c` VARCHAR(255),
    `fqf2` VARCHAR(255),
    `fqf2c` VARCHAR(255),
    `fqf3` VARCHAR(255),
    `fqf3c` VARCHAR(255),
    `fod1` VARCHAR(255),
    `fod2` VARCHAR(255),
    `fyn` VARCHAR(255),
    `cost_default` FLOAT,
    `cost_max` FLOAT,
    `badgestyle` INTEGER,
    `paperfeed` INTEGER,
    `lb1_fieldname` VARCHAR(255),
    `lb1_fontcolor` INTEGER,
    `lb1_fontheight` INTEGER,
    `lb1_fontname` VARCHAR(255),
    `lb1_fontpitch` INTEGER,
    `lb1_fontsize` INTEGER,
    `lb1_fontbold` BOOLEAN,
    `lb1_fontitalic` BOOLEAN,
    `lb1_fontunderline` BOOLEAN,
    `lb1_fontstrikeout` BOOLEAN,
    `lb2_fieldname` VARCHAR(255),
    `lb2_fontcolor` INTEGER,
    `lb2_fontheight` INTEGER,
    `lb2_fontname` VARCHAR(255),
    `lb2_fontpitch` INTEGER,
    `lb2_fontsize` INTEGER,
    `lb2_fontbold` BOOLEAN,
    `lb2_fontitalic` BOOLEAN,
    `lb2_fontunderline` BOOLEAN,
    `lb2_fontstrikeout` BOOLEAN,
    `lb3_fieldname` VARCHAR(255),
    `lb3_fontcolor` INTEGER,
    `lb3_fontheight` INTEGER,
    `lb3_fontname` VARCHAR(255),
    `lb3_fontpitch` INTEGER,
    `lb3_fontsize` INTEGER,
    `lb3_fontbold` BOOLEAN,
    `lb3_fontitalic` BOOLEAN,
    `lb3_fontunderline` BOOLEAN,
    `lb3_fontstrikeout` BOOLEAN,
    `email_type` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awrvnext` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `next_rv_roster` INTEGER,
    `next_rv_activity` INTEGER,
    `next_rv_pay` INTEGER,
    `next_rv_element` INTEGER,
    `next_rv_category` INTEGER,
    `next_rv_catalog` INTEGER,
    `next_rv_detail` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awrvpay` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `pay_numb` INTEGER,
    `act_numb` INTEGER,
    `rst_numb` INTEGER,
    `payment` FLOAT,
    `date` DATE,
    `comment` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awrvrost` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `rst_numb` INTEGER,
    `act_numb` INTEGER,
    `indv_link1` VARCHAR(255),
    `indv_link2` INT,
    `first_name` VARCHAR(255),
    `last_name` VARCHAR(255),
    `middle_name` VARCHAR(255),
    `title` VARCHAR(255),
    `suffix` VARCHAR(255),
    `goes_by_name` VARCHAR(255),
    `address_1` VARCHAR(255),
    `address_2` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    `zip_code` VARCHAR(255),
    `phone` VARCHAR(255),
    `listed` VARCHAR(255),
    `emrg_fnumb` VARCHAR(255),
    `emrg_inumb` INT,
    `emrg_fname` VARCHAR(255),
    `emrg_lname` VARCHAR(255),
    `emrg_gbname` VARCHAR(255),
    `emrg_phone` VARCHAR(255),
    `emrg_addr1` VARCHAR(255),
    `emrg_addr2` VARCHAR(255),
    `emrg_city` VARCHAR(255),
    `emrg_state` VARCHAR(255),
    `emrg_zip` VARCHAR(255),
    `emrg_comment` VARCHAR(255),
    `notes` TEXT,
    `yn` VARCHAR(255),
    `reoc_rec` VARCHAR(255),
    `open_date1` DATE,
    `open_date2` DATE,
    `qfield1` INTEGER,
    `qfield2` INTEGER,
    `qfield3` INTEGER,
    `total_cost` FLOAT,
    `amount_paid` FLOAT,
    `amount_due` FLOAT,
    `oc1` INTEGER,
    `oc2` INTEGER,
    `oc3` INTEGER,
    `oc4` INTEGER,
    `oc5` INTEGER,
    `oc6` INTEGER,
    `oc7` INTEGER,
    `oc8` INTEGER,
    `oc9` INTEGER,
    `oc10` INTEGER,
    `default_cost` FLOAT,
    `indvid` INTEGER,
    `e_indvid` INTEGER,
    `email_addr` VARCHAR(255),
    `email_listed` VARCHAR(255),
    `company` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awrwtmpl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `templatename` VARCHAR(255),
    `category` VARCHAR(255),
    `default` BOOLEAN,
    `template` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awrwxopt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255),
    `itemid` INTEGER,
    `exporttarget` INTEGER,
    `exportoptions` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awrwxp32` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `itemid` INTEGER,
    `username` VARCHAR(255),
    `title` VARCHAR(255),
    `comments` VARCHAR(255),
    `datecreated` DATE,
    `dbexport` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsmgrp` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `smgroup` VARCHAR(255),
    `family_number` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsmindv` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `family_number` INT,
    `individual_number` INT,
    `address_type` VARCHAR(255),
    `suffix` VARCHAR(255),
    `lastname` VARCHAR(255),
    `firstname` VARCHAR(255),
    `middlename` VARCHAR(255),
    `title` VARCHAR(255),
    `goes_by` VARCHAR(255),
    `comment` VARCHAR(255),
    `mail_address` VARCHAR(255),
    `labellink` INT,
    `labeltype` VARCHAR(255),
    `bulksort` INT,
    `open_field_1` VARCHAR(255),
    `open_field_2` VARCHAR(255),
    `open_field_3` VARCHAR(255),
    `active` VARCHAR(255),
    `email` VARCHAR(255),
    `email_listed` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsmnum` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `next_sm_number` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsrcnfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `nextqryid` INTEGER,
    `nextqryrsltid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsrcrit` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `cgrp` VARCHAR(255),
    `ccnt` INT,
    `cfld` VARCHAR(255),
    `cfldnm` VARCHAR(255),
    `ctyp` VARCHAR(255),
    `cval01` VARCHAR(255),
    `cval02` VARCHAR(255),
    `cval03` VARCHAR(255),
    `cval04` VARCHAR(255),
    `cval04nm` VARCHAR(255),
    `cval05` VARCHAR(255),
    `cval06` VARCHAR(255),
    `cval07` VARCHAR(255),
    `cval08` VARCHAR(255),
    `cval09` VARCHAR(255),
    `cval10` VARCHAR(255),
    `cvaltyp` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsrdetl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `qryid` INTEGER,
    `subqryid` INTEGER,
    `qrycnt` INTEGER,
    `qrymod` INTEGER,
    `qryfldlink` VARCHAR(255),
    `qryfldname` CHAR,
    `qryfldtype` VARCHAR(255),
    `qrytype` INTEGER,
    `qryvalues` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsrflds` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `searchgroups` VARCHAR(255),
    `searchfields` VARCHAR(255),
    `searchlinkfield` VARCHAR(255),
    `searchfieldtype` VARCHAR(255),
    `visibilityflag` VARCHAR(255),
    `predefined` VARCHAR(255),
    `enabled` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsrgrps` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `searchgroups` VARCHAR(255),
    `text1` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsrmast` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `qryid` INTEGER,
    `subqryid` INTEGER,
    `username` VARCHAR(255),
    `qryname` VARCHAR(255),
    `sourceflag` VARCHAR(255),
    `andorflag` VARCHAR(255),
    `outputflag` INTEGER,
    `rptflags` VARCHAR(255),
    `modflags` TEXT,
    `rptfields` TEXT,
    `public` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsrrslt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `qryrsltid` INTEGER,
    `username` VARCHAR(255),
    `qryname` VARCHAR(255),
    `rptflags` VARCHAR(255),
    `rptfields` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsrsave` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `searchusername` VARCHAR(255),
    `searchtitle` VARCHAR(255),
    `searchcritgrp` VARCHAR(255),
    `searchcritcount` INT,
    `searchcritfld` VARCHAR(255),
    `searchcrittyp` VARCHAR(255),
    `searchcritval01` VARCHAR(255),
    `searchcritval02` VARCHAR(255),
    `searchcritval03` VARCHAR(255),
    `searchcritval04` VARCHAR(255),
    `searchcritval05` VARCHAR(255),
    `searchcritval06` VARCHAR(255),
    `searchcritval07` VARCHAR(255),
    `searchcritval08` VARCHAR(255),
    `searchcritval09` VARCHAR(255),
    `searchcritval10` VARCHAR(255),
    `searchcritmeets` VARCHAR(255),
    `searchcritoutflag` VARCHAR(255),
    `peoplemeets` VARCHAR(255),
    `addresmeets` VARCHAR(255),
    `familymeets` VARCHAR(255),
    `phonesmeets` VARCHAR(255),
    `activemeets` VARCHAR(255),
    `attendmeets` VARCHAR(255),
    `atten1meets` VARCHAR(255),
    `giftsmeets` VARCHAR(255),
    `pledgemeets` VARCHAR(255),
    `visitmeets` VARCHAR(255),
    `actionmeets` VARCHAR(255),
    `staffmeets` VARCHAR(255),
    `org1meets` VARCHAR(255),
    `org2meets` VARCHAR(255),
    `org3meets` VARCHAR(255),
    `org4meets` VARCHAR(255),
    `other1meets` VARCHAR(255),
    `other2meets` VARCHAR(255),
    `other3meets` VARCHAR(255),
    `other4meets` VARCHAR(255),
    `srchsource` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsrtype` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `searchfieldtype` VARCHAR(255),
    `searchfieldcount` VARCHAR(255),
    `searchtype` VARCHAR(255),
    `text1` VARCHAR(255),
    `text2` VARCHAR(255),
    `text3` VARCHAR(255),
    `text4` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsrusrd` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `searchtempname` VARCHAR(255),
    `searchprocstatus` INT,
    `searchoutflag` VARCHAR(255),
    `searchmeets` VARCHAR(255),
    `searchuserlevel` VARCHAR(255),
    `peoplemeets` VARCHAR(255),
    `addresmeets` VARCHAR(255),
    `familymeets` VARCHAR(255),
    `phonesmeets` VARCHAR(255),
    `activemeets` VARCHAR(255),
    `attendmeets` VARCHAR(255),
    `atten1meets` VARCHAR(255),
    `giftsmeets` VARCHAR(255),
    `pledgemeets` VARCHAR(255),
    `visitmeets` VARCHAR(255),
    `actionmeets` VARCHAR(255),
    `staffmeets` VARCHAR(255),
    `org1meets` VARCHAR(255),
    `org2meets` VARCHAR(255),
    `org3meets` VARCHAR(255),
    `org4meets` VARCHAR(255),
    `other1meets` VARCHAR(255),
    `other2meets` VARCHAR(255),
    `other3meets` VARCHAR(255),
    `other4meets` VARCHAR(255),
    `srchsource` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsycmt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    `comment` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsycnfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `emailtype` VARCHAR(255),
    `lastsenddate` DATE,
    `lastreceivedate` DATE,
    `sendoptions` TEXT,
    `membermaptype` INT,
    `membermapfield` VARCHAR(255),
    `changestofinalize` TEXT,
    `webpath` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsylist` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `sitenumber` INTEGER,
    `maptype` INTEGER,
    `sourcevalue` VARCHAR(255),
    `newvalue` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awsyormp` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `sitenumber` INTEGER,
    `orgid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awupdtlg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `table_name` VARCHAR(255),
    `date` DATE,
    `time` TIME,
    `error_message` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awusrcfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `enableuserlog` BOOLEAN,
    `autologin` BOOLEAN,
    `sharesiteinfo` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awusrdfo` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `optionid` INTEGER,
    `moduleid` INT,
    `option` VARCHAR(255),
    `defvalue` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awusrgrd` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `userid` INTEGER,
    `gridid` INTEGER,
    `columnid` INTEGER,
    `properties` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awusrlmt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `userid` INTEGER,
    `limitid` INTEGER,
    `value` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awusrlog` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `logid` INT,
    `userid` INTEGER,
    `username` VARCHAR(255),
    `moduleid` INTEGER,
    `logintime` TIMESTAMP,
    `logouttime` TIMESTAMP,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awusrmst` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `userid` INTEGER,
    `username` VARCHAR(255),
    `firstname` VARCHAR(255),
    `lastname` VARCHAR(255),
    `password` VARCHAR(255),
    `logintime` TIMESTAMP,
    `logouttime` TIMESTAMP,
    `loginstation` INT,
    `computername` VARCHAR(255),
    `status` INT,
    `logged` BOOLEAN,
    `cbflag` BOOLEAN,
    `description` VARCHAR(255),
    `peopleprinter` TEXT,
    `financialprinter` TEXT,
    `company` VARCHAR(255),
    `address1` VARCHAR(255),
    `address2` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    `zipcode` VARCHAR(255),
    `homephone` VARCHAR(255),
    `workphone` VARCHAR(255),
    `workext` VARCHAR(255),
    `email` VARCHAR(255),
    `nextwebnewsdate` DATE,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awusropt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `userid` INTEGER,
    `optionid` INTEGER,
    `value` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awusrper` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `permissionid` INTEGER,
    `moduleid` INT,
    `permission` VARCHAR(255),
    `allowview` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awusrpfl` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `userid` INTEGER,
    `permissionid` INTEGER,
    `value` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awutback` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `backupdate` DATE,
    `backuptime` TIME,
    `message` VARCHAR(255),
    `logonuser` VARCHAR(255),
    `location` VARCHAR(255),
    `compname` VARCHAR(255),
    `user` VARCHAR(255),
    `backup_type` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awutbkcf` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `drive` VARCHAR(255),
    `drivetype` VARCHAR(255),
    `drivedensity` VARCHAR(255),
    `defaultbackupdrive` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awutbkdt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `backupdate` DATE,
    `backuptime` TIME,
    `dataset` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awutbkms` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `value` INT,
    `type` INT,
    `description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awutcbck` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `defaultdrivedir` VARCHAR(255),
    `drivea` VARCHAR(255),
    `driveb` VARCHAR(255),
    `zipdrive` BOOLEAN,
    `erasefloppy` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awutdbis` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `module` VARCHAR(255),
    `tablename` VARCHAR(255),
    `description` VARCHAR(255),
    `people` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awutform` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `formname` VARCHAR(255),
    `formdescription` VARCHAR(255),
    `module` VARCHAR(255),
    `constant` VARCHAR(255),
    `helpfile` VARCHAR(255),
    `helpid` INT,
    `securitybit` VARCHAR(255),
    `securitybitconstant` VARCHAR(255),
    `lastreleasedate` DATE,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmact` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `activity_id` INTEGER,
    `name` VARCHAR(255),
    `description` TEXT,
    `start_date` DATE,
    `stop_date` DATE,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmalst` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `item_id` INTEGER,
    `field_use` INT,
    `description` VARCHAR(255),
    `sort_order` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmasgn` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `repo_id` INTEGER,
    `indvid` INTEGER,
    `start_time` TIME,
    `stop_time` TIME,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmcdet` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `detail_id` INTEGER,
    `template_id` INTEGER,
    `step_id` INTEGER,
    `type_id` INTEGER,
    `consultant_id` INTEGER,
    `location_id` INTEGER,
    `note` TEXT,
    `required` BOOLEAN,
    `use_date_interval` BOOLEAN,
    `date_interval` INT,
    `sort_order` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmcfin` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmcfpo` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `position_id` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmcfre` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `request_id` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmcons` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `consultation_id` INTEGER,
    `indvid` INTEGER,
    `step_id` INTEGER,
    `type_id` INTEGER,
    `consultant_id` INTEGER,
    `location_id` INTEGER,
    `note` TEXT,
    `schedule_date` DATE,
    `complete_date` DATE,
    `complete` BOOLEAN,
    `required` BOOLEAN,
    `sort_order` INTEGER,
    `schedule_time` TIME,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmfdef` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `field_id` INTEGER,
    `description` VARCHAR(255),
    `data_type` INT,
    `field_use` INT,
    `page_id` INT,
    `sort_order` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmflds` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `searchgroups` VARCHAR(255),
    `searchlinkfield` VARCHAR(255),
    `desc_width` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmflst` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `item_id` INTEGER,
    `field_id` INTEGER,
    `description` VARCHAR(255),
    `sort_order` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmilst` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `item_id` INTEGER,
    `field_use` INT,
    `indvid` INTEGER,
    `sort_order` INT,
    `title_id` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmindv` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    `status_id` INTEGER,
    `inforelease` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmlog` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `log_id` INTEGER,
    `log_date` DATE,
    `indvid` INTEGER,
    `position_id` INTEGER,
    `request_id` INTEGER,
    `note` TEXT,
    `hourly_rate` FLOAT,
    `number_hours` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmmatc` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    `position_id` INTEGER,
    `manual` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmpage` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `field_use` INT,
    `page_id` INT,
    `description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmpos` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `position_id` INTEGER,
    `name` VARCHAR(255),
    `description` TEXT,
    `active` BOOLEAN,
    `date_deactivated` DATE,
    `department_id` INTEGER,
    `contact_id` INTEGER,
    `hourly_rate` FLOAT,
    `criteria` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmrepo` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `repo_id` INTEGER,
    `request_id` INTEGER,
    `position_id` INTEGER,
    `description` TEXT,
    `start_time` TIME,
    `stop_time` TIME,
    `quantity` INT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmrqst` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `request_id` INTEGER,
    `name` VARCHAR(255),
    `description` TEXT,
    `start_date` DATE,
    `start_time` TIME,
    `stop_date` DATE,
    `stop_time` TIME,
    `location_id` INTEGER,
    `contact_id` INTEGER,
    `request_by` INTEGER,
    `complete` BOOLEAN,
    `complete_date` DATE,
    `activity_id` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmsrch` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `search_id` INTEGER,
    `search_type` INT,
    `name` VARCHAR(255),
    `description` TEXT,
    `public_flag` BOOLEAN,
    `username` VARCHAR(255),
    `criteria` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmsytm` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `hourly_rate` FLOAT,
    `field_use` TEXT,
    `permission_flag` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvmtime` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `time_id` INTEGER,
    `indvid` INTEGER,
    `week_day` INT,
    `start_time` TIME,
    `stop_time` TIME,
    `note` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvtcalr` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `visit_id` INTEGER,
    `visitor_indvid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvtcard` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `cardid` INTEGER,
    `description` VARCHAR(255),
    `cardname` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvtccod` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `size` VARCHAR(255),
    `name` VARCHAR(255),
    `label_width` FLOAT,
    `label_height` FLOAT,
    `lasersettings` TEXT,
    `dotsettings` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvtdere` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `desc_id` INTEGER,
    `resp_id` INTEGER,
    `order` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvtdesc` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `visit_type` VARCHAR(255),
    `description` VARCHAR(255),
    `order` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvterr` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvtocrd` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `cardid` INTEGER,
    `name` VARCHAR(255),
    `field` TEXT,
    `section` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvtresi` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `visit_id` INTEGER,
    `resp_id` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvtresp` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvtteam` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `team_name` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvttemp` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvttmbr` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `team_id` INTEGER,
    `indvid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvttmdt` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `freq` INTEGER,
    `visit_desc_id` INTEGER,
    `visit_comment` TEXT,
    `open_field` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awvttran` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` INTEGER,
    `family_number` INT,
    `individual_number` INTEGER,
    `entry_date` DATE,
    `visit_date` DATE,
    `visit_desc_id` INTEGER,
    `visit_complete` BOOLEAN,
    `visit_comment` TEXT,
    `open_field` VARCHAR(255),
    `open_category` VARCHAR(255),
    `open_date_1` DATE,
    `open_date_2` DATE,
    `visit_note` TEXT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awwrddcs` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `user` VARCHAR(255),
    `description` VARCHAR(255),
    `path` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awyzcnfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `opencatdesc1` VARCHAR(255),
    `opencatdesc2` VARCHAR(255),
    `opencatdesc3` VARCHAR(255),
    `opencatdesc4` VARCHAR(255),
    `opendate1` VARCHAR(255),
    `openfield1` VARCHAR(255),
    `yzopencatdesc1` VARCHAR(255),
    `yzopencatdesc2` VARCHAR(255),
    `yzopencatdesc3` VARCHAR(255),
    `yzopenfield1` VARCHAR(255),
    `yzopenfield2` VARCHAR(255),
    `nextrecpid` INTEGER,
    `nextyzid` INTEGER,
    `nexteleid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awyzele` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `eleid` INTEGER,
    `catid` INTEGER,
    `description` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `awyzindv` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `yahrid` INTEGER,
    `last_name` VARCHAR(255),
    `first_name` VARCHAR(255),
    `middle_name` VARCHAR(255),
    `title` VARCHAR(255),
    `suffix` VARCHAR(255),
    `goesby` VARCHAR(255),
    `death_date` DATE,
    `sundown` VARCHAR(255),
    `hebrew_date` VARCHAR(255),
    `plaque` INTEGER,
    `open_category_1` INTEGER,
    `open_category_2` INTEGER,
    `open_category_3` INTEGER,
    `open_field_1` VARCHAR(255),
    `open_field_2` VARCHAR(255),
    `notes` TEXT,
    `active` BOOLEAN,
    `indvid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awyzrecp` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `yahrid` INTEGER,
    `recpid` VARCHAR(255),
    `relationship` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `awyzrind` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `recpid` VARCHAR(255),
    `last_name` VARCHAR(255),
    `first_name` VARCHAR(255),
    `middle_name` VARCHAR(255),
    `title` VARCHAR(255),
    `suffix` VARCHAR(255),
    `goesby` VARCHAR(255),
    `work_phone` VARCHAR(255),
    `work_listed` BOOLEAN,
    `notes` TEXT,
    `open_date_1` DATE,
    `open_category_1` INTEGER,
    `open_category_2` INTEGER,
    `open_category_3` INTEGER,
    `open_category_4` INTEGER,
    `open_field_1` VARCHAR(255),
    `active` BOOLEAN,
    `indvid` INTEGER,
    PRIMARY KEY (pkid)
);

CREATE TABLE `epactbal` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `linenum` INTEGER,
    `code` VARCHAR(255),
    `name` VARCHAR(255),
    `groupname` VARCHAR(255),
    `accttype` INTEGER,
    `bal` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `epexcept` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `linenum` INTEGER,
    `indvid` INTEGER,
    `error` VARCHAR(255),
    `name` VARCHAR(255),
    `sort` VARCHAR(255),
    `section` INTEGER,
    `status` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `epmemtot` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `linenum` INTEGER,
    `indvid` INTEGER,
    `name` VARCHAR(255),
    `how` VARCHAR(255),
    `date` TIMESTAMP,
    `status` VARCHAR(255),
    `sort` VARCHAR(255),
    `haspledge` BOOLEAN,
    `hasgift` BOOLEAN,
    PRIMARY KEY (pkid)
);

CREATE TABLE `eppldtot` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `indvid` INTEGER,
    `env` VARCHAR(255),
    `name` VARCHAR(255),
    `pldcnt` INTEGER,
    `pldamt` FLOAT,
    `lastname` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `pamerge` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `famnumber` VARCHAR(255),
    `indnumber` FLOAT,
    `firstname` VARCHAR(255),
    `middlename` VARCHAR(255),
    `lastname` VARCHAR(255),
    `title` VARCHAR(255),
    `suffix` VARCHAR(255),
    `goesbyname` VARCHAR(255),
    `formlabel` VARCHAR(255),
    `formsal` VARCHAR(255),
    `address1` VARCHAR(255),
    `address2` VARCHAR(255),
    `city` VARCHAR(255),
    `state` VARCHAR(255),
    `zip` VARCHAR(255),
    `carriercod` VARCHAR(255),
    `cbyear` VARCHAR(255),
    `fund1` VARCHAR(255),
    `fund2` VARCHAR(255),
    `fund3` VARCHAR(255),
    `fund4` VARCHAR(255),
    `fund5` VARCHAR(255),
    `fund6` VARCHAR(255),
    `fund7` VARCHAR(255),
    `fund8` VARCHAR(255),
    `fund9` VARCHAR(255),
    `fund10` VARCHAR(255),
    `pledfund1` FLOAT,
    `pledfund2` FLOAT,
    `pledfund3` FLOAT,
    `pledfund4` FLOAT,
    `pledfund5` FLOAT,
    `pledfund6` FLOAT,
    `pledfund7` FLOAT,
    `pledfund8` FLOAT,
    `pledfund9` FLOAT,
    `pledfund10` FLOAT,
    `qtdfund1` FLOAT,
    `qtdfund2` FLOAT,
    `qtdfund3` FLOAT,
    `qtdfund4` FLOAT,
    `qtdfund5` FLOAT,
    `qtdfund6` FLOAT,
    `qtdfund7` FLOAT,
    `qtdfund8` FLOAT,
    `qtdfund9` FLOAT,
    `qtdfund10` FLOAT,
    `ytdfund1` FLOAT,
    `ytdfund2` FLOAT,
    `ytdfund3` FLOAT,
    `ytdfund4` FLOAT,
    `ytdfund5` FLOAT,
    `ytdfund6` FLOAT,
    `ytdfund7` FLOAT,
    `ytdfund8` FLOAT,
    `ytdfund9` FLOAT,
    `ytdfund10` FLOAT,
    `prefund1` FLOAT,
    `prefund2` FLOAT,
    `prefund3` FLOAT,
    `prefund4` FLOAT,
    `prefund5` FLOAT,
    `prefund6` FLOAT,
    `prefund7` FLOAT,
    `prefund8` FLOAT,
    `prefund9` FLOAT,
    `prefund10` FLOAT,
    `ptdfund1` FLOAT,
    `ptdfund2` FLOAT,
    `ptdfund3` FLOAT,
    `ptdfund4` FLOAT,
    `ptdfund5` FLOAT,
    `ptdfund6` FLOAT,
    `ptdfund7` FLOAT,
    `ptdfund8` FLOAT,
    `ptdfund9` FLOAT,
    `ptdfund10` FLOAT,
    `curbal1` FLOAT,
    `curbal2` FLOAT,
    `curbal3` FLOAT,
    `curbal4` FLOAT,
    `curbal5` FLOAT,
    `curbal6` FLOAT,
    `curbal7` FLOAT,
    `curbal8` FLOAT,
    `curbal9` FLOAT,
    `curbal10` FLOAT,
    `qtdtotal` FLOAT,
    `yeartotal` FLOAT,
    `nypfund1` FLOAT,
    `nypfund2` FLOAT,
    `nypfund3` FLOAT,
    `nypfund4` FLOAT,
    `nypfund5` FLOAT,
    `nypfund6` FLOAT,
    `nypfund7` FLOAT,
    `nypfund8` FLOAT,
    `nypfund9` FLOAT,
    `nypfund10` FLOAT,
    `nytpfund1` FLOAT,
    `nytpfund2` FLOAT,
    `nytpfund3` FLOAT,
    `nytpfund4` FLOAT,
    `nytpfund5` FLOAT,
    `nytpfund6` FLOAT,
    `nytpfund7` FLOAT,
    `nytpfund8` FLOAT,
    `nytpfund9` FLOAT,
    `nytpfund10` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `updttaxd` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `tableno` VARCHAR(255),
    `min` FLOAT,
    `max` FLOAT,
    `taxes` FLOAT,
    `percent` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `updttaxh` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `tableno` VARCHAR(255),
    `tablename` VARCHAR(255),
    `taxauth` VARCHAR(255),
    `wagelmt` FLOAT,
    `dollarlmt` FLOAT,
    `exemptamt` FLOAT,
    `marexempt` FLOAT,
    `alteamt` FLOAT,
    `alttrigger` FLOAT,
    `ex_percent` FLOAT,
    `sd_mclaim` FLOAT,
    `sd_percent` FLOAT,
    `sd_max` FLOAT,
    `sd_min` FLOAT,
    `ew_minslry` FLOAT,
    `ew_percent` FLOAT,
    `crd_min` FLOAT,
    `crd_max` FLOAT,
    `crd_triger` FLOAT,
    `crd_dep` FLOAT,
    `fd_cap` FLOAT,
    `liexempt` FLOAT,
    PRIMARY KEY (pkid)
);

CREATE TABLE `utfilever` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255),
    `version` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `utmemory` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `total` VARCHAR(255),
    `free` VARCHAR(255),
    `type` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `utsystem` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `component` VARCHAR(255),
    `value` VARCHAR(255),
    PRIMARY KEY (pkid)
);

CREATE TABLE `webcnfg` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `lastdate` VARCHAR(255),
    `laststatus` VARCHAR(255),
    `lastreccount` INTEGER,
    `usesearchresults` BOOLEAN,
    `usefilterresults` BOOLEAN,
    `exportemail` BOOLEAN,
    `exportphonenumbers` BOOLEAN,
    `exportactivities` BOOLEAN,
    `exportuserdefined` BOOLEAN,
    `exportattendance` BOOLEAN,
    `emails` TEXT,
    `phones` TEXT,
    `activities` TEXT,
    `categories` TEXT,
    `fields` TEXT,
    `dates` TEXT,
    `bytessent` INTEGER,
    `emailaddress` VARCHAR(255),
    `proxy` VARCHAR(255),
    `proxyport` INTEGER,
    `fwuserid` VARCHAR(255),
    `fwpassword` VARCHAR(255),
    `fwauth` BOOLEAN,
    `groups` TEXT,
    `dbusername` VARCHAR(255),
    `dbuserpassword` VARCHAR(255),
    `exportcomments` BOOLEAN,
    `comments` TEXT,
    `exportcontrib` BOOLEAN,
    `contrib` TEXT,
    `exportcalendar` BOOLEAN,
    `calendar` TEXT,
    `calendardates` TEXT,
    `startdates` TEXT,
    `famcat` TEXT,
    `famfld` TEXT,
    `exportvisitation` BOOLEAN,
    `savedsearch` INTEGER,
    `dssavedsearch` INTEGER,
    `dslastreccount` INTEGER,
    `dsautoacceptconstid` BOOLEAN,
    `vtdates` TEXT,
    `exportorganizations` BOOLEAN,
    `doreset` BOOLEAN,
    `username` VARCHAR(255),
    `orglists` TEXT,
    `orgfields` TEXT,
    `orgdates` TEXT,
    `exportorgopenfields` BOOLEAN,
    `lastcbdownloaddate` TIMESTAMP,
    PRIMARY KEY (pkid)
);

CREATE TABLE `winpath` (
    pkid INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `path` VARCHAR(255),
    `user` VARCHAR(255),
    PRIMARY KEY (pkid)
);

