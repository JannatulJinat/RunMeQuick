@extends('layout.app', ['hide_header' => false, 'hide_footer' => false])
@section('content')
    <div class="p-10">
        <p class="mb-5">@yield('language') Coding Ground:</p>
        <div class="flex items-center justify-between mb-10">
            <div>
                <a href="{{ route('php') }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white rounded px-5 py-2 @yield('phpButton', '')">PHP</button>
                </a>
                <a href="{{ route('python') }}">
                    <button
                        class="bg-yellow-500 hover:bg-yellow-700 text-white rounded px-5 py-2 @yield('pythonButton', '')">Python</button>
                </a>
                <a href="{{ route('js') }}">
                    <button
                        class="bg-green-500 hover:bg-green-700 text-white rounded px-5 py-2 @yield('jsButton', '')">JS</button>
                </a>
                <a href="{{ route('go') }}">
                    <button
                        class="bg-purple-500 hover:bg-indigo-700 text-white rounded px-5 py-2 @yield('goButton', '')">Go</button>
                </a>
            </div>
            <div>
                @auth
                    <a href="{{ route('profile') }}">
                        <button class="bg-gray-500 hover:bg-gray-700 text-white rounded px-5 py-2">Profile</button>
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <button class="bg-gray-500 hover:bg-gray-700 text-white rounded px-5 py-2">Login</button>
                    </a>
                    <a href="{{ route('register') }}">
                        <button class="bg-gray-500 hover:bg-gray-700 text-white rounded px-5 py-2">Register</button>
                    </a>
                @endauth
            </div>
        </div>
        <div class="mb-7">
            <form method="POST" action="{{ $formAction }}">
                @csrf
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <p class="text-xl">@yield('fileName')</p>
                    </div>
                    <div> <input type='submit' name="runButton"
                            class="bg-green-500 hover:bg-green-700 text-white rounded px-5 py-2">
                    </div>
                </div>
                <textarea name="input" class="border border-gray-800 rounded w-full p-2" rows="7">
@isset($input)
{{ $input }}
@endisset
</textarea>
            </form>
        </div>
        <div>
            <p class="text-xl mb-5">Output</p>
            <div id="output" class="border border-gray-800 rounded w-full p-2 mb-10 min-h-20 bg-white">
                @isset($output)
                    {{ $output }}
                @endisset
            </div>
        </div>
    </div>
@endsection
