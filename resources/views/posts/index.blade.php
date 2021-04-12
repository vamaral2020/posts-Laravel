@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<a class="btn btn-primary" href="{{route('posts.create')}}">Adicionar Novo</a>
</div>
</div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Sub-Titulo</th>
                <th>Editar</th>
                <th>visualisar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->subtitle}}</td>
                <td>{{$item->content}}</td>
                <td><a href="{{route('posts.edit', $item->id)}}">Editar</a></td>
                <td><a href="{{route('posts.show', $item->id)}}">visualisar</a></td>
                <td>
                    <form action="{{route('posts.destroy', $item->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button>Deletar</button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="30">Não foram encontradas informações</td>

            </tr>
           @endforelse

    </tbody>
</table>
</div>
@endsection
