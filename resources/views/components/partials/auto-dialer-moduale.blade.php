<!-- Hidden Options -->
<div class="sm:col-span-12 lg:col-span-4" wire:key="options-section" {{ $autoDialerModule ? ''
: 'hidden' }}>
<div class="mt-4 space-y-2">
    <div>
        <x-primary-lable for="max_channels"
            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
            value="Max Channels" />
            <x-primary-input :livewire="'max_channels'" id="max_channels" type="number"
            class="p-4 mt-1 block w-full rounded-md border-gray-300 bg-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
            placeholder="Enter Cax Channels" />
    </div>
    <div>
        <x-primary-lable for="max_providers"
            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
            value="Max Providers" />
            <x-primary-input :livewire="'max_providers'" id="max_providers" type="number"
            class="p-4 mt-1 block w-full rounded-md border-gray-300 bg-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
            placeholder="Enter Max Providers" />
    </div>
    <div>
        <x-primary-lable for="max_calls"
            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
            value="Max Calls" />
            <x-primary-input :livewire="'dial_max_calls'" id="max_calls" type="number"
            class="p-4 mt-1 block w-full rounded-md border-gray-300 bg-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
            placeholder="Enter Max Calls" />
    </div>
</div>
</div>