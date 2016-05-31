create or replace TRIGGER DELETE_RESERVA
BEFORE DELETE ON RESERVA
FOR EACH ROW
BEGIN
  INSERT INTO LOG_DELETE(DELETE_VALUES, TYPE, INSERT_AT)VALUES(''||
  :old.ID||','||
  :old.NOMBRE||','||
  :old.CONCEPTO||','||
  :old.FECHA||','||
  :old.VALOR||','||
  :old.LUGAR||','||
  :old.GRUPO_ID||','||
  :old.CREATED_AT||','||
  :old.UPDATED_AT, 'Reserva', SYSDATE);
END;
