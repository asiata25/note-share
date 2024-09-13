<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <x-button icon="arrow-uturn-left" flat secondary label="Back" :href="route('notes')" wire:navigate />
            <x-card>
                <x-slot name="title" class="flex justify-between items-center w-full">
                    <h2 class="text-xl font-medium">
                        {{ $note->title }}
                    </h2>
                    <div class="flex items-center gap-x-4">
                        <time>
                            {{ \Carbon\Carbon::parse($note->send_date)->diffForHumans() }}
                        </time>
                        <x-icon name="globe-asia-australia"
                            class="w-5 h-5 {{ $note->is_published == 1 ? 'text-green-600' : 'text-slate-300' }}"
                            solid />
                    </div>
                </x-slot>

                {{ $note->body }}
            </x-card>
            <div class="flex gap-4">
                @if (auth()->user()->id === $note->user_id)
                    <x-badge flat md icon="envelope" label="{{ $note->recipient }}" />
                @else
                    <x-badge flat md icon="envelope" label="{{ $author->email }}" />
                @endif
                <livewire:heart-count :note="$note"/>
                @can('edit', $note)
                    <x-button icon="paint-brush" label="Edit" class="ms-auto" :href="route('notes.edit', $note)" wire:navigate />
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
