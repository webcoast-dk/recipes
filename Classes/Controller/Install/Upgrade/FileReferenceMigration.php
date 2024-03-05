<?php

declare(strict_types=1);


namespace WEBcoast\Recipes\Controller\Install\Upgrade;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

#[UpgradeWizard(identifier: 'recipes-fileReferenceMigration')]
class FileReferenceMigration implements UpgradeWizardInterface
{

    public function getTitle(): string
    {
        return 'Recipes: File reference migration';
    }

    public function getDescription(): string
    {
        return 'Migrates file references to match field name used by TCA type "file"';
    }

    public function executeUpdate(): bool
    {
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('sys_file_reference');
        $connection->update('sys_file_reference', ['fieldname' => 'images'], ['tablenames' => 'tx_recipes_domain_model_recipe', 'fieldname' => 'image']);

        return true;
    }

    public function updateNecessary(): bool
    {
        return true;
    }

    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }
}
