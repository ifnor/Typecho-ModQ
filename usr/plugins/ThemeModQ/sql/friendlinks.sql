CREATE TABLE `typecho_ThemeQ_friendlink` (
  `id`                int(10) unsigned NOT NULL auto_increment,
  `createtime`        int(10)          default 0   ,
  `linkname`          varchar(255)     default ''  ,
  `linkUrl`           text(255)        default ''  ,
  `icoUrl`            varchar(255)     default ''  ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;