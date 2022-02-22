@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<!-- 投稿表示エリア（編集するのはここ！） -->
@isset($posts)
@foreach ($posts as $post)
    <h2>{{ $post->comment }}</h2>
    <h2>{{ $post->user->name }}</h2>
    <div><img src="{{ asset('storage/' . $post->filename) }}" width=400></div>
    <br><hr>
@endforeach
@endisset