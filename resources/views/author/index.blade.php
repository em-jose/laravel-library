<x-app-layout title="Authors">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-14 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        @if (session('message'))
                            <x-success-message type="success" :message="session('message')" />
                        @endif

                        <div class="p-6">
                            <a href="{{ route('authors.create') }}"
                                class="px-6 py-3 no-underline bg-gray-800 hover:bg-gray-700 active:bg-gray-900 text-white font-bold rounded focus:outline-none focus:shadow-outline">{{ __('+ Add author') }}</a>
                        </div>

                        @if (!empty($authors))
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            {{ __('#ID') }}
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            {{ __('Name + Lastname') }}
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            {{ __('Date of birth') }}
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <span class="sr-only">{{ __('Books (count)') }}</span>
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <span class="sr-only">{{ __('Edit') }}</span>
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <span class="sr-only">{{ __('Delete') }}</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($authors as $author)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                                @if (!empty($author->id))
                                                    {{ $author->id }}
                                                @else
                                                    -
                                                @endif
                                            </th>
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                                @if (!empty($author->name))
                                                    <a href="{{ route('authors.show', $author) }}"
                                                        class="font-medium text-blue-600 hover:underline">
                                                        <span>{{ $author->name }} {{ $author->lastname }}</span>
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </th>
                                            <td class="py-4 px-6">
                                                @if (!empty($author->birth_date))
                                                    {{ $author->birth_date }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <a href="{{ route('author-books', $author->id) }}"
                                                    class="font-medium text-blue-600 hover:underline">{{ __('Author\'s books') }} ({{$author->books()->count()}})</a>
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <a href="{{ route('authors.edit', $author) }}"
                                                    class="font-medium text-blue-600 hover:underline">
                                                    <span>{{ __('Edit') }}</span>
                                                </a>
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <form method="POST" action="{{ route('authors.destroy', $author) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="font-medium text-red-600 hover:underline">
                                                        <span>{{ __('Delete') }}</span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="p-6">
                                {{ $authors->links() }}
                            </div>
                        @else
                            <x-warning-message type="warning" :message="'Sorry, there are no authors'" />
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
