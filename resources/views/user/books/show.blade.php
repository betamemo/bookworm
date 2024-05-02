<x-site-layout title="{{$book->title}}">

    <div class="flex justify-center w-full mb-4 gap-4">
        <a href="{{route('user.books.index')}}" class="p-1 bg-teal-500 text-white rounded">Back to index</a>
        <a href="{{route('user.books.edit', ['book' => $book->id])}}" class="p-1 bg-teal-500 text-white rounded">edit</a>
    </div>

    @if( session('success_message') !== null)
    <div class="bg-green-50 text-green-500 p-2 rounded">
        {{session('success_message')}}
    </div>
    @endif

    <div>
        Written by: {{$book->author->name}}
    </div>

    <div class="bg-white">
        <img src="{{$book->media->first()?->getUrl()}}" class="float-right w-48">
        {!! nl2br($book->content) !!}
    </div>

</x-site-layout>