<x-site-layout title="{{$book->title}}">

    <div class="flex justify-left w-full mb-4 gap-4">
        <a href="{{ route('user.books.index') }}" class="p-2 text-green-500 hover:bg-white hover:text-green-500 rounded">&lt Back</a>
    </div>

    <div class="flex justify-center w-full mb-4 gap-4">
        <a href="{{ route('user.books.edit', ['book' => $book->id]) }}" class="p-2 bg-green-500 text-white rounded-full hover:bg-green-600">Edit status</a>
    </div>

    @if( session('success_message') !== null)
    <div class="bg-green-50 text-green-500 p-2 rounded">
        {{session('success_message')}}
    </div>
    @endif

    <!-- <div>
        Author: {{$book->author}}
    </div>

    <div class="bg-white">
        <img src="{{$book->media->first()?->getUrl()}}" class="float-right w-48">
        {!! nl2br($book->content) !!}
    </div> -->

    <div class="flex flex-col md:flex-row gap-x-12">
        <!-- Section 1 -->
        <div class="w-1/3 justify-center">
            <div class="block relative mb-6">
                <img src="{{$book->getFeaturedImageUrl()}}" class="rounded">
            </div>

            <div class="flex justify-center mb-6">
                <a href="{{ route('user.status.create') }}" class="p-2 border text-green-500 border-green-500 bg-green-500 text-white rounded-full hover:bg-green-600">
                    Add to your books
                </a>
            </div>

            <div class="flex justify-center mb-6">
                <a href="{{route('user.reviews.create')}}" class="p-2 border text-green-500 border-green-500 bg-green-500 text-white rounded-full hover:bg-green-600">
                    Review this book
                </a>
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
                ISBN: <span class="font-semibold">{{$book->isbn}}</span>
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
</x-site-layout>