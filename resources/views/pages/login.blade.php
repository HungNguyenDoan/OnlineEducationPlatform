<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
    <title>Online Education Platform</title>
</head>

<body>
    <main>
        <div class="main relative bg-gray max-w-screen-lg md:max-w-none h-screen">
            <div class="background flex flex-col md:flex-row items-end h-full justify-between">
                <div class="sizeImg mb-10 md:mb-0 md:ml-10 ">
                    <img src="{{ URL('/assets/images/sizeImg.png') }}" alt="" class="w-full h-full object-cover">
                </div>
                <div class="sizeImg2 mb-10 md:ml-5 flex flex-row justify-end">
                    <img src="{{ URL('/assets/images/sizeImg2.png') }}" alt=""
                        class="w-full h-full object-cover">
                </div>
            </div>
            <div class="input absolute top-20 left-0 z-10 w-full h-auto flex justify-center">
                <img src="{{ URL('/assets/images/input.png') }}" alt="" class="w-full max-w-3xl">
                <form class="absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center">
                    <label class="text-gray-700 font-medium mb-2" for="email">Email</label>
                    <label class="text-white font-bold mb-2 text-left md:hidden" for="email">Email</label>
                    <input
                        class="bg-transparent border-b-2 border-gray-500 w-full py-2 text-white focus:outline-none focus:border-blue-500"
                        id="email" type="email" placeholder="Enter your email" required />
                    <label class="text-white font-bold mb-2 mt-4 text-left md:mt-6" for="password">Password</label>
                    <input
                        class="bg-transparent border-b-2 border-gray-500 w-full py-2 text-white focus:outline-none focus:border-blue-500"
                        id="password" type="password" placeholder="Enter your password" required />
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue mt-4 md:mt-6">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </main>
    {{-- <div class="input-form items-center">
        </div> --}}
</body>
<style>
    html,
    body {
        height: 100%;
        background-color: #FAF8F5;
    }

    main {
        max-width: 1380px;
        border: 0;
        margin: 0;
    }

    .input img {
        width: 100%;
    }
/* 
    @media (min-width: 1280px) and (max-width: 1600px) {
        .input img {
            height: 500%;
        }
    }

    .sizeImg img {
        width: 100%;
        height: auto;
    } */

    /* @media (min-width: 1200px) and (max-width: 1380px) {
        .sizeImg img {
            width: 80%;
            height: auto;
        }
    } */

    /* @media (max-width: 1380px) {
        .sizeImg img {
            width: 60%;
            height: auto;
        }
    }

    .sizeImg2 img {
        width: 100%;
        height: auto;
    } */

    /* @media (min-width: 1380px) {
        .sizeImg2 img {
            width: 80%;
            height: auto;
        }
    } */

    /* @media (min-width: 1280px) {
        .sizeImg2 img {
            width: 70%;
            height: auto;
        }
    } */
</style>

</html>
