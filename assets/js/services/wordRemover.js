removeWord = (wordId) => {
    const removeWordView = ({error, message}) => {
        if (error) {
            alert(message);
        } else {
            $(`#word-${wordId}`).remove();
        }
    }

    const confirmed = confirm('Are you sure that you want to delete this word?');
    if (confirmed) {
        $.post('/remove_word', {wordId}, removeWordView.bind({wordId}));
    }
}

$('body').on('mouseenter', '.word', (elem) => {
    const wordId = $(elem.currentTarget).data('wordId');
    $(`#arrow-${wordId}`).text('❌');
});

$('body').on('mouseleave', '.word', (elem) => {
    const wordId = $(elem.currentTarget).data('wordId');
    $(`#arrow-${wordId}`).text('➡️');
});
