# --------------------------------------------------------
# MYSQL DATABASE SCHEMATIC
# Script:   Maian Cart
# Version:  2.0
# MySQL:    4.0 or higher
# --------------------------------------------------------

DROP TABLE IF EXISTS `mc_activation_history`;
CREATE TABLE IF NOT EXISTS `mc_activation_history` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `saleID` int(7) NOT NULL DEFAULT '0',
  `products`  text DEFAULT NULL,
  `restoreDate` date NOT NULL DEFAULT '0000-00-00',
  `restoreTime` time NOT NULL DEFAULT '00:00:00',
  `adminUser` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  INDEX `saleid_index` (`saleID`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_attachments`;
CREATE TABLE IF NOT EXISTS `mc_attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `saleID` int(7) NOT NULL DEFAULT '0',
  `statusID` int(7) NOT NULL DEFAULT '0',
  `attachFolder` varchar(100) NOT NULL DEFAULT '',
  `fileName` varchar(100) NOT NULL DEFAULT '',
  `fileType` varchar(100) NOT NULL DEFAULT '',
  `fileSize` varchar(100) NOT NULL DEFAULT '',
  `isSaved` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  INDEX `saleid_index` (`saleID`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_attributes`;
CREATE TABLE `mc_attributes` (
  `id` INT(7) NOT NULL AUTO_INCREMENT,
  `productID` INT(10) NOT NULL DEFAULT '0',
  `attrGroup` INT(10) NOT NULL DEFAULT '0',
  `attrName` varchar(100) not null default '',
  `attrCost` VARCHAR(50) NOT NULL DEFAULT '',
  `attrStock` INT(10) NOT NULL DEFAULT '0',
  `attrWeight` varchar(50) not null default '',
  `orderBy` INT(7) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `prod_index` (`productID`),
  INDEX `weight_index` (`attrWeight`),
  INDEX `group_index` (`attrGroup`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_attr_groups`;
CREATE TABLE `mc_attr_groups` (
  `id` INT(7) NOT NULL AUTO_INCREMENT,
  `productID` INT(10) NOT NULL DEFAULT '0',
  `groupName` varchar(100) not null default '',
  `orderBy` INT(7) NOT NULL DEFAULT '0',
  `allowMultiple` enum('yes','no') not null default 'no',
  `isRequired` enum('yes','no') not null default 'no',
  PRIMARY KEY (`id`),
  INDEX `prod_index` (`productID`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_banners`;
CREATE TABLE IF NOT EXISTS `mc_banners` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `bannerFile` varchar(250) NOT NULL DEFAULT '0',
  `bannerText` varchar(250) NOT NULL DEFAULT '0',
  `bannerUrl` varchar(250) NOT NULL DEFAULT '0',
  `bannerLive` enum('yes','no') NOT NULL DEFAULT 'yes',
  `bannerOrder` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_brands`;
CREATE TABLE IF NOT EXISTS `mc_brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '',
  `bCat` int(6) NOT NULL DEFAULT '0',
  `enBrand` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  INDEX `cat_index` (`bCat`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_campaigns`;
CREATE TABLE IF NOT EXISTS `mc_campaigns` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `cName` varchar(250) NOT NULL DEFAULT '',
  `cDiscountCode` varchar(50) NOT NULL DEFAULT '',
  `cMin` varchar(50) NOT NULL DEFAULT '0.00',
  `cUsage` int(5) NOT NULL DEFAULT '0',
  `cExpiry` date NOT NULL DEFAULT '0000-00-00',
  `cDiscount` varchar(20) NOT NULL DEFAULT '',
  `cAdded` date DEFAULT '0000-00-00',
  `cLive` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  INDEX `code_index` (`cDiscountCode`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_categories`;
CREATE TABLE IF NOT EXISTS `mc_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(250) NOT NULL DEFAULT '',
  `titleBar` varchar(250) not null default '',
  `comments`  text DEFAULT NULL,
  `catLevel` tinyint(1) not null default '0',
  `childOf` int(6) NOT NULL DEFAULT '0',
  `metaDesc`  text DEFAULT NULL,
  `metaKeys`  text DEFAULT NULL,
  `enCat` enum('yes','no') NOT NULL DEFAULT 'yes',
  `orderBy` int(5) NOT NULL DEFAULT '0',
  `enDisqus` enum('yes','no') NOT NULL DEFAULT 'no',
  `freeShipping` enum('yes','no') NOT NULL DEFAULT 'no',
  `imgIcon` varchar(100) not null default '',
  `showRelated` enum('yes','no') not null default 'yes',
  PRIMARY KEY (`id`),
  INDEX `level_index` (`catLevel`),
  INDEX `child_index` (`childOf`),
  INDEX `encat_index` (`enCat`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_click_history`;
CREATE TABLE IF NOT EXISTS `mc_click_history` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `saleID` int(7) NOT NULL DEFAULT '0',
  `purchaseID` int(7) NOT NULL DEFAULT '0',
  `productID` int(7) NOT NULL DEFAULT '0',
  `clickDate` date NOT NULL DEFAULT '0000-00-00',
  `clickTime` time NOT NULL DEFAULT '00:00:00',
  `clickIP` varchar(250) not null default '',
  PRIMARY KEY (`id`),
  INDEX `saleid_index` (`saleID`),
  INDEX `purid_index` (`purchaseID`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_comparisons`;
CREATE TABLE IF NOT EXISTS `mc_comparisons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `saleID` int(7) NOT NULL DEFAULT '0',
  `thisProduct` int(7) NOT NULL DEFAULT '0',
  `thatProduct` int(7) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `saleid_index` (`saleID`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_countries`;
CREATE TABLE IF NOT EXISTS `mc_countries` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `cName` varchar(250) NOT NULL DEFAULT '',
  `cISO` varchar(3) NOT NULL DEFAULT '',
  `enCountry` enum('yes','no') NOT NULL DEFAULT 'yes',
  `localPickup` enum('yes','no') not null default 'no',
  PRIMARY KEY (`id`)
) TYPE = MyISAM;

INSERT INTO `mc_countries` (
`id`, `cName`, `cISO`, `enCountry`, `localPickup`
) VALUES (
1, 'Afghanistan', 'AFG', 'no', 'no'),
(2, 'Albania', 'ALB', 'no', 'no'),
(3, 'Algeria', 'DZA', 'no', 'no'),
(4, 'Andorra', 'AND', 'no', 'no'),
(5, 'Angola', 'AGO', 'no', 'no'),
(6, 'Antigua and Barbuda', 'ATG', 'no', 'no'),
(7, 'Argentina', 'ARG', 'no', 'no'),
(8, 'Armenia', 'ARM', 'no', 'no'),
(9, 'Australia', 'AUS', 'no', 'no'),
(10, 'Austria', 'AUT', 'no', 'no'),
(11, 'Azerbaijan', 'AZE', 'no', 'no'),
(12, 'Bahamas', 'BS', 'no', 'no'),
(13, 'Bahrain', 'BHR', 'no', 'no'),
(14, 'Bangladesh', 'BGD', 'no', 'no'),
(15, 'Barbados', 'BRB', 'no', 'no'),
(16, 'Belarus', 'BLR', 'no', 'no'),
(17, 'Belgium', 'BEL', 'yes', 'no'),
(18, 'Belize', 'BLZ', 'no', 'no'),
(19, 'Benin', 'BEN', 'no', 'no'),
(20, 'Bhutan', 'BTN', 'no', 'no'),
(21, 'Bolivia', 'BOL', 'no', 'no'),
(22, 'Bosnia and Herzegovina', 'BIH', 'no', 'no'),
(23, 'Botswana', 'BWA', 'no', 'no'),
(24, 'Brazil', 'BRA', 'no', 'no'),
(25, 'Brunei', 'BRN', 'no', 'no'),
(26, 'Bulgaria', 'BGR', 'no', 'no'),
(27, 'Burkina Faso', 'BFA', 'no', 'no'),
(28, 'Burundi', 'BDI', 'no', 'no'),
(29, 'Cambodia', 'KHM', 'no', 'no'),
(30, 'Cameroon', 'CMR', 'no', 'no'),
(31, 'Canada', 'CAN', 'no', 'no'),
(32, 'Cape Verde', 'CPV', 'no', 'no'),
(33, 'Central African Republic', 'CAF', 'no', 'no'),
(34, 'Chad', 'TCD', 'no', 'no'),
(35, 'Chile', 'CHL', 'no', 'no'),
(36, 'China', 'CN', 'no', 'no'),
(37, 'Colombia', 'COL', 'no', 'no'),
(38, 'Comoros', 'COM', 'no', 'no'),
(39, 'Congo', 'CD', 'no', 'no'),
(40, 'Congo', 'CG', 'no', 'no'),
(41, 'Costa Rica', 'CRI', 'no', 'no'),
(42, 'Cote d\'Ivoire (Ivory Coast)', 'CIV', 'no', 'no'),
(43, 'Croatia', 'HRV', 'no', 'no'),
(44, 'Cuba', 'CUB', 'no', 'no'),
(45, 'Cyprus', 'CYP', 'no', 'no'),
(46, 'Czech Republic', 'CZE', 'no', 'no'),
(47, 'Denmark', 'DNK', 'no', 'no'),
(48, 'Djibouti', 'DJI', 'no', 'no'),
(49, 'Dominica', 'DMA', 'no', 'no'),
(50, 'Dominican Republic', 'DOM', 'no', 'no'),
(51, 'Ecuador', 'ECU', 'no', 'no'),
(52, 'Egypt', 'EGY', 'no', 'no'),
(53, 'El Salvador', 'SLV', 'no', 'no'),
(54, 'Equatorial Guinea', 'GNQ', 'no', 'no'),
(55, 'Eritrea', 'ERI', 'no', 'no'),
(56, 'Estonia', 'EST', 'no', 'no'),
(57, 'Ethiopia', 'ETH', 'no', 'no'),
(58, 'Fiji', 'FJI', 'no', 'no'),
(59, 'Finland', 'FIN', 'yes', 'no'),
(60, 'France', 'FRA', 'yes', 'no'),
(61, 'Gabon', 'GAB', 'no', 'no'),
(62, 'Gambia', 'GM', 'no', 'no'),
(63, 'Georgia', 'GEO', 'no', 'no'),
(64, 'Germany', 'DEU', 'no', 'no'),
(65, 'Ghana', 'GHA', 'no', 'no'),
(66, 'Greece', 'GRC', 'no', 'no'),
(67, 'Grenada', 'GRD', 'no', 'no'),
(68, 'Guatemala', 'GTM', 'no', 'no'),
(69, 'Guinea', 'GIN', 'no', 'no'),
(70, 'Guinea-Bissau', 'GNB', 'no', 'no'),
(71, 'Guyana', 'GUY', 'no', 'no'),
(72, 'Haiti', 'HTI', 'no', 'no'),
(73, 'Honduras', 'HND', 'no', 'no'),
(74, 'Hungary', 'HUN', 'no', 'no'),
(75, 'Iceland', 'ISL', 'no', 'no'),
(76, 'India', 'IND', 'no', 'no'),
(77, 'Indonesia', 'IDN', 'no', 'no'),
(78, 'Iran', 'IRN', 'no', 'no'),
(79, 'Iraq', 'IRQ', 'no', 'no'),
(80, 'Ireland', 'IRL', 'yes', 'no'),
(81, 'Israel', 'ISR', 'no', 'no'),
(82, 'Italy', 'ITA', 'no', 'no'),
(83, 'Jamaica', 'JAM', 'no', 'no'),
(84, 'Japan', 'JPN', 'no', 'no'),
(85, 'Jordan', 'JOR', 'no', 'no'),
(86, 'Kazakhstan', 'KAZ', 'no', 'no'),
(87, 'Kenya', 'KEN', 'no', 'no'),
(88, 'Kiribati', 'KIR', 'no', 'no'),
(89, 'Korea', 'KP', 'no', 'no'),
(90, 'Korea', 'KR', 'no', 'no'),
(91, 'Kuwait', 'KWT', 'no', 'no'),
(92, 'Kyrgyzstan', 'KGZ', 'no', 'no'),
(93, 'Laos', 'LAO', 'no', 'no'),
(94, 'Latvia', 'LVA', 'no', 'no'),
(95, 'Lebanon', 'LBN', 'no', 'no'),
(96, 'Lesotho', 'LSO', 'no', 'no'),
(97, 'Liberia', 'LBR', 'no', 'no'),
(98, 'Libya', 'LBY', 'no', 'no'),
(99, 'Liechtenstein', 'LIE', 'no', 'no'),
(100, 'Lithuania', 'LTU', 'no', 'no'),
(101, 'Luxembourg', 'LUX', 'no', 'no'),
(102, 'Macedonia', 'MKD', 'no', 'no'),
(103, 'Madagascar', 'MDG', 'no', 'no'),
(104, 'Malawi', 'MWI', 'no', 'no'),
(105, 'Malaysia', 'MYS', 'no', 'no'),
(106, 'Maldives', 'MDV', 'no', 'no'),
(107, 'Mali', 'MLI', 'no', 'no'),
(108, 'Malta', 'MLT', 'no', 'no'),
(109, 'Marshall Islands', 'MHL', 'no', 'no'),
(110, 'Mauritania', 'MRT', 'no', 'no'),
(111, 'Mauritius', 'MUS', 'no', 'no'),
(112, 'Mexico', 'MEX', 'no', 'no'),
(113, 'Micronesia', 'FSM', 'no', 'no'),
(114, 'Moldova', 'MDA', 'no', 'no'),
(115, 'Monaco', 'MCO', 'no', 'no'),
(116, 'Mongolia', 'MNG', 'no', 'no'),
(117, 'Montenegro', 'MNE', 'no', 'no'),
(118, 'Morocco', 'MAR', 'no', 'no'),
(119, 'Mozambique', 'MOZ', 'no', 'no'),
(120, 'Myanmar (Burma)', 'MMR', 'no', 'no'),
(121, 'Namibia', 'NAM', 'no', 'no'),
(122, 'Nauru', 'NRU', 'no', 'no'),
(123, 'Nepal', 'NPL', 'no', 'no'),
(124, 'Netherlands', 'NLD', 'no', 'no'),
(125, 'New Zealand', 'NZL', 'no', 'no'),
(126, 'Nicaragua', 'NIC', 'no', 'no'),
(127, 'Niger', 'NER', 'no', 'no'),
(128, 'Nigeria', 'NGA', 'no', 'no'),
(129, 'Norway', 'NOR', 'no', 'no'),
(130, 'Oman', 'OMN', 'no', 'no'),
(131, 'Pakistan', 'PAK', 'no', 'no'),
(132, 'Palau', 'PLW', 'no', 'no'),
(133, 'Panama', 'PAN', 'no', 'no'),
(134, 'Papua New Guinea', 'PNG', 'no', 'no'),
(135, 'Paraguay', 'PRY', 'no', 'no'),
(136, 'Peru', 'PER', 'no', 'no'),
(137, 'Philippines', 'PHL', 'no', 'no'),
(138, 'Poland', 'POL', 'no', 'no'),
(139, 'Portugal', 'PRT', 'no', 'no'),
(140, 'Qatar', 'QAT', 'no', 'no'),
(141, 'Romania', 'ROU', 'no', 'no'),
(142, 'Russia', 'RUS', 'no', 'no'),
(143, 'Rwanda', 'RWA', 'no', 'no'),
(144, 'Saint Kitts and Nevis', 'KNA', 'no', 'no'),
(145, 'Saint Lucia', 'LCA', 'no', 'no'),
(146, 'Saint Vincent and the Grenadines', 'VCT', 'no', 'no'),
(147, 'Samoa', 'WSM', 'no', 'no'),
(148, 'San Marino', 'SMR', 'no', 'no'),
(149, 'Sao Tome and Principe', 'STP', 'no', 'no'),
(150, 'Saudi Arabia', 'SAU', 'no', 'no'),
(151, 'Senegal', 'SEN', 'no', 'no'),
(152, 'Serbia', 'SRB', 'no', 'no'),
(153, 'Seychelles', 'SYC', 'no', 'no'),
(154, 'Sierra Leone', 'SLE', 'no', 'no'),
(155, 'Singapore', 'SGP', 'no', 'no'),
(156, 'Slovakia', 'SVK', 'no', 'no'),
(157, 'Slovenia', 'SVN', 'no', 'no'),
(158, 'Solomon Islands', 'SLB', 'no', 'no'),
(159, 'Somalia', 'SOM', 'no', 'no'),
(160, 'South Africa', '+27', 'no', 'no'),
(161, 'Spain', 'ESP', 'no', 'no'),
(162, 'Sri Lanka', 'LKA', 'no', 'no'),
(163, 'Sudan', 'SDN', 'no', 'no'),
(164, 'Suriname', 'SUR', 'no', 'no'),
(165, 'Swaziland', 'SWZ', 'no', 'no'),
(166, 'Sweden', 'SWE', 'yes', 'no'),
(167, 'Switzerland', 'CHE', 'no', 'no'),
(168, 'Syria', 'SYR', 'no', 'no'),
(169, 'Tajikistan', 'TJK', 'no', 'no'),
(170, 'Tanzania', 'TZA', 'no', 'no'),
(171, 'Thailand', 'THA', 'no', 'no'),
(172, 'Timor-Leste (East Timor)', 'TLS', 'no', 'no'),
(173, 'Togo', 'TGO', 'no', 'no'),
(174, 'Tonga', 'TON', 'no', 'no'),
(175, 'Trinidad and Tobago', 'TTO', 'no', 'no'),
(176, 'Tunisia', 'TUN', 'no', 'no'),
(177, 'Turkey', 'TUR', 'no', 'no'),
(178, 'Turkmenistan', 'TKM', 'no', 'no'),
(179, 'Tuvalu', 'TUV', 'no', 'no'),
(180, 'Uganda', 'UGA', 'no', 'no'),
(181, 'Ukraine', 'UKR', 'no', 'no'),
(182, 'United Arab Emirates', 'ARE', 'no', 'no'),
(183, 'United Kingdom', 'GBR', 'yes', 'yes'),
(184, 'United States', 'USA', 'yes', 'no'),
(185, 'Uruguay', 'URY', 'no', 'no'),
(186, 'Uzbekistan', 'UZB', 'no', 'no'),
(187, 'Vanuatu', 'VUT', 'no', 'no'),
(188, 'Vatican City', 'VAT', 'no', 'no'),
(189, 'Venezuela', 'VEN', 'no', 'no'),
(190, 'Vietnam', 'VNM', 'no', 'no'),
(191, 'Yemen', 'YEM', 'no', 'no'),
(192, 'Zambia', 'ZMB', 'no', 'no'),
(193, 'Zimbabwe', 'ZWE', 'no', 'no'),
(194, 'Abkhazia', 'GEO', 'no', 'no'),
(195, 'China', 'TW', 'no', 'no'),
(196, 'Nagorno-Karabakh', 'AZE', 'no', 'no'),
(197, 'Northern Cyprus', 'CYP', 'no', 'no'),
(198, 'Pridnestrovie (Transnistria)', 'MDA', 'no', 'no'),
(199, 'Somaliland', 'SOM', 'no', 'no'),
(200, 'South Ossetia', 'GEO', 'no', 'no'),
(201, 'Ashmore and Cartier Islands', 'AUS', 'no', 'no'),
(202, 'Christmas Island', 'CXR', 'no', 'no'),
(203, 'Cocos (Keeling) Islands', 'CCK', 'no', 'no'),
(204, 'Coral Sea Islands', 'AUS', 'no', 'no'),
(205, 'Heard Island and McDonald Islands', 'HMD', 'no', 'no'),
(206, 'Norfolk Island', 'NFK', 'no', 'no'),
(207, 'New Caledonia', 'NCL', 'no', 'no'),
(208, 'French Polynesia', 'PYF', 'no', 'no'),
(209, 'Mayotte', 'MYT', 'no', 'no'),
(210, 'Saint Barthelemy', 'GLP', 'no', 'no'),
(211, 'Saint Martin', 'GLP', 'no', 'no'),
(212, 'Saint Pierre and Miquelon', 'SPM', 'no', 'no'),
(213, 'Wallis and Futuna', 'WLF', 'no', 'no'),
(214, 'French Southern and Antarctic Lands', 'ATF', 'no', 'no'),
(215, 'Clipperton Island', 'PYF', 'no', 'no'),
(216, 'Bouvet Island', 'BVT', 'no', 'no'),
(217, 'Cook Islands', 'COK', 'no', 'no'),
(218, 'Niue', 'NIU', 'no', 'no'),
(219, 'Tokelau', 'TKL', 'no', 'no'),
(220, 'Guernsey', 'GGY', 'no', 'no'),
(221, 'Isle of Man', 'IMN', 'no', 'no'),
(222, 'Jersey', 'JEY', 'no', 'no'),
(223, 'Anguilla', 'AIA', 'no', 'no'),
(224, 'Bermuda', 'BMU', 'no', 'no'),
(225, 'British Indian Ocean Territory', 'IOT', 'no', 'no'),
(226, 'British Sovereign Base Areas', '', 'no', 'no'),
(227, 'British Virgin Islands', 'VGB', 'no', 'no'),
(228, 'Cayman Islands', 'CYM', 'no', 'no'),
(229, 'Falkland Islands (Islas Malvinas)', 'FLK', 'no', 'no'),
(230, 'Gibraltar', 'GIB', 'no', 'no'),
(231, 'Montserrat', 'MSR', 'no', 'no'),
(232, 'Pitcairn Islands', 'PCN', 'no', 'no'),
(233, 'Saint Helena', 'SHN', 'no', 'no'),
(234, 'South Georgia & South Sandwich Islands', 'SGS', 'no', 'no'),
(235, 'Turks and Caicos Islands', 'TCA', 'no', 'no'),
(236, 'Northern Mariana Islands', 'MNP', 'no', 'no'),
(237, 'Puerto Rico', 'PRI', 'no', 'no'),
(238, 'American Samoa', 'ASM', 'no', 'no'),
(239, 'Baker Island', 'UMI', 'no', 'no'),
(240, 'Guam', 'GUM', 'no', 'no'),
(241, 'Howland Island', 'UMI', 'no', 'no'),
(242, 'Jarvis Island', 'UMI', 'no', 'no'),
(243, 'Johnston Atoll', 'UMI', 'no', 'no'),
(244, 'Kingman Reef', 'UMI', 'no', 'no'),
(245, 'Midway Islands', 'UMI', 'no', 'no'),
(246, 'Navassa Island', 'UMI', 'no', 'no'),
(247, 'Palmyra Atoll', 'UMI', 'no', 'no'),
(248, 'U.S. Virgin Islands', 'VIR', 'no', 'no'),
(249, 'Wake Island', 'UMI', 'no', 'no'),
(250, 'Hong Kong', 'HKG', 'yes', 'no'),
(251, 'Macau', 'MAC', 'no', 'no'),
(252, 'Faroe Islands', 'FRO', 'no', 'no'),
(253, 'Greenland', 'GRL', 'no', 'no'),
(254, 'French Guiana', 'GUF', 'no', 'no'),
(255, 'Guadeloupe', 'GLP', 'no', 'no'),
(256, 'Martinique', 'MTQ', 'no', 'no'),
(257, 'Reunion', 'REU', 'no', 'no'),
(258, 'Aland', 'ALA', 'no', 'no'),
(259, 'Aruba', 'ABW', 'no', 'no'),
(260, 'Netherlands Antilles', 'ANT', 'no', 'no'),
(261, 'Svalbard', 'SJM', 'no', 'no'),
(262, 'Ascension', 'ASC', 'no', 'no'),
(263, 'Tristan da Cunha', 'TAA', 'no', 'no'),
(264, 'Australian Antarctic Territory', 'ATA', 'no', 'no'),
(265, 'Ross Dependency', 'ATA', 'no', 'no'),
(266, 'Peter I Island', 'ATA', 'no', 'no'),
(267, 'Queen Maud Land', 'ATA', 'no', 'no'),
(268, 'British Antarctic Territory', 'ATA', 'no', 'no');

DROP TABLE IF EXISTS `mc_coupons`;
CREATE TABLE IF NOT EXISTS `mc_coupons` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `cCampaign` int(7) NOT NULL DEFAULT '0',
  `cDiscountCode` varchar(200) NOT NULL DEFAULT '',
  `cUseDate` date NOT NULL DEFAULT '0000-00-00',
  `saleID` mediumint(10) NOT NULL DEFAULT '0',
  `discountValue` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  INDEX `code_index` (`cDiscountCode`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_currencies`;
CREATE TABLE IF NOT EXISTS `mc_currencies` (
  `currency` char(3) NOT NULL DEFAULT '',
  `rate` float NOT NULL DEFAULT '0',
  `enableCur` enum('yes','no') DEFAULT 'no',
  `curname` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`currency`)
) TYPE = MyISAM;

INSERT INTO `mc_currencies` (`currency`, `rate`, `enableCur`, `curname`) VALUES
	('USD', 1.4401, 'yes', 'US Dollar'),
	('JPY', 122.8, 'no', 'Japanese Yen'),
	('EUR', 1, 'yes', 'Euro'),
	('BGN', 1.9558, 'no', 'Bulgarian Leva'),
	('CZK', 24.43, 'no', 'Czech Koruny'),
	('DKK', 7.4572, 'no', 'Danish Kroner'),
	('GBP', 0.88095, 'no', 'British Pound'),
	('HUF', 264.09, 'no', 'Hungarian Forint'),
	('LTL', 3.4528, 'no', 'Lithuanian Litai'),
	('LVL', 0.709, 'no', 'Latvian Lati'),
	('PLN', 3.956, 'no', 'Polish Zlotych'),
	('RON', 4.1118, 'no', 'Romanian New Lei'),
	('SEK', 8.9895, 'no', 'Swedish Kronor'),
	('CHF', 1.3163, 'no', 'Swiss Franc'),
	('NOK', 7.802, 'no', 'Norwegian Krone'),
	('HRK', 7.3655, 'no', 'Croatian Kuna'),
	('RUB', 40.4165, 'no', 'Russian Rubles'),
	('TRY', 2.1646, 'no', 'Turkish New Lira'),
	('AUD', 1.3687, 'yes', 'Australian Dollar'),
	('BRL', 2.2619, 'no', 'Brazilian Real'),
	('CAD', 1.3741, 'no', 'Canadian Dollar'),
	('CNY', 9.4115, 'no', 'Chinese Yuan Renminbi'),
	('HKD', 11.1889, 'yes', 'Hong Kong Dollar'),
	('IDR', 12454.5, 'no', 'Indonesian Rupiah'),
	('ILS', 4.9483, 'no', 'Israeli Shekel'),
	('INR', 63.472, 'no', 'Indian Rupee'),
	('KRW', 1559.19, 'no', 'South Korean Won'),
	('MXN', 16.8978, 'no', 'Mexican Peso'),
	('MYR', 4.3441, 'no', 'Malaysian Ringgit'),
	('NZD', 1.8446, 'no', 'New Zealand Dollar'),
	('PHP', 61.908, 'no', 'Philippine Peso'),
	('SGD', 1.8105, 'no', 'Singapore Dollar'),
	('THB', 43.275, 'no', 'Thai Baht'),
	('ZAR', 9.5811, 'no', 'South African Rand');

DROP TABLE IF EXISTS `mc_entry_log`;
CREATE TABLE IF NOT EXISTS `mc_entry_log` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL DEFAULT '',
  `loggedDate` date NOT NULL DEFAULT '0000-00-00',
  `loggedTime` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`id`),
  INDEX `user_index` (`userName`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_flat`;
CREATE TABLE `mc_flat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inZone` int(8) not null default '0',
  `rate` varchar(30) NOT NULL DEFAULT '',
  `enabled` enum('yes','no') not null default 'yes',
PRIMARY KEY(`id`),
INDEX `zone_index` (`inZone`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_mp3`;
CREATE TABLE IF NOT EXISTS `mc_mp3` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(7) NOT NULL DEFAULT '0',
  `filePath` varchar(250) NOT NULL DEFAULT '',
  `fileName` varchar(250) NOT NULL DEFAULT '',
  `fileFolder` varchar(250) NOT NULL DEFAULT '',
  `orderBy` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `prodid_index` (`product_id`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_newpages`;
CREATE TABLE IF NOT EXISTS `mc_newpages` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `pageName` varchar(250) NOT NULL DEFAULT '',
  `pageKeys`  text DEFAULT NULL,
  `pageDesc`  text DEFAULT NULL,
  `pageText`  text DEFAULT NULL,
  `orderBy` int(5) NOT NULL DEFAULT '0',
  `enabled` enum('yes','no') NOT NULL DEFAULT 'no',
  `linkPos` varchar(10) NOT NULL DEFAULT '1',
  `linkExternal` enum('yes','no') NOT NULL DEFAULT 'no',
  `customTemplate` varchar(250) not null default '',
  `linkTarget` enum('same','new') not null default 'new',
  `landingPage` enum('yes','no') not null default 'no',
  `leftColumn` enum('yes','no') not null default 'yes',
  PRIMARY KEY (`id`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_news_ticker`;
CREATE TABLE `mc_news_ticker` (
	`id` INT(7) NOT NULL AUTO_INCREMENT,
	`newsText` TEXT NULL,
	`enabled` ENUM('yes','no') NOT NULL DEFAULT 'no',
	`orderBy` INT(7) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
) TYPE = MyISAM;

INSERT INTO `mc_newpages` (`id`, `pageName`, `pageKeys`, `pageDesc`, `pageText`, `orderBy`, `enabled`, `linkPos`, `linkExternal`,`customTemplate`) VALUES
	(2, 'Terms & Conditions', 'terms..', 'conditions..', '(This is only an example: To edit go to admin and Settings > Manage New Pages)\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiulus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.', 9, 'yes', '1,2', 'no', ''),
	(3, 'About Us', 'about..', 'us..', '(This is only an example: To edit go to admin and Settings > Manage New Pages)\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiulus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.', 1, 'yes', '1,2', 'no', 'example.tpl.php'),
	(4, 'Shipping & Returns', 'shipping..', 'returns..', '(This is only an example: To edit go to admin and Settings > Manage New Pages)\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiulus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.', 10, 'yes', '1,2', 'no', ''),
	(1, 'Contact Us', 'contact', 'us', 'If you would like to contact us, please use the form below', 2, 'yes', '1,2', 'no', ''),
	(5, 'Payment Information', 'shipping..', 'returns..', '(This is only an example: To edit go to admin and Settings > Manage New Pages)\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiulus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.', 7, 'yes', '3', 'no', ''),
	(6, 'Corporate Information', 'shipping..', 'returns..', '(This is only an example: To edit go to admin and Settings > Manage New Pages)\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiulus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.', 5, 'yes', '3', 'no', ''),
	(7, 'Privacy & Security', 'shipping..', 'returns..', '(This is only an example: To edit go to admin and Settings > Manage New Pages)\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiulus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.', 8, 'yes', '3', 'no', ''),
	(8, 'Careers', 'shipping..', 'returns..', '(This is only an example: To edit go to admin and Settings > Manage New Pages)\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiulus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.', 4, 'yes', '3', 'no', ''),
	(9, 'Order Tracking', 'shipping..', 'returns..', '(This is only an example: To edit go to admin and Settings > Manage New Pages)\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiulus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.', 6, 'yes', '3', 'no', ''),
	(10, 'Warranty/Product Care', 'shipping..', 'returns..', '(This is only an example: To edit go to admin and Settings > Manage New Pages)\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiulus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.', 11, 'yes', '3', 'no', ''),
	(11, 'F.A.Q', 'shipping..', 'returns..', '(This is only an example: To edit go to admin and Settings > Manage New Pages)\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiulus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.\r\n\r\nLorem ipsum dolor sit amet consectetuer pede et commodo ridiculus tempus. Suscipit tincidunt adipiscing Pellentesque porta enim porta laoreet interdum Morbi lacus. Curabitur at Pellentesque ac et cursus et accumsan ante orci semper. Penatibus egestas sit vitae ut ipsum nibh dolor Nunc Cum quam. Leo tellus vitae in mi sodales Aenean consequat turpis tempus Aenean. Consectetuer natoque pede tristique dis Pellentesque neque lacinia.', 3, 'yes', '2', 'no', '');

DROP TABLE IF EXISTS `mc_newsletter`;
CREATE TABLE IF NOT EXISTS `mc_newsletter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emailAddress` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  INDEX `mail_index` (`emailAddress`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_paymentmethods`;
CREATE TABLE IF NOT EXISTS `mc_paymentmethods` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `enablePP` enum('yes','no') NOT NULL DEFAULT 'no',
  `enablePhone` enum('yes','no') NOT NULL DEFAULT 'no',
  `enableCheque` enum('yes','no') NOT NULL DEFAULT 'no',
  `enableCash` enum('yes','no') NOT NULL DEFAULT 'no',
  `enableBank` enum('yes','no') NOT NULL DEFAULT 'no',
  `enableTwoCheckout` enum('yes','no') NOT NULL DEFAULT 'no',
  `enableGoogleCheckout` enum('yes','no') NOT NULL DEFAULT 'no',
  `enableAlertPay` enum('yes','no') NOT NULL DEFAULT 'no',
  `enableMoneyBookers` enum('yes','no') NOT NULL DEFAULT 'no',
  `ppEmail` varchar(250) NOT NULL DEFAULT '',
  `ppPageStyle` varchar(250) NOT NULL DEFAULT '',
  `ppLiveUrl` varchar(250) NOT NULL DEFAULT '',
  `ppSandUrl` varchar(250) NOT NULL DEFAULT '',
  `ppLocale` varchar(250) NOT NULL DEFAULT '',
  `phone_html`  text DEFAULT NULL,
  `phone_plain`  text DEFAULT NULL,
  `cheque_html`  text DEFAULT NULL,
  `cheque_plain`  text DEFAULT NULL,
  `cash_html`  text DEFAULT NULL,
  `cash_plain`  text DEFAULT NULL,
  `bank_html`  text DEFAULT NULL,
  `bank_plain`  text DEFAULT NULL,
  `twoCheckoutAccNumber` varchar(100) NOT NULL DEFAULT '',
  `twoCheckoutSecretWord` varchar(100) NOT NULL DEFAULT '',
  `twocheckout_info`  text DEFAULT NULL,
  `twoCheckUrl` varchar(250) NOT NULL DEFAULT '',
  `googleMerchantID` varchar(250) NOT NULL DEFAULT '',
  `googleMerchantKey` varchar(250) NOT NULL DEFAULT '',
  `googleLiveUrl` varchar(250) NOT NULL DEFAULT '',
  `googleSandUrl` varchar(250) NOT NULL DEFAULT '',
  `paypal_info`  text DEFAULT NULL,
  `apEmail` varchar(250) NOT NULL DEFAULT '',
  `apIPNCode` varchar(30) NOT NULL DEFAULT '',
  `apPaymentUrl` varchar(250) NOT NULL DEFAULT '',
  `mbPaymentUrl` varchar(250) NOT NULL DEFAULT '',
  `mbEmail` varchar(250) NOT NULL DEFAULT '',
  `mbLanguage` char(2) NOT NULL DEFAULT 'EN',
  `mbLogo` varchar(240) NOT NULL DEFAULT '',
  `mbSecretWord` varchar(250) NOT NULL DEFAULT '',
  `google_info`  text DEFAULT NULL,
  `alertpay_info`  text DEFAULT NULL,
  `moneybookers_info`  text DEFAULT NULL,
  `phone_info`  text DEFAULT NULL,
  `cheque_info`  text DEFAULT NULL,
  `cash_info`  text DEFAULT NULL,
  `bank_info`  text DEFAULT NULL,
  `redirectPaypal` text default null,
  `redirectPhone` text default null,
  `redirectCheque` text default null,
  `redirectCash` text default null,
  `redirectBank` text default null,
  `redirectTwoCheckout` text default null,
  `redirectGoogleCheckout` text default null,
  `redirectAlertPay` text default null,
  `redirectMoneyBookers` text default null,
  PRIMARY KEY (`id`)
) TYPE = MyISAM;

INSERT INTO `mc_paymentmethods` (`id`, `enablePP`, `enablePhone`, `enableCheque`, `enableCash`, `enableBank`, `enableTwoCheckout`, `enableGoogleCheckout`, `enableAlertPay`, `enableMoneyBookers`, `ppEmail`, `ppPageStyle`, `ppLiveUrl`, `ppSandUrl`, `ppLocale`, `phone_html`, `phone_plain`, `cheque_html`, `cheque_plain`, `cash_html`, `cash_plain`, `bank_html`, `bank_plain`, `twoCheckoutAccNumber`, `twoCheckoutSecretWord`, `twocheckout_info`, `twoCheckUrl`, `googleMerchantID`, `googleMerchantKey`, `googleLiveUrl`, `googleSandUrl`, `paypal_info`, `apEmail`, `apIPNCode`, `apPaymentUrl`, `mbPaymentUrl`, `mbEmail`, `mbLanguage`, `mbLogo`, `mbSecretWord`, `google_info`, `alertpay_info`, `moneybookers_info`, `phone_info`, `cheque_info`, `cash_info`, `bank_info`) VALUES
	(1, 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'no', 'no', '', '', 'https://www.paypal.com/cgi-bin/webscr?', 'https://www.sandbox.paypal.com/cgi-bin/webscr?', '', 
  'Call us on\r\n01234 56789\r\n\r\n(This is only an example: To edit go to admin and Catalogue > Payment Methods)0', 'Call us on\r\n\r\n01234 567890\r\n\r\n(This is only an example: To edit go to admin and Catalogue > Payment Methods)', 'Send cheques to:\r\n\r\nCompany info..', 'Cheques payable to:\r\n\r\nOur Company\r\n\r\n(This is only an example: To edit go to admin and Catalogue > Payment Methods)', 
  'Our drivers name is\r\n\r\nJim\r\n\r\n(This is only an example: To edit go to admin and Catalogue > Payment Methods)', 'Our driver is\r\n\r\nJim\r\n\r\n(This is only an example: To edit go to admin and Catalogue > Payment Methods)', 'Transfer to bank.\r\n\r\n(This is only an example: To edit go to admin and Catalogue > Payment Methods)', 'Transfer via email\r\n\r\n(This is only an example: To edit go to admin and Catalogue > Payment Methods)', '', '', 
  '(This is only an example: To edit go to admin and Catalogue > Payment Methods)\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.', 
  'https://www.2checkout.com/checkout/purchase', '', '', 'https://checkout.google.com/api/checkout/v2/checkoutForm/Merchant/', 
  'https://sandbox.google.com/checkout/api/checkout/v2/checkoutForm/Merchant/', 
  '(This is only an example: To edit go to admin and Catalogue > Payment Methods)\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.', '', '', 
  'https://www.alertpay.com/PayProcess.aspx', 'https://www.moneybookers.com/app/payment.pl', '', 'EN', 'https://', '', 
  '(This is only an example: To edit go to admin and Catalogue > Payment Methods)\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.', 
  '(This is only an example: To edit go to admin and Catalogue > Payment Methods)\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.', '', 
  '(This is only an example: To edit go to admin and Catalogue > Payment Methods)\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.', 
  '(This is only an example: To edit go to admin and Catalogue > Payment Methods)\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.', 
  '(This is only an example: To edit go to admin and Catalogue > Payment Methods)\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.', 
  '(This is only an example: To edit go to admin and Catalogue > Payment Methods)\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.\r\n\r\nLorem ipsum dolor sit amet consectetuer Ut dapibus dui malesuada urna. Adipiscing congue Vestibulum libero ipsum pretium convallis ligula ac Nullam Phasellus. Felis parturient ante In Curabitur eros interdum ut et turpis orci. Et dui magna adipiscing tristique ipsum aliquet adipiscing malesuada Nulla congue. Nec vel condimentum ut Pellentesque platea eleifend massa Sed sed justo. Dui Aliquam tellus sodales massa ipsum metus Vestibulum Maecenas at malesuada. Sit.'
);

DROP TABLE IF EXISTS `mc_paystatuses`;
CREATE TABLE IF NOT EXISTS `mc_paystatuses` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `statname` varchar(200) NOT NULL DEFAULT '',
  `pMethod` varchar(15) NOT NULL DEFAULT 'all',
  PRIMARY KEY (`id`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_percent`;
CREATE TABLE `mc_percent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inZone` int(8) not null default '0',
  `priceFrom` varchar(30) NOT NULL DEFAULT '',
  `priceTo` varchar(30) NOT NULL DEFAULT '',
  `percentage` varchar(30) NOT NULL DEFAULT '',
  `enabled` enum('yes','no') not null default 'yes',
PRIMARY KEY(`id`),
INDEX `zone_index` (`inZone`),
INDEX `from_index` (`priceFrom`),
INDEX `to_index` (`priceTo`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_personalisation`;
CREATE TABLE IF NOT EXISTS `mc_personalisation` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `productID` int(10) NOT NULL DEFAULT '0',
  `persInstructions`  text DEFAULT NULL,
  `persOptions`  text DEFAULT NULL,
  `maxChars` int(5) NOT NULL DEFAULT '0',
  `persAddCost` varchar(50) NOT NULL DEFAULT '',
  `enabled` enum('yes','no') NOT NULL DEFAULT 'no',
  `boxType` enum('input','textarea') NOT NULL DEFAULT 'input',
  `reqField` enum('yes','no') NOT NULL DEFAULT 'no',
  `orderBy` int(7) not null default '0',
  PRIMARY KEY (`id`),
  INDEX `prodid_index` (`productID`),
  INDEX `cost_index` (`persAddCost`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_pictures`;
CREATE TABLE IF NOT EXISTS `mc_pictures` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(7) NOT NULL DEFAULT '0',
  `picture_path` varchar(250) NOT NULL DEFAULT '',
  `thumb_path` varchar(250) NOT NULL DEFAULT '',
  `folder` varchar(250) NOT NULL DEFAULT '',
  `dimensions` varchar(12) NOT NULL DEFAULT '',
  `displayImg` enum('yes','no') NOT NULL DEFAULT 'no',
  `remoteServer` enum('yes','no') not null default 'no',
  `remoteImg` text default null,
  `remoteThumb` text default null,
  PRIMARY KEY (`id`),
  INDEX `prodid_index` (`product_id`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_price_points`;
CREATE TABLE IF NOT EXISTS `mc_price_points` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `priceFrom` varchar(30) NOT NULL DEFAULT '',
  `priceTo` varchar(30) NOT NULL DEFAULT '',
  `priceText` varchar(200) NOT NULL DEFAULT '',
  `orderBy` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_products`;
CREATE TABLE IF NOT EXISTS `mc_products` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `pName` varchar(250) NOT NULL DEFAULT '',
  `pTitle` varchar(250) not null default '',
  `pBrands` varchar(250) NOT NULL DEFAULT '',
  `pMetaKeys`  text DEFAULT NULL,
  `pMetaDesc`  text DEFAULT NULL,
  `pTags`  text DEFAULT NULL,
  `pDescription`  text DEFAULT NULL,
  `pShortDescription` text default null,
  `pDownload` enum('yes','no') NOT NULL DEFAULT 'no',
  `pDownloadPath` varchar(250) NOT NULL DEFAULT '',
  `pDownloadLimit` int(7) NOT NULL DEFAULT '0',
  `pCode` varchar(250) NOT NULL DEFAULT '',
  `pStockNotify` int(7) NOT NULL DEFAULT '0',
  `pStock` int(7) NOT NULL DEFAULT '0',
  `pEnable` enum('yes','no') NOT NULL DEFAULT 'yes',
  `pDateAdded` date NOT NULL DEFAULT '0000-00-00',
  `pVisits` int(10) unsigned NOT NULL DEFAULT '0',
  `pVideo` varchar(250) NOT NULL DEFAULT '',
  `pWeight` varchar(50) NOT NULL DEFAULT '0',
  `pPrice` varchar(20) NOT NULL DEFAULT '0',
  `pInsurance` varchar(20) not null default '0',
  `pOfferExpiry` date NOT NULL DEFAULT '0000-00-00',
  `pOffer` varchar(20) NOT NULL DEFAULT '',
  `rssBuildDate` varchar(35) NOT NULL DEFAULT '',
  `enDisqus` enum('yes','no') NOT NULL DEFAULT 'no',
  `freeShipping` enum('yes','no') NOT NULL DEFAULT 'no',
  `pPurchase` enum ('yes','no') not null default 'yes',
  `minPurchaseQty` int(10) not null default '0',
  `countryRestrictions` text default null,
  `checkoutTextDisplay` varchar(100) not null default '',
  PRIMARY KEY (`id`),
  INDEX `name_index` (`pName`),
  INDEX `enable_index` (`pEnable`),
  INDEX `weight_index` (`pWeight`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_prod_category`;
CREATE TABLE IF NOT EXISTS `mc_prod_category` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `product` int(8) NOT NULL DEFAULT '0',
  `category` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `product_index` (`product`),
  INDEX `cat_index` (`category`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_prod_relation`;
CREATE TABLE IF NOT EXISTS `mc_prod_relation` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `product` int(8) NOT NULL DEFAULT '0',
  `related` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `product_index` (`product`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_purchases`;
CREATE TABLE IF NOT EXISTS `mc_purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchaseDate` date NOT NULL DEFAULT '0000-00-00',
  `purchaseTime` TIME NOT NULL DEFAULT '00:00:00',
  `saleID` int(11) NOT NULL DEFAULT '0',
  `productType` enum('download','physical') NOT NULL DEFAULT 'physical',
  `productID` int(7) NOT NULL DEFAULT '0',
  `categoryID` int(8) NOT NULL DEFAULT '0',
  `salePrice` varchar(20) NOT NULL DEFAULT '0',
  `persPrice` varchar(20) NOT NULL DEFAULT '0',
  `attrPrice` varchar(20) not null default '0',
  `insPrice` varchar(20) not null default '0',
  `globalDiscount` int(3) not null default '0',
  `globalCost` varchar(20) not null default '0',
  `productQty` int(5) NOT NULL DEFAULT '0',
  `productWeight` varchar(20) NOT NULL DEFAULT '0',
  `liveDownload` enum('yes','no') NOT NULL DEFAULT 'no',
  `downloadAmount` int(7) NOT NULL DEFAULT '0',
  `downloadCode` char(50) NOT NULL DEFAULT '',
  `buyCode` varchar(50) NOT NULL DEFAULT '',
  `saleConfirmation` enum('yes','no') NOT NULL DEFAULT 'no',
  `deletedProductName` varchar(250) NOT NULL DEFAULT '',
  `freeShipping` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  INDEX `saleid_index` (`saleID`),
  INDEX `product_index` (`productID`),
  INDEX `category_index` (`categoryID`),
  INDEX `qty_index` (`productQty`),
  INDEX `conf_index` (`saleConfirmation`),
  INDEX `date_index` (`purchaseDate`),
  INDEX `time_index` (`purchaseTime`),
  INDEX `type_index` (`productType`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_purch_atts`;
CREATE TABLE `mc_purch_atts` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `saleID` INT(11) NOT NULL DEFAULT '0',
  `productID` INT(11) NOT NULL DEFAULT '0',
  `purchaseID` INT(11) NOT NULL DEFAULT '0',
  `attributeID` INT(7) NOT NULL DEFAULT '0',
  `addCost` VARCHAR(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  INDEX `saleid_index` (`saleID`),
  INDEX `prodid_index` (`productID`),
  INDEX `purid_index` (`purchaseID`),
  INDEX `attid_index` (`attributeID`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_purch_pers`;
CREATE TABLE IF NOT EXISTS `mc_purch_pers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `saleID` int(11) NOT NULL DEFAULT '0',
  `productID` int(11) NOT NULL DEFAULT '0',
  `purchaseID` int(11) NOT NULL DEFAULT '0',
  `personalisationID` int(7) NOT NULL DEFAULT '0',
  `visitorData`  text DEFAULT NULL,
  `addCost` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  INDEX `saleid_index` (`saleID`),
  INDEX `product_index` (`productID`),
  INDEX `purchase_index` (`purchaseID`),
  INDEX `pers_index` (`personalisationID`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_rates`;
CREATE TABLE IF NOT EXISTS `mc_rates` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `rWeightFrom` varchar(50) NOT NULL DEFAULT '0',
  `rWeightTo` varchar(50) NOT NULL DEFAULT '0',
  `rCost` varchar(20) NOT NULL DEFAULT '',
  `rService` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `service_index` (`rService`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_sales`;
CREATE TABLE IF NOT EXISTS `mc_sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoiceNo` varchar(100) NOT NULL DEFAULT '',
  `saleNotes`  text DEFAULT NULL,
  `saleBuyerName` varchar(150) NOT NULL DEFAULT '',
  `buyerAddress`  text DEFAULT NULL,
  `buyerEmail` varchar(127) NOT NULL DEFAULT '',
  `phoneNo` varchar(100) NOT NULL DEFAULT '',
  `paymentStatus` varchar(20) NOT NULL DEFAULT '',
  `gatewayID` varchar(100) NOT NULL DEFAULT '',
  `taxPaid` varchar(20) NOT NULL DEFAULT '',
  `taxRate` varchar(5) NOT NULL DEFAULT '',
  `couponCode` varchar(200) NOT NULL DEFAULT '',
  `couponTotal` varchar(100) NOT NULL DEFAULT '',
  `subTotal` varchar(20) NOT NULL DEFAULT '',
  `grandTotal` varchar(20) NOT NULL DEFAULT '',
  `shipTotal` varchar(20) NOT NULL DEFAULT '',
  `globalTotal` varchar(20) NOT NULL DEFAULT '0',
  `insuranceTotal` varchar(20) not null default '0',
  `globalDiscount` int(5) NOT NULL DEFAULT '0',
  `manualDiscount` varchar(20) NOT NULL DEFAULT '',
  `isPickup` enum('yes','no') NOT NULL DEFAULT 'no',
  `shipSetCountry` int(7) NOT NULL DEFAULT '0',
  `shipSetArea` int(7) NOT NULL DEFAULT '0',
  `setShipRateID` int(7) NOT NULL DEFAULT '0',
  `shipType` varchar(20) not null default 'weight',
  `cartWeight` varchar(20) NOT NULL DEFAULT '',
  `purchaseDate` date NOT NULL DEFAULT '0000-00-00',
  `purchaseTime` TIME NOT NULL DEFAULT '00:00:00',
  `buyCode` varchar(50) NOT NULL DEFAULT '',
  `saleConfirmation` enum('yes','no') NOT NULL DEFAULT 'no',
  `paymentMethod` varchar(20) NOT NULL DEFAULT '',
  `ipAddress`  text DEFAULT NULL,
  `orderCopyEmails` text,
  `zipLimit` int(5) NOT NULL DEFAULT '0',
  `downloadLock` enum('yes','no') NOT NULL DEFAULT 'no',
  `optInNewsletter` enum('yes','no') not null default 'no',
  `paypalErrorTrigger` tinyint(1) not null default '0',
  PRIMARY KEY (`id`),
  INDEX `invoice_index` (`invoiceNo`),
  INDEX `name_index` (`saleBuyerName`),
  INDEX `email_index` (`buyerEmail`),
  INDEX `weight_index` (`cartWeight`),
  INDEX `confirm_index` (`saleConfirmation`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_search_index`;
CREATE TABLE IF NOT EXISTS `mc_search_index` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `searchCode` varchar(50) NOT NULL DEFAULT '',
  `results`  text DEFAULT NULL,
  `searchDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  INDEX `code_index` (`searchCode`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_search_log`;
CREATE TABLE IF NOT EXISTS `mc_search_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyword`  text DEFAULT NULL,
  `results` int(7) NOT NULL DEFAULT '0',
  `searchDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_services`;
CREATE TABLE IF NOT EXISTS `mc_services` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `sName` varchar(250) NOT NULL DEFAULT '0',
  `sEstimation` varchar(250) NOT NULL DEFAULT '0',
  `sSignature` enum('yes','no') NOT NULL DEFAULT 'yes',
  `inZone` int(6) NOT NULL DEFAULT '0',
  `enableCOD` enum('yes','no') not null default 'yes',
  PRIMARY KEY (`id`),
  INDEX `zone_index` (`inZone`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_settings`;
CREATE TABLE IF NOT EXISTS `mc_settings` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `website` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `addEmails`  text DEFAULT NULL,
  `serverPath` varchar(250) NOT NULL DEFAULT '',
  `languagePref` varchar(40) NOT NULL DEFAULT 'english.php',
  `logoName` varchar(50) NOT NULL DEFAULT '',
  `addThisModule`  text DEFAULT NULL,
  `baseCurrency` char(3) NOT NULL DEFAULT 'GBP',
  `logErrors` enum('yes','no') NOT NULL DEFAULT 'no',
  `gatewayMode` enum('test','live') NOT NULL DEFAULT 'test',
  `enableSSL` enum('yes','no') NOT NULL DEFAULT 'no',
  `enablePickUp` enum('yes','no') NOT NULL DEFAULT 'no',
  `shipCountry` varchar(10) NOT NULL DEFAULT '',
  `logFolderName` varchar(50) NOT NULL DEFAULT 'logs',
  `ifolder` varchar(250) NOT NULL DEFAULT '',
  `metaKeys`  text DEFAULT NULL,
  `metaDesc`  text DEFAULT NULL,
  `enableCart` enum('yes','no') NOT NULL DEFAULT 'yes',
  `offlineDate` date NOT NULL DEFAULT '0000-00-00',
  `offlineText`  text DEFAULT NULL,
  `en_rss` enum('yes','no') NOT NULL DEFAULT 'yes',
  `en_modr` enum('yes','no') NOT NULL DEFAULT 'no',
  `cName` varchar(250) NOT NULL DEFAULT '',
  `cWebsite` varchar(250) NOT NULL DEFAULT '',
  `cTel` varchar(250) NOT NULL DEFAULT '',
  `cFax` varchar(250) NOT NULL DEFAULT '',
  `cAddress`  text DEFAULT NULL,
  `cOther`  text DEFAULT NULL,
  `smtp` enum('yes','no') NOT NULL DEFAULT 'no',
  `smtp_host` varchar(100) NOT NULL DEFAULT 'localhost',
  `smtp_user` varchar(100) NOT NULL DEFAULT '',
  `smtp_pass` varchar(100) NOT NULL DEFAULT '',
  `smtp_port` varchar(100) NOT NULL DEFAULT '25',
  `homeProdValue` int(3) NOT NULL DEFAULT '0',
  `homeProdType` varchar(10) NOT NULL DEFAULT 'latest',
  `homeProdCats`  text DEFAULT NULL,
  `homeProdIDs`  text DEFAULT NULL,
  `adminFooter`  text DEFAULT NULL,
  `publicFooter`  text DEFAULT NULL,
  `prodKey` char(60) NOT NULL DEFAULT '',
  `encoderVersion` varchar(5) NOT NULL DEFAULT '',
  `activateEmails` enum('yes','no') NOT NULL DEFAULT 'no',
  `saleComparisonItems` int(6) NOT NULL DEFAULT '0',
  `productsPerPage` int(4) NOT NULL DEFAULT '35',
  `mostPopProducts` int(5) NOT NULL DEFAULT '0',
  `mostPopPref` enum('sales','hits') not null default 'sales',
  `latestProdLimit` int(5) NOT NULL DEFAULT '0',
  `latestProdDuration` enum('days','months','years') NOT NULL DEFAULT 'days',
  `searchLowStockLimit` int(5) NOT NULL DEFAULT '1',
  `flashVideoWidth` int(4) NOT NULL DEFAULT '0',
  `flashVideoHeight` int(4) NOT NULL DEFAULT '0',
  `isoCurrencyPosition` enum('before','after') NOT NULL DEFAULT 'before',
  `jsDateFormat` varchar(10) NOT NULL DEFAULT 'DD-MM-YYYY',
  `jsWeekStart` tinyint(1) NOT NULL DEFAULT '0',
  `helpTips` enum('yes','no') NOT NULL DEFAULT 'yes',
  `serverTimeAdjustment` varchar(10) NOT NULL DEFAULT '+0 hours',
  `mysqlDateFormat` varchar(10) NOT NULL DEFAULT '',
  `systemDateFormat` varchar(30) NOT NULL DEFAULT 'j F Y',
  `rssFeedLimit` int(3) NOT NULL DEFAULT '50',
  `minInvoiceDigits` tinyint(2) NOT NULL DEFAULT '5',
  `pendingAsComplete` enum('yes','no') NOT NULL DEFAULT 'no',
  `freeShipThreshold` varchar(10) NOT NULL DEFAULT '',
  `enableZip` enum('yes','no') NOT NULL DEFAULT 'no',
  `zipCreationLimit` varchar(100) NOT NULL DEFAULT '0',
  `zipLimit` int(3) NOT NULL DEFAULT '0',
  `zipTimeOut` int(6) NOT NULL DEFAULT '0',
  `zipMemoryLimit` int(5) NOT NULL DEFAULT '0',
  `zipAdditionalFolder` varchar(50) NOT NULL DEFAULT 'additional-zip',
  `enEntryLog` enum('yes','no') NOT NULL DEFAULT 'no',
  `enSearchLog` enum('yes','no') NOT NULL DEFAULT 'no',
  `softwareVersion` varchar(10) NOT NULL DEFAULT '',
  `smartQuotes` enum('yes','no') NOT NULL DEFAULT 'yes',
  `hitCounter` enum('yes','no') NOT NULL DEFAULT 'yes',
  `menuSubCats` enum('yes','no') NOT NULL DEFAULT 'yes',
  `adminFolderName` varchar(100) NOT NULL DEFAULT 'admin',
  `facebookLink` varchar(250) NOT NULL DEFAULT '',
  `twitterLink` varchar(250) NOT NULL DEFAULT '',
  `globalDiscount` varchar(20) NOT NULL DEFAULT '0',
  `globalDiscountExpiry` date NOT NULL DEFAULT '0000-00-00',
  `enableRecentView` enum('yes','no') NOT NULL DEFAULT 'yes',
  `savedSearches` int(6) NOT NULL DEFAULT '7',
  `disqusShortName` varchar(250) NOT NULL DEFAULT '',
  `disqusDevMode` enum('yes','no') NOT NULL DEFAULT 'yes',
  `freeDownloadRestriction` varchar(10) NOT NULL DEFAULT '0',
  `thumbWidth` int(4) NOT NULL DEFAULT '230',
  `thumbHeight` int(4) NOT NULL DEFAULT '200',
  `thumbQuality` int(3) NOT NULL DEFAULT '99',
  `thumbQualityPNG` tinyint(1) not null default '9',
  `showOutofStock` ENUM('cat','yes','no') NOT NULL DEFAULT 'yes',
	 `enableCheckout` ENUM('yes','no') NOT NULL DEFAULT 'yes',
	 `globalDownloadPath` VARCHAR(250) NOT NULL DEFAULT '',
  `downloadFolder` varchar(100) not null default 'product-downloads',
	 `optInNewsletter` ENUM('yes','no') NOT NULL DEFAULT 'yes',
	 `maxProductChars` INT(8) NOT NULL DEFAULT '300',
  `reduceDownloadStock` enum('yes','no') not null default 'no',
  `enableBBCode` enum('yes','no') not null default 'yes',
  `contactDisplay` varchar(250) not null default '',
  `leftBoxOrder` varchar(250) not null default '',
  `parentCatHomeDisplay` enum('yes','no') not null default 'no',
  `isbnAPI` varchar(50) not null default '',
  `freeLogging` enum('yes','no') not null default 'yes',
  `offerInsurance` enum('yes','no') not null default 'no',
  `insuranceAmount` varchar(10) not null default '',
  `insuranceFilter` char(3) not null default '',
  `excludeFreePop` enum('yes','no') not null default 'no',
  `freeTextDisplay` varchar(10) not null default 'FREE',
  `priceTextDisplay` varchar(100) not null default '',
  `en_sitemap` enum('yes','no') not null default 'yes',
  `sitemapPref` enum('list','cat') not null default 'list',
  PRIMARY KEY (`id`)
) TYPE = MyISAM;

INSERT INTO `mc_settings` (`id`, `website`, `email`, `addEmails`, `serverPath`, `languagePref`, `logoName`, `addThisModule`, `baseCurrency`, `logErrors`, 
`gatewayMode`, `enableSSL`, `enablePickUp`, `shipCountry`, `logFolderName`, `ifolder`, `metaKeys`, `metaDesc`, `enableCart`, `offlineDate`, `offlineText`, 
`en_rss`, `en_modr`, `cName`, `cWebsite`, `cTel`, `cFax`, `cAddress`, `cOther`, `smtp`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `homeProdValue`, 
`homeProdType`, `homeProdCats`, `homeProdIDs`, `adminFooter`, `publicFooter`, `prodKey`, `encoderVersion`, `activateEmails`, `saleComparisonItems`, 
`productsPerPage`, `mostPopProducts`, `latestProdLimit`, `latestProdDuration`, `searchLowStockLimit`, `flashVideoWidth`, `flashVideoHeight`, `isoCurrencyPosition`, 
`jsDateFormat`, `jsWeekStart`, `helpTips`, `serverTimeAdjustment`, `mysqlDateFormat`, `systemDateFormat`, `rssFeedLimit`, `minInvoiceDigits`, `pendingAsComplete`, 
`freeShipThreshold`, `enableZip`, `zipCreationLimit`, `zipLimit`, `zipTimeOut`, `zipMemoryLimit`, `zipAdditionalFolder`, `enEntryLog`, `enSearchLog`, `softwareVersion`, 
`smartQuotes`, `hitCounter`, `menuSubCats`, `adminFolderName`, `facebookLink`, `twitterLink`, `globalDiscount`, `globalDiscountExpiry`, `enableRecentView`, 
`savedSearches`, `disqusShortName`, `disqusDevMode`, `freeDownloadRestriction`, `thumbWidth`, `thumbHeight`, `thumbQuality`,`thumbQualityPNG`,`showOutofStock`,`enableCheckout`,
`globalDownloadPath`,`downloadFolder`,`optInNewsletter`,`maxProductChars`,`reduceDownloadStock`,`enableBBCode`,`contactDisplay`,`leftBoxOrder`,`parentCatHomeDisplay`,
`isbnAPI`,`freeLogging`
) VALUES (
1, 'My Store', '', '', '', 'english', '', '', 'GBP', 'yes', 'test', 'no', 'yes', '183', 'logs', '', 'Keys..', 'Desc..', 'yes', '0000-00-00', '', 'yes', 'no', 
'My Company', '', '01234 456789', '01345 567778', '1 Some Street\r\nSomeplace\r\nSomewhere\r\nWS11 1AB', '', 'no', '', '', '', '25', 10, 'random', '', '', '', 
'', '', '', 'yes', 10, 10, 10, 6, 'months', 5, 425, 300, 'before', 'DD/MM/YYYY', 0, 'yes', '+0 hours', '%e %b %Y', 'j F Y', 50, 5, 'no', '0.00', 'no', '1048576', 
2, 0, 0, 'additional-zip', 'yes', 'yes', '2.04', 'yes', 'yes', 'yes', 'admin', 'http://www.facebook.com', 'http://www.twitter.com', '0', '0000-00-00', 'yes', 7, 
'', 'no', '0', 230, 200, 96, 9, 'yes', 'yes', '', 'product-downloads', 'yes', 300, 'no', 'yes', '', '1-cat,3-points,4-popular,5-recent,6-links,2-brands', 'no', '', 'yes'
);

DROP TABLE IF EXISTS `mc_statuses`;
CREATE TABLE IF NOT EXISTS `mc_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `saleID` int(7) NOT NULL DEFAULT '0',
  `statusNotes`  text DEFAULT NULL,
  `dateAdded` date NOT NULL DEFAULT '0000-00-00',
  `timeAdded` time NOT NULL DEFAULT '00:00:00',
  `orderStatus` varchar(20) NOT NULL DEFAULT '',
  `adminUser` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  INDEX `saleid_index` (`saleID`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_status_text`;
CREATE TABLE IF NOT EXISTS `mc_status_text` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `statTitle` varchar(250) NOT NULL DEFAULT '',
  `statText`  text DEFAULT NULL,
  PRIMARY KEY (`id`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_users`;
CREATE TABLE IF NOT EXISTS `mc_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL DEFAULT '',
  `userPass` varchar(40) NOT NULL DEFAULT '',
  `userType` enum('admin','restricted') NOT NULL DEFAULT 'restricted',
  `userPriv` enum('yes','no') NOT NULL DEFAULT 'no',
  `accessPages` text default null,
  `enableUser` enum('yes','no') NOT NULL DEFAULT 'no',
  `lastLogin` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_zones`;
CREATE TABLE IF NOT EXISTS `mc_zones` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `zName` varchar(250) NOT NULL DEFAULT '',
  `zCountry` int(5) NOT NULL DEFAULT '0',
  `zRate` varchar(10) NOT NULL DEFAULT '',
  `zShipping` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  INDEX `country_index` (`zCountry`)
) TYPE = MyISAM;

DROP TABLE IF EXISTS `mc_zone_areas`;
CREATE TABLE IF NOT EXISTS `mc_zone_areas` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `inZone` int(5) NOT NULL DEFAULT '0',
  `areaName` varchar(200) NOT NULL DEFAULT '',
  `zCountry` int(5) NOT NULL DEFAULT '0',
  `zRate` varchar(10) NOT NULL DEFAULT '',
  `zShipping` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  INDEX `zone_index` (`inZone`),
  INDEX `country_index` (`zCountry`)
) TYPE = MyISAM;
