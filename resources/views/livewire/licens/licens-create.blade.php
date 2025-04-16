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
                        <x-primary-input wire:model='companyName' id="companyName" type="text"
                            class="p-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
                            placeholder="Write Company Name Here..." />

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
                        <x-primary-input wire:model='dateFrom' id="dateFrom" type="date"
                            class="p-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400" />
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
                        <x-primary-input wire:model='dateTo' id="dateTo" type="date"
                            class="p-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400" />
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
                            value="Auto Dialer Module" />
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
                            value="Auto Dialer Module" />
                        <input wire:model.live="evaluationModule" id="evaluationModule" type="checkbox"
                            class="mt-1 block rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        @error('evaluationModule')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>


                    <div class="sm:col-span-12 lg:col-span-8">
                        <x-primary-lable 
                            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
                            value="Licene Status  " />
                        <select
                            class="py-3 px-4 pe-9 block w-full bg-gray-300 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-transparent dark:text-neutral-400 dark:focus:ring-neutral-600" wire:model='status'>
                            <option selected="">Determine Status of Licene</option>
                            <option>Active</option>
                            <option>Inactive</option>
                            <option>Expired</option>
                        </select>
                    </div>


                    <div class="sm:col-span-12 lg:col-span-8">
                        <x-primary-lable 
                            class="block text-sm font-medium text-gray-700 dark:text-neutral-200"
                            value="Licene Describtion" />
                            <div class="max-w-sm space-y-3">
                                <textarea class="py-2 px-3 sm:py-3 sm:px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder="Write Licene Description over here ..."></textarea>
                              </div>
                    </div>

                </div>
                <!-- End Grid -->

                <!-- Actions -->
                <div class="mt-6 flex justify-end gap-4">
                    <x-primary-link :link="route('licens.list')"
                        :class="'py-2 px-3 inline-flex cursor-pointer items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700'" :value="'Cancel'">
                        Cancel
                    </x-primary-link>

                    <x-primary-button :class="'hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 cursor-pointer'" :value="'Save Changes'" />
                      
                     
                </div>
                <!-- End Actions -->
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
</div>