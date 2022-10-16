CREATE TABLE IF NOT EXISTS `users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `password` VARCHAR(256) NOT NULL,
  `admin` TINYINT(1) DEFAULT("0"),
  PRIMARY KEY (`user_id`)
);

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `content` TEXT,
  PRIMARY KEY (`post_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`)
);