<div>
    <div
        class="max-w-5xl mx-auto bg-white dark:bg-neutral-900 shadow-lg rounded-2xl p-10 border border-gray-200 dark:border-neutral-700">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-neutral-100 mb-6">Register a New Company</h2>

        <form wire:submit.prevent="register" class="space-y-10">
            <!-- Company Logo Upload -->
            <div class="flex items-center gap-6">
                <div>
                    <img class="w-24 h-24 rounded-full ring-2 ring-white dark:ring-neutral-800 object-cover"
                        src="{{ asset('images/default-company-image.jpg') }}" alt="Company Logo">
                </div>
                <div>
                    <input wire:model="companyLogo" type="file" class="hidden" id="company-logo" accept="image/*">
                    <label for="company-logo"
                        class="cursor-pointer inline-flex items-center gap-2 text-sm px-5 py-2.5 border border-gray-300 rounded-md bg-white text-gray-800 shadow-sm hover:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-600 dark:text-neutral-300 dark:hover:bg-neutral-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="17 8 12 3 7 8" />
                            <line x1="12" y1="3" x2="12" y2="15" />
                        </svg>
                        Upload Company Logo
                    </label>
                    @error('logo')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Input Grid -->
            <div class="grid sm:grid-cols-2 gap-8">
                <!-- Company Name -->
                <div>
                    <label for="companyName"
                        class="block text-base font-medium text-gray-700 dark:text-neutral-200 mb-2">
                        Company Name
                    </label>
                    <x-primary-input :livewire="'companyName'" id="companyName" type="text"
                        class="p-4 mt-1 block w-full rounded-md bg-gray-300 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
                        placeholder="Write Company Name Here..." />
                    @error('companyName')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-base font-medium text-gray-700 dark:text-neutral-200 mb-2">
                        Email Address
                    </label>
                    <x-primary-input :livewire="'companyEmail'" id="email" type="email"
                        class="p-4 mt-1 block w-full rounded-md bg-gray-300 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
                        placeholder="company@example.com" />
                    @error('companyEmail')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-base font-medium text-gray-700 dark:text-neutral-200 mb-2">
                        Phone Number
                    </label>
                    <x-primary-input :livewire="'companyPhone'" id="phone" type="text"
                        class="p-4 mt-1 block w-full rounded-md bg-gray-300 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
                        placeholder="+967 777 123 456" />
                    @error('companyPhone')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-base font-medium text-gray-700 dark:text-neutral-200 mb-2">
                        Address
                    </label>
                    <x-primary-input :livewire="'companyAddress'" id="address" type="text"
                        class="p-4 mt-1 block w-full rounded-md bg-gray-300 border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
                        placeholder="Hadramout - Mukalla" />
                    @error('companyAddress')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description"
                        class="block text-base font-medium text-gray-700 dark:text-neutral-200 mb-2">
                        Description
                    </label>

                    <textarea wire:model.defer="companyDescription" id="description" rows="4"
                        class="p-4 mt-1 block w-full rounded-lg bg-gray-300 border-gray-300 text-gray-800 shadow-sm placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 sm:text-base dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200 dark:placeholder-neutral-500 "
                        placeholder="description of company here ... (optional)">
                     </textarea>

                    @error('companyDescription')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Actions -->
            <div class="mt-6 flex justify-end gap-4">
                <x-primary-link :link="route('licens.list')" :class="'py-2 px-3 inline-flex cursor-pointer items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700'" :value="'Cancel'">
                    Cancel
                </x-primary-link>

                <x-styled-button :type="'button'" :value="'Save Changes'" :livewire="'createCompany()'" />


            </div>
            <!-- End Actions -->
        </form>
    </div>

</div>
