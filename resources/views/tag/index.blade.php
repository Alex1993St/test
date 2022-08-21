@include('welcome')
<div>
    <a href="{{ route('tag.create') }}">Create</a>
    <div>
        @foreach($tags as $tag)
            <p>{{ $tag->name }}</p>
            <a href="{{ route('tag.edit', $tag->id) }}">Update</a>
            <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{$tag->id}}">
                <input type="submit" value="DELETE">
            </form>
            <hr/>
        @endforeach
        {{ $tags->links() }}
    </div>
</div>
