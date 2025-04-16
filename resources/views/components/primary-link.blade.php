@props(['class' => '', 'icon' => null, 'link' => '#', 'value' => ''])

<a href="{{ $link }}" id="hs-as-table-table-export-dropdown" wire:navigate class="{{ $class }}" aria-haspopup="menu"
    aria-expanded="false" aria-label="Dropdown" icon="plus">
    @isset($icon)
    <span class="icon">
        {!! $icon !!}
    </span>
    @endisset
    {{ $value }}
</a>