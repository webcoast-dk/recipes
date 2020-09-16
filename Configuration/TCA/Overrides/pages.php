<?php

if (TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)->get('recipes', 'enableCombinedPlugin')) {
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        'recipes',
        'Configuration/PageTSConfig/content_element_wizard_combined.tsconfig',
        'Recipes plugins: Combined'
    );
} else {
    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        'recipes',
        'Configuration/PageTSConfig/content_element_wizard_separate.tsconfig',
        'Recipes plugins: Separate'
    );
}
