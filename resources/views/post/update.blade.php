<form method="POST" action="{{ route('post.update', ['post' => $item['post']->id]) }}">
    @method('PATCH')
    @csrf
    <input type="text" name="title" value="{{ $item['translation']->title }}" placeholder="title">
    <textarea name="description" placeholder="description">{{ $item['translation']->description }}</textarea>
    <textarea name="content" placeholder="content">{{ $item['translation']->content }}</textarea>
    <select name="tags_id[]" multiple>
        <option></option>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}"
                @foreach($item['post']->tags as $selectedTag)
                    @if($selectedTag->id == $tag->id) selected @endif
                @endforeach
            >
                {{ $tag->name }}
            </option>
        @endforeach
    </select>
    <input type="submit" value="Update">
</form>
