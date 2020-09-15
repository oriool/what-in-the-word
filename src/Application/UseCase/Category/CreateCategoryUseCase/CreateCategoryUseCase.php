<?php

namespace App\Application\UseCase\Category\CreateCategoryUseCase;

use App\Domain\Services\Category\CategoryCreator\CategoryCreator;

class CreateCategoryUseCase
{
    private $categoryCreator;

    public function __construct(CategoryCreator $categoryCreator)
    {
        $this->categoryCreator = $categoryCreator;
    }

    public function execute(CreateCategoryRequest $createCategoryRequest)
    {
        $category = $this->categoryCreator->create($createCategoryRequest->getTitle());
        if (!$category) {
            return new CreateCategoryResponse(
                'Something went wrong while creating a category',
                CreateCategoryResponse::GENERIC_ERROR
            );
        }

        return new CreateCategoryResponse(
            'Category created successfully',
            CreateCategoryResponse::SUCCESSFUL_REQUEST
        );
    }
}
