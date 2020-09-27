update = (newTitle, categoryId) => {
    $.post('/create_category', {title: newTitle, categoryId}, ({error, message, title, categoryId}) => {
        if (error) {
            alert(message);
            return false;
        }

        $(`#category-title-${categoryId}`).html(
            `<div class="category-title">${title}</div>`
        );
    });
}

addFormToCreateCategory = () => {
    $.post('/create_category', {title: 'new category'}, ({error, message, title, categoryId}) => {
        if (error) {
            alert(message);
            return false;
        }

        const categoriesHtml = $('#categories').html();
        const newCategory = `
        <div class="category-container">
            <div class="category">
                <div id="category-title-${categoryId}">
                    <form onsubmit="updateCategoryTitle(this, event)" data-category-id="${categoryId}">               
                        <input type="text" id="category-title-input-${categoryId}" class="category-title-input" value="${title}"/>
                    </form>
                </div>
                <div id="create-word-cell-${categoryId}" class="create-word-cell">
                    <p class="small" data-category-id="${categoryId}" onclick="showWordCreationForm(this)">+ Add new word</p>
                </div>
                <form id="create-new-word-div-${categoryId}" class="create-new-word-div">
                    <input id="create-main-input-${categoryId}" class="create-word-input small" type="text" maxlength="16" placeholder="new word"/>
                    <p id="arrow">➡️</p>
                    <input id="create-translation-input-${categoryId}" class="create-translation-input small" type="text" maxlength="16" placeholder="new translation"/>
                    <div class="clearfix"></div>    
                    <button type="submit" class="btn btn-success btn-sm create-new-word-btn" data-category-id="${categoryId}" onclick="createWord(this, event)">Create new word</button>
                    <p class="cancel-creating-word" onclick="hideNewWordForm(${categoryId})">✕</p>
                    <div class="clearfix"></div>
                </form>
                <div id="words-${categoryId}"></div>
            </div>
        </div>`;
        
        $('#categories').html(categoriesHtml + newCategory);
        $(`#category-title-input-${categoryId}`).select();

        $(`#category-title-input-${categoryId}`).on('blur', () => {
            const newTitle = $(`#category-title-input-${categoryId}`).val()
            update(newTitle, categoryId);
        });
    });
}

updateCategoryTitle = (element, event) => {
    event.preventDefault();
    const categoryId = $(element).data('categoryId');
    const newTitle = $(`#category-title-input-${categoryId}`).val();

    update(newTitle, categoryId);
}
