<x-app-layout title="Categories">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
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
                            <a href="{{ route('categories.create') }}"
                                class="px-6 py-3 no-underline bg-gray-800 hover:bg-gray-700 active:bg-gray-900 text-white font-bold rounded focus:outline-none focus:shadow-outline">{{ __('+ Add category') }}</a>
                        </div>

                        @if (!empty($categories))
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            {{ __('#ID') }}
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            {{ __('Name') }}
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <span class="sr-only">{{ __('Categories (count)') }}</span>
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
                                    @foreach ($categories as $category)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                                @if (!empty($category->id))
                                                    {{ $category->id }}
                                                @else
                                                    -
                                                @endif
                                            </th>
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                                @if (!empty($category->name))
                                                    <a href="{{ route('categories.show', $category) }}"
                                                        class="font-medium text-blue-600 hover:underline">
                                                        <span>{{ $category->name }}</span>
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </th>
                                            <td class="py-4 px-6 text-right">
                                                    <a href="{{ route('category-books', $category->id) }}"
                                                        class="font-medium text-blue-600 hover:underline">{{ __('Books') }} ({{$category->books()->count()}})
                                                    </a>
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <a href="{{ route('categories.edit', $category) }}"
                                                    class="font-medium text-blue-600 hover:underline">
                                                    <span>{{ __('Edit') }}</span>
                                                </a>
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <form method="POST"
                                                    action="{{ route('categories.destroy', $category) }}">
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
                                {{ $categories->links() }}
                            </div>
                        @else
                            <x-warning-message type="warning" :message="'Sorry, there are no categories'" />
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
