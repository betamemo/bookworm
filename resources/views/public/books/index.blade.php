<x-site-layout title="List of books">

    <div class="mb-2">
        {{$books->links()}}
    </div>

    <div class="grid grid-cols-2 gap-8">
        @foreach($books as $book)
        <x-book-display-card :book="$book" />
        @endforeach
    </div>

</x-site-layout>