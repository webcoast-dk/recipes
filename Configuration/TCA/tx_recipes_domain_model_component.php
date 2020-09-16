<?php

$llPrefix = 'LLL:EXT:recipes/Resources/Private/Language/locallang_backend.xlf:tx_recipes_domain_model_component';

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
                'foreign_table' => 'tx_recipes_domain_model_component',
                'foreign_table_where' => 'AND {#tx_recipes_domain_model_component}.{#pid}=###CURRENT_PID### AND {#tx_recipes_domain_model_component}.{#language} IN (-1,0)',
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
        'recipe' => [
            'label' => $llPrefix . '.recipe',
            'config' => [
                'type' => 'input',
                'eval' => 'int'
            ]
        ],
        'name' => [
            'exclude' => true,
            'label' => $llPrefix . '.name',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
            ]
        ],
        'ingredients' => [
            'exclude' => true,
            'label' => $llPrefix . '.ingredients',
            'config' => [
                'type' => 'inline',
                'appearance' => [
                    'newRecordLinkTitle' => $llPrefix . '.ingredients.add',
                    'levelLinksPosition' => 'both',
                    'useSortable' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                    'enabledControls' => [
                        'info' => true,
                        'new' => true,
                        'dragdrop' => true,
                        'sort' => false,
                        'hide' => true,
                        'delete' => true,
                        'localize' => true
                    ],
//                    'headerThumbnail' => true,
//                    'fileUploadAllowed' => false,
                ],
                'behavior' => [
                    'allowLanguageSynchronization' => true
                ],
                'foreign_field' => 'component',
                'foreign_sortby' => 'sorting',
                'foreign_table' => 'tx_recipes_domain_model_ingredient',
                'minitems' => 1
            ]
        ]
    ],
    'palettes' => [
        'parent' => [
            'isHiddenPalette' => true,
            'showitem' => 'recipe, disabled, language, l10n_source'
        ]
    ],
    'types' => [
        '0' => [
            'showitem' => 'name, ingredients, --palette--;;parent'
        ]
    ]
];
