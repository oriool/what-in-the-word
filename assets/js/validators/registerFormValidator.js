$('#register_form').on('submit', (event) => {
    const usernameInput = $('#usernameInput').val();
    const emailInput = $('#emailInput').val();
    const passwordInput = $('#passwordInput').val();
    const repeatedPasswordInput = $('#repeatedPasswordInput').val();

    if (!usernameInput) {
        showErrorMessage('usernameInputErrorMessage', 'You have to introduce a username');
        event.preventDefault();
    } else {
        $('#usernameInputErrorMessage').hide();
    }

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

    if (passwordInput !== repeatedPasswordInput) {
        showErrorMessage('repeatedPasswordInputErrorMessage', 'The passwords introduced are not the same');
        event.preventDefault();
    } else {
        $('#repeatedPasswordInputErrorMessage').hide();
    }
});

function showErrorMessage(element, message)
{
    $(`#${element}`).text(message);
    $(`#${element}`).show();
}