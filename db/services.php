<?php
$functions = [
    'local_customquestionapi_get_questions' => [
        'classname'   => 'local_customquestionapi_external',
        'methodname'  => 'get_questions',
        'classpath'   => 'local/customquestionapi/externallib.php',
        'description' => 'Get list of questions for a specific course.',
        'type'        => 'read',
        'capabilities' => 'moodle/question:view',
        'ajax'        => false,
    ],
];

$services = [
    'Custom Question API' => [
        'functions' => ['local_customquestionapi_get_questions'],
        'restrictedusers' => 0, // 0 = tidak terbatas ke user tertentu.
        'enabled' => 1,
        'shortname' => 'customquestionapi',
    ],
];
