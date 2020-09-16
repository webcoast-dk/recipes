<?php

namespace WEBcoast\Recipes\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Ingredient extends AbstractEntity
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $unit;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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
}
