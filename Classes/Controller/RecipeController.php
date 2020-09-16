<?php

namespace WEBcoast\Recipes\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
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
        $this->view->assignMultiple([
            'recipes' => $this->recipeRepository->findAll(['orderBy' => $this->settings['orderBy']]),
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
