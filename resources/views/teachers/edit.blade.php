<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit teacher') }}
        </h2>
    </x-slot>


    <section class="mt-5 mb-5">
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <a href="{{route('teachers.index')}}" class="btn btn-dark mb-3">Back</a>
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Teacher updated successfully</strong>
                    </div>
                    @else
                    @endif
                    <div class="card border-0">
                        <div class="card-body">
                            <h4 class="card-title text-center mt-3"><strong>UPDATE INSTRUCTOR INFORMATION</strong></h4>
                            <p class="card-text">Modify your existing record.</p>
                            <form method="post" action="{{route('teachers.update', $teacher->id)}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="teacherName" class="form-label">Name</label>
                                    <input type="text" class="form-control shadow-none @error('teacherName') is-invalid @enderror" name="teacherName" id="teacherName" value="{{$teacher->teacherName}}">
                                    @error('teacherName')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="specialization" class="form-label">Specialization</label>
                                    <select class="form-control shadow-none @error('specialization') is-invalid @enderror" name="specialization" id="specialization">
                                        <option selected>Select a specialization</option>
                                        <option value="IT">IT</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Entrepreneurship">Entrepreneurship</option>
                                        <option value="Arts">Arts</option>
                                        <option value="Humanities">Humanities</option>
                                        <option value="Language">Language</option>
                                    </select>
                                    @error('specialization')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="salary" class="form-label">Salary</label>
                                    <input type="number" class="form-control shadow-none @error('salary') is-invalid @enderror" name="salary" id="salary" value="{{$teacher->salary}}">
                                    @error('salary')
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