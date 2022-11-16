@include('welcome')
<div>
    <a href="{{ route('lot.create') }}">Create</a>
    <div>
        @if(!$categories->isEmpty())
            <form>
                <select name="categories[]" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <input type="submit" value="Filter">
            </form>
        @endif
        @foreach($lots as $lot)
            <p>{{ $lot->name }}</p>
            <p>{{ $lot->description }}</p>
            <a href="{{ route('lot.show', $lot->id) }}">Update</a>
            <form action="{{ route('lot.destroy', $lot->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{$lot->id}}">
                <input type="submit" value="DELETE">
            </form>
            <hr/>
        @endforeach
        {{ $lots->links() }}
    </div>
</div>
