<?php

$llPrefix = 'LLL:EXT:recipes/Resources/Private/Language/locallang_backend.xlf:';

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItemGroup('tt_content', 'CType', 'recipes', $llPrefix . 'plugin.header', 'before:special');

TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('WEBcoast.Recipes', 'Teaser', $llPrefix . 'plugin.teaser', null, 'recipes');
TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('WEBcoast.Recipes', 'List', $llPrefix . 'plugin.list', null, 'recipes');

$GLOBALS['TCA']['tt_content']['types']['recipes_teaser'] = $GLOBALS['TCA']['tt_content']['types']['1'];
$GLOBALS['TCA']['tt_content']['types']['recipes_list'] = $GLOBALS['TCA']['tt_content']['types']['1'];

if (!TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)->get('recipes', 'enableCombinedPlugin')) {
    TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('WEBcoast.Recipes', 'Single', $llPrefix . 'plugin.single', null, 'recipes');
    $GLOBALS['TCA']['tt_content']['types']['recipes_single'] = $GLOBALS['TCA']['tt_content']['types']['1'];
}

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', '--palette--;;general', 'recipes_teaser,recipes_list,recipes_single', 'replace:CType');
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', '--div--;' . $llPrefix . 'tt_content.tabs.record_storage, pages, recursive', 'recipes_teaser,recipes_list,recipes_single', 'after:CType');
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.plugin, pi_flexform', 'recipes_teaser,recipes_list', 'after:CType');
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', '--palette--;;headers', 'recipes_teaser,recipes_list,recipes_single', 'after:CType');
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('*', 'FILE:EXT:recipes/Configuration/FlexForm/Teaser.xml', 'recipes_teaser');
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('*', 'FILE:EXT:recipes/Configuration/FlexForm/List.xml', 'recipes_list');
