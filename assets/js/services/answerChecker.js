checkAnswer = (element, event) => {
    event.preventDefault();

    const wordId = $(element).data('wordId');
    const answer = $(`#answer-${wordId}`).val();

    $.post('/check_answer', {wordId, answer}, ({error, nextWordId}) => {
        if (error) {
            $(`#answer-${wordId}`).removeClass('answer');
            $(`#answer-${wordId}`).addClass('wrong-answer');
        } else {
            $(`#answer-${wordId}`).removeClass('answer');
            $(`#answer-${wordId}`).addClass('correctly-answered');
            $(`#answer-${wordId}`).blur();
            $(`#answer-${nextWordId}`).focus();
        }
    });
}
