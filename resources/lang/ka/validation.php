<?php

return [
    'required' => ":attribute აუცილებელია",

    'attributes' => [
        'username' => "სახელი",
        'email' => "ელფოსტა",
        'password' => "პაროლი"
    ],
    'custom' => [
        'username' => [
            'min' => ':attribute უნდა იყოს მინიმუმ 3 სიმბოლო',
            'unique' => ':attribute უკვე დაკავებულია'
        ],
        'email' => [
            'email' => 'ელფოსტა უნდა იყოს ვალიდური'
        ],
        'password' => [
            'confirmed' => "პაროლები ერთმანეთს არ ემთხვევა",
            'min' => ':attribute უნდა იყოს მინიმუმ 3 სიმბოლო',
        ]
    ],
];