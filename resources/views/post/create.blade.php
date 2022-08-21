<form method="POST" action="{{ route('post.store') }}">
    @csrf
    <input type="text" name="title" placeholder="title" required>
    <textarea name="description" placeholder="description" required></textarea>
    <textarea name="content" placeholder="content" required></textarea>
    <select name="language_id">
        <option></option>
        @foreach($languages as $language)
            <option value="{{ $language->id }}">{{ $language->locale }}</option>
        @endforeach
    </select>
    <select name="tags_id[]" multiple>
        <option></option>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
    <select name="post_id">
        <option></option>
        @foreach($posts as $post)
            <option value="{{ $post->id }}">{{ $post->id }}</option>
        @endforeach
    </select>
    <input type="submit" value="Create">
</form>
