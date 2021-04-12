@extends('layouts.app')

@section('content')
    {!!Form::open()->put()->route('posts.update', [$item->id])->fill($item)!!}
@include('posts._form')
    {!!Form::close()!!}
@endsection

