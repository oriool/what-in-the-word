showWordCreationForm = (element) => {
    const categoryId = $(element).data('category-id');
    $(`#create-word-cell-${categoryId}`).hide();
    $(`#create-new-word-form-${categoryId}`).show();
    $(`#create-main-input-${categoryId}`).focus();
}

createWord = (element, event) => {
    event.preventDefault();
    const categoryId = $(element).data('category-id');
    const main = $(`#create-main-input-${categoryId}`).val();
    const translation = $(`#create-translation-input-${categoryId}`).val();

    const callback = ({error, message, wordId}) => {
        if (error) {
            alert(message);
        } else {
            $(`#create-new-word-form-${categoryId}`).hide();
            $(`#create-word-cell-${categoryId}`).show();
            $(`#create-main-input-${categoryId}`).val('');
            $(`#create-translation-input-${categoryId}`).val('');

            const newWordHtml = `
                <div id="word-${wordId}" class="word" data-word-id="${wordId}" data-type="word">
                    <div class="word-cell">
                        <p class="word-text small">${main}</p>
                    </div>
                    <p id="arrow-${wordId}" class="arrow" onclick="removeWord(${wordId})">➡️</p>
                    <div class="word-cell">
                        <input class="translation small" maxlength="16" type="text" value="${translation}" />
                    </div>
                </div>
                <div class="clearfix"></div>`;

            const actualHtml = $(`#words-${categoryId}`).html();
            $(`#words-${categoryId}`).html(newWordHtml + actualHtml);
        }
    }

    $.post(
        '/create_word',
        {main, translation, categoryId},
        callback.bind({main, translation}));
}

hideNewWordForm = categoryId => {
    $(`#create-new-word-form-${categoryId}`).hide();
    $(`#create-word-cell-${categoryId}`).show();
}
