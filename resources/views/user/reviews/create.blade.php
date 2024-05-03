<x-site-layout title="Review">

    <form action="{{ route('user.reviews.create') }}" method="POST">
        @csrf

        <label for="comment">Comment:</label><br />
        <textarea name="comment" id="comment" rows="3"></textarea>

        <br />
        <button type="submit" class="p-2 bg-green-500 text-white rounded">Submit</button>

    </form>

</x-site-layout>