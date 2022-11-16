@include('welcome')
<div>
    <a href="{{ route('category.create') }}">Create</a>
    <div>
        @foreach($categories as $category)
            <p>{{ $category->name }}</p>
            <a href="{{ route('category.show', $category->id) }}">Update</a>
            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{$category->id}}">
                <input type="submit" value="DELETE">
            </form>
            <hr/>
        @endforeach
        {{ $categories->links() }}
    </div>
</div>
