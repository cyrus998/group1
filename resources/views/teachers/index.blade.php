<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teachers') }}
        </h2>
    </x-slot>
    <style>
        #teachers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #custogradesmers td,
        #teachers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #teachers tr:nth-child(odd) {
            background-color: #fbfbfb;
        }

        #teachers tr:hover {
            background-color: rgb(221, 225, 238);
        }

        #teachers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #404040;
            color: white;
        }
    </style>

    <section class="mt-5 mb-5">
        <div class="container">
            @if(session()->has('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Teacher deleted</strong>
            </div>
            @else
            @endif
            <div class="d-flex mb-3">
                <div class="me-auto p-2">
                    <a href="{{route('teachers.create')}}" class="btn" style="background-color:#85BF67; color:white; font-weight: bold"><i class="bi bi-plus-circle-fill"></i> ADD NEW RECORD</a>
                </div>
                <div class="p-2">
                    <form action="{{route('teachers.index')}}" method="get">
                        @csrf
                        <input type="text" class="form-control shadow-none" name="search" placeholder="Search..." value="{{request()->query('search')}}">
                    </form>
                </div>
                <div class="p-2"><a href="{{route('teachers.exportTeachers')}}" class="btn btn-primary"><i class="bi bi-file-earmark-plus-fill"></i> Export</a></div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="ms-auto p-1">{{ $teachers->appends(['search'=>request()->query('search')])->links() }}</div>
                    <table id="teachers" class="mt-1 table table-bordered table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Teacher</th>
                                <th style="text-align: center">Specialization</th>
                                <th style="text-align: center">Last Updated</th>
                                <th style="text-align: center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$teacher->id}}</td>
                                <td>{{$teacher->teacherName}}</td>
                                <td>{{$teacher->specialization}}</td>
                                <td>{{$teacher->updated_at}}</td>
                                <td>
                                    <a href="{{route('teachers.show', $teacher->id)}}" class="btn btn-primary mb-1 me-2"><i class="bi bi-eye-fill"></i> View</a>
                                    <a href="{{route('teachers.edit', $teacher->id)}}" class="btn btn-warning mb-1 me-2"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <a href="{{route('teachers.destroy', $teacher->id)}}" class="btn btn-danger mb-1 me-2" onclick="return confirm('Are you sure you want to delete this course?')"><i class="bi bi-trash-fill"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
</x-app-layout>