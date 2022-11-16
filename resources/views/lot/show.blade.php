<div>
    <a href="{{ route('lot.index') }}">Back</a>
</div>
<div>
    <a href="{{ route('lot.edit', $item->id) }}">Update</a>
</div>
<div>
    <p>Name: {{ $item->name }}</p>
    <p>Description: {{ $item->description }}</p>
    @if (!$item->categories->isEmpty())
        <p>Categories: </p>
        @foreach($item->categories as $category)
            <p>{{ $category->name }}</p>
        @endforeach
    @endif
</div>
