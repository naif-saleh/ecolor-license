@props(['licensList' => '', 'enable' => '', 'licensHeader' => 'Licens List'])

<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">

                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                        <!-- Input -->
                        <div class="sm:col-span-1">
                            <h1 class="text-xl text-neutral-500 dark:text-neutral-200">{{$licensHeader}}</h1>
                        </div>
                        <!-- End Input -->

                        <div class="sm:col-span-2 md:grow">
                            <div class="flex justify-end gap-x-2">


                                @if ($enable == "true")
                                    @if (\App\Models\Licen::onlyTrashed()->count() > 0)
                                        <x-primary-link :link="route('licens.softdelete')" :value="'Soft Deletes'"
                                            :class="'py-2 px-3 inline-flex cursor-pointer items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700'">
                                            <x-slot name="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </x-slot>
                                        </x-primary-link>
                                    @endif

                                <x-primary-link :link="route('licens.create')" :value="'Create New Licens'"
                                    :class="'py-2 px-3 inline-flex cursor-pointer items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700'">
                                    <x-slot:icon>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </x-slot:icon>
                                </x-primary-link>
                            @endif




                                <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <input type="text" id="hs-as-table-product-review-search"
                                        name="hs-as-table-product-review-search" wire:model.live.debounce.300ms="search"
                                        class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Search">

                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                        <svg class="size-4 text-gray-400 dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>



                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Company
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Status
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            License Duration
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Modules
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-end">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Action
                                        </span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                            @forelse ($licensList as $licen)
                            <tr>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-2">
                                        <span
                                            class="text-sm text-gray-600 dark:text-neutral-400">{{$licen->company->name ?? "N/A"}}</span>
                                    </div>
                                </td>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-2">
                                        @if ($licen->status === "Active")
                                        <span
                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            Active
                                        </span>
                                        @elseif ($licen->status === "Inactive")
                                        <span
                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full dark:bg-yellow-500/10 dark:text-yellow-500">
                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm0-1.5A6.5 6.5 0 1 0 8 1.5a6.5 6.5 0 0 0 0 13zm-.75-9.25a.75.75 0 0 1 1.5 0v3.5a.75.75 0 0 1-1.5 0v-3.5zm.75 6a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5z" />
                                            </svg>
                                            Inactive
                                        </span>
                                        @elseif ($licen->status === "Expired")
                                        <span
                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm0-1.5A6.5 6.5 0 1 0 8 1.5a6.5 6.5 0 0 0 0 13zm-.75-9.25a.75.75 0 0 1 1.5 0v3.5a.75.75 0 0 1-1.5 0v-3.5zm.75 6a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5z" />
                                            </svg>
                                            Expaired
                                        </span>
                                        @endif
                                    </div>

                </div>
                </td>
                <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-2">
                        <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $licen->start_date }} - {{
                            $licen->end_date }}</span>
                    </div>
                </td>
                <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-2">
                        <div class="flex items-center gap-x-2">
                            <div class="flex flex-col gap-y-1">
                                <span
                                    class="text-sm text-gray-600 dark:text-neutral-400">{{$licen->autoDialerModules->name
                                    ?? ""}}</span>
                                <span
                                    class="text-sm text-gray-600 dark:text-neutral-400">{{$licen->autoDistributorModuales->name
                                    ?? ""}}</span>
                                <span
                                    class="text-sm text-gray-600 dark:text-neutral-400">{{$licen->evaluationModuales->name
                                    ?? ""}}</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="size-px whitespace-nowrap">
                    <div class="px-6 py-2">
                        <div class="flex items-center gap-x-2">
                            <span class="text-sm text-gray-600 dark:text-neutral-400">
                                <div
                                    class="group inline-flex items-center divide-x divide-gray-300 border border-gray-300 bg-white shadow-2xs rounded-lg transition-all dark:divide-neutral-700 dark:bg-neutral-700 dark:border-neutral-700">
                                    @if (!$licen->trashed())
                                    <div class="hs-tooltip inline-block">
                                        <x-primary-link :link="route('licens.show', $licen->id)" :value="''"
                                            :class="'hs-tooltip-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-s-md bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800'">
                                            <x-slot:icon>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </x-slot:icon>
                                        </x-primary-link>

                                    </div>

                                    <div class="hs-tooltip inline-block">

                                        <x-primary-button :livewire="'downloadPdf(' . $licen->id . ')'"
                                            :class="'hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 '">
                                            <x-slot:icon>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                            </x-slot:icon>
                                        </x-primary-button>

                                    </div>

                                    <div class="hs-tooltip inline-block">
                                        <x-primary-link :link="route('licens.update', $licen->id)" :value="''"
                                            :class="'hs-tooltip-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-s-md bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800'">
                                            <x-slot:icon>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>

                                            </x-slot:icon>
                                        </x-primary-link>

                                    </div>
                                    <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                             <div x-data="{ showDeleteModal: false }">
                                                 <!-- Delete button -->
                                                 <button @click="showDeleteModal = true" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                         <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                     </svg>
                                                 </button>

                                                 <!-- Delete Modal -->
                                                 <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                     <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                         <!-- Background overlay -->
                                                         <div x-show="showDeleteModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="showDeleteModal = false"></div>

                                                         <!-- Modal panel -->
                                                         <div x-show="showDeleteModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                             <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                 <div class="sm:flex sm:items-start">
                                                                     <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                         <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                                         </svg>
                                                                     </div>
                                                                     <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                         <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                                             Delete License
                                                                         </h3>
                                                                         <div class="mt-2 flex flex-col">
                                                                             <p class="text-sm text-gray-500">
                                                                                 Are you sure you want to delete this licen?
                                                                             </p>
                                                                             <p class="text-sm text-gray-500">
                                                                                 All License of <u>{{$licen->name}}</u> will be soft deletes?
                                                                             </p>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                 <button type="button" wire:click="deleteLicen({{ $licen->id }})" @click="showDeleteModal = false" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                     Delete
                                                                 </button>
                                                                 <button type="button" @click="showDeleteModal = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                     Cancel
                                                                 </button>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>



                                    </div>
                                    @else
                                    <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                        <div x-data="{ showDeleteModal: false }">
                                            <!-- Delete button -->
                                            <button @click="showDeleteModal = true" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>

                                            <!-- Delete Modal -->
                                            <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                    <!-- Background overlay -->
                                                    <div x-show="showDeleteModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="showDeleteModal = false"></div>

                                                    <!-- Modal panel -->
                                                    <div x-show="showDeleteModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                            <div class="sm:flex sm:items-start">
                                                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                                        Delete License
                                                                    </h3>
                                                                    <div class="mt-2 flex flex-col">
                                                                        <p class="text-sm text-gray-500">
                                                                            Are you sure you want to delete this licen?
                                                                        </p>
                                                                        <p class="text-sm text-gray-500">
                                                                            All License of <u>{{$licen->name}}</u> will be force deletes?
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                            <button type="button" wire:click="deleteLicenForce({{ $licen->id }})" @click="showDeleteModal = false" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                Delete
                                                            </button>
                                                            <button type="button" @click="showDeleteModal = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                                        <x-primary-button :livewire="'restoreLicen(' . $licen->id . ')'"
                                            :class="'hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 '">
                                            <x-slot:icon>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                  </svg>

                                            </x-slot:icon>
                                        </x-primary-button>


                                    </div>

                                    @endif


                                </div>
                        </div>
                    </div>
                </td>
                </tr>
                <tr>
                    @empty
                    <td colspan="6"
                        class="text-center text-gray-500 dark:text-neutral-400 p-6">
                        No data available
                    </td>
                </tr>
                @endforelse

                </tbody>
                </table>
                <!-- End Table -->

                <!-- Footer -->
                <div
                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">

                    <div>
                        <div class="inline-flex items-center gap-x-2 mt-4">
                            {{-- Previous Page --}}
                            <button wire:click="previousPage" wire:loading.attr="disabled"
                                @if ($licensList->onFirstPage()) disabled @endif
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border
                                border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden
                                focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800
                                dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700
                                dark:focus:bg-neutral-700">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Prev
                            </button>

                            {{-- Page info --}}
                            <span
                                class="py-2 px-3 inline-flex items-center text-sm font-medium text-gray-600 dark:text-neutral-300">
                                Page {{ $licensList->currentPage() }} of {{ $licensList->lastPage() }}
                            </span>

                            {{-- Next Page --}}
                            <button wire:click="nextPage" wire:loading.attr="disabled"
                                @if (!$licensList->hasMorePages()) disabled @endif
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border
                                border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden
                                focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800
                                dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700
                                dark:focus:bg-neutral-700">
                                Next
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>


                    </div>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </div>
</div>
<!-- End Card -->
</div>
<!-- End Table Section -->
