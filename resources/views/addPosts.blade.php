@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-center">
    <div class='card d-flex' style="width: 25rem;">
        <div class="card-body">
            <div class="row mx-4">
                <h3>写真を投稿しましょう！</h3>
            </div>
            <div class="row  mx-4">
                <form action="{{ route('post.add') }}" method="POST" enctype="multipart/form-data">
                    <div>写真を選択する</div>
                    <input class='mt-0.5'type="file" class="form-control" name="file">

                    <div class='mt-3'>コメントを書く</div>
                    <textarea type="text" class="form-control" name="comment" value="comment" placeholder="255文字以内で頼んます"></textarea>
                    {{ csrf_field() }}
                    <button class="btn btn-primary mt-4 w-100"> 投稿する </button>
                </form>
            </div>    
        </div>
    </div>
    </div>
@endsection
