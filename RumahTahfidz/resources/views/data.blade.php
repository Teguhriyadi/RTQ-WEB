<form action="{{ url('/data') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="image">
    <input type="submit">
</form>
