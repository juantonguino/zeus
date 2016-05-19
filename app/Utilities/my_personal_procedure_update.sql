create or replace procedure insert_log_update(old_valuesv in varchar, new_valuesv in varchar, typev varchar, user_mailv in varchar)
is
begin
  INSERT INTO LOG_UPDATE(OLD_VALUES, NEW_VALUES, TYPE, USER_EMAIL, INSERT_AT) VALUES(old_valuesv, new_valuesv, typev, user_mailv, sysdate);
end;
