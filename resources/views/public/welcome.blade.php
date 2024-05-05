<x-site-layout title="Where Bookworms Find Their Next Escape">

    <h1 class="font-bold text-2xl">Quotes</h1>
    <br />
    <p class="bg-white p-4 rounded-xl">
        "Each day means a new twenty-four hours. Each day means everything's possible again."
        ― <span class="font-bold">Legend by Marie Lu</span></p>
    <br />
    <br />
    <h1 class="font-bold text-2xl">New Book Releases</h1>
    <br />
    <div class="grid grid-cols-6 gap-6">
        @foreach($books as $book)
        <x-book-display-card :book="$book" />
        @endforeach
    </div>

</x-site-layout>