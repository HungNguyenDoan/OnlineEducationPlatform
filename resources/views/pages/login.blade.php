@extends('layouts.login_layout')
@section('main-body')
    <div class="min-h-screen bg-cover bg-center flex items-center justify-center"
        style="background-image: url({{ URL('/assets/images/bg-img.png') }})">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img src="{{ URL('/assets/images/loginLogo.png') }}" alt="Logo" class="mx-auto h-32 w-auto" />
            </div>
            <form class="mt-8 space-y-6" action="/" method="POST" class="hidden">
                <div class="rounded-md space-y-px">
                    <div>
                        <label for="email-address" class="block text-gray-700 font-bold mb-2">Email</label>
                        <input id="email-address" name="email" type="text" autocomplete="email"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm"
                            placeholder="Email address">
                        <span class="text-red-500 error" style="font-size: 10px; color: red" id="errorEmail"></span>
                    </div>
                    <div class="mt-4">
                        <label for="password" class="block text-gray-700 font-bold mb-2 mt-2">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm"
                            placeholder="Password">
                        <span class="text-red-500 error" style="font-size: 10px; color: red" id="errorPassword"></span>
                    </div>
                </div>
                <div class="flex justify-center space-x-4">
                    <button class="w-1/2 bg-[#784DF1] hover:bg-[#4706FF] text-white font-bold py-2 px-4 rounded"
                        id="btn-submit">
                        Login
                    </button>
                    <button class="w-1/2 bg-[#ADADB0] hover:bg-gray-500 text-white font-bold py-2 px-4 rounded"
                        id="btn-register">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
    @vite('resources/js/service/login.js')
@endsection
