<div
    class="max-w-3xl mx-auto p-10 bg-white rounded-3xl shadow-2xl hover:shadow-3xl transition-shadow duration-300 dark:bg-neutral-900">
    <!-- Profile Header -->
    <div class="flex items-center gap-x-8">
        <img class="size-28 rounded-full object-cover border-4 border-gray-300 shadow-md"
            src="{{ $company->logo && file_exists(public_path('storage/' . $company->logo)) ? asset('storage/' . $company->logo) : asset('images/default-company-image.jpg') }}"
            alt="Avatar">

        <div>
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white">{{ $company->name }}</h2>
        </div>
    </div>

    <!-- About Section -->
    <div class="mt-10 space-y-5 text-lg text-gray-700 dark:text-neutral-300 leading-relaxed">
        <p>
           {{$company->description}}
        </p>
    </div>

    <!-- Contact Info -->
    <ul class="mt-8 space-y-4">
        <!-- Email -->
        <li class="flex items-center gap-x-4">
            <svg class="size-5 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect width="20" height="16" x="2" y="4" rx="2" />
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
            </svg>
            <a href="#"
                class="text-base text-gray-600 hover:text-gray-600 underline dark:text-neutral-400 dark:hover:text-gray-300">
                {{ $company->email }}
            </a>
        </li>

        <!-- GitHub or Icon Link -->
        <li class="flex items-center gap-x-4">
            <svg class="size-5 text-gray-500 dark:text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M14.1881 10.1624L22.7504 0H20.7214L13.2868 8.82385L7.34878 0H0.5L9.47944 13.3432L0.5 24H2.5291L10.3802 14.6817L16.6512 24H23.5L14.1881 10.1624ZM11.409 13.4608L3.26021 1.55962H6.37679L20.7224 22.5113H17.6058L11.409 13.4613V13.4608Z" />
            </svg>
            <a href="#"
                class="text-base text-gray-600 hover:text-gray-600 underline dark:text-neutral-400 dark:hover:text-gray-300">
                {{ $company->phone }}
            </a>
        </li>

        <!-- Website or Globe Icon -->
        <li class="flex items-center gap-x-4">
            <svg class="size-5 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" />
                <path d="M19.13 5.09C15.22 9.14 10 10.44 2.25 10.94" />
                <path d="M21.75 12.84c-6.62-1.41-12.14 1-16.38 6.32" />
                <path d="M8.56 2.75c4.37 6 6 9.42 8 17.72" />
            </svg>
            <a href="#"
                class="text-base text-gray-600 hover:text-gray-600 underline dark:text-neutral-400 dark:hover:text-gray-300">
                {{ $company->address }}
            </a>
        </li>
    </ul>
</div>
