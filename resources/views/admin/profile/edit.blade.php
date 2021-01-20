@extends('layouts.admin')

@section('title', 'Edit profile')

@section('extra_styles')

@endsection

@section('content')

        <div class="row">
            <div class="col-md-10 offset-md-1">

                <!-- Default Card Example -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.profile.update')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ Auth::user()->name }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{ Auth::user()->email }}" readonly/>
                            </div>
                            <div class="row my-4">
                                <div class="col">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" @if($profile != null) value="{{$profile->phone}}" @endif placeholder="Enter phone">
                                    @error('phone')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob" @if($profile != null) value="{{$profile->dob}}" @endif placeholder="Enter date of birth">
                                    @error('dob')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="gender">Gender</label>
                                    </div>
                                    <select class="custom-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="">Choose...</option>
                                        <option @if($profile != null && $profile->gender == 'male') selected @endif value="male">Male</option>
                                        <option @if($profile != null && $profile->gender == 'female') selected @endif value="female">Female</option>
                                    </select>
                                </div>
                                @error('gender')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-outline-success">Update</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
@endsection

@section('extra_scripts')

@endsection
