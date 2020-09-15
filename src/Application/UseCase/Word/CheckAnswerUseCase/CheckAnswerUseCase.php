<?php

namespace App\Application\UseCase\Word\CheckAnswerUseCase;

use App\Domain\Services\Word\AnswerChecker;

class CheckAnswerUseCase
{
    private $answerChecker;

    public function __construct(AnswerChecker $answerChecker)
    {
        $this->answerChecker = $answerChecker;
    }

    public function execute(CheckAnswerRequest $checkAnswerRequest): CheckAnswerResponse
    {
        $wordId = $checkAnswerRequest->getWordId();
        $answer = $checkAnswerRequest->getAnswer();

        if (!$wordId) {
            return new CheckAnswerResponse(
                'Word id is missing. This is weird.',
                CheckAnswerResponse::WORD_MISSING
            );
        }

        if (!$answer) {
            return new CheckAnswerResponse(
                'You must provide an answer',
                CheckAnswerResponse::ANSWER_NOT_PROVIDED
            );
        }

        $correctAnswer = $this->answerChecker->check($wordId, $answer);
        if (!$correctAnswer) {
            return new CheckAnswerResponse(
                'The answer is wrong! Try again!',
                CheckAnswerResponse::WRONG_ANSWER
            );
        }

        return new CheckAnswerResponse(
            'The answer is correct!',
            CheckAnswerResponse::CORRECT_ANSWER
        );
    }
}