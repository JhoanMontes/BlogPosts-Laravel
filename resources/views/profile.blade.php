<x-app-layout>

    <x-container>

        <form action="{{ route('friends.store', $user) }}" class="px-4 mb-8" method="POST">
            @csrf

            <input type="submit" value="Añadir amigo"
                class="px-6 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-md text-sm transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-yellow-600" />
        </form>

        @foreach($posts as $post)


            <x-card class="mb-4">
                {{ $post->body }}

                <div class="mt-4 text-sm text-slate-400">
                    {{ $post->created_at->diffForHumans() }}
                </div>
            </x-card>
        @endforeach
    </x-container>


</x-app-layout>