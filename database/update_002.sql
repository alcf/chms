###### UPDATE SCRIPT for Database v002 #######

UPDATE _version SET version='002';

##############################################

CREATE TABLE `mobile_provider`
(
`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(100),
`domain` VARCHAR(100),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE INDEX `mobile_provider_id_idx` ON `phone`(`mobile_provider_id`);
ALTER TABLE phone ADD COLUMN `mobile_provider_id` INTEGER UNSIGNED AFTER person_id;
ALTER TABLE `phone` ADD FOREIGN KEY mobile_provider_id_idxfk (`mobile_provider_id`) REFERENCES `mobile_provider` (`id`);

ALTER TABLE `group` ADD COLUMN `active_flag` BOOLEAN AFTER token;

INSERT INTO mobile_provider(domain, name) VALUES ('sms.3rivers.net', '3 River Wireless');
INSERT INTO mobile_provider(domain, name) VALUES ('cingularme.com', '7-11 Speakout');
INSERT INTO mobile_provider(domain, name) VALUES ('paging.acswireless.com', 'ACS Wireless');
INSERT INTO mobile_provider(domain, name) VALUES ('msg.acsalaska.com', 'Alaska Communications');
INSERT INTO mobile_provider(domain, name) VALUES ('akdigitel.com', 'Alaska Digital');

INSERT INTO mobile_provider(domain, name) VALUES ('message.alltel.com', 'Alltel Wireless');
INSERT INTO mobile_provider(domain, name) VALUES ('txt.att.net', 'AT&T Wireless');
INSERT INTO mobile_provider(domain, name) VALUES ('txt.bell.ca', 'Bell Mobility (Canada)');
INSERT INTO mobile_provider(domain, name) VALUES ('myboostmobile.com', 'Boost Mobile');
INSERT INTO mobile_provider(domain, name) VALUES ('mobile.celloneusa.com', 'Cellular One');
INSERT INTO mobile_provider(domain, name) VALUES ('cwemail.com', 'Centennial Wireless');

INSERT INTO mobile_provider(domain, name) VALUES ('mobile.mycingular.com', 'Cingular');
INSERT INTO mobile_provider(domain, name) VALUES ('ideasclaro-ca.com', 'Claro (Nicaragua)');
INSERT INTO mobile_provider(domain, name) VALUES ('comcel.com', 'Comcel (Columbia)');
INSERT INTO mobile_provider(domain, name) VALUES ('mms.mycricket.com', 'Cricket');
INSERT INTO mobile_provider(domain, name) VALUES ('sms.ctimovil.com.ar', 'CTI (Argentina)');
INSERT INTO mobile_provider(domain, name) VALUES ('emtelworld.net', 'Emtel (Mauritius)');

INSERT INTO mobile_provider(domain, name) VALUES ('fido.ca', 'Fido (Canada)');
INSERT INTO mobile_provider(domain, name) VALUES ('mobile.gci.net', 'GCI');
INSERT INTO mobile_provider(domain, name) VALUES ('msg.globalstarusa.com', 'Globalstar');
INSERT INTO mobile_provider(domain, name) VALUES ('messaging.sprintpcs.com', 'Helio');
INSERT INTO mobile_provider(domain, name) VALUES ('ivctext.com', 'Illinois Valley Central');
INSERT INTO mobile_provider(domain, name) VALUES ('msg.iridium.com', 'Iridium');

INSERT INTO mobile_provider(domain, name) VALUES ('itcompany.com.au', 'IT Company (Australia)');
INSERT INTO mobile_provider(domain, name) VALUES ('sms.mymeteor.ie', 'Meteor (Ireland)');
INSERT INTO mobile_provider(domain, name) VALUES ('mymetropcs.com', 'MetroPCS');
INSERT INTO mobile_provider(domain, name) VALUES ('movimensaje.com.ar', 'Movicom (Argentina)');
INSERT INTO mobile_provider(domain, name) VALUES ('movistar.com.co', 'Movistar (Columbia)');
INSERT INTO mobile_provider(domain, name) VALUES ('sms.co.za', 'MTN (South Africa)');

INSERT INTO mobile_provider(domain, name) VALUES ('text.mtsmobility.com', 'MTS (Canada)');
INSERT INTO mobile_provider(domain, name) VALUES ('sms.netcom.no', 'Netcom (Norway)');
INSERT INTO mobile_provider(domain, name) VALUES ('page.nextel.com', 'Nextel');
INSERT INTO mobile_provider(domain, name) VALUES ('o2imail.co.uk', 'O2 (UK)');
INSERT INTO mobile_provider(domain, name) VALUES ('txt.bell.ca', 'President's Choice (Canada)');
INSERT INTO mobile_provider(domain, name) VALUES ('qwestmp.com', 'Qwest');

INSERT INTO mobile_provider(domain, name) VALUES ('pcs.rogers.com', 'Rogers');
INSERT INTO mobile_provider(domain, name) VALUES ('sms.sasktel.com', 'Sasktel (Canada)');
INSERT INTO mobile_provider(domain, name) VALUES ('skytel.com', 'Skytel');
INSERT INTO mobile_provider(domain, name) VALUES ('txt.bell.ca', 'Solo Mobile (Canada)');
INSERT INTO mobile_provider(domain, name) VALUES ('messaging.sprintpcs.com', 'Sprint PCS');
INSERT INTO mobile_provider(domain, name) VALUES ('tms.suncom.com', 'Suncom');

INSERT INTO mobile_provider(domain, name) VALUES ('mobilpost.no', 'Telenor (Norway)');
INSERT INTO mobile_provider(domain, name) VALUES ('msg.telus.com', 'Telus Mobility (Canada)');
INSERT INTO mobile_provider(domain, name) VALUES ('sms.thumbcellular.com', 'Thumb Cellular');
INSERT INTO mobile_provider(domain, name) VALUES ('sms.tigo.com.co', 'Tigo (Columbia)');
INSERT INTO mobile_provider(domain, name) VALUES ('tmomail.net', 'T-Mobile');
INSERT INTO mobile_provider(domain, name) VALUES ('sms.t-mobile.at', 'T-Mobile (Austria)');

INSERT INTO mobile_provider(domain, name) VALUES ('utext.com', 'Unicel');
INSERT INTO mobile_provider(domain, name) VALUES ('email.uscc.net', 'US Cellular');
INSERT INTO mobile_provider(domain, name) VALUES ('vtext.com', 'Verizon');
INSERT INTO mobile_provider(domain, name) VALUES ('vmobl.com', 'Virgin Mobile');
INSERT INTO mobile_provider(domain, name) VALUES ('vmobile.ca', 'Virgin Mobile (Canada)');
INSERT INTO mobile_provider(domain, name) VALUES ('voda.co.za', 'Vodacom');

INSERT INTO mobile_provider(domain, name) VALUES ('vodafone-sms.de', 'Vodafone (Germany)');
INSERT INTO mobile_provider(domain, name) VALUES ('sms.vodafone.it', 'Vodafone (Italy)');
INSERT INTO mobile_provider(domain, name) VALUES ('c.vodafone.ne.jp', 'Vodafone (Japan)');
INSERT INTO mobile_provider(domain, name) VALUES ('vodafone.net', 'Vodafone (UK)');
INSERT INTO mobile_provider(domain, name) VALUES ('sms.ycc.ru', 'YCC (Russia)');
