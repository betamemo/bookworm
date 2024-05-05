<x-site-layout title="{{ auth()->user()->name }}'s collection">

    @foreach($collections as $collection)
    <div>
        <h2 class="font-bold text-xl mb-4">{{$collection->statuses->name}}</h2>

        <div class="grid grid-cols-6 gap-6">
            <x-book-display-card :book="$collection->books" />
        </div>

        <br />
        <hr />
        <br />
    </div>
    @endforeach

</x-site-layout>