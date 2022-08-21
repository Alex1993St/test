<form method="POST" action="{{ route('tag.store') }}">
    @csrf
    <input type="text" name="name" placeholder="name" required>
    <input type="submit" value="Create">
</form>
