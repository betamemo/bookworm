<a href="{{route('books.show', ['id' => $book->id])}}" class="rounded p-3 bg-white rounded hover:shadow-xl relative">
    <img src="{{$book->getCardImageUrl()}}" class="w-full">

    <h3 class="font-semibold text-lg">{{ $book->title }}</h3>

    <div>
        <span class=" text-gray-500">{{ $book->author }}</span>
    </div>
</a>