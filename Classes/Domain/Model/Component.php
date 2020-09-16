<?php

namespace WEBcoast\Recipes\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Component extends AbstractEntity
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\WEBcoast\Recipes\Domain\Model\Ingredient>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $ingredients;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|Ingredient[]
     */
    public function getIngredients(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->ingredients;
    }
}
