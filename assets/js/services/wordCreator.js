showWordCreationForm = (element) => {
    const categoryId = $(element).data('category-id');
    $(`#create-word-cell-${categoryId}`).hide();
    $(`#create-new-word-div-${categoryId}`).show();
    $(`#create-main-input-${categoryId}`).focus();
}

createWord = (element, event) => {
    event.preventDefault();
    const categoryId = $(element).data('category-id');
    const main = $(`#create-main-input-${categoryId}`).val();
    const translation = $(`#create-translation-input-${categoryId}`).val();

    const callback = ({error, message}) => {
        if (error) {
            alert(message);
        } else {
            $(`#create-new-word-div-${categoryId}`).hide();
            $(`#create-word-cell-${categoryId}`).show();
            $(`#create-main-input-${categoryId}`).val('');
            $(`#create-translation-input-${categoryId}`).val('');

            const newWordHtml = `
                <div class="word-cell">
                    <p class="word-text small">${main}</p>
                </div>
                <p id="arrow">➡️</p>
                <div class="word-cell">
                    <input class="translation small" maxlength="16" type="text" value="${translation}" />
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
    $(`#create-new-word-div-${categoryId}`).hide();
    $(`#create-word-cell-${categoryId}`).show();
}
