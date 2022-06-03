<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create grades') }}
        </h2>
    </x-slot>


    <section class="mt-5 mb-5">
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <a href="{{route('grades.index')}}" class="btn btn-dark mb-3">Back</a>
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Grade updated successfully</strong>
                    </div>

                    @else
                    @endif
                    <div class="card border-0">
                        <div class="card-body">
                            <h4 class="card-title text-center mt-3"><strong>UPDATE GRADE RECORDS</strong></h4>
                            <p class="card-text">Modify your existing record.</p>
                            <form method="post" action="{{route('grades.update', $grade->id)}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="studentNumber" class="form-label">Student Number</label>
                                    <select class="form-control shadow-none @error('studentNumber') is-invalid @enderror" name="studentNumber" id="studentNumber">
                                        @foreach($users as $user)
                                        <option value="{{$user->studentNumber}}">{{$user->studentNumber}}</option>
                                        @endforeach
                                    </select>
                                    @error('studentNumber')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="course" class="form-label">Courses</label>
                                    <select class="form-control shadow-none @error('courses') is-invalid @enderror" name="course" id="course">
                                        @foreach($courses as $course)
                                        <option value="{{$course->courseTitle}}">{{$course->courseTitle}}</option>
                                        @endforeach
                                    </select>
                                    @error('course')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="prelim" class="form-label">Prelim Grade</label>
                                    <input type="number" step="0.01" class="form-control shadow-none @error('prelim') is-invalid @enderror" name="prelim" id="prelim" value="{{$grade->prelim}}">
                                    @error('prelim')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="midterm" class="form-label">Midterm Grade</label>
                                    <input type="number" step="0.01" class="form-control shadow-none @error('midterm') is-invalid @enderror" name="midterm" id="midterm" value="{{$grade->prelim}}">
                                    @error('midterm')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="final" class="form-label">Final Grade</label>
                                    <input type="number" step="0.01" class="form-control shadow-none @error('final') is-invalid @enderror" name="final" id="final" value="{{$grade->prelim}}">
                                    @error('final')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="reset" class="btn float-left" style="width: 130px; background-color:#455268; color:white;" onclick="return confirm('Clear your entry?')"> CLEAR</button>
                                    <button class="btn float-right" style="width: 130px; background-color:#85BF67; color:white;" type="submit" name="submit">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>