@extends('layouts.mainlayout')

@section('title','Delete User')

@section('content')
    <h2>Are you sure to delete user {{$user->name}} ?</h2>
    <div class="mt-9">
        <a href="/user-destroy/{{$user->slug}}" class="btn btn-danger me-5">Sure</a>
        <a href="/users" class="btn btn-primary">Cancel</a>
    </div>
@endsection
