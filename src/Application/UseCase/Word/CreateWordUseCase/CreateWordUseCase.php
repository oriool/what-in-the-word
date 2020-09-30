<?php

namespace App\Application\UseCase\Word\CreateWordUseCase;

use App\Domain\Services\Word\WordCreator;

class CreateWordUseCase
{
    private $wordCreator;

    public function __construct(WordCreator $wordCreator)
    {
        $this->wordCreator = $wordCreator;
    }

    public function execute(CreateWordRequest $createWordRequest): CreateWordResponse
    {
        $main = $createWordRequest->getMain();
        $translation = $createWordRequest->getTranslation();
        $categoryId = $createWordRequest->getCategoryId();

        if (!$main) {
            return new CreateWordResponse(
                'You have to provide a word',
                CreateWordResponse::MAIN_NOT_PROVIDED
            );
        }

        if (!$translation) {
            return new CreateWordResponse(
                'You have to provide a translation',
                CreateWordResponse::TRANSLATION_NOT_PROVIDED
            );
        }

        if (!$categoryId) {
            return new CreateWordResponse(
                'The category is missing. This is weird.',
                CreateWordResponse::CATEGORY_MISSING
            );
        }

        $word = $this->wordCreator->create($main, $translation, $categoryId);
        if (!$word) {
            return new CreateWordResponse(
                'There was an error while creating a new word',
                CreateWordResponse::GENERIC_ERROR
            );
        }

        return new CreateWordResponse(
            'Word created successfully',
            CreateWordResponse::SUCCESSFUL_REQUEST,
            $word->getId()
        );
    }
}
