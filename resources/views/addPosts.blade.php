<form action="{{ url('posts') }}" method="POST" enctype="multipart/form-data">

    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="file">
    <br>
    <input type="text" class="form-control" name="comment" valeu="コメント">
    <br>
    <hr>
    {{ csrf_field() }}
    <button class="btn btn-success"> Upload </button>
</form>