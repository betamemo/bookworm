<a href="{{route('books.show', ['id' => $book->id])}}" class="p-2 bg-white rounded hover:shadow-xl relative">
    <img src="{{$book->getCardImageUrl()}}" class=" w-full">

    <div class="absolute flex flex-row gap-2 absolute top-4 right-4 text-xs">
        @foreach($book->categories as $category)
        <span class="bg-purple-100 text-purple-500 px-2 rounded-full">{{ $category->name }}</span>
        @endforeach
    </div>

    <h3 class="font-bold text-xl">{{$book->title}}</h3>
    <div>
        <span class="text-teal-400 font-bold">&gt</span>
        $book->author->name
    </div>
    <p class="line-clamp-3">{{ Str::limit($book->content,300)}}</p>
</a>