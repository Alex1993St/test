@include('welcome')
<div>
    <a href="{{ route('post.create') }}">Create</a>
    <div>
        @foreach($posts as $post)
            @foreach($post->translation as $translation)
                <p>id: {{ $translation->id }}</p>
                <p>language: {{ $translation->language?->locale }}</p>
                <p>title: {{ $translation->title }}</p>
                <p>description: {{ $translation->description }}</p>
                <p>content: {{ $translation->content }}</p>
            @endforeach
            @if($post->translation->isNotEmpty())
                <a href="{{ route('post.edit', $post->id) }}">Update</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <input type="submit" value="DELETE">
                </form>
            @endif
            <hr/>
        @endforeach
        {{ $posts->links() }}
    </div>
</div>
