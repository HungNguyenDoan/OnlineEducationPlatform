@extends('layouts.main_layout')
@include('components.detail_navbar')
@section('main-body')
    <div class="py-6">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <div class="relative w-full mb-6 rounded-lg overflow-hidden">
                    <div class="bg-cover bg-center h-56 bg-[#6C63FF]"></div>
                    <div class="absolute inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-start px-5">
                        <h2 class="text-4xl font-bold text-white text-center" id="class-name"></h2>
                    </div>
                    <div class="absolute bottom-4 right-4">
                        <button class="relative px-4 py-2 bg-white text-white rounded-md shadow h-10 w-10 show-information">
                            <img src="assets/icons/information.png" class="absolute inset-0 m-auto w-8 h-8">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- information popup --}}
    <div id="information-popup" class="flex justify-center items-center top-0 right-0 popup">
        <div class="max-w-xl mx-auto bg-white shadow-md rounded-md overflow-hidden w-1/2 h-1/2 bg-white rounded-md"
            id="information-field">
            <div class="px-6 py-4 bg-blue-500">
                <h2 class="text-white text-xl font-bold">Class Information</h2>
            </div>
            <div class="grid grid-cols-2 gap-4 px-6 py-4">
                <div>
                    <p class="text-gray-800 text-lg py-3"><span class="font-bold">Class Name:</span></p>
                    <p class="text-gray-800 text-lg py-3"><span class="font-bold">Class Code:</span></p>
                    <p class="text-gray-800 text-lg py-3"><span class="font-bold">Teacher Name:</span></p>
                </div>
                <div id="information-data">
                    <p class="text-gray-800 text-lg py-3" id="info-class-name"></p>
                    <p class="text-gray-800 text-lg py-3" id="info-class-code"></p>
                    <p class="text-gray-800 text-lg py-3" id="info-teacher-name"></p>
                </div>
            </div>
        </div>
    </div>

    {{-- button --}}
    <nav>
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                <div class="w-2/3 flex items-center justify-around">
                    <button class="nav-btn active" data-target="material" id="btn-material">Lesson</button>
                    <button class="nav-btn" data-target="homework" id="btn-homework">Homework</button>
                    <button class="nav-btn" data-target="list" id="btn-list">Student</button>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex justify-center items-center w-1/3 mt-5">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded h-12 btn btn-add-lesson"
            id="btn-add-lesson">
            Add Lesson
        </button>
    </div>

    {{-- class data render --}}
    <div class="flex flex-col flex-no-wrap justify-center items-center" id="class-data">
    </div>

    {{-- homework data render --}}
    <div class="flex flex-col flex-no-wrap justify-center items-center" id="homework-display">
    </div>
    
    {{-- list student render --}}
    <div class="flex flex-col flex-no-wrap justify-center items-center" id="student-display">
    </div>

    {{-- detail lesson --}}
    <div class="flex justify-center items-center top-0 right-0 popup" id="detail-lesson">
        <div class="max-w-md mx-auto bg-white rounded p-8 shadow-md w-3/4" id="detail-field">
            <h2 class="text-2xl font-bold mb-4" id="title"></h2>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Start Time:</label>
                <div class="border border-gray-300 rounded py-2 px-3 mb-2" id="start-time"></div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">End Time:</label>
                <div class="border border-gray-300 rounded py-2 px-3" id="end-time"></div>
            </div>
            <div class="mb-4" id="material-area">
                <label class="block text-sm font-medium text-gray-700">Materials:</label>
                <div class="border border-gray-300 rounded py-2 px-3" id="material-data">
                </div>
            </div>
            <div class="mb-4" id="homework-area">
                <label class="block text-sm font-medium text-gray-700">Homework:</label>
                <div class="border border-gray-300 rounded py-2 px-3" id="homework-data">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Submit Time:</label>
                <div class="border border-gray-300 rounded py-2 px-3" id="submit-time">
                </div>
            </div>
            <div class="mb-4 flex flex-col" id="submition-field">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
                    Submition:
                </label>
                <input
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="file-submit" type="file" name="submition">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="submition-file">
                    Submit
                </button>
            </div>
            <div class="flex justify-end py-3">
                <button style="background-color: #BF0603;" class="px-2 py-2 text-white font-bold rounded-md"
                    id="delete-lesson">Delete</button>
            </div>
        </div>
    </div>

    {{-- popup add lesson --}}
    <div id="create-lesson-popup" class="flex justify-center items-center top-0 right-0 popup">
        <div class="flex flex-col justify-center items-center w-1/2 h-3/4 bg-white rounded-md" id="form-add-lesson">
            <div class="m-2 font-bold title">
                Add new lesson
            </div>
            <form class="bg-white px-8 py-6" id="lesson-create-form">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Title
                    </label>
                    <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" type="text" placeholder="Enter title" name="title">
                </div>
                <div class="flex mb-4">
                    <div class="w-1/2 mr-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="start-time">
                            Start Date
                        </label>
                        <input
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="start-date" type="date" name="start_time">
                    </div>
                    <div class="w-1/2 ml-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="end-time">
                            End Date
                        </label>
                        <input
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="end-date" type="date" name="end_time">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
                        Material
                    </label>
                    <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="file" type="file" name="material">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
                                Homework
                            </label>
                            <input
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="file" type="file" name="homework">
                        </div>
                    </div>
                    <div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="submit-time">
                                Submit Time
                            </label>
                            <input
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="submitTime" type="date" name="submitTime">
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <button
                        class="bg-[#6159DB] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit" id="lesson-submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- lesson-list --}}
    <div class="flex flex-col mx-5 my-5" id="lesson-list">
        <div class="bg-gray-100 p-2">
            <div class="flex flex-row font-semibold">
                <div class="flex-1 px-4 py-2">#</div>
                <div class="flex-1 px-4 py-2">Title</div>
                <div class="flex-1 px-4 py-2">Start Time</div>
                <div class="flex-1 px-4 py-2">End Time</div>
            </div>
        </div>

        <div class="border" id="lesson-data">
        </div>
    </div>

    {{-- popup lesson detail --}}

    @vite('resources/css/pages/classDetail.css')
    @vite('resources/css/components/navbar.css')
    @vite('resources/js/service/classDetail.js')
@endsection
