<?php

function validaColor($color) {
    // Verifica que el color no esté vacío y sea una cadena de texto
    if (empty($color) || !is_string($color)) {
        throw new InvalidArgumentException("El color debe ser un texto no vacío.");
    }
    // Opcional: Limpiar espacios en exceso
    return trim($color);
}
