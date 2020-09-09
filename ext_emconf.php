<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Recipes',
    'description' => 'Manage recipes with ingredients and preparation',
    'category' => 'plugin',
    'author' => 'Thorben Nissen',
    'author_email' => 'thorben@webcoast.dk',
    'author_company' => 'WEBcoast',
    'state' => 'alpha',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'fluid' => '10.4.0-10.4.99',
            'extbase' => '10.4.0-10.4.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
