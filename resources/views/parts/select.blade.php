@if(!$categories->isEmpty())
    <select name="categories[]" multiple>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
@endif
