<x-site-layout title="Genres">

    <div class="mb-4">
        {{ $authors->links() }}
    </div>

    @foreach($authors as $author)
    <h1 class="text-xl font-bold">{{ $author->name }}</h1>
    <br />
    <div class="grid grid-cols-6 gap-6">
        @foreach($author->books as $book)
        <x-book-display-card :book="$book" />
        @endforeach
    </div>
    <br />
    <hr />
    <br />
    @endforeach

</x-site-layout>