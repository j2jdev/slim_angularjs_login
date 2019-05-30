SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_users`;
CREATE TABLE `auth_users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` enum('admin','user') DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `status` enum('enabled','disabled') DEFAULT 'enabled',
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
