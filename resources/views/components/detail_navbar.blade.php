<nav class="flex items-center justify-between bg-gray-200 pt-2 pl-2 pr-2 pb-0">
    <div class="flex items-center flex-shrink-0 text-white mr-4 h-20">
        <a href="/homepage">
            <img src="{{ URL('/assets/images/loginLogo.png') }}" alt="Logo" class="h-20 w-full mr-2">
        </a>
    </div>
    <div class="flex items-center mr-4">
        <div class="relative">
            <button id="dropdown-button" class="flex items-center justify-center">
                <img src="assets/icons/user.png" alt="User" class="h-3/4 w-3/4">
            </button>
            <ul id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10 hidden">
                <li><button type="button"
                        class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">User
                        Profile</button></li>
                <li><button type="button"
                        class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                        id="logout-btn">Logout</button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    const dropdownButton = document.querySelector('#dropdown-button');
    const dropdownMenu = document.querySelector('#dropdown-menu');
    const logoutBtn = document.querySelector('#logout-btn');
    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
    logoutBtn.addEventListener('click', (event) => {
        event.preventDefault();
        $.ajax({
            url: 'logout',
            type: 'POST',
            success: function(response) {
                // console.log('true');
                window.location.href = '/login';
            },
            error: function(jqXHR, textStatus, errorThrown) {
                window.location.href = '/login';
                // console.log('false');
            }
        })
    });
</script>
