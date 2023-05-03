<?php

return [
    'required' => ":attribute აუცილებელია",
    'email_not_found' => "მოცემული ელ-ფოსტით მომხარებელი არ მოიძებნება",
    'attributes' => [
        'username' => "სახელი",
        'email' => "ელფოსტა",
        'password' => "პაროლი",
        'login' => "სახელი"
    ],
    'custom' => [
        'login' => [
            'min' => ':attribute უნდა იყოს მინიმუმ 3 სიმბოლო',
            'unique' => ':attribute უკვე დაკავებულია'
        ],
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
