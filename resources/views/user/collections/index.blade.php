<x-site-layout title="{{ auth()->user()->name }}'s collection">



    @foreach($collections as $collection)
    <div class="p-1 mb-1">
        <h2 class="font-bold text-xl mb-4 text-green-500">{{$collection->statuses->name}}</h2>

        <div class="grid grid-cols-6 gap-6">
            <x-book-display-card :book="$collection->books" />
        </div>

    </div>
    @endforeach

</x-site-layout>