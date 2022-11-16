{{--TODO if need add errors masages--}}
<div>
    <a href="{{ route('category.index') }}">Back</a>
</div>
<form method="POST" action="{{ route('category.store') }}">
    @csrf
    <input type="text" name="name" placeholder="name" required>
    <input type="submit" value="Create">
</form>
