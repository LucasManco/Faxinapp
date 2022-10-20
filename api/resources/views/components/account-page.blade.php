<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="container mx-auto flex">
        <div class="w-1/4 px-4 py-12">
            <x-account-sidebar />

        </div>
        <div class="w-3/4 px-4 py-12">
            {{ $content }}
        </div>
    </div>
</x-app-layout>
