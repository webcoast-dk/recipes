<?php

namespace WEBcoast\Recipes\Controller;

use GeorgRinger\NumberedPagination\NumberedPagination;
use TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use WEBcoast\Recipes\Domain\Model\Recipe;
use WEBcoast\Recipes\Domain\Repository\RecipeRepository;

class RecipeController extends ActionController
{
    /**
     * @var RecipeRepository
     */
    protected $recipeRepository;

    public function injectRecipeRepository(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function teaserAction()
    {
        $this->view->assignMultiple([
            'recipes' => $this->recipeRepository->findAll(['limit' => $this->settings['maxItems'], 'orderBy' => $this->settings['orderBy']]),
            'data' => $this->configurationManager->getContentObject()->data
        ]);
    }

    public function listAction()
    {
        $paginationConfiguration = $this->settings['pagination'] ?? [];
        $itemsPerPage = (int)(($paginationConfiguration['itemsPerPage'] ?? '') ?: 10);
        $maximumNumberOfLinks = (int)($paginationConfiguration['maximumNumberOfLinks'] ?? 0);

        $recipies = $this->recipeRepository->findAll(['orderBy' => $this->settings['orderBy']]);

        $currentPage = $this->request->hasArgument('currentPage') ? (int)$this->request->getArgument('currentPage') : 1;
        $paginator = GeneralUtility::makeInstance(QueryResultPaginator::class, $recipies, $currentPage, $itemsPerPage);
        $paginationClass = $paginationConfiguration['class'] ?? SimplePagination::class;
        if (class_exists(NumberedPagination::class) && $paginationClass === NumberedPagination::class && $maximumNumberOfLinks) {
            $pagination = GeneralUtility::makeInstance(NumberedPagination::class, $paginator, $maximumNumberOfLinks);
        } elseif (class_exists($paginationClass)) {
            $pagination = GeneralUtility::makeInstance($paginationClass, $paginator);
        } else {
            $pagination = GeneralUtility::makeInstance(SimplePagination::class, $paginator);
        }

        $this->view->assignMultiple([
            'pagination' => [
                'currentPage' => $currentPage,
                'paginator' => $paginator,
                'pagination' => $pagination,
            ],
            'data' => $this->configurationManager->getContentObject()->data
        ]);
    }

    public function showAction(Recipe $recipe)
    {
        $this->view->assignMultiple([
            'recipe' => $recipe
        ]);
    }
}
