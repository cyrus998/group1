<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />

<x-app-layout>
    <br>
    <!-- ADMIN SIDE -->
    @if(Auth::user()->user_type=="admin")
    <div class="container mt-3">
        <div class="sm:items-center sm:flex">
            <div class="text-center sm:text-left pb-4">
                <h1 class="text-2xl font-bold text-gray-900 sm:text-2xl">
                    Welcome to the Admin Dashboard, <span class="text-cyan-700 font-bold">{{ auth()->user()->name }} </span> !
                </h1>
            </div>
        </div>
    </div>

    <section class="text-white bg-[url('https://images.unsplash.com/photo-1526289034009-0240ddb68ce3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1742&q=80')]">
        <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
            <div class="max-w-lg mx-auto text-center">
                <h2 class="text-3xl font-bold sm:text-4xl">You are an Admin.</h2>

                <p class="mt-4 text-gray-300">
                    Here are some tools that you can use:
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3">
                <a class="block p-8 transition border border-gray-800 shadow-xl rounded-xl hover:shadow-pink-500/10 hover:border-pink-500/10" href="{{ route('courses.index') }}">
                    <img style="width:42" src="https://media.discordapp.net/attachments/971130306751000636/981174821494849556/unknown.png" alt="">

                    <h3 class="mt-4 text-4xl font-bold text-white">Courses.</h3>

                    <p class="mt-1 text-sm text-gray-300">
                        Create and Edit Courses, Titles, and set corresponding instructors.
                    </p>
                </a>


                <a class="block p-8 transition border border-gray-800 shadow-xl rounded-xl hover:shadow-pink-500/10 hover:border-pink-500/10" href="{{ route('teachers.index') }}">
                    <img style="width:42" src="https://media.discordapp.net/attachments/971130306751000636/981174821494849556/unknown.png" alt="">

                    <h3 class="mt-4 text-4xl font-bold text-white">Teachers</h3>

                    <p class="mt-1 text-sm text-gray-300">
                        Add new instructors, set salary profiles, and configure specialization.
                    </p>
                </a>

                <a class="block p-8 transition border border-gray-800 shadow-xl rounded-xl hover:shadow-pink-500/10 hover:border-pink-500/10" href="{{ route('grades.index') }}">
                    <img style="width:42" src="https://media.discordapp.net/attachments/971130306751000636/981174821494849556/unknown.png" alt="">

                    <h3 class="mt-4 text-4xl font-bold text-white">Grades</h3>

                    <p class="mt-1 text-sm text-gray-300">
                        Manage student's grade, encode Prelim, Midterm and Final grades corresponding to their courses.
                    </p>
                </a>

            </div>
    </section>

    <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 p-5">
            <div class="bg-white max-w-xs rounded overflow-hidden shadow-xl">
                <img class="w-full" src="{{ asset('/images/create.png') }}" alt="Trainers">
                <div class="py-4 px-6">
                    
                    <p class="text-gray-700 mt-2">Create allows you to add new rows to your table. You can do that using the command, INSERT INTO.</p>
                </div>
            </div>

            <div class="bg-white max-w-xs rounded overflow-hidden shadow-xl">
                <img class="w-full" src="{{ asset('/images/update.png') }}" alt="Trainers">
                <div class="py-4 px-6">
                    
                    <p class="text-gray-700 mt-2">Update is how we change an existing record in the table. We can use this to modify existing records.</p>
                </div>
            </div>

            <div class="bg-white max-w-xs rounded overflow-hidden shadow-xl">
                <img class="w-full" src="{{ asset('/images/delete.png') }}" alt="Trainers">
                <div class="py-4 px-6">
                    
                    <p class="text-gray-700 mt-2">Delete is used to remove a record from the table. SQL and has a built-in delete function for deleting one or more records.</p>
                </div>
            </div>

            <div class="bg-white max-w-xs rounded overflow-hidden shadow-xl">
                <img class="w-full" src="{{ asset('/images/search.png') }}" alt="Trainers">
                <div class="py-4 px-6">
                    
                    <p class="text-gray-700 mt-2">Authentication is used by a server when the server needs to know exactly who is accessing their information or site.</p>
                </div>
            </div>

            <div class="bg-white max-w-xs rounded overflow-hidden shadow-xl">
                <img class="w-full" src="{{ asset('/images/auth.png') }}" alt="Trainers">
                <div class="py-4 px-6">
                    
                    <p class="text-gray-700 mt-2">Searching is the process of finding a given value position in a list of values. It decides whether a search key is present.</p>
                </div>
            </div>

            <div class="bg-white max-w-xs rounded overflow-hidden shadow-xl">
                <img class="w-full" src="{{ asset('/images/preview.png') }}" alt="Trainers">
                <div class="py-4 px-6">
                    <p class="text-gray-700 mt-2">The preview function is similar to a search function, as it allows you to get specific records and read their values. </p>
                </div>
            </div>


        </div>

    </div>


    <!-- USER SIDE -->
    @elseif(Auth::user()->user_type=="user")
    <div class="rounded">
        <div class="max-w-screen-xl mx-auto">
            <div class="sm:items-center sm:flex">
                <div class="text-center sm:text-left pb-4">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-2xl">
                        Welcome to the Student Dashboard, <span class="text-cyan-700 font-bold">{{ auth()->user()->name }} </span> !
                    </h1>
                </div>
            </div>
        </div>
        <aside class="relative overflow-hidden text-gray-300 bg-gray-900 lg:flex">
            <div class="w-full p-12 text-center lg:w-1/2 sm:p-16 lg:p-24 lg:text-left">
                <div class="max-w-xl mx-auto lg:ml-0">
                    <p class="text-sm font-medium">The finest among the finest.</p>

                    <p class="mt-2 text-2xl font-bold text-white sm:text-3xl">
                        Eden Academy. Your Home.
                    </p>

                    <p class="hidden lg:mt-4 lg:block">
                        We are an institution that is commited to produce quality graduates, by training our students to become useful and effective citizens, with the use of technology and innovation for learning.
                    </p>

                    <a href="" class="inline-block px-5 py-3 mt-8 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                        Start my journey now.
                    </a>
                </div>
            </div>
            <!-- the cool carousell -->
            <div class="relative w-full h-64 sm:h-96 lg:w-1/1 lg:h-auto">
                <div id="carouselDarkVariant" class="mt-4 carousel slide carousel-fade carousel-dark relative" data-bs-ride="carousel">
                    <!-- Indicators -->
                    <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
                        <button data-bs-target="#carouselDarkVariant" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button data-bs-target="#carouselDarkVariant" data-bs-slide-to="1" aria-label="Slide 1"></button>
                        <button data-bs-target="#carouselDarkVariant" data-bs-slide-to="2" aria-label="Slide 1"></button>
                    </div>

                    <!-- Inner -->
                    <div class="carousel-inner relative w-full overflow-hidden">
                        <!-- Single item -->
                        <div class="carousel-item active relative float-left w-full">
                            <img src="https://media.discordapp.net/attachments/971130306751000636/980765760580382750/unknown.png?width=1200&height=530" class="block w-full" alt="Motorbike Smoke" />
                            <div class="carousel-caption hidden md:block absolute text-center">
                                <h5 class="text-xl text-white">The School</h5>
                                <p class="text-white">Main Entrance Circa 2019</p>
                            </div>
                        </div>

                        <!-- Single item -->
                        <div class="carousel-item relative float-left w-full">
                            <img src="https://media.discordapp.net/attachments/971130306751000636/980765616401170462/unknown.png?width=1200&height=530" class="block w-full" alt="Mountaintop" />
                            <div class="carousel-caption hidden md:block absolute text-center">
                                <h5 class="text-xl text-white">Grad Students</h5>
                                <p class="text-white">Circa 2018.</p>
                            </div>
                        </div>

                        <!-- Single item -->
                        <div class="carousel-item relative float-left w-full">
                            <img src="https://media.discordapp.net/attachments/971130306751000636/980765221285163048/unknown.png?width=1200&height=530" class="block w-full" alt="Woman Reading a Book" />
                            <div class="carousel-caption hidden md:block absolute text-center">
                                <h5 class="text-xl text-white">Graduates</h5>
                                <p class="text-white">Circa 2018</p>
                            </div>
                        </div>
                    </div>
                    <!-- Inner -->

                    <!-- Controls -->
                    <button class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0" type="button" data-bs-target="#carouselDarkVariant" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0" type="button" data-bs-target="#carouselDarkVariant" data-bs-slide="next">
                        <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </aside>

        <!-- another section  dito: -->



        <section class="text-white bg-[url('https://images.unsplash.com/photo-1645628653101-63bb9d791e3d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1742&q=80')]">
            <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
                <div class="max-w-lg mx-auto text-center">
                    <h2 class="text-3xl font-bold sm:text-4xl">What can i do here?</h2>

                    <p class="mt-4 text-gray-300">
                        A quick guide on what you can accomplish on this app.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3">
                    <a class="block p-8 transition border border-gray-800 shadow-xl rounded-xl hover:shadow-pink-500/10 hover:border-pink-500/10" href="{{ route('profile.show') }}">
                        <img style="width:42" src="https://media.discordapp.net/attachments/971130306751000636/981174821494849556/unknown.png" alt="">

                        <h3 class="mt-4 text-xl font-bold text-white">Access Your Profile.</h3>

                        <p class="mt-1 text-sm text-gray-300">
                            View your profile, customize your personal details, and change your email address.
                        </p>
                    </a>


                    <a class="block p-8 transition border border-gray-800 shadow-xl rounded-xl hover:shadow-pink-500/10 hover:border-pink-500/10" href="{{ route('profile.show') }}">
                        <img style="width:42" src="https://media.discordapp.net/attachments/971130306751000636/981174821494849556/unknown.png" alt="">

                        <h3 class="mt-4 text-xl font-bold text-white">Secure my Account</h3>

                        <p class="mt-1 text-sm text-gray-300">
                            Secure your account with tools such as 2FA, and browser session. You can even logout of all instances!
                        </p>
                    </a>

                    <a class="block p-8 transition border border-gray-800 shadow-xl rounded-xl hover:shadow-pink-500/10 hover:border-pink-500/10" href="{{ route('my-grades.index') }}">
                        <img style="width:42" src="https://media.discordapp.net/attachments/971130306751000636/981174821494849556/unknown.png" alt="">

                        <h3 class="mt-4 text-xl font-bold text-white">See my Grades</h3>

                        <p class="mt-1 text-sm text-gray-300">
                            View your (hopefully) High grades that you have made this semester, and this school year! We wish you luck on your journey!
                        </p>
                    </a>

                </div>
        </section>

        <h1 class="text-4xl text-center mt-5 mb-3">Frequently Asked Questions. (FAQs)</h1>
        <!-- the faqing faq -->
        <div class="container px-20 py-2">
            <div class="space-y-4">
                <details class="group" open>
                    <summary class="flex items-center justify-between p-4 rounded-lg cursor-pointer bg-gray-50">
                        <h5 class="font-medium text-gray-900">
                            When Does the School Year Start?
                        </h5>

                        <svg class="flex-shrink-0 ml-1.5 w-5 h-5 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>

                    <p class="px-4 mt-4 leading-relaxed text-gray-700">
                        School Year starts at the second week of August, 2022, and ends on the last week of June.
                    </p>
                </details>

                <details class="group">
                    <summary class="flex items-center justify-between p-4 rounded-lg cursor-pointer bg-gray-50">
                        <h5 class="font-medium text-gray-900">
                            What is the passing grade on Eden Academy?
                        </h5>

                        <svg class="flex-shrink-0 ml-1.5 w-5 h-5 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>

                    <p class="px-4 mt-4 leading-relaxed text-gray-700">
                        Meritable students shall be required to have atleast a passing grade of 85.50 to be able to continue the rest of the program.
                    </p>
                </details>

                <details class="group">
                    <summary class="flex items-center justify-between p-4 rounded-lg cursor-pointer bg-gray-50">
                        <h5 class="font-medium text-gray-900">
                            When are grades posted?
                        </h5>

                        <svg class="flex-shrink-0 ml-1.5 w-5 h-5 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>

                    <p class="px-4 mt-4 leading-relaxed text-gray-700">
                        Schedule of grade posting is always subjected to change, and will be announced by the faculty as soon as possible.
                    </p>
                </details>

                <details class="group">
                    <summary class="flex items-center justify-between p-4 rounded-lg cursor-pointer bg-gray-50">
                        <h5 class="font-medium text-gray-900">
                            Where can i contact this institution?
                        </h5>

                        <svg class="flex-shrink-0 ml-1.5 w-5 h-5 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>

                    <p class="px-4 mt-4 leading-relaxed text-gray-700">
                        You may reach us at the following: <br>
                        Telephone Number: <span class="text-cyan-700 font-bold"> +1770136865 </span><br>
                        Facebook Messenger: <a href="https://www.facebook.com/"> <span class="text-cyan-700 font-bold">Facebook Page </span></a>
                    </p>
                </details>
            </div>
        </div>

    </div>



    @endif

    <br>

    <footer class="bg-gray-200 text-center lg:text-left">
        <div class="text-white text-center p-4 bg-dark">
            © 2022 Copyright:
            <a class="text-white" href="https://tip.edu.ph/">Eden Academy</a>
        </div>
    </footer>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</x-app-layout>