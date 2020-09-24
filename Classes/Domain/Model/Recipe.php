<?php

namespace WEBcoast\Recipes\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Recipe extends AbstractEntity
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $images;

    /**
     * @var int
     */
    protected $difficulty;

    /**
     * @var \DateTime|null
     */
    protected $preparationTime;

    /**
     * @var \DateTime|null
     */
    protected $cookingTime;

    /**
     * @var \DateTime|null
     */
    protected $totalTime;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\WEBcoast\Recipes\Domain\Model\Component>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $components;

    /**
     * @var int
     */
    protected $portions;

    /**
     * @var string
     */
    protected $preparation;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\WEBcoast\Recipes\Domain\Model\PreparationStep>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $steps;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\WEBcoast\Recipes\Domain\Model\NutritionalValue>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $nutritionalValues;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\WEBcoast\Recipes\Domain\Model\Tag>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $tags;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getImages(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->images;
    }

    /**
     * @return int
     */
    public function getDifficulty(): int
    {
        return $this->difficulty;
    }

    /**
     * @return \DateTime
     */
    public function getPreparationTime(): ?\DateTime
    {
        return $this->preparationTime;
    }

    /**
     * @return \DateTime
     */
    public function getCookingTime(): ?\DateTime
    {
        return $this->cookingTime;
    }

    /**
     * @return \DateTime
     */
    public function getTotalTime(): ?\DateTime
    {
        return $this->totalTime;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getComponents(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->components;
    }

    /**
     * @return int
     */
    public function getPortions(): int
    {
        return $this->portions;
    }

    /**
     * @return string
     */
    public function getPreparation(): string
    {
        return $this->preparation;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getSteps(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->steps;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getNutritionalValues(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->nutritionalValues;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getTags(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->tags;
    }
}
