<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Student Login</title>
    <link rel="stylesheet" href="/build/tailwind.css" type="text/css" media="screen" title="no title" charset="utf-8" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class>
    <div class="lg:flex">
        <div class="lg:w-1/2 xl:max-w-screen-sm">
            <div class="py-12 bg-gray-800 lg:bg-white flex justify-center lg:justify-start lg:px-12">
                <div class="cursor-pointer flex items-center">
                    <div>
                        <img class="w-24" src="https://cdn.discordapp.com/attachments/971130306751000636/980725050418274334/unknown.png" alt="">
                    </div>
                    <div class="text-4xl bg-radial-at-bl from-sky-400 via-teal-900 to-blue-900 bg-gradient-to-r bg-clip-text text-transparent tracking-wide ml-2 font-semibold">Eden Academy.</div>
                </div>
            </div>

            <x-jet-validation-errors class="mb-4 mt-5 text-center" />

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            <div class="mt-5 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                <h2 class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">Student Log in</h2>
                <div class="mt-12">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Email Address</div>
                            <x-jet-input id="email" type="email" name="email" :value="old('email')" required class=" p-2 w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" placeholder="Enter your student email here" />
                        </div>
                        <div class="mt-8">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    Password
                                </div>
                            </div>
                            <x-jet-input id="password" type="password" name="password" required autocomplete="current-password" class=" p-2 w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" placeholder="Enter your password" />
                        </div>

                        <div class="mb-5">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class=" mb-5 text-xs font-display font-semibold text-indigo-600 hover:text-indigo-800
                                        cursor-pointer">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                        </div>
                        <div class="mt-10">
                            <x-jet-button class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                {{ __('Log in') }}
                            </x-jet-button>


                        </div>
                    </form>
                    <div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                        No Account Yet? <a href="{{ route('register') }}" class="cursor-pointer text-indigo-600 hover:text-indigo-800">Create one now.</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-gray-800 flex-1 h-screen">
            <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
                <img src="https://cdn.discordapp.com/attachments/971130306751000636/980725050418274334/unknown.png" alt="">
            </div>
        </div>
    </div>
</body>

</html>