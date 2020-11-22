@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">All the tags</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($tags as $tag)
                            <li class="list-group-item">
                            <h3 class="d-inline text-primary ">#{{ $tag->name }}</h3>
                            <a class="btn btn-sm btn-light ml-2" href="/tag/{{ $tag->id }}/edit"><i class="fas fa-edit"></i> Edit Tag</a>
                            <form class="float-right" style="display-inline" action="/tag/{{ $tag->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit"><i class="fas fa-trash"></i> DELETE</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-2">
                <a href="/tag/create" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Create a new tag</a>
            </div>
        </div>
    </div>
</div>
@endsection
