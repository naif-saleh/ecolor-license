<div>
    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-700">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    Generate License
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    License Information Here.
                </p>
            </div>

            <form wire:submit.prevent="register">
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-6">
                    <!-- Company Name -->

                    {{-- Lable Component - Company Name --}}
                    <div class="sm:col-span-12 lg:col-span-6">
                        <x-primary-lable for="companyName"
                            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
                            value="Company Name" />
                        {{-- Input Component - Company Name --}}
                        <select wire:model='companyName' class="py-3 px-4 pe-9 block w-full bg-gray-300 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-transparent dark:text-neutral-400 dark:focus:ring-neutral-600">
                            <option value="" disabled selected  >Open this select menu</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                          </select>

                        @error('companyName')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date From -->
                    <div class="sm:col-span-12 lg:col-span-3">
                        {{-- Lable Component - Date-From --}}
                        <x-primary-lable for="dateFrom"
                            class="block text-sm font-medium text-gray-700 dark:text-neutral-200" value="Date From" />
                        {{-- Input Component - Date-From --}}
                        <x-primary-input :livewire="'dateFrom'" id="dateFrom" type="date"
                            class="p-4 mt-1 block w-full rounded-md border-gray-300 bg-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400" />
                        @error('dateFrom')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date To -->
                    <div class="sm:col-span-12 lg:col-span-3">
                        {{-- Lable Component - Date-To --}}
                        <x-primary-lable for="dateTo"
                            class="block text-sm font-medium text-gray-700 dark:text-neutral-200" value="Date To" />
                        {{-- Input Component - Date-To --}}
                        <x-primary-input :livewire="'dateTo'" id="dateTo" type="date"
                            class="p-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400" />
                        @error('dateTo')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Auto Dialer Module -->
                    <div class="sm:col-span-12 lg:col-span-4">
                        <x-primary-lable for="autoDialerModule"
                            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
                            value="Auto Dialer Module" />
                        <input wire:model.live="autoDialerModule" id="autoDialerModule" type="checkbox"
                            class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('autoDialerModule')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        @include('components.partials.auto-dialer-moduale')
                    </div>


                    <!-- Auto Distributor Module -->
                    <div class="sm:col-span-12 lg:col-span-4">
                        <x-primary-lable for="autoDistributorModule"
                            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
                            value="Auto Distributor Module" />
                        <input wire:model.live="autoDistributorModule" id="autoDistributorModule" type="checkbox"
                            class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('autoDistributorModule')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        @include('components.partials.auto-distributor-moduale')
                    </div>


                    <!-- Evaluation Module -->
                    <div class="sm:col-span-12 lg:col-span-4">
                        <x-primary-lable for="evaluationModule"
                            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
                            value="Evaluation Module" />
                        <input wire:model.live="evaluationModule" id="evaluationModule" type="checkbox"
                            class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('evaluationModule')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>


                    <div class="sm:col-span-12 lg:col-span-8">
                        <x-primary-lable class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
                            value="Licene Status  " />
                        <select
                            class="py-3 px-4 pe-9 block w-full bg-gray-300 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-transparent dark:text-neutral-400 dark:focus:ring-neutral-600"
                            wire:model.defer="status">
                            <option value="" disabled selected>Determine Status of License</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="sm:col-span-12 lg:col-span-8">
                        <x-primary-lable class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
                            value="Licene Describtion" />
                        <div class="max-w-sm space-y-3">
                            <textarea
                                class="py-2 px-3 sm:py-3 sm:px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-gray-300 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                rows="3" wire:model='description'
                                placeholder="Write Licene Description over here ... (Optional)"></textarea>
                        </div>

                    </div>

                </div>
                <!-- End Grid -->

                <!-- Actions -->
                <div class="mt-6 flex justify-end gap-4">
                    <x-primary-link :link="route('licens.list')"
                        :class="'py-2 px-3 inline-flex cursor-pointer items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700'"
                        :value="'Cancel'">
                        Cancel
                    </x-primary-link>

                    <x-styled-button :type="'button'" :value="'Save Changes'" :livewire="'generateLicene()'" />


                </div>
                <!-- End Actions -->
            </form>
        </div>
        <!-- End Card -->

        @if ($licensKey)
        <div x-data="{ copied: false, timeout: null }"
            class="flex items-center space-x-2 bg-gray-100 border border-gray-300 p-3 rounded-md w-fit mt-5">
            <span x-ref="key" class="font-mono text-sm text-gray-700">{{$licensKey}}</span>

            <button @click="
            navigator.clipboard.writeText($refs.key.textContent)
                .then(() => {
                    copied = true;

                    // Clear existing timeout if user clicks multiple times
                    clearTimeout(timeout);

                    // Set a new timeout for 10 seconds
                    timeout = setTimeout(() => copied = false, 10000);
                });
        " class="relative bg-gray-500 hover:bg-gray-600 text-white text-sm px-3 py-1 rounded overflow-hidden">
                <span x-show="!copied" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    Copy
                </span>

                <span x-show="copied" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90 translate-y-1"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-90 translate-y-1"
                    class="absolute inset-0 flex items-center justify-center">
                    Copied!
                </span>
            </button>
        </div>



        @endif


    </div>
    <!-- End Card Section -->
</div>
