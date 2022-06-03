<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Student Register</title>
    <link rel="stylesheet" href="/build/tailwind.css" type="text/css" media="screen" title="no title" charset="utf-8" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class>
    <div class="lg:flex">
        <div class="lg:w-1/2 xl:max-w-screen-sm">
            <div class="p-9 bg-gray-900 lg:bg-white flex justify-center lg:justify-start lg:px-12">
                <div class="cursor-pointer flex items-center">
                    <div>
                        <img class="w-16" src="https://cdn.discordapp.com/attachments/971130306751000636/980725050418274334/unknown.png" alt="">
                    </div>
                    <div class="text-4xl text-indigo-800 tracking-wide ml-2 font-semibold">Eden Academy</div>
                </div>
            </div>

            <x-jet-validation-errors class="mb-1 text-center" />

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            <div class="mt-5 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-1 xl:px-24 xl:max-w-2xl">
                <h2 class="text-center text-2xl text-indigo-900 font-display font-semibold lg:text-left xl:text-3xl
                    xl:text-bold">Student Register</h2>
                <div class="mt-2">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-2 text-sm font-display font-semibold text-gray-700">
                            Already Registered? <a href="{{ route('login') }}" class="cursor-pointer text-indigo-600 hover:text-indigo-800">Sign In Now.</a>
                        </div>
                        <div class="mt-3">
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Student Number</div>
                            <x-jet-input type="number" name="studentNumber" :value="old('studentNumber')" required autofocus autocomplete="" required class=" p-2 w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" placeholder="Student No. (ex. 1910071)" />
                        </div>

                        <div class="mt-3">
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Student Name</div>
                            <x-jet-input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class=" p-2 w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="" placeholder="Your Name (Ex. Anya Forger)" />
                        </div>

                        <div class="mt-3">
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Email Address</div>
                            <x-jet-input type="email" name="email" :value="old('email')" required class=" p-2 w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" placeholder="Enter your student email here" />
                        </div>


                        <div class="mt-3">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    Password
                                </div>
                            </div>
                            <x-jet-input type="password" name="password" required autocomplete="new-password" class=" p-2 w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" placeholder="Enter your password" />
                        </div>

                        <div class="mt-3">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    Confirm Password
                                </div>
                            </div>
                            <x-jet-input type="password" name="password_confirmation" required autocomplete="new-password" class=" p-2 w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" placeholder="Enter your password" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                        @endif
                        <div class="mt-10">

                            <x-jet-button class="text-white bg-gradient-to-r w-44 from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                {{ __('Register') }}
                            </x-jet-button>


                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-gray-800 flex-1 h-screen">
            <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
                <img src="https://media.discordapp.net/attachments/971130306751000636/980738551077564416/unknown.png" alt="">
            </div>
        </div>
    </div>
</body>

</html>