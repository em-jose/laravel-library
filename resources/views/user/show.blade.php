<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User information') }}
        </h2>
    </x-slot>

    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-8 pt-6">
                    <a href="{{ route('users.index') }}" class="font-medium text-blue-600 underline hover:underline">
                        {{ __('Back to users list') }}
                    </a>
                </div>

                <div class="p-6">
                    <ul>
                        <li>
                            <span class="font-bold">{{ __('Name') }}</span>: {{ $user->name }}
                        </li>
                        <li>
                            <span class="font-bold">{{ __('Lastname') }}</span>: {{ $user->lastname }}
                        </li>
                        <li>
                            <span class="font-bold">{{ __('E-mail') }}</span>: {{ $user->email }}
                        </li>
                    </ul>
                    <div>
                        <label for="roles" class="font-bold">{{ __('Roles') }}</label>:
                        <div id="roles">
                            <ul class="list-disc">
                                @foreach ($user->roles as $role)
                                    <li class="ml-6">{{ $role->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
