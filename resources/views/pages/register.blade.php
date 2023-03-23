@extends('layouts.login_layout')
@section('main-body')
    <div class="min-h-screen bg-cover bg-center flex items-center justify-center"
        style="background-image: url({{ URL('/assets/images/bg-img.png') }})">
        <div class="max-w-md w-full space-y-8 p-8 rounded-lg shadow-md">
            <div>
                <img class="mx-auto h-32 w-auto" src="{{ URL('/assets/images/loginLogo.png') }}" alt="Logo">
                {{-- <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Create your account
                </h2> --}}
            </div>
            <form class="mt-4 space-y-6" action="/" method="POST" class="hidden">
                <div class="flex w-full">
                    <div class="first-name-input w-1/2">
                        <label for="first-name" class="block text-gray-700 font-bold mb-2">Family Name</label>
                        <input id="family-name" name="family-name" type="text"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        <span class="text-red-500 error" id="error-family-name"></span>
                    </div>
                    <div class="last-name-input w-1/2">
                        <label for="last-name" class="block text-gray-700 font-bold mb-2">Given Name</label>
                        <input id="given-name" name="given-name" type="text"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        <span class="text-red-500 error" id="error-given-name"></span>
                    </div>
                </div>
                <div>
                    <label for="dob" class="block text-sm font-medium text-gray-700">
                        Date of birth
                    </label>
                    <div class="mt-1">
                        <input id="dob" name="dob" type="date"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <span class="text-red-500 error" id="error-dob"></span>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="text"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <span class="text-red-500 error" id="error-email"></span>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <span class="text-red-500 error" id="error-password"></span>
                </div>

                <div>
                    <label for="password-confirmation" class="block text-sm font-medium text-gray-700">
                        Confirm password
                    </label>
                    <div class="mt-1">
                        <input id="password-confirmation" name="password-confirmation" type="password"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <span class="text-red-500 error" id="error-confirmation"></span>
                </div>
                <div class="flex justify-between mt-4">
                    <div class="flex flex-col w-full">
                        <span class="invisible text-sm">Register</span>
                        <button class="bg-[#784DF1] hover:bg-[#4706FF] text-white font-bold py-2 px-4 rounded mr-4 mt-2"
                            id="btn-register">
                            Register
                        </button>
                    </div>
                    <div class="flex flex-col w-full">
                        <span class="text-gray-600 text-sm flex justify-center">Have an account?</span>
                        <button class="bg-[#ADADB0] hover:bg-gray-500 text-white font-bold py-2 px-4 rounded mt-2"
                            id="btn-signin">
                            Sign In
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const btnRegister = document.getElementById('btn-register');
        const btnSignIn = document.getElementById('btn-signin');
        const familyName = document.getElementById('family-name');
        const givenName = document.getElementById('given-name');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password-confirmation');
        const dob = document.getElementById('dob')
        btnSignIn.onclick = function(event) {
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
                    success: function(result) {
                        notify.success("Created sucessfully");
                    },
                    error: function(request, error, status) {
                        notify.error("Created failed");
                    }
                })
            }
        }
    </script>
    <style>
        .first-name-input {
            margin-right: 0.5rem !important
        }

        .error {
            font-size: 12px;
        }
    </style>
@endsection
