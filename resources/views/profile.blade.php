<x-app-layout>

    <x-container>

        <form action="{{ route('friends.store', $user) }}" class="px-4 mb-8" method="POST">
            @csrf

          <x-submit-button>Añadir amigo</x-submit-button>
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