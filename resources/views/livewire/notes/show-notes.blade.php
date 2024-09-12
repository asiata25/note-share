<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public function with(): array
    {
        return [
            'notes' => auth()->user()->notes()->orderBy('send_date', 'desc')->get(),
        ];
    }
}; ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @if ($notes->isEmpty())
        <div class="md:col-span-2 text-center">
            <h1 class="text-5xl font-bold text-gray-500 mb-10">Empty</h1>
            <x-button :href="route('notes.create')" wire:navigate icon="squares-plus" positive label="Add now" xl />
        </div>
    @else
        <div class="md:col-span-2 text-end">
            <x-button icon="plus" outline secondary label="New Note" :href="route('notes.create')" wire:navigate />
        </div>
        @foreach ($notes as $note)
            <x-card title="{{ $note->title }}" rounded="xl">
                <x-slot name="slot" class="truncate">
                    {{ $note->body }}
                </x-slot>

                <x-slot name="footer" class="flex items-center justify-between">
                    <small
                        class="font-medium text-gray-700">{{ \Carbon\Carbon::parse($note->send_date)->diffForHumans() }}</small>
                    <div class="flex gap-4">
                        <x-button icon="document-magnifying-glass" label="Details" primary />
                        <x-mini-button negative rounded flat><x-icon name="trash" class="w-5 h-5" /></x-mini-button>
                    </div>
                </x-slot>
            </x-card>
        @endforeach
    @endif
</div>
