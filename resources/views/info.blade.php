@extends('layouts.app')

@section('page_description', 'We are a non-profit organization')
@section('page_title', 'About us')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Info') }}</div>

                <div class="card-body">
                    This is the info page
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
