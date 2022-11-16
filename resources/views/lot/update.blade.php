{{--TODO if need add errors masages--}}
<div>
    <a href="{{ route('lot.index') }}">Back</a>
</div>
<form method="POST" action="{{ route('lot.update', $lot->id ) }}">
    @method('PUT')
    @csrf
    <select name="categories[]" multiple>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <input type="text" name="name" value="{{ $lot->name }}" required>
    <input type="text" name="description" value="{{ $lot->description }}" required>
    <input type="submit" value="Update">
</form>
