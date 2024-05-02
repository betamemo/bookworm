<x-site-layout title="Hello, User">

    <h2 class="text-2xl font-bold">Your Books</h2>

    <div class="grid grid-cols-4 gap-4 mt-4">
        @foreach($books as $book)
        <x-book-display-card :book="$book" />
        @endforeach
    </div>

</x-site-layout>