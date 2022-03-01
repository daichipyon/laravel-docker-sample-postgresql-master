@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-center">
    <div class='card d-flex' style="width: 25rem;">
        <div class="card-body">
            <div class="row mx-4">
                <p>プロフィール画像を設定しましょう！</p>
            </div>
            <div class="row  mx-4">
                <form action="{{ url('addthumb') }}" method="POST" enctype="multipart/form-data">

                    <input class='mt-2'type="file" class="form-control" name="file">
                    {{ csrf_field() }}
                    <button class="btn btn-primary mt-4 w-100"> 決定 </button>
                </form>
            </div>    
        </div>
    </div>
    </div>
@endsection
