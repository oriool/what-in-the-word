$('#login_form').on('submit', (event) => {
    const emailInput = $('#emailInput').val();
    const passwordInput = $('#passwordInput').val();

    if (!emailInput) {
        showErrorMessage('emailInputErrorMessage', 'You have to introduce an email');
        event.preventDefault();
    } else {
        $('#emailInputErrorMessage').hide();
    }

    if (!passwordInput) {
        showErrorMessage('passwordInputErrorMessage', 'You have to introduce a password');
        event.preventDefault();
    } else {
        $('#passwordInputErrorMessage').hide();
    }
});

function showErrorMessage(element, message)
{
    $(`#${element}`).text(message);
    $(`#${element}`).show();
}

