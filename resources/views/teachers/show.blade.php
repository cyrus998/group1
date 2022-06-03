<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher Details') }}
        </h2>
    </x-slot>


    <section class="mt-5 mb-5">
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <a href="{{route('teachers.index')}}" class="btn btn-dark mb-3">Back</a>
                    <div class="card">
                        <div class="card-body">
                            <h1>Instructor: <span style="font-weight:bold">{{$teacher->teacherName}}</span></h1>
                            <hr>
                            <h5>Assigned Course: <span style="font-weight:bold">{{$teacher->specialization}}</span></h5>
                            <h5>Created at: <span style="font-weight:bold">{{$teacher->created_at}}</span></h5>
                            <h5>Updated at: <span style="font-weight:bold">{{$teacher->updated_at}}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-app-layout>