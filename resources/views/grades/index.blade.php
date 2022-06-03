<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grades') }}
        </h2>
    </x-slot>

    <style>
        #grades {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #custogradesmers td,
        #grades th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #grades tr:nth-child(odd) {
            background-color: #fbfbfb;
        }

        #grades tr:hover {
            background-color: rgb(221, 225, 238);
        }

        #grades th {
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
                <strong>Grade deleted</strong>
            </div>
            @else
            @endif
            <div class="d-flex mb-3">
                <div class="me-auto p-2">
                    <a href="{{route('grades.create')}}" class="btn" style="background-color:#85BF67; color:white; font-weight: bold"><i class="bi bi-plus-circle-fill"></i> ADD NEW RECORD</a>
                </div>
                <div class="p-2">
                    <form action="{{route('grades.index')}}" method="get">
                        @csrf
                        <input type="text" class="form-control shadow-none" name="search" placeholder="Search..." value="{{request()->query('search')}}">
                    </form>
                </div>
                <div class="p-2"><a href="{{route('grades.exportGrades')}}" class="btn btn-primary"><i class="bi bi-file-earmark-plus-fill"></i> Export</a></div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="ms-auto p-1">{{ $grades->appends(['search'=>request()->query('search')])->links() }}</div>

                    <table id="grades" class="mt-1 table table-bordered table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th style="text-align: center">Stud No.</th>
                                <th style="text-align: center">Course Title</th>
                                <th style="text-align: center">Prelim</th>
                                <th style="text-align: center">Midterm</th>
                                <th style="text-align: center">Final</th>
                                <th style="text-align: center">Average</th>
                                <th style="text-align: center">Point Grade</th>
                                <th style="text-align: center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($grades as $grade)
                            <tr>
                                <td>{{$grade->studentNumber}}</td>
                                <td>{{$grade->course}}</td>
                                <td>{{$grade->prelim}}</td>
                                <td>{{$grade->midterm}}</td>
                                <td>{{$grade->final}}</td>
                                <td>{{number_format($grade->gwa, 2)}}</td>
                                <td>@if($grade->gwa > 94)
                                    <span class="badge rounded-pill" style="background-color: #1b9f33">1</span>
                                    @elseif($grade->gwa >= 88.5 && $grade-> gwa <= 93.99 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 1.25</span>
                                        @elseif($grade->gwa >= 83 && $grade-> gwa <= 88.49 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 1.50<span>
                                                @elseif($grade->gwa >= 77.5 && $grade-> gwa <= 82.99 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 1.75<span>
                                                        @elseif($grade->gwa >= 72 && $grade-> gwa <= 77.49 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 2.00<span>
                                                                @elseif($grade->gwa >= 65.5 && $grade-> gwa <= 71.99 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 2.25<span>
                                                                        @elseif($grade->gwa >= 61 && $grade-> gwa <= 65.49 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 2.5<span>
                                                                                @elseif($grade->gwa >= 55.5 && $grade-> gwa <= 60.99 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 2.75<span>
                                                                                        @elseif($grade->gwa >= 50 && $grade-> gwa <= 55.49 ) <span class="badge rounded-pill bg-warning text-dark">3<span>
                                                                                                @endif
                                </td>
                                <td>
                                    <a href="{{route('grades.show', $grade->id)}}" class="btn btn-primary mb-1 me-2"><i class="bi bi-eye-fill"></i> View</a>
                                    <a href="{{route('grades.edit', $grade->id)}}" class="btn btn-warning mb-1 me-2"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <a href="{{route('grades.destroy', $grade->id)}}" class="btn btn-danger mb-1 me-2" onclick="return confirm('Are you sure you want to delete this course?')"><i class="bi bi-trash-fill"></i> Delete</a>
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