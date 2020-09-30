<?php

namespace App\Application\UseCase\Category\PracticeUseCase;

use App\Domain\Services\Category\AnswerDatesUpdater;

class PracticeUseCase
{
    private $answerDatesUpdater;

    public function __construct(AnswerDatesUpdater $answerDatesUpdater)
    {
        $this->answerDatesUpdater = $answerDatesUpdater;
    }

    public function execute(PracticeRequest $practiceRequest)
    {
        $success = $this->answerDatesUpdater->update();
        if (!$success) {
            return new PracticeResponse(
                'There was an error while trying to update the answer dates',
                PracticeResponse::GENERIC_ERROR
            );
        }

        return new PracticeResponse(
            'Answer dates updated successfully',
            PracticeResponse::SUCCESSFUL_REQUEST
        );
    }
}
