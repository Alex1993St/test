<div>
    <a href="{{ route('category.index') }}">Back</a>
</div>
<div>
    <a href="{{ route('category.edit', $category->id) }}">Update</a>
</div>
<div>
    Name: {{ $category->name }}
</div>
