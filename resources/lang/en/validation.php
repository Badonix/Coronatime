<?php

return [
    'required' => "The :attribute field is required",

    'attributes' => [
        'username' => "Username",
        'email' => "Email",
        'password' => "Password"
    ],
    'custom' => [
        'username' => [
            'min' => ':attribute must be at least 3 symbols',
            'unique' => ':attribute is already taken'
        ],
        'email' => [
            'email' => 'Email must be valid'
        ],
        'password' => [
            'confirmed' => "Passwords do not match",
            'min' => ':attribute must be at least 3 symbols',
        ]
    ],
];