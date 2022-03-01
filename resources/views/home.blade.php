@extends('layouts.app')

@section('content')
    <!-- 投稿表示エリア（編集するのはここ！） -->
    @isset($posts)
    @foreach ($posts as $post)
        <div class="container my-4">
            <div class="d-flex justify-content-center">
                <div class="card" style="width: 25rem;">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="card-title col-9">{{ $post->user->name }}</h2>

                            <!-- 記事を削除する　-->
                            <div class="col-3">
                            @if(Auth::check() and Auth::id()==$post->user_id)
                                <form action="{{ url('posts/'.$post->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value={{$post->id}}>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger">削除</button>        
                                </form>
                            @endif
                            </div>
                        </div>
                        <div><img src="{{ asset('storage/' . $post->filename) }}" width=400></div>

                        <div class="row">
                            <div class="col-10">{{ $post->comment }}</div>
                            <div class="col-2 text-right">
                                <!-- いいねする・取り消す　-->
                                @if(Auth::check())
                                    @if(Auth::user()->is_liked($post->id))
                                        <form action="{{ route('like.cancel') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="post_id" value={{$post->id}}>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-outline-light">⭐</button>                                        </form>   
                                    @else
                                        <form action="{{ route('like.add') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="post_id" value={{$post->id}}>
                                            <button class="btn btn-light">☆</button>        
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                        
                        <div class="text-right">
                            @if($post->is_liked())
                                <a href="{{route('like.index',['post_id'=>$post->id])}}">いいねしたユーザ</a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endisset
@endsection