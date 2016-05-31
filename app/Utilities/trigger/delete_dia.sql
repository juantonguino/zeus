create or replace TRIGGER DELETE_DIA
BEFORE DELETE ON DIA
FOR EACH ROW
BEGIN
  INSERT INTO LOG_DELETE(DELETE_VALUES, TYPE, INSERT_AT)VALUES(''||
  :old.ID||','||
  :old.DESTINO||','||
  :old.INSTRUCCIONES_RECORRIDO_GUIA||','||
  :old.RECORRIDO_PLAN||','||
  :old.FECHA||','||
  :old.TOTAL_GASTADO||','||
  :old.DINERO_ASIGNADO||','||
  :old.GRUPO_ID||','||
  :old.HOTEL_ID||','||
  :old.CREATED_AT||','||
  :old.UPDATED_AT, 'Dia', SYSDATE);
END;
