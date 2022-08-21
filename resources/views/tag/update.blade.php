<form method="POST" action="{{ route('tag.update', ['tag' => $tag->id]) }}">
    @method('PATCH')
    @csrf
    <input type="text" name="name" value="{{ $tag->name }}" placeholder="title">
    <input type="submit" value="Create">
</form>
