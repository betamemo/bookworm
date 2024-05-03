<x-site-layout title="">

    @if($errors->any())
    <div class="bg-red-50 rounded p-2 text-red-500">
        {{ $errors->any() ? $errors : ''}}
    </div>
    @endif

    <form action="{{route('user.books.store')}}" method="post" class="flex flex-col gap-4">
        @csrf

        <x-form-dropdown />

        <div class="mt-4 flex justify-center">
            <button type="submit" class="p-1 bg-teal-500 text-white rounded">Update</button>
        </div>
    </form>

</x-site-layout>