<?php

$llPrefix = 'LLL:EXT:recipes/Resources/Private/Language/locallang_backend.xlf:tx_recipes_domain_model_tag';

return [
    'ctrl' => [
        'crdate' => 'create_date',
        'cruser_id' => 'create_user_id',
        'delete' => 'deleted',
        'default_sortby' => 'name ASC',
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
                'eval' => 'date,int'
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
                'eval' => 'date,int'
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
        'name' => [
            'exclude' => true,
            'label' => $llPrefix . '.name',
            'config' => [
                'type' => 'input',
                'eval' => 'required,trim',
            ]
        ],
        'slug' => [
            'exclude' => true,
            'label' => $llPrefix . '.slug',
            'config' => [
                'type' => 'slug',
                'eval' => 'uniqueInSite',
                'generatorOptions' => [
                    'fields' => ['name']
                ]
            ]
        ]
    ],
    'palettes' => [
        'publish_times' => [
            'label' => $llPrefix . '.palettes.publish_times',
            'showitem' => 'disabled, publish_date, publish_until'
        ]
    ],
    'types' => [
        '0' => [
            'showitem' => 'name, slug, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, --palette--;;publish_times, fe_group'
        ]
    ]
];
