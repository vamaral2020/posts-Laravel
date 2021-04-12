@extends('layouts.app')

@section('content')
    {!!Form::open()->post()->route('posts.store')!!}
@include('posts._form')
    {!!Form::close()!!}
@endsection
