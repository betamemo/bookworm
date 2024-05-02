<x-site-layout title="Books of the day">

    <div class="grid grid-cols-4 gap-4 mt-4">
        @foreach($books as $book)
        <x-book-display-card :book="$book" />
        @endforeach
    </div>

</x-site-layout>