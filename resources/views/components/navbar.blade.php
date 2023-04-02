<nav class="flex items-center justify-between flex-wrap bg-gray-200 p-2">
    <div class="flex items-center flex-shrink-0 text-white mr-4">
        <img src="{{ URL('/assets/images/loginLogo.png') }}" alt="Logo" class="h-20 w-full mr-2">
    </div>
    <div class="flex items-center mr-4">
        <button class="create-button block px-3 py-2 text-white hover:text-gray-400">
            <img src="assets/icons/plus.png" alt="Add" class="h-2/3 w-2/3">
        </button>
        <button class="search-button block px-3 py-2 text-white hover:text-gray-400">
            <img src="assets/icons/search.png" alt="" class="h-2/3 w-2/3">
        </button>
        <a href="#" class="block px-3 py-2 text-white hover:text-gray-400">
            <img src="assets/icons/menu.png" alt="" class="h-2/3 w-2/3">
        </a>
        <div class="relative">
            <button id="dropdown-button" class="flex items-center justify-center">
                <img src="assets/icons/user.png" alt="User" class="h-2/3 w-2/3">
            </button>
            <ul id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10 hidden">
                <li><button type="button"
                        class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">User
                        Profile</button></li>
                <li><button type="button"
                        class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">Your
                        classes</button></li>
                <li><button type="button"
                        class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">Score</button>
                </li>
                <li><button type="button"
                        class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                        id="logout-btn">Logout</button>
                </li>
            </ul>
        </div>
    </div>
    {{-- popup search here --}}
    <div id="search-popup" class="flex justify-center items-center top-0 right-0 popup">
        <div class="flex flex-col justify-center items-center w-1/2 h-1/2 bg-white rounded-md" id="form-search">
            <div class="m-2 font-bold title">
                Join your class via classcode
            </div>
            <form action="#" class="w-1/2 flex">
                <input type="text" name="search" placeholder="Enter your class code here"
                    class="p-2 m-2 border rounded-lg" id="search-data">
                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 m-2"
                    id="submit-search">Join</button>
            </form>
        </div>
    </div>
    {{-- popup create class here --}}
    <div id="create-popup" class="flex justify-center items-center top-0 right-0 popup">
        <div class="flex flex-col justify-center items-center w-1/2 h-1/2 bg-white rounded-md" id="form-create">
            <div class="m-2 font-bold title">
                Create your class here
            </div>
            <form action="#" class="w-1/2 flex">
                <input type="text" name="search" placeholder="Enter your classname"
                    class="p-2 m-2 border rounded-lg" id="create-data">
                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 m-2"
                    id="submit-create">Create</button>
            </form>
        </div>
    </div>
</nav>
@vite('resources/css/components/navbar.css')
@vite('resources/js/components/navbar.js')
