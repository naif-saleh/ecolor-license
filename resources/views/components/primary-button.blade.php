@props(['class' => '', 'value' => '', 'icon' => null])

<button type="button" class="{{ $class }}">
    @isset($icon)
    <span class="icon">
        {!! $icon !!}
    </span>
    @endisset
    {{ $value }}
</button>