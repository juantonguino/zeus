create or replace TRIGGER DELETE_CLIENTE
BEFORE DELETE ON CLIENTE
FOR EACH ROW
BEGIN
  INSERT INTO LOG_DELETE(DELETE_VALUES, TYPE, INSERT_AT)VALUES(''||
  :old.ID||','||
  :old.TIPO_DOCUMENTO||','||
  :old.NUMERO_DOCUMENTO||','||
  :old.NOMBRES||','||
  :old.TELEFONO||','||
  :old.DIRECCION||','||
  :old.CORREO_ELECTRONICO||','||
  :old.FECHA_NACIMIENTO||','||
  :old.GRUPO_ID||','||
  :old.CREATED_AT||','||
  :old.UPDATED_AT, 'Cliente', SYSDATE);
END;
