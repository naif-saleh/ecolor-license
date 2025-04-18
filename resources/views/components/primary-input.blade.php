@props(['id' => '', 'type' => '', 'class' => '', 'placeholder' => '', 'livewire' => '', 'value' => ''])

<input id="{{ $id }}" type="{{ $type }}"
    class="{{ $class }}"
    placeholder="{{ $placeholder }}"
    wire:model='{{ $livewire }}'
    value="{{ old($value) }}"
    >