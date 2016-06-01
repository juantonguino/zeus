CREATE OR REPLACE TRIGGER DELETE_GUIA
BEFORE DELETE ON GUIA
FOR EACH ROW
BEGIN
  INSERT INTO LOG_DELETE(DELETE_VALUES, TYPE, INSERT_AT)VALUES(''||
  :old.ID||','||
  :old.CEDULA||','||
  :old.NOMBRES||','||
  :old.TELEFONO||','||
  :old.FECHA_NACIMIENTO||','||
  :old.DIRECCION||','||
  :old.PERFIL_ACADEMICO||','||
  :old.EMAIL||','||
  :old."password"||','||
  :old.CREATED_AT||','||
  :old.UPDATED_AT, 'Guia', SYSDATE);
END;
