ALTER TABLE  `care_users` CHANGE  `permission`  `role_id` INT( 10 ) NOT NULL ;

UPDATE  `caredb`.`care_users` SET  `role_id` =  '1' WHERE  `care_users`.`login_id` =  'israel';
