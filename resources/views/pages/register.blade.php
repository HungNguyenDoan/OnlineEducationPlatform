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
                <div class="mt-2">
                    <label for="dob" class="block text-sm font-medium text-gray-700">
                        Date of birth
                    </label>
                    <div class="mt-1">
                        <input id="dob" name="dob" type="date"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <span class="text-red-500 error" id="error-dob"></span>
                </div>
                <div class="mt-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="text"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <span class="text-red-500 error" id="error-email"></span>
                </div>

                <div class="mt-2">
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <span class="text-red-500 error" id="error-password"></span>
                </div>

                <div class="mt-2">
                    <label for="password-confirmation" class="block text-sm font-medium text-gray-700">
                        Confirm password
                    </label>
                    <div class="mt-1">
                        <input id="password-confirmation" name="password-confirmation" type="password"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <span class="text-red-500 error" id="error-confirmation"></span>
                </div>
                <div class="flex justify-between mt-2">
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
    @vite('resources/js/service/register.js')
    @vite('resources/css/pages/register.css')
@endsection
