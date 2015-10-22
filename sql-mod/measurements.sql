

INSERT INTO `caredb`.`care_type_measurement` (`nr`, `type`, `name`, `LD_var`, `status`, `modify_id`, `modify_time`, `create_id`, `create_time`) 
VALUES (NULL, 'saturation', 'Saturation', 'LDSaturation', '', 'admin', CURRENT_TIMESTAMP, 'admin', '0000-00-00 00:00:00');


INSERT INTO  `caredb`.`care_unit_measurement` (
`nr` ,
`unit_type_nr` ,
`id` ,
`name` ,
`LD_var` ,
`sytem` ,
`use_frequency` ,
`status` ,
`modify_id` ,
`modify_time` ,
`create_id` ,
`create_time`
)
VALUES (
NULL ,  '8',  'percent (%)',  'percent',  'LDPercent',  'english', NULL ,  '',  '',  '2015-10-22 04:53:44',  '',  '0000-00-00 00:00:00'
);