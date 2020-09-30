enableTitleEditMode = (elem) => {
    const categoryId = $(elem).data('categoryId');
    const title = $(elem).text();
    const editTitleHtml = `
        <form onsubmit="updateCategoryTitle(this, event)" data-category-id="${categoryId}">
            <input type="text" id="category-title-input-${categoryId}" class="category-title-input" value="${title}"/>
            <button class="btn btn-danger btn-sm" onclick="removeCategory(${categoryId})">✕</button>
        </form>`;

    $(`#category-title-${categoryId}`).html(editTitleHtml);
    $(`#category-title-input-${categoryId}`).focus();

    $(`#category-title-input-${categoryId}`).on('blur', () => {
        const newTitle = $(`#category-title-input-${categoryId}`).val()
        update(newTitle, categoryId);
    });
}

removeCategory = categoryId => {
    const removeCategoryHtml = ({error, message}) => {
        if (error) {
            alert(message);
        } else {
            $(`#category-container-${categoryId}`).remove();
        }
    }

    const confirmed = confirm('Are you sure that you want to remove this category? You will remove all the words inside it as well')
    if (confirmed) {
        $.post('/remove_category', {categoryId}, removeCategoryHtml.bind({categoryId}));
    }
}
