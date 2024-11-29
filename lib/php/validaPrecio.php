<?php

function validaPrecio($precio) {
    // Verifica que el precio sea numérico y positivo
    if (!is_numeric($precio) || $precio <= 0) {
        throw new InvalidArgumentException("El precio debe ser un número positivo.");
    }
    // Opcional: Formatear el precio con dos decimales
    return number_format((float)$precio, 2, '.', '');
}
