<x-site-layout title="Genres">

    @foreach($genres as $genre)
    <h1 class="text-xl font-bold">{{ $genre->name }}</h1>
    <br />
    <div class="grid grid-cols-6 gap-6">
        @foreach ($genre->books as $book)
        <x-book-display-card :book="$book" />
        @endforeach
    </div>
    <br />
    <hr />
    <br />
    @endforeach

</x-site-layout>