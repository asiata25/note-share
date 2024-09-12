<?php

use Livewire\Volt\Component;
use App\Models\Note;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {
    public Note $note;

    function mount($note)
    {
        $this->authorize('edit', $note);
        $this->note = $note;
    }
}; ?>


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
                        class="w-5 h-5 {{ $note->is_pubilshed ? 'text-green-600' : 'text-slate-300' }}" solid />
                </div>
            </x-slot>

            {{ $note->body }}
        </x-card>
        <div class="flex gap-4">
            <x-badge flat md icon="envelope" label="{{ $note->recipient }}" />
            <x-badge flat md pink icon="heart" label="{{ $note->heart_count }}" />
            <x-button icon="paint-brush" flat secondary label="Edit" :href="route('notes')" wire:navigate />
        </div>
    </div>
</div>
