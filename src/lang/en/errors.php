<?php

return [
    'email' => 'Field must be a valid email address',
    'empty' => 'Required field',
    'exist' => 'Field value is invalid',
    'login' => 'Incorrect password or email entered, please try again',
    'unique' => 'Is already in use',
    'max' => [
        'line' => 'The field must be no more than :max characters',
    ],
    'min' => [
        'line' => 'The field must not be less than :min characters',
    ],
    'types' => [
        'string' => 'Field must be a string',
        'int' => 'Field must be an integer value',
        'date' => 'Field must be a date',
    ],
    'status' => [
        '400' => 'Bad Request',
        '401' => 'Unauthorized',
        '403' => 'Forbidden',
        '404' => 'Nothing found. Please check the correctness of the entered data',
        '405' => 'Method Not Allowed',
        '408' => 'Request Timeout',
        '429' => 'Too Many Requests',
        '500' => 'Internal Server Error',
        '503' => 'Service Unavailable',
    ],
];
