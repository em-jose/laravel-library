<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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

                        @error('roles')
                            <x-error-message-fw type="error" :message="$message" />
                        @enderror

                        <div class="p-6">
                            <a href="{{ route('users.create') }}"
                                class="px-6 py-3 no-underline bg-gray-800 hover:bg-gray-700 active:bg-gray-900 text-white font-bold rounded focus:outline-none focus:shadow-outline">{{ __('+ Add user') }}</a>
                        </div>

                        @if (!empty($users))
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
                                            {{ __('Lastname') }}
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            {{ __('E-mail') }}
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
                                    @foreach ($users as $user)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                                @if (!empty($user->id))
                                                    {{ $user->id }}
                                                @else
                                                    -
                                                @endif
                                            </th>
                                            <td class="py-4 px-6">
                                                @if (!empty($user->name))
                                                    {{ $user->name }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="py-4 px-6">
                                                @if (!empty($user->lastname))
                                                    {{ $user->lastname }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="py-4 px-6">
                                                @if (!empty($user->email))
                                                    {{ $user->email }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <a href="{{ route('users.edit', $user) }}"
                                                    class="font-medium text-blue-600 hover:underline">
                                                    <span>{{ __('Edit') }}</span>
                                                </a>
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                @if (Auth::user()->email != $user->email)
                                                    <form method="POST" action="{{ route('users.destroy', $user) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="font-medium text-red-600 hover:underline">
                                                            <span>{{ __('Delete') }}</span>
                                                        </button>
                                                    </form>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="p-6">
                                {{ $users->links() }}
                            </div>
                        @else
                            <x-warning-message type="warning" :message="'Sorry, there are no users'" />
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
