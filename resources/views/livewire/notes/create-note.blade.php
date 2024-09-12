<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle = '';
    public $noteBody = '';
    public $noteSendDate = '';
    public $noteRecipient = '';

    function save()
    {
        $validated = $this->validate([
            'noteTitle' => ['required', 'min:3'],
            'noteBody' => ['required', 'min:3'],
            'noteSendDate' => ['required', 'date'],
            'noteRecipient' => ['required', 'email'],
        ]);

        auth()
            ->user()
            ->notes()
            ->create([
                'title' => $validated['noteTitle'],
                'body' => $validated['noteBody'],
                'send_date' => $validated['noteSendDate'],
                'recipient' => $validated['noteRecipient'],
            ]);

        redirect(route('notes'), true);
    }
}; ?>

<form wire:submit="save" class="space-y-4 w-full md:w-1/2 mx-auto">
    <x-input icon="heart" label="Title" wire:model="noteTitle" placeholder="note title" />
    <x-textarea label="Notes" wire:model="noteBody" placeholder="write your notes" />
    <x-input label="Send Date" type="date" wire:model="noteSendDate" />
    <x-input icon="at-symbol" label="Recipient" wire:model="noteRecipient" placeholder="your friend's email" />
    <div class="flex justify-between gap-4 pt-4">
        <x-button icon="arrow-uturn-left" flat secondary label="Back" :href="route('notes')" wire:navigate />
        <x-button icon="check" positive label="Save" type="submit" class="flex-1" spinner />
    </div>
</form>
