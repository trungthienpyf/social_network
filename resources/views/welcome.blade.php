@extends('layouts.master')
@section('title')
    Laravel
@endsection
@section('content')
@include('includes.message-block')
    <div class="row">
        <div class="col-md-6 ">
            <form action="{{ route('signup') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" >
                </div>
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                </div>
                <button class="mt-3 btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-6 ">
            <form action="{{ route('signin') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button class="mt-3 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
