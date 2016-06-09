CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_log_update`(old_valuesv varchar(500), new_valuesv varchar(500), typev varchar(40), user_namev varchar(100))
BEGIN
	insert into log_update(
		old_values,
        new_values,
        type,
        user_name,
        insert_at)values(
        old_valuesv,
        new_valuesv,
        typev,
        user_namev,
        curdate());
END
