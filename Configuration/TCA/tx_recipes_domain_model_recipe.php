<?php

$llPrefix = 'LLL:EXT:recipes/Resources/Private/Language/locallang_backend.xlf:tx_recipes_domain_model_recipe';

return [
    'ctrl' => [
        'crdate' => 'create_date',
        'cruser_id' => 'create_user_id',
        'default_sortby' => 'name ASC',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'disabled',
            'starttime' => 'publish_date',
            'endtime' => 'publish_until',
            'fe_group' => 'fe_group'
        ],
        'hideAtCopy' => true,
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
        'publish_date' => [
            'exclude' => true,
            'label' => $llPrefix . '.publish_date',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'default' => 0,
                'eval' => 'date'
            ]
        ],
        'publish_until' => [
            'exclude' => true,
            'label' => $llPrefix . '.publish_date',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'default' => 0,
                'eval' => 'date'
            ]
        ],
        'fe_group' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'autoSizeMax' => 20,
                'exclusiveKeys' => '-1, -2',
                'foreign_table' => 'fe_groups',
                'items' => [
                    ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login', -1],
                    ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.any_login', -2],
                    ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.usergroups', '--div--']
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
                'foreign_table' => 'tx_recipes_domain_model_recipe',
                'foreign_table_where' => 'AND {#tx_recipes_domain_model_recipe}.{#pid}=###CURRENT_PID### AND {#tx_recipes_domain_model_recipe}.{#language} IN (-1,0)',
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
        'name' => [
            'exclude' => true,
            'label' => $llPrefix . '.name',
            'config' => [
                'type' => 'input',
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ],
                'defaultLanguageDifferences' => true,
                'eval' => 'required,trim',
                'max' => 150,
                'size' => 30,
            ]
        ],
        'slug' => [
            'exclude' => true,
            'label' => $llPrefix . '.slug',
            'config' => [
                'type' => 'slug',
                'eval' => 'uniqueInSite',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['name']
                ]
            ]
        ],
        'description' => [
            'exclude' => true,
            'label' => $llPrefix . '.description',
            'description' => $llPrefix . '.description.help',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'defaultLanguageDifferences' => true,
            ]
        ],
        'meta_description' => [
            'exclude' => true,
            'label' => $llPrefix . '.meta_description',
            'config' => [
                'type' => 'text',
                'rows' => 5,
                'cols' => 40,
                'max' => 250,
                'eval' => 'trim'
            ]
        ],
        'meta_keywords' => [
            'exclude' => true,
            'label' => $llPrefix . '.meta_keywords',
            'config' => [
                'type' => 'input',
                'max' => 250,
                'eval' => 'trim'
            ]
        ],
        'images' => [
            'exclude' => true,
            'label' => $llPrefix . '.images',
            'config' => TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => $llPrefix . '.images.add',
                        'fileUploadAllowed' => false
                    ],
                    'behaviour' => [
                        'allowLanguageSynchronization' => true
                    ],
                    'minitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            )
        ],
        'difficulty' => [
            'exclude' => true,
            'label' => $llPrefix . '.difficulty',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    [$llPrefix . '.difficulty.very-easy', -2],
                    [$llPrefix . '.difficulty.easy', -1],
                    [$llPrefix . '.difficulty.normal', 0],
                    [$llPrefix . '.difficulty.hard', 1],
                    [$llPrefix . '.difficulty.very-hard', 2],
                ]
            ]
        ],
        'preparation_time' => [
            'exclude' => true,
            'label' => $llPrefix . '.preparation_time',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'input',
                'dbType' => 'time',
                'default' => 0,
                'eval' => 'time',
                'size' => 10
            ]
        ],
        'cooking_time' => [
            'exclude' => true,
            'label' => $llPrefix . '.cooking_time',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'input',
                'dbType' => 'time',
                'default' => 0,
                'eval' => 'time',
                'size' => 10
            ]
        ],
        'total_time' => [
            'exclude' => true,
            'label' => $llPrefix . '.total_time',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'input',
                'dbType' => 'time',
                'default' => 0,
                'eval' => 'time',
                'size' => 10
            ]
        ],
        'components' => [
            'exclude' => true,
            'label' => $llPrefix . '.components',
            'config' => [
                'type' => 'inline',
                'appearance' => [
                    'newRecordLinkTitle' => $llPrefix . '.components.add',
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
                ],
                'behavior' => [
                    'allowLanguageSynchronization' => true
                ],
                'foreign_field' => 'recipe',
                'foreign_sortby' => 'sorting',
                'foreign_table' => 'tx_recipes_domain_model_component',
                'minitems' => 1
            ]
        ],
        'portions' => [
            'exclude' => true,
            'label' => $llPrefix . '.portions',
            'descriptions' => $llPrefix . '.portions.help',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'input',
                'eval' => 'int',
                'size' => 5
            ]
        ],
        'preparation' => [
            'exclude' => true,
            'label' => $llPrefix . '.preparation',
            'description' => $llPrefix . '.preparation.help',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'defaultLanguageDifferences' => true,
            ]
        ],
        'steps' => [
            'exclude' => true,
            'label' => $llPrefix . '.steps',
            'description' => $llPrefix . 'steps.help',
            'config' => [
                'type' => 'inline',
                'appearance' => [
                    'newRecordLinkTitle' => $llPrefix . '.steps.add',
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
                    'fileUploadAllowed' => false,
                ],
                'behavior' => [
                    'allowLanguageSynchronization' => true
                ],
                'foreign_field' => 'recipe',
                'foreign_sortby' => 'sorting',
                'foreign_table' => 'tx_recipes_domain_model_preparationstep',
            ]
        ],
        'nutritional_values' => [
            'exclude' => true,
            'label' => $llPrefix . '.nutritional_values',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'inline',
                'appearance' => [
                    'newRecordLinkTitle' => $llPrefix . '.nutritional_values.add',
                    'levelLinksPosition' => 'both',
                    'useSortable' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                    'enabledControls' => [
                        'info' => true,
                        'new' => true,
                        'dragdrop' => false,
                        'sort' => false,
                        'hide' => true,
                        'delete' => true,
                        'localize' => true
                    ],
                    'headerThumbnail' => true,
                ],
                'foreign_field' => 'recipe',
                'foreign_default_sortby' => 'nutrient',
                'foreign_table' => 'tx_recipes_domain_model_nutritionalvalue',
            ]
        ],
        'tags' => [
            'exclude' => true,
            'label' => $llPrefix . '.tags',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'autoSizeMax' => 10,
                'addRecord' => [
                    'title' => $llPrefix . '.tags.add'
                ],
                'foreign_table' => 'tx_recipes_domain_model_tag',
                'MM' => 'tx_recipes_domain_model_recipe_2_tag',
            ]
        ]
    ],
    'palettes' => [
        'name' => [
            'showitem' => 'name, difficulty, portions'
        ],
        'times' => [
            'label' => $llPrefix . '.palettes.times',
            'showitem' => 'preparation_time, cooking_time, total_time'
        ],
        'publishing' => [
            'label' => $llPrefix . '.palettes.publishing',
            'showitem' => 'disabled,publish_date, publish_until'
        ],
        'language' => [
            'showitem' => 'language, l10n_source'
        ]
    ],
    'types' => [
        '0' => [
            'showitem' => '--palette--;;name, slug, --palette--;;times, description, preparation, images, tags,' .
                '--div--;' . $llPrefix . '.tabs.ingredients, components,' .
                '--div--;' . $llPrefix . '.tabs.preparation, steps,' .
                '--div--;' . $llPrefix . '.tabs.nutrition, nutritional_values,' .
                '--div--;' . $llPrefix . '.tabs.meta_data, meta_description, meta_keywords,' .
                '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, --palette--;;language,
                 --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, --palette--;;publishing, fe_group'
        ]
    ]
];
