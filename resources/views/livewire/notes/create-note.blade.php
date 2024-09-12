<?php

use Livewire\Volt\Component;

new class extends Component {
    function save()
    {
        dd('saved');
    }
}; ?>

<form wire:submit="save" class="space-y-4 w-full md:w-1/2 mx-auto">
    <x-input icon="user" label="Name" placeholder="your name" />
    <x-textarea label="Notes" placeholder="write your notes" />
    <x-input label="Send Date" type="date" placeholder="your name" />
    <x-input icon="at-symbol" label="Name" placeholder="your name" />
    <div class="flex justify-between gap-4 pt-4">
        <x-button icon="arrow-uturn-left" flat secondary label="Back" :href="route('notes')" wire:navigate/>
        <x-button icon="check" positive label="Save" type="submit" class="flex-1" />
    </div>
</form>
