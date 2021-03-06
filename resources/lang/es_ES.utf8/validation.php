<?php

return [
  'phone'    => 'El móvil debe estar en formato internacional sin código de pais, sin espacios ni guiones: Ej. 1132125991',
  'required' => 'No completo un campo requirido.',
  'custom'   => [
    'name' => [
        'min' => 'Dinos tu nombre completo',
    ],
    'email' => [
        'email'    => 'Tu dirección de email sería algo como tunombre@ejemplo.com',
        'required' => 'Por favor ingresá tu email',
        'unique'   => '¡Parece que ya te registraste!',
    ],
    'password' => [
        'required'  => 'Ingresá tu contraseña',
        'confirmed' => 'La contraseña confirmada no coincide, ¡intentá de nuevo!',
        'min'       => 'La contraseña debe tener al menos :min caracteres',
    ],
  ],
];
