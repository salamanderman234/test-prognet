@extends('dashboard.user.template')

@section('content')
    <form action="{{ route('user.profile.save') }}" method="POST" class="w-100">
        @csrf
        <div class="row p-5">
            <div class="col-6">
                    <div class="container profile-image" style="background-image: url('{{ asset('storage/'.$user->profile_image) }}')">
                </div>
            </div>
            <div class="col-6">
                    <div class="container text-center mb-4">
                        <h3 class="fw-bold">Profile</h3>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control w-100" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="email" class="form-control w-100"  name="email" value="{{ $user->email }}">
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                        <button class="btn btn-danger me-3">Reset Password</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                
            </div>
        </div>
    </form>
@endsection