DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) unique,
  `distance` mediumint default NULL,
  `time` mediumint default NULL,
  `price` mediumint default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `companies` (`name`,`distance`,`time`,`price`)
VALUES
  ("Molestie Dapibus Ligula Consulting",154,2,160),
  ("Nullam Enim Corporation",299,2,176),
  ("Gravida Industries",354,2,291),
  ("Sed Diam Institute",346,5,370),
  ("Tincidunt Adipiscing Industries",383,3,411),
  ("Elementum Sem Vitae Incorporated",298,3,311),
  ("Quisque Porttitor Ltd",249,2,159),
  ("Augue Ac Ipsum LLP",226,4,39),
  ("Libero Et Incorporated",273,2,493),
  ("Nec Ante Ltd",210,3,346),
  ("Lacinia Orci LLC",270,2,402),
  ("Posuere Cubilia LLP",129,4,438),
  ("Velit Eu Institute",217,4,146),
  ("Odio Semper Cursus Incorporated",178,4,328),
  ("Lectus Convallis Incorporated",147,2,112),
  ("Mauris Magna Duis Corp.",170,3,419),
  ("Eget Magna Inc.",295,3,325),
  ("Eu Odio Tristique Industries",395,2,387),
  ("Turpis Vitae Industries",379,1,3),
  ("Dictum Magna LLP",199,2,139);
INSERT INTO `companies` (`name`,`distance`,`time`,`price`)
VALUES
  ("Ligula Industries",137,2,114),
  ("Magna Cras Convallis Inc.",117,3,164),
  ("Vivamus Inc.",127,2,416),
  ("Dictum Magna Consulting",103,2,41),
  ("Mi Limited",317,3,494),
  ("Ullamcorper Incorporated",381,3,194),
  ("Ut Pellentesque Foundation",287,3,179),
  ("Sem Elit Institute",214,2,416),
  ("Mollis Duis PC",105,3,134),
  ("Sed Eu Eros Consulting",232,3,180);
