@extends('layouts.admin')

@section('title', 'Add new user')

@section('extra_styles')

@endsection

@section('content')
        <div class="row">
            <div class="col-md-10 offset-md-1">

                <!-- Default Card Example -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.user.add')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter name">
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter email">
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="row my-4">
                                <div class="col">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter password">
                                    @error('password')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Enter confirm password">
                                    @error('password_confirmation')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
@endsection

@section('extra_scripts')

@endsection
