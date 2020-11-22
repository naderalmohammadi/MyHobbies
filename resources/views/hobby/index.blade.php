@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{__('All the hobbies')}}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($hobbies as $hobby)
                            <li class="list-group-item">
                            <a title="Show Details" href='/hobby/{{$hobby->id}}'>{{ $hobby->name }}</a>
                            @auth
                            <a class="btn btn-sm btn-light ml-2" href='/hobby/{{$hobby->id}}/edit'><i class="fas fa-edit">
                            </i> {{trans('main.Edit Hobby')}}</a>
                            @endauth
                            <span class="mx-2">By: {{ $hobby->user->name }} ({{ $hobby->user->hobbies->count() }} Hobbies)</span>
                            @auth
                            <form class="float-right" style="display-inline" action='/hobby/{{$hobby->id}}' method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit"><i class="fas fa-trash"></i> {{trans('main.delete')}}</button>
                            </form>
                            @endauth
                        <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-2">
                {{ $hobbies->links() }}
            </div>

            @auth
            <div class="mt-2">
                <a href='/hobby/create'
                class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Create a new hobby</a>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection
