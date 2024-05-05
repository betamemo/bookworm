<x-site-layout title="{{ $book->name }}" hideTitle>

    <div class="flex justify-left w-full mb-4">
        <a href="{{ route('books.index') }}" class="px-3 py-2 text-green-500 font-bold rounded-full hover:bg-green-500 hover:text-white">&lt Back</a>
    </div>

    <div class="flex flex-col md:flex-row gap-x-12">

        <!-- Section 1 -->
        <div class="w-1/3">

            <!-- Book cover -->
            <div class="mb-6 flex justify-center">
                <img src="{{ $book->getFeaturedImageUrl() }}" class="rounded-r-xl shadow-xl">
            </div>

            <!-- Reviews -->
            <div class="">
                <h2 class="text-xl font-bold mt-4 mb-4">Reviews</h2>

                @auth
                <div>
                    <div class="mb-2">
                        <x-form-textarea label="" name="content" rows="3" value="" />
                    </div>
                    <div class="mb-8 flex justify-end">
                        <a href="#" class="p-2 bg-green-500 text-xs text-white rounded-full hover:bg-green-600">
                            Submit
                        </a>
                    </div>
                </div>
                @endauth

                <!-- Reviews -->
                @foreach($reviews as $review)
                <div class="bg-white rounded-xl p-4 mt-4">

                    {{ $review->comment }}

                    <div class="flex justify-between text-xs mt-4">
                        <div>
                            <span class="text-gray-500 mr-1">Craeted by:</span>
                            <span class="font-bold">{{ $review->user->name }}</span>
                        </div>
                        <div class="text-gray-500">
                            {{ $review->created_at }}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <!-- Section 2 -->
        <div class="bg-white p-5 w-2/3 rounded-xl">

            <h1 class="font-bold text-3xl">{{ $book->name }}</h1>

            <div class="my-2">
                <div class="flex w-6 h-6">
                    <img src="/img/star.png" />
                    <img src="/img/star.png" />
                    <img src="/img/star.png" />
                    <img src="/img/star.png" class="filter grayscale" />
                    <img src="/img/star.png" class="filter grayscale" />
                    <span class="pl-4 font-bold">3/5</span>
                </div>
            </div>

            <div class="my-2">
                <span class="text-green-500 font-bold">&gt</span>
                Author: <span class="font-bold">{{ $book->author }}</span>
            </div>

            <div class="my-2">
                <span class="text-green-500 font-bold">&gt</span>
                ISBN: <span class="font-bold">{{ $book->isbn }}</span>
            </div>

            <div class="my-2">
                <span class="text-green-500 font-bold">&gt</span>
                Publisher: <span class="font-bold">{{ $book->publisher }}</span>
            </div>

            <div class="my-2">
                <span class="text-green-500 font-bold">&gt</span>
                Genres: <span class="font-bold">{{ $book->genre->name }}</span>
            </div>

            <br />
            <hr />
            <br />

            {!! nl2br($book->content) !!}

        </div>
    </div>

</x-site-layout>