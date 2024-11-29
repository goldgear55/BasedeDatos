<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   // Crear la tabla ELECTRODOMESTICO con la columna PRECIO

    self::$pdo->exec(

      "CREATE TABLE IF NOT EXISTS ELECTRODOMESTICO (
        E_ID INTEGER,
        E_NOMBRE TEXT NOT NULL,
        PRECIO DECIMAL(10, 2) NOT NULL,
        COLOR TEXT NOT NULL,
        CONSTRAINT E_PK
         PRIMARY KEY(E_ID),
        CONSTRAINT E_NOM_UNQ
         UNIQUE(E_NOMBRE),
        CONSTRAINT E_NOM_NV
         CHECK(LENGTH(E_NOMBRE) > 0),
        CONSTRAINT E_PRECIO_POS
         CHECK(PRECIO > 0),
        CONSTRAINT E_COLOR_NV
         CHECK(LENGTH(COLOR) > 0)
       )"
  
   );
  }

  return self::$pdo;
 }
}
