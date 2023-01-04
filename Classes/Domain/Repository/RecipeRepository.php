<?php

namespace WEBcoast\Recipes\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Database\Query\Restriction\FrontendRestrictionContainer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser;
use TYPO3\CMS\Extbase\Persistence\Repository;

class RecipeRepository extends Repository
{
    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var Typo3DbQueryParser
     */
    protected $queryParser;

    public function __construct(ObjectManagerInterface $objectManager)
    {
        parent::__construct($objectManager);

        $dataMapper = $objectManager->get(DataMapper::class);
        $this->tableName = $dataMapper->getDataMap($this->objectType)->getTableName();
        $this->queryParser = $objectManager->get(Typo3DbQueryParser::class);
    }

    public function findAll($options = [])
    {
        /** @var Query $query */
        $query = $this->createQuery();
        $queryBuilder = $this->queryParser->convertQueryToDoctrineQueryBuilder($query);
        $queryBuilder->select('*')
            ->addSelectLiteral('rand() as random_order')
            ->setRestrictions(GeneralUtility::makeInstance(FrontendRestrictionContainer::class));

        if (isset($options['limit']) && $options['limit'] > 0) {
            $queryBuilder->setMaxResults((int)$options['limit']);
        }
        if (isset($options['orderBy'])) {
            switch ($options['orderBy']) {
                case 'random':
                    $queryBuilder->orderBy('random_order', 'asc');
                    break;
                case 'create_date':
                    $queryBuilder->orderBy('create_date', 'desc');
                    break;
                case 'last_changed':
                    $queryBuilder->orderBy('last_changed', 'desc');
                    break;
                case 'name':
                    $queryBuilder->orderBy('name', 'asc');
                    break;
            }
        }

        $query->statement($queryBuilder);

        return $query->execute();
    }
}
