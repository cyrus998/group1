<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Details') }}
        </h2>
    </x-slot>


    <section class="mt-5 mb-5">
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <a href="{{route('courses.index')}}" class="btn btn-dark mb-3">Back</a>
                    <div class="card">

                        <div class="card-body">  
                            <h1>Course Code: <span style="font-weight:bold">{{$course->courseCode}}</span></h1>
                            <hr>
                            <h5>Course Name: <span style="font-weight:bold">{{$course->courseTitle}}</span></h5>
                            <h5>Instructor: <span style="font-weight:bold">{{$course->teacher}}</span></h5>
                            <h5>Created at: <span style="font-weight:bold">{{$course->created_at}}</span></h5>
                            <h5>Updated at: <span style="font-weight:bold">{{$course->updated_at}}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-app-layout>