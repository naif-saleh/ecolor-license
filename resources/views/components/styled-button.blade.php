@props(['type' => '', 'value' => '', 'livewire' => ''])
<Button type="{{ $type }}"
    class="py-2 px-3 inline-flex cursor-pointer items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-black text-gray-300 shadow-2xs hover:bg-gray-300 hover:text-gray-700 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-400 dark:border-neutral-700 dark:text-gray-800 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
    wire:click="{{ $livewire }}"
    wire:loading.attr="disabled">
    <div wire:loading class="animate-spin inline-block size-6 border-3 border-current border-t-transparent text-gray-400 rounded-full" role="status" aria-label="loading">
        <span class="sr-only">Loading...</span>
      </div>
    {{ $value }}

</Button>
