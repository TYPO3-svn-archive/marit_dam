CREATE TABLE tx_dam (
	sys_language_uid int(11) NOT NULL DEFAULT -1,
	language int(11) NOT NULL DEFAULT 0
);
CREATE TABLE tx_dam_mm_language (
  uid_local int(11) DEFAULT '0' NOT NULL,
  uid_foreign int(11) DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);
INSERT INTO `static_languages` (`uid`, `pid`, `deleted`, `cn_iso_2`, `cn_iso_3`, `cn_iso_nr`, `cn_parent_tr_iso_nr`, `cn_official_name_local`, `cn_official_name_en`, `cn_capital`, `cn_tldomain`, `cn_currency_iso_3`, `cn_currency_iso_nr`, `cn_phone`, `cn_eu_member`, `cn_address_format`, `cn_zone_flag`, `cn_short_local`, `cn_short_en`, `cn_uno_member`) VALUES
(0, 0, 0, '', '', 0, 0, '--All--', '--All--', '', '', '', 0, 0, 0, 0, 0, '--All--', '--All--', 0);