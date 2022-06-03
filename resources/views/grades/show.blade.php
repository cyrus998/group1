<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grade Details') }}
        </h2>
    </x-slot>


    <section class="mt-5 mb-5">
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <a href="{{route('grades.index')}}" class="btn btn-dark mb-3">Back</a>
                    <div class="card">

                        <div class="card-body">
                            <h1>Student No.: <span style="font-weight:bold">{{$grade->studentNumber}}</span></h1>
                            <hr>
                            <h5>Course Name: <span style="font-weight:bold">{{$grade->course}}</span></h5>
                            <h5>Prelim Grade: <span style="font-weight:bold">{{$grade->prelim}}</span></h5>
                            <h5>Midterm Grade: <span style="font-weight:bold">{{$grade->midterm}}</span></h5>
                            <h5>Final Grade: <span style="font-weight:bold">{{$grade->final}}</span></h5>
                            <h5>Average: <span style="font-weight:bold">{{number_format($grade->gwa, 2)}}</span></h5>
                            <h5>Point Grade: <span style="font-weight:bold">@if($grade->gwa > 94)
                                <span class="badge rounded-pill" style="background-color: #1b9f33">1</span>
                                    @elseif($grade->gwa >= 88.5 && $grade-> gwa <= 93.99 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 1.25</span>
                                        @elseif($grade->gwa >= 83 && $grade-> gwa <= 88.49 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 1.50<span>
                                            @elseif($grade->gwa >= 77.5 && $grade-> gwa <= 82.99 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 1.75<span>
                                                @elseif($grade->gwa >= 72 && $grade-> gwa <= 77.49 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 2.00<span>
                                                    @elseif($grade->gwa >= 65.5 && $grade-> gwa <= 71.99 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 2.25<span>
                                                        @elseif($grade->gwa >= 61 && $grade-> gwa <= 65.49 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 2.5<span>
                                                            @elseif($grade->gwa >= 55.5 && $grade-> gwa <= 60.99 ) <span class="badge rounded-pill" style="background-color: #1b9f33"> 2.75<span>
                                                                 @elseif($grade->gwa >= 50 && $grade-> gwa <= 55.49 ) <span class="badge rounded-pill bg-warning text-dark">3<span>
                                            @endif</span></h5>
                            <h5>Created at: <span style="font-weight:bold">{{$grade->created_at}}</span></h5>
                            <h5>Updated at: <span style="font-weight:bold">{{$grade->updated_at}}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-app-layout>