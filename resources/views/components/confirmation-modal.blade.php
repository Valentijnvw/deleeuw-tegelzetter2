@props([
    'routeName', 'componentId'
])

<x-modal name="confirm-user-deletion" focusable>
    <form method="post" action="{{ route($routeName, ['id' => $componentId]) }}" class="p-6">
        @csrf

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ $title }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ $message }}
        </p>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')" type="button">
                {{ __('Annuleren') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Opdracht verwijderen') }}
            </x-danger-button>

        </div>
    </form>
</x-modal>