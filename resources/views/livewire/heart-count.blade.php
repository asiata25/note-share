<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public Note $note;

    function liked()
    {
        $this->note->heart_count++;
        $this->note->save();
    }
}; ?>

<x-button wire:click.debounce="liked" icon="heart" light negative label="{{ $note->heart_count }} Like" spinner />
