{{--TODO if need add errors masages--}}
<div>
    <a href="{{ route('lot.index') }}">Back</a>
</div>
<form method="POST" action="{{ route('lot.store') }}">
    @csrf
    @include('parts.select')
    <input type="text" name="name" placeholder="name" required>
    <input type="text" name="description" placeholder="description" required>
    <input type="submit" value="Create">
</form>
