<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaPrecio.php";
require_once __DIR__ . "/../lib/php/validaColor.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ELECTRODOMESTICO.php"; // Cambia a la tabla ELECTRODOMESTICO

ejecutaServicio(function () {

    $id = recuperaIdEntero("id");
    $nombre = recuperaTexto("nombre");
    $precio = recuperaTexto("precio");
    $color = recuperaTexto("color");

    $nombre = validaNombre($nombre);
    $precio = validaPrecio($precio);
    $color = validaColor($color);

    update(
        pdo: Bd::pdo(),
        table: ELECTRODOMESTICO,
        set: [
            E_NOMBRE => $nombre,
            PRECIO => $precio,
            COLOR => $color
        ],
        where: [E_ID => $id]
    );

    devuelveJson([
        "id" => ["value" => $id],
        "nombre" => ["value" => $nombre],
        "precio" => ["value" => $precio],
        "color" => ["value" => $color],
    ]);
});
