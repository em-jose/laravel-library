<x-app-layout>
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

                        <div class="p-2 m-3">
                            <a href="{{ route('authors.create') }}"
                                class="px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-200">{{ __('+ Add author') }}</a>
                        </div>

                        @if (!empty($authors))
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            {{ __('Name') }}
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            {{ __('Lastname') }}
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
                                                @if (!empty($author->name))
                                                    {{ $author->name }}
                                                @else
                                                    -
                                                @endif
                                            </th>
                                            <td class="py-4 px-6">
                                                @if (!empty($author->lastname))
                                                    {{ $author->lastname }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="py-4 px-6">
                                                @if (!empty($author->birth_date))
                                                    {{ $author->birth_date }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <a href="#"
                                                    class="font-medium text-blue-600 hover:underline">{{ __('Books (count)') }}</a>
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <a href="#"
                                                    class="font-medium text-blue-600 hover:underline">{{ __('Edit') }}</a>
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <a href="#"
                                                    class="font-medium text-red-600 hover:underline">{{ __('Delete') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <x-warning-message type="warning" :message="'Sorry, there are no authors'" />
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
