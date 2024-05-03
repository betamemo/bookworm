<a href="{{route('books.show', ['id' => $book->id])}}" class="rounded p-3 bg-white rounded hover:shadow-xl relative">
    <img src="{{$book->getCardImageUrl()}}" class="w-full">

    <h3 class="font-semibold text-xl">{{$book->title}}</h3>

    <div>
        <span class="font-semibold text-gray-500">{{$book->author}}</span>
    </div>

    <!-- <p class="line-clamp-3">{{Str::limit($book->content,200)}}</p> -->

    <!-- <div class="text-sm flex justify-end text-grey-200">
        More details >
    </div> -->
</a>