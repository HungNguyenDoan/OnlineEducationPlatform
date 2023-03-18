@extends('layouts.login_layout')
@section('main-body')
    <div class="min-h-screen bg-cover bg-center flex items-center justify-center"
        style="background-image: url({{ URL('/assets/images/bg-img.png') }})">
        <div class="max-w-md w-full space-y-8 p-8 rounded-lg shadow-md">
            <div>
                <img class="mx-auto h-12 w-auto" src="{{ URL('/assets/images/logo.png') }}" alt="Logo">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Create your account
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="/" method="POST" class="hidden">
                <div class="flex w-full">
                    <div class="first-name-input w-1/2">
                        <label for="first-name" class="block text-gray-700 font-bold mb-2">First Name</label>
                        <input id="first-name" name="first-name" type="text"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            placeholder="First Name">
                    </div>
                    <div class="last-name-input w-1/2">
                        <label for="last-name" class="block text-gray-700 font-bold mb-2">Last Name</label>
                        <input id="last-name" name="last-name" type="text"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            placeholder="Last Name">
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
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                        Username
                    </label>
                    <div class="mt-1">
                        <input id="username" name="username" type="text"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        Confirm password
                    </label>
                    <div class="mt-1">
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                </div>
                <div class="flex justify-between mt-6">
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
        btnSignIn.onclick = function(event) {
            event.preventDefault();
            window.location.href = '/login';
        }
    </script>
    <style>
        .first-name-input {
            margin-right: 0.5rem !important
        }
    </style>
@endsection
