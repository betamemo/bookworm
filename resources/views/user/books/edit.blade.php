<x-site-layout title="Editing an book">

    @if($errors->any())
    <div class="bg-red-50 rounded p-2 text-red-500">
        {{ $errors->any() ? $errors : ''}}
    </div>
    @endif

    <form action="{{route('user.books.update', ['book' => $book->id])}}" method="post" class="flex flex-col gap-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-form-text label="Title" name="title" value="{{$book->title}}" />
        <x-form-textarea label="Article" name="content" rows="5" value="{{$book->content}}" />
        <x-form-text label="User id" name="user_id" value="{{$book->user_id}}" />
        <x-form-checkboxes label="Categories" name="categories" :options="\App\Models\Category::orderBy('name')->pluck('name', 'id')->toArray()" :values="$book->categories" />

        <label class="text-sm font-semibold" for="photo">Article image</label>
        <input type="file" name="photo" id="photo" />

        <div class="mt-4 flex justify-end">
            <button type="submit" class="p-1 bg-teal-500 text-white rounded">Update</button>
        </div>
    </form>

</x-site-layout>