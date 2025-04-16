<!-- Hidden Options -->
<div class="sm:col-span-12 lg:col-span-4" wire:key="options-section" {{ $autoDistributorModule ? ''
: 'hidden' }}>
<div class="mt-4 space-y-2">
    <div>
        <x-primary-lable for="max_calls"
            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
            value="Max Calls" />
            <x-primary-input wire:model="max_calls" id="max_calls" type="number"
            class="p-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
            placeholder="Enter Max Calls" />
    </div>
    <div>
        <x-primary-lable for="max_agents"
            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
            value="Max Agents" />
            <x-primary-input wire:model="max_agents" id="max_agents" type="number"
            class="p-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
            placeholder="Enter Max Agents" />
    </div>
    {{-- <div>
        <x-primary-lable for="max_calls"
            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
            value="Max Calls" />
            <x-primary-input wire:model="max_calls" id="max_calls" type="number"
            class="p-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
            placeholder="Enter Max Calls" />
    </div> --}}
</div>
</div>