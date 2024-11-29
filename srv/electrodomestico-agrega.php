<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaPrecio.php"; // Agrega esta línea para validar el precio
require_once __DIR__ . "/../lib/php/validaColor.php";  // Agrega esta línea para validar el color
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ELECTRODOMESTICO.php";  // Cambia la tabla a ELECTRODOMESTICO

ejecutaServicio(function () {

    $nombre = recuperaTexto("nombre");
    $precio = recuperaTexto("precio");
    $color = recuperaTexto("color");

    $nombre = validaNombre($nombre);
    $precio = validaPrecio($precio); // Valida el precio con la nueva función
    $color = validaColor($color);    // Valida el color con la nueva función

    $pdo = Bd::pdo();
    insert(pdo: $pdo, into: ELECTRODOMESTICO, values: [
        E_NOMBRE => $nombre,
        PRECIO => $precio,
        COLOR => $color
    ]);
    $id = $pdo->lastInsertId();

    $encodeId = urlencode($id);
    devuelveCreated("/srv/electrodomestico.php?id=$encodeId", [
        "id" => ["value" => $id],
        "nombre" => ["value" => $nombre],
        "precio" => ["value" => $precio],
        "color" => ["value" => $color],
    ]);
});

