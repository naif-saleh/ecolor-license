@props(['class' => '', 'value' => '', 'icon' => null, 'livewire' => ''])

<button type="button" class="{{ $class }}" @if($livewire) wire:click="{{ $livewire }}" @endif>
    @isset($icon)
        <span class="icon">
            {!! $icon !!}
        </span>
    @endisset
    {{ $value }}
</button>
