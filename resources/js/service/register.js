const btnRegister = document.getElementById('btn-register');
const btnSignIn = document.getElementById('btn-signin');
const familyName = document.getElementById('family-name');
const givenName = document.getElementById('given-name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('password-confirmation');
const dob = document.getElementById('dob')
btnSignIn.onclick = function (event) {
    event.preventDefault();
    window.location.href = '/login';
}
validateHidden();
const validationForm = () => {
    const nameRegex = /^[A-Z][a-z]*(\s+[A-Z][a-z]*)*$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordRegex = /^(?=.*\d)(?=.*[a-z]).{8,}$/;
    let checkValidation = true;
    if (!familyName.value) {
        validation.show('error-family-name', 'Required');
        checkValidation = false;
    } else {
        if (!nameRegex.test(familyName.value)) {
            validation.show('error-family-name', 'Please enter correct name');
            checkValidation = false;
        }
    }
    if (!givenName.value) {
        validation.show('error-given-name', 'Required')
        checkValidation = false;
    } else {
        if (!nameRegex.test(givenName.value)) {
            validation.show('error-given-name', 'Please enter correct name')
            checkValidation = false
        }
    }
    if (!dob.value) {
        validation.show('error-dob', 'Please enter your date of birth');
        checkValidation = false;
    }
    if (!email.value) {
        validation.show('error-email', 'Please enter your email');
        checkValidation = false;
    } else {
        if (!emailRegex.test(email.value)) {
            validation.show('error-email', 'Please enter correct email');
            checkValidation = false;
        }
    }
    if (!password.value) {
        validation.show('error-password', 'Please enter your password');
        checkValidation = false;
    } else {
        if (!passwordRegex.test(password.value)) {
            validation.show('error-password', 'Your password should be contain at lease 1 letter and 1 digit');
            checkValidation = false;
        }
    }
    if (!confirmPassword.value) {
        validation.show('error-confirmation', 'Please re-enter your password')
        checkValidation = false;
    } else {
        if (confirmPassword.value !== password.value) {
            validation.show('error-confirmation', 'Your password does not match');
            checkValidation = false
        }
    }
    return checkValidation;
}
btnRegister.onclick = (event) => {
    event.preventDefault();
    if (validationForm()) {
        $.ajax({
            type: 'POST',
            url: '/api/register',
            data: {
                family_name: familyName.value,
                given_name: givenName.value,
                dob: dob.value,
                username: email.value,
                password: password.value,
                email: email.value
            },
            success: function (result) {
                notify.success("Created successfully");
            },
            error: function (request, error, status) {
                notify.error("Created failed");
            }
        })
    }
}