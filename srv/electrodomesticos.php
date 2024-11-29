<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ELECTRODOMESTICO.php"; // Cambia a la tabla ELECTRODOMESTICO

ejecutaServicio(function () {

    $lista = select(pdo: Bd::pdo(), from: ELECTRODOMESTICO, orderBy: E_NOMBRE);

    $render = "";
    foreach ($lista as $modelo) {
        $encodeId = urlencode($modelo[E_ID]);
        $id = htmlentities($encodeId);
        $nombre = htmlentities($modelo[E_NOMBRE]);
        $precio = htmlentities($modelo[PRECIO]);
        $color = htmlentities($modelo[COLOR]);
        $render .=
            "<li>
                <p>
                    <a href='modifica.html?id=$id'>$nombre</a><br>
                    Precio: $precio<br>
                    Color: $color
                </p>
            </li>";
    }

    devuelveJson(["lista" => ["innerHTML" => $render]]);
});
