enableTitleEditMode = (elem) => {
    const categoryId = $(elem).data('categoryId');
    const title = $(elem).text();
    const editTitleHtml = `
        <form onsubmit="updateCategoryTitle(this, event)" data-category-id="${categoryId}">
            <input type="text" id="category-title-input-${categoryId}" class="category-title-input" value="${title}"/>
        </form>`;

    $(`#category-title-${categoryId}`).html(editTitleHtml);
    $(`#category-title-input-${categoryId}`).focus();

    $(`#category-title-input-${categoryId}`).on('blur', () => {
        const newTitle = $(`#category-title-input-${categoryId}`).val()
        update(newTitle, categoryId);
    });
}
