<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @if (true)
        <div class="md:col-span-2 text-center">
            <h1 class="text-5xl font-bold text-gray-500 mb-10">Empty</h1>
            <x-button :href="route('notes.create')" wire:navigate icon="squares-plus" positive label="Add now" xl/>
        </div>
    @else
    @for ($i = 0; $i < 7; $i++)
    <x-card title="Lorem Ipsum is simply!" rounded="xl">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tincidunt dui eget scelerisque dapibus.
        Quisque mattis dignissim cursus. Pellentesque sed arcu ac augue bibendum gravida.

        <x-slot name="footer" class="flex items-center justify-between">
            <small class="font-medium text-gray-700">Data here</small>
            <div class="flex gap-4">
                <x-button icon="paint-brush" label="Edit" primary />
                <x-mini-button negative rounded flat><x-icon name="trash" class="w-5 h-5" /></x-mini-button>
            </div>
        </x-slot>
    </x-card>
@endfor
    @endif
</div>
