<x-site-layout title="{{auth()->user()->name}}'s books">

    <h2 class="font-bold text-xl mb-4 text-green-500">Want to Read</h2>
    <!-- Admin -->
    <!-- <div class="flex justify-end w-full mb-4">
        @if(auth()->user()->superadmin)
        <a href="{{route('user.categories.index')}}" class="mr-4 p-1 bg-indigo-400 text-white rounded">Manage categories</a>
        @endif

        <a href="{{route('user.books.create')}}" class="p-1 bg-teal-500 text-white rounded">Create new book</a>
    </div> -->

    @foreach($books as $book)
    <div class="p-1 mb-1 flex flex-row justify-between">
        <div class="flex">
            <img src="{{$book->media->first()?->getUrl('preview')}}" class="w-6 rounded-full">
            <h2 class="font-bold pl-4">
                {{$book->title}}
            </h2>
        </div>
        <div class="flex gap-2 text-sm">

            @if( $book->isAllowedToEdit(auth()->user()) )
            <a href="{{route('user.books.show', ['book' => $book->id])}}" class="text-green-500">Details</a> |
            <a href="{{route('user.books.edit', ['book' => $book->id])}}" class="text-green-500">Edit</a> |

            <form action="{{route('user.books.destroy', ['book' => $book->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="text-green-500">Delete</button>
            </form>
            @else
            You have no access!
            @endif

        </div>
    </div>
    @endforeach

</x-site-layout>