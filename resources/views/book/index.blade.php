<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-14 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    @forelse ($books as $book)
                        {{ $book->title }}<br>
                    @empty
                        <div class="alert alert-secondary" role="alert">
                            @lang('Sorry, there are no books')
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
