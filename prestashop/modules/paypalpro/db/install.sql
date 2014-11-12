CREATE TABLE IF NOT EXISTS `PREFIX_paypalpro_refunds` (
  `id_order` int(11) NOT NULL,
  `id_trans` varchar(50) NOT NULL,
  `card` varchar(4) NOT NULL,
  `auth_code` varchar(10) NOT NULL,
  `captured` TINYINT( 1 ) NOT NULL DEFAULT '0',
  PRIMARY KEY  (`id_order`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `PREFIX_paypalpro_refund_history` (
  `id_refund` int(11) unsigned NOT NULL auto_increment,
  `id_order` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `details` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_refund`)
) ENGINE=MyISAM;