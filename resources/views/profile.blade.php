    <h1>Your mail address is {{$user->email}}</h1>
@isset($posts)
@foreach ($posts as $post)
<h2>{{ $post->user->name }}</h2>
<h2>{{ $post->comment }}</h2>
<div><img src="{{ asset('storage/' . $post->filename) }}" width=400></div>

@if(Auth::user()->is_liked($post->id))
    <form action="{{ url('likecancel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="post_id" value={{$post->id}}>
        <input type="hidden" name="_method" value="DELETE">
        <button>いいね</button>     
    </form>   
@else
    <form action="{{ url('likeadd') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="post_id" value={{$post->id}}>
        <button>いいね</button>        
    </form>
@endif

@if(Auth::id()==$post->user_id)
    <form action="{{ url('posts/'.$post->id)}}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value={{$post->id}}>
        <input type="hidden" name="_method" value="DELETE">
        <button>削除する</button>        
    </form>
@endif
<br><hr>
@endforeach
@endisset