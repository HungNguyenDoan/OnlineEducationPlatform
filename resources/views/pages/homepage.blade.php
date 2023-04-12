@extends('layouts.main_layout')
@section('main-body')
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
    {{-- <div class="w-full sm:w-1/2 md:w-1/4 px-4 mb-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <img class="w-full h-48 object-cover" src="/assets/bg-images/image-`+ img + `.png">
            <div class="p-4 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">`+ data[key].class_name + `</h2>
                <div class="relative">
                    <button
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-1 px-2 rounded inline-flex items-center">
                        <img src="{{ URL('/assets/icons/more.png') }}" alt="">
                    </button>
                    <ul class="absolute hidden text-gray-700 pt-1">
                        <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                href="#">Option 1</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    @vite('resources/js/service/homepage.js')
@endsection
