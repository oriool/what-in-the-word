<?php

namespace App\Application\UseCase\Word\RemoveWordUseCase;

use App\Domain\Services\Word\WordRemover;

class RemoveWordUseCase
{
    private $wordRemover;

    public function __construct(WordRemover $wordRemover)
    {
        $this->wordRemover = $wordRemover;
    }

    public function execute(RemoveWordRequest $removeWordRequest): RemoveWordResponse
    {
        $successful = $this->wordRemover->remove($removeWordRequest->getWordId());
        if (!$successful) {
            return new RemoveWordResponse(
                'There was an error while removing the word',
                RemoveWordResponse::GENERIC_ERROR
            );
        }

        return new RemoveWordResponse(
            'Word removed successfully',
            RemoveWordResponse::SUCCESSFUL_REQUEST
        );
    }
}