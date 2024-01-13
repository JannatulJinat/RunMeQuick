<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>RunMeQuick</title>
</head>

<body class="bg-gray-200">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-black rounded-lg shadow-lg p-10">
            <div class="text-center">
                <h1 class="text-4xl text-white font-bold">RunMeQuick</h1>
            </div>
            <div class="mt-10">
                @auth
                    <a href="#"
                        class="bg-gray-200 rounded-md hover:bg-green-500 px-5 py-3">Profile</a>
                    <a href="#" class="bg-gray-200 rounded-md hover:bg-green-500 px-5 py-3">Start
                        Now</a>
                @else
                    <a href="{{ route('register') }}"
                        class="bg-gray-200 rounded-md hover:bg-green-500 px-5 py-3 mr-5">Register</a>
                    <a href="#"
                        class="bg-gray-200 rounded-md hover:bg-green-500 px-5 py-3 mr-5">Login</a>
                    <a href="#" class="bg-gray-200 rounded-md hover:bg-green-500 px-5 py-3">Start
                        Now</a>
                @endauth
            </div>
        </div>
    </div>
</body>

</html>
