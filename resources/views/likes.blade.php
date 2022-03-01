@extends('layouts.app')

@section('content')
    <!-- 投稿表示エリア（編集するのはここ！） -->
    @isset($users)
    @foreach ($users as $user)
        <div class="container  my-2">
            <div class="d-flex justify-content-center">
                <div class="card" style="width: 25rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4"><a href="{{route('profile',['user_id'=>$user->id])}}"><img class='w-100' src="{{ asset('storage/' . $user->filename) }}"></a></div>
                            <div class="col-8"><a href="{{route('profile',['user_id'=>$user->id])}}">{{$user->name}}</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endisset
@endsection