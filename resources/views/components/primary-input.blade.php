@props(['id' => '', 'type' => '', 'class' => '', 'placeholder' => '', 'livewire' => ''])

<input id="{{ $id }}" type="{{ $type }}"
    class="{{ $class }}"
    placeholder="{{ $placeholder }}"
    wire:model='{{ $livewire }}'
    >