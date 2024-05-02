<x-site-layout title="{{$book->title}}" hideTitle>

    <div class="flex justify-left w-full mb-4 gap-4">
        <a href="{{route('books.index')}}" class="p-1 text-green-500 hover:bg-green-100 rounded">&lt Back</a>
    </div>

    <div class="flex flex-col md:flex-row gap-x-12">
        <!-- Section 1 -->
        <div class="w-1/3 justify-center">
            <div class="block relative mb-6">
                <img src="{{$book->getFeaturedImageUrl()}}" class="rounded">
            </div>

            <div class="block relative mb-8 ">
                <a class="p-2 border text-green-500 border-green-500 bg-green-500 text-white rounded-full hover:bg-green-600">Add to your books</a>
            </div>

            <div class="block relative mb-4">
                <a class="p-2 border text-green-500 border-green-500 bg-green-500 text-white rounded-full hover:bg-green-600">Review this book</a>
            </div>
        </div>

        <!-- Section 2 -->
        <div class="bg-white p-5 w-2/3 rounded">

            <h1 class="font-bold text-4xl">{{$book->title}}</h1>

            <div class="my-2">
                <div class="flex w-6 h-6">
                    <img src="/img/star.png" />
                    <img src="/img/star.png" />
                    <img src="/img/star.png" />
                    <img src="/img/star.png" class="filter grayscale" />
                    <img src="/img/star.png" class="filter grayscale" />
                    <span class="pl-4 font-semibold">3/5</span>
                </div>
            </div>

            <div class="my-2">
                <span class="text-green-500 font-bold">&gt</span>
                Author: <span class="font-semibold">{{$book->author}}</span>
            </div>

            <div class="my-2">
                <span class="text-green-500 font-bold">&gt</span>
                Publisher: <span class="font-semibold">{{$book->publisher}}</span>
            </div>

            <div class="my-2">
                <span class="text-green-500 font-bold">&gt</span>
                Genres: <span class="font-semibold">
                    @foreach($book->categories as $category)
                    <span class="bg-green-100 text-green-500 px-2 rounded-full">
                        {{$category->name}}
                    </span>
                    @endforeach
                </span>
            </div>

            {!! nl2br($book->content) !!}

        </div>
    </div>
    <div class="flex flex-col md:flex-row gap-x-12">
        <div class="w-1/3">
            <h2 class="text-xl font-bold">Reviews</h2>
        </div>

        <!-- Related books -->
        <div class="w-1/3">
            <h2 class="text-xl font-bold">Related books</h2>

            <ul>
                @foreach($related as $r)
                <li class="block relative mb-4">
                    <a href="{{route('books.show', ['id' => $r->id])}}">
                        <img src="{{$r->getCardImageUrl()}}" class="filter grayscale hover:scale-105 w-full rounded-lg hover:shadow">
                        <h3 class="absolute bottom-0 bg-opacity-50 bg-black text-white line-clamp-1 ">{{$r->title}}</h3>
                        <div class="flex flex-row gap-2 absolute top-2 right-2 text-xs">
                            @foreach($r->categories as $category)
                            <span class="bg-green-100 text-green-500 px-2 rounded-full">{{$category->name}}</span>
                            @endforeach
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- End Related books -->
    </div>



</x-site-layout>