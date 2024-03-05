<?php

$llPrefix = 'LLL:EXT:recipes/Resources/Private/Language/locallang_backend.xlf:tx_recipes_domain_model_preparation_step';

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
        'label_alt' => 'description',
        'languageField' => 'language',
        'rootLevel' => false,
        'searchFields' => 'name,description,preparation',
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
        'name' => [
            'exclude' => true,
            'label' => $llPrefix . '.name',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
            ]
        ],
        'description' => [
            'exclude' => true,
            'label' => $llPrefix . '.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'eval' => 'required'
            ]
        ],
        'image' => [
            'exclude' => true,
            'label' => $llPrefix . '.image',
            'config' => [
                'type' => 'file',
                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
                'appearance' => [
                    'createNewRelationLinkTitle' => $llPrefix . '.image.add',
                    'fileUploadAllowed' => false
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ],
                'overrideChildTca' => [
                    'types' => [
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '--palette--;;imageoverlayPalette, --palette--;;filePalette'
                        ]
                    ]
                ]
            ],
        ]
    ],
    'types' => [
        '0' => [
            'showitem' => 'recipe, name, description, image'
        ]
    ]
];
