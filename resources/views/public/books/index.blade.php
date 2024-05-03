<x-site-layout title="Books">

    <div class="mb-4">
        {{ $books->links() }}
    </div>

    <div class="grid grid-cols-4 gap-8">
        @foreach($books as $book)
        <x-book-display-card :book="$book" />
        @endforeach
    </div>

</x-site-layout>