<?php

namespace WEBcoast\Recipes\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class NutritionalValue extends AbstractEntity
{
    /**
     * @var string
     */
    protected $nutrient;

    /**
     * @var string
     */
    protected $unit;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var boolean
     */
    protected $isSubsidiary;

    /**
     * @return string
     */
    public function getNutrient(): string
    {
        return $this->nutrient;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return bool
     */
    public function isSubsidiary(): bool
    {
        return $this->isSubsidiary;
    }
}
