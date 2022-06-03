<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit course') }}
        </h2>
    </x-slot>


    <section class="mt-5 mb-5">
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <a href="{{route('courses.index')}}" class="btn btn-dark mb-3">Back</a>
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Course updated successfully</strong>
                    </div>

                    @else
                    @endif
                    <div class="card border-0">
                        <div class="card-body">
                            <h4 class="card-title text-center mt-3"><strong>UPDATE COURSE INFORMATION</strong></h4>
                            <p class="card-text">Modify your existing record.</p>
                            <form method="post" action="{{route('courses.update', $course->id)}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="courseCode" class="form-label">Course Code</label>
                                    <input type="text" class="form-control shadow-none @error('courseCode') is-invalid @enderror" name="courseCode" id="courseCode" value="{{$course->courseCode}}">
                                    @error('courseCode')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="courseTitle" class="form-label">Course Title</label>
                                    <input type="text" class="form-control shadow-none @error('courseTitle') is-invalid @enderror" name="courseTitle" id="courseTitle" value="{{$course->courseTitle}}">
                                    @error('courseTitle')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="teacher" class="form-label">Teacher</label>
                                    <select class="form-control shadow-none @error('teacher') is-invalid @enderror" name="teacher" id="teacher">
                                        @foreach($teachers as $teacher)
                                        <option value="{{$teacher->teacherName}}">{{$teacher->teacherName}}</option>
                                        @endforeach
                                    </select>
                                    @error('teacher')
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