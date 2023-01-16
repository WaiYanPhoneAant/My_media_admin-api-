@extends('admin.layouts.app')
@section('profile','active text-white bg-primary')
@section('header','Password Change')
@section('content')

    <div class="m-3">
        <div class="header d-flex mb-3  justify-content-between align-items-center">
            <div class="h6 float-right"><a href="{{route('dashboard')}}" class="btn btn-secondary"><i class="fa-solid fa-caret-left me-1"></i>back</a></div>
            <div class="h2 d-sm-none d-block ">Change Password</div>
        </div>
        <form action="{{route('admin#PwChange')}}" method="POST">
            @csrf
            @if (session('success'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            @endif
            @if (session('wrongPw'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('wrongPw')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            @endif
            <div class="mb-3">
                <label for="oldPassword" class="form-label" >Old Password</label>
                <input type="password" class="form-control" name="oldPassword" id="name" value="" aria-describedby="emailHelp">
                @error('oldPassword')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">New Password</label>
              <input type="password" class="form-control" name="newPassword" id="exampleInputEmail1"  value="" aria-describedby="emailHelp">
                @error('newPassword')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword"  value="" id="Phone" aria-describedby="emailHelp">
                @error('confirmPassword')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">Change Password</button>


        </form>
    </div>
@endsection
