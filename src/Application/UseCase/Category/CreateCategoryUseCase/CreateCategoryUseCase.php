<?php

namespace App\Application\UseCase\Category\CreateCategoryUseCase;

use App\Domain\Services\Category\CategoryCreator;

class CreateCategoryUseCase
{
    private $categoryCreator;

    public function __construct(CategoryCreator $categoryCreator)
    {
        $this->categoryCreator = $categoryCreator;
    }

    public function execute(CreateCategoryRequest $createCategoryRequest)
    {
        $categoryId = $createCategoryRequest->getCategoryId();
        $title = $createCategoryRequest->getTitle();

        $category = $this->categoryCreator->create($categoryId, $title);
        if (!$category) {
            return new CreateCategoryResponse(
                'Something went wrong while creating a category',
                CreateCategoryResponse::GENERIC_ERROR,
                $category->getTitle()
            );
        }

        return new CreateCategoryResponse(
            'Category created successfully',
            CreateCategoryResponse::SUCCESSFUL_REQUEST,
            $category->getTitle(),
            $category->getId()
        );
    }
}
