<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Grades') }}
        </h2>
    </x-slot>


    <section class="mt-5 mb-5">
        <div class="container">
            <div class="d-flex mb-3">
                <div class="me-auto p-2">
                </div>
                <div class="p-2">
                    <form action="{{route('my-grades.index')}}" method="get">
                        @csrf
                        <input type="text" class="form-control shadow-none" name="search" placeholder="Search..." value="{{request()->query('search')}}">
                    </form>
                </div>
                <div class="p-2">
                    <a href="{{route('my-grades.printGradeSlip')}}" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Print Grades</a>
                </div>
            </div>
            <div class="row">
                @forelse($grades as $grade)

                <div class="col-sm-4 py-3">
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body">
                            <h4 class="card-title">{{$grade->course}}</h4>
                            <hr>
                            <p class="card-text"><strong>Prelim Grade:</strong> {{number_format($grade->prelim, 2)}}</p>
                            <p class="card-text"><strong>Midterm Grade: </strong>{{number_format($grade->midterm, 2)}}</p>
                            <p class="card-text"><strong>Final Grade: </strong>{{number_format($grade->final, 2)}}</p>
                            <p class="card-text"><strong>Average: </strong>{{number_format($grade->gwa, 2)}}</p>
                            @if($grade->gwa > 94)
                            <strong>Point Grade: </strong><span class="" style="color: #1b9f33">1</span>
                            @elseif($grade->gwa >= 88.5 && $grade-> gwa <= 93.99 ) <strong>Point Grade: <span class="" style="color: #1b9f33"> 1.25</strong></span>
                                @elseif($grade->gwa >= 83 && $grade-> gwa <= 88.49 ) <strong>Point Grade: <span class="" style="color: #1b9f33"> 1.50</strong><span>
                                    @elseif($grade->gwa >= 77.5 && $grade-> gwa <= 82.99 ) <strong>Point Grade: <span class="" style="color: #1b9f33"> 1.75</strong><span>
                                        @elseif($grade->gwa >= 72 && $grade-> gwa <= 77.49 ) <strong>Point Grade: <span class="" style="color: #1b9f33"> 2.00</strong><span>
                                            @elseif($grade->gwa >= 65.5 && $grade-> gwa <= 71.99 ) <strong>Point Grade: <span class="" style="color: #1b9f33"> 2.25</strong><span>
                                                @elseif($grade->gwa >= 61 && $grade-> gwa <= 65.49 ) <strong>Point Grade: <span class="" style="color: #1b9f33"> 2.5</strong><span>
                                                    @elseif($grade->gwa >= 55.5 && $grade-> gwa <= 60.99 )<strong>Point Grade: <span class="" style="color: #1b9f33"> 2.75</strong><span>
                                                         @elseif($grade->gwa >= 50 && $grade-> gwa <= 55.49 ) <strong>Point Grade: <span class="" style="color: #e3b727">3 </strong><span>
                                                             @endif
                                                                </p>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center fw-bold">Grades are not yet encoded.</p>
                @endforelse
            </div>
        </div>
    </section>
</x-app-layout>