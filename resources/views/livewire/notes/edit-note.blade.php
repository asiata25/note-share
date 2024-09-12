<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    public $noteTitle = '';
    public $noteBody = '';
    public $noteSendDate = '';
    public $noteRecipient = '';
    public $noteIsPublished = false;

    public Note $note;

    function mount($note)
    {
        $this->authorize('edit', $note);
        $this->note = $note;

        $this->noteTitle = $note->title;
        $this->noteBody = $note->body;
        $this->noteSendDate = $note->send_date;
        $this->noteRecipient = $note->recipient;
        $this->noteIsPublished = $note->is_published;
    }

    function save()
    {
        $validated = $this->validate([
            'noteTitle' => ['required', 'min:3'],
            'noteBody' => ['required', 'min:3'],
            'noteSendDate' => ['required', 'date'],
            'noteRecipient' => ['required', 'email'],
            'noteIsPublished' => ['required', 'boolean'],
        ]);

        $this->note->update([
            'title' => $validated['noteTitle'],
            'body' => $validated['noteBody'],
            'send_date' => $validated['noteSendDate'],
            'recipient' => $validated['noteRecipient'],
            'is_published' => $validated['noteIsPublished'],
        ]);

        redirect(route('notes'), true);
    }
}; ?>



<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Note') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form wire:submit="save" class="space-y-4 w-full md:w-1/2 mx-auto">
            <x-input icon="heart" label="Title" wire:model="noteTitle" placeholder="note title" />
            <x-textarea label="Notes" wire:model="noteBody" placeholder="write your notes" />
            <x-input label="Send Date" type="date" wire:model="noteSendDate" />
            <x-input icon="at-symbol" label="Recipient" wire:model="noteRecipient" placeholder="your friend's email" />
            <x-toggle id="color-positive" name="toggle" wire:model="noteIsPublished" label="Published" positive xl />
            <div class="flex justify-between gap-4 pt-4">
                <x-button icon="arrow-uturn-left" flat secondary label="Back" :href="route('notes')" wire:navigate />
                <x-button icon="cloud-arrow-up" positive label="Update" type="submit" class="flex-1" spinner />
            </div>
        </form>
    </div>
</div>
