
CREATE TABLE `user_role_linker` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_role_linker_fk1_idx` (`user_id`),
  CONSTRAINT `user_role_linker_fk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
