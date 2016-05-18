create or replace procedure insert_log_delete(user_emailv in varchar, delete_valuesv in varchar, typev in varchar)
is
begin
  insert into log_delete(USER_EMAIL, DELETE_VALUES, TYPE, INSERT_AT)values(user_emailv, delete_valuesv, typev, sysdate);
end;
