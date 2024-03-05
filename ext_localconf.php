<?php

TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('Recipes', 'Teaser', [\WEBcoast\Recipes\Controller\RecipeController::class => 'teaser'], [], TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT);
if (TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)->get('recipes', 'enableCombinedPlugin')) {
    TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('Recipes', 'List', [\WEBcoast\Recipes\Controller\RecipeController::class => 'list,show'], [], TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT);
} else {
    TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('Recipes', 'List', [\WEBcoast\Recipes\Controller\RecipeController::class => 'list'], [], TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT);
    TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('Recipes', 'Single', [\WEBcoast\Recipes\Controller\RecipeController::class => 'show'], [], TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT);
}

$iconRegistry = TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'ext-recipes-plugin',
    TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:recipes/Resources/Public/Icons/Extension.svg']
);
