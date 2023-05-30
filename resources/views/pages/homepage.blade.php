@extends('layouts.main_layout')
@section('main-body')
    @include('components.navbar')
    <div class="owner-class">
        <div class="font-bold mb-4 px-4 mt-6 mx-4 flex" style="font-size: 25px;">
            <div class="mr-4">
                Your classes
            </div>
            <button id="dropdown-owner">
                <img class="w-1/2 " src="{{ URL('/assets/icons/dropdown.png') }}" alt="">
            </button>
        </div>
        <div class="flex flex-wrap m-4" id="owner-class-card" style="display: flex">
        </div>
    </div>
    <div class="joined-class">
        <div class="font-bold mb-4 px-4 mt-6 mx-4 flex" style="font-size: 25px;">
            <div class="mr-4">
                Classes you join
            </div>
            <button id="dropdown-join">
                <img class="w-1/2 " src="{{ URL('/assets/icons/dropdown.png') }}" alt="">
            </button>
        </div>
        <div class="flex flex-wrap m-4" id="joined-class-card" style="display: flex">
        </div>
    </div>
    @vite('resources/js/service/homepage.js')
@endsection
