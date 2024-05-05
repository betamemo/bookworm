<a href="{{route('books.show', ['id' => $book->id])}}" class="p-4 bg-white rounded-xl border-solid border-2 border-gray-200 hover:shadow-xl">
    <img src="{{$book->getCardImageUrl()}}" class=" w-full rounded-r-xl shadow-xl mb-2">

    <h3 class="font-bold line-clamp-1">{{$book->name}}</h3>

    <div class="text-sm">
        {{$book->author}}
    </div>

    <p class="mt-4 text-xs line-clamp-3">{{Str::limit($book->content,300)}}</p>

    <div class="mt-4 text-xs text-right text-green-500">Read more <span class="font-bold">&gt</span></div>
</a>