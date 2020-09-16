<?php

$llPrefix = 'LLL:EXT:recipes/Resources/Private/Language/locallang_backend.xlf:tx_recipes_domain_model_ingredient';

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
        'label' => 'type',
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
        'language' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages', -1, 'flags-multiple']
                ],
                'special' => 'languages'
            ]
        ],
        'l10n_source' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'foreign_table' => 'tx_recipes_domain_model_ingredient',
                'foreign_table_where' => 'AND {#tx_recipes_domain_model_ingredient}.{#pid}=###CURRENT_PID### AND {#tx_recipes_domain_model_ingredient}.{#language} IN (-1,0)',
                'items' => [
                    ['', 0]
                ]
            ]
        ],
        'l10n_original' => [
            'config' => [
                'type' => 'passthrough',
                'default' => 0,
            ]
        ],
        'l10n_diff' => [
            'config' => [
                'type' => 'passthrough',
                'default' => '',
            ]
        ],
        'component' => [
            'label' => $llPrefix . '.recipe',
            'config' => [
                'type' => 'select',
                'eval' => 'int'
            ]
        ],
        'type' => [
            'exclude' => true,
            'label' => $llPrefix . '.type',
            'config' => [
                'type' => 'input',
                'eval' => 'required,trim',
            ]
        ],
        'unit' => [
            'exclude' => true,
            'label' => $llPrefix . '.unit',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', ''],
                    [$llPrefix . '.unit.weights', '--div--'],
                    [$llPrefix . '.unit.weight.gram', 'gram'],
                    [$llPrefix . '.unit.weight.german_pound', 'german_pound'],
                    [$llPrefix . '.unit.weight.kilogram', 'kilogram'],
                    [$llPrefix . '.unit.weight.grain', 'grain'],
                    [$llPrefix . '.unit.weight.ounce', 'ounce'],
                    [$llPrefix . '.unit.weight.pound', 'pound'],
                    [$llPrefix . '.unit.volume', '--div--'],
                    [$llPrefix . '.unit.volume.milliliter', 'milliliter'],
                    [$llPrefix . '.unit.volume.centiliter', 'centiliter'],
                    [$llPrefix . '.unit.volume.deciliter', 'deciliter'],
                    [$llPrefix . '.unit.volume.liter', 'liter'],
                    [$llPrefix . '.unit.volume.fluid_ounce', 'fluid_ounce'],
                    [$llPrefix . '.unit.volume.cup', 'cup'],
                    [$llPrefix . '.unit.other', '--div--'],
                    [$llPrefix . '.unit.other.teaspoon', 'teaspoon'],
                    [$llPrefix . '.unit.other.tablespoon', 'tablespoon'],
                    [$llPrefix . '.unit.other.pinch', 'pinch'],
                ]
            ]
        ],
        'amount' => [
            'exclude' => true,
            'label' => $llPrefix . '.amount',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,double2',
                'default' => 0,
                'size' => 10
            ]
        ]
    ],
    'palettes' => [
        'parent' => [
            'isHiddenPalette' => true,
            'showitem' => 'recipe, disabled, language, l10n_source'
        ],
        'main' => [
            'showitem' => 'type, amount, unit'
        ]
    ],
    'types' => [
        '0' => [
            'showitem' => '--palette--;;main, --palette--;;parent'
        ]
    ]
];
