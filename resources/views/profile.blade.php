@extends('layouts.app')

@section('content')
<div class="container">
    <div class='card  my-4 d-flex justify-content-center'>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('storage/' . $user->filename) }}" class="w-100">
                </div>
                <div class="col-9">
                    <h1>{{$user->name}}</h1>
                    <div><strong>いいね数</strong> {{$user->liked_count()}}回</div>
                </div>
            </div>    
        </div>
    </div>
    
    <div class='card d-flex justify-content-center'>
        <div class="card-body">
            <div class="row">
                @isset($posts)
                @foreach ($posts as $post)
                    <div class="col-4 mb-4">
                        <img src="{{ asset('storage/' . $post->filename) }}" class="w-100">
                    </div>
                @endforeach
                @endisset
            </div>
        </div>
    </div>    
</div>

@endsection