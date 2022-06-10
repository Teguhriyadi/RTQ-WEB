<form action="{{ url('/image') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="image[]" multiple>
    <input type="submit" value="Login">
</form>
