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
                        <form method="POST" action="{{route('admin.profile.change-password')}}">
                            @csrf
                            <div class="row my-4">
                                <div class="col">
                                    <label for="password">New Password</label>
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
                            <button type="submit" class="btn btn-outline-success">Update Password</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
@endsection

@section('extra_scripts')

@endsection
