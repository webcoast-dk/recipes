<?php

$llPrefix = 'LLL:EXT:recipes/Resources/Private/Language/locallang_backend.xlf:tx_recipes_domain_model_nutritional_value';

return [
    'ctrl' => [
        'crdate' => 'create_date',
        'cruser_id' => 'create_user_id',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'disabled',
        ],
        'hideAtCopy' => true,
        'hideTable' => true,
        'iconfile' => 'EXT:recipes/Resources/Public/Icons/tx_recipes_domain_model_recipe.svg',
        'label' => 'name',
        'languageField' => 'language',
        'rootLevel' => false,
        'searchFields' => 'name,description,preparation',
        'thumbnail' => 'image',
        'title' => $llPrefix,
        'translationSource' => 'l10n_source',
        'transOrigDiffSourceField' => 'l10n_diff',
        'transOrigPointerField' => 'l10n_original',
        'tstamp' => 'last_changed',
    ],
    'columns' => [
        'disabled' => [
            'exclude' => true,
            'label' => $llPrefix . '.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    ['', '', 'invertStateDisplay' => true]
                ]
            ]
        ],
        'recipe' => [
            'label' => $llPrefix . '.recipe',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_recipes_domain_model_recipe',
            ]
        ],
        'nutrient' => [
            'exclude' => true,
            'label' => $llPrefix . '.nutrient',
            'config' => [
                'type' => 'input',
                'eval' => 'required,trim',
            ]
        ],
        'is_subsidiary' => [
            'exclude' => true,
            'label' => $llPrefix . '.is_subsidiary',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    ['', '']
                ]
            ]
        ],
        'amount' => [
            'exclude' => true,
            'label' => $llPrefix . '.amount',
            'config' => [
                'type' => 'input',
                'eval' => 'required,trim,double2',
            ]
        ],
        'unit' => [
            'exclude' => true,
            'label' => $llPrefix . '.unit',
            'config' => [
                'type' => 'input',
                'eval' => 'required,trim',
            ]
        ]
    ],
    'palettes' => [
        'main' => [
            'showitem' => 'nutrient, amount, unit'
        ]
    ],
    'types' => [
        '0' => [
            'showitem' => 'recipe, --palette--;;main, is_subsidiary'
        ]
    ]
];
