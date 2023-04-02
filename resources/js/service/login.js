const emailInput = document.getElementById('email-address');
const passwordInput = document.getElementById('password');
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const inputElement = document.querySelectorAll('input');
const btnSubmit = document.getElementById('btn-submit');
const btnRegister = document.getElementById('btn-register');
const passwordRegex = /^(?=.*\d)(?=.*[a-z]).{8,}$/;

validateHidden();

function validateEmail(email) {
    if (!!(email)) {
        if (emailRegex.test(email)) {
            return true;
        } else {
            validation.show('errorEmail', 'Please enter a valid email address.')
            return false;
        }
    } else {
        validation.show('errorEmail', 'Email required')
        return false;
    }
}

function validatePassword(password) {
    if (!!(password)) {
        if (passwordRegex.test(password)) {
            return true;
        } else {
            validation.show('errorPassword', 'Please enter a valid password');
            return false;
        }
    } else {
        validation.show('errorPassword', 'Password required');
        return false;
    }
}

btnSubmit.onclick = function (event) {
    event.preventDefault();
    validateHidden();
    if (validateEmail(emailInput.value) && validatePassword(passwordInput.value)) {
        $.ajax({
            type: 'POST',
            url: '/api/login',
            data: {
                username: emailInput.value,
                password: passwordInput.value,
            },
            success: function (response) {
                window.location.href = '/homepage';
            },
            error: function (request, error, status) {
                notify.error(request.responseJSON.message);
            }
        })
    }
}
btnRegister.onclick = function (event) {
    event.preventDefault();
    window.location.href = '/register';
}