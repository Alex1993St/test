{{--TODO if need add errors masages--}}
<div>
    <a href="{{ route('category.index') }}">Back</a>
</div>
<form method="POST" action="{{ route('category.update', $category->id ) }}">
    @method('PUT')
    @csrf
    <input type="text" name="name" value="{{ $category->name }}" required>
    <input type="submit" value="Update">
</form>
