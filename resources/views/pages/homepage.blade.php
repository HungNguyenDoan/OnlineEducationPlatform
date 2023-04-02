@extends('layouts.main_layout')
@section('main-body')
    <div class="font-bold mb-4 px-4 mt-6 mx-4 flex" style="font-size: 25px;">
        <div class="mr-4">
            Your classes
        </div>
        <button id="dropdown">
            <img class="w-1/2 " src="{{ URL('/assets/icons/dropdown.png') }}" alt="">
        </button>
    </div>
    <div class="flex flex-wrap m-4" id="class-card" style="display: flex">
    </div>
    @vite('resources/js/service/homepage.js')
@endsection
