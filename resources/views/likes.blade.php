@extends('layouts.app')

@section('content')
    <!-- 投稿表示エリア（編集するのはここ！） -->
    @isset($users)
    @foreach ($users as $user)
        <div class="container  my-4">
            <div class="d-flex justify-content-center">
                <div class="card w-75">
                    <div class="card-body">
                        <div class="row">

                            <img class="col-3" src="{{ asset('storage/' . $user->filename) }}">
                            <div class="col-9">{{$user->name}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endisset
@endsection