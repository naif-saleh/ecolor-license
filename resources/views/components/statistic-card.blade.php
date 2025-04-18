@props(['name' => '' , 'count' => '', 'color' => ''])

<!-- Card -->
<div
    class="flex flex-col gap-y-3 absolute inset-0 size-full lg:gap-y-5 p-4 md:p-5 bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
    <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-{{ $color }}-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">{{ $name }}</span>
    </div>

    <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ $count }}
        </h3>
    </div>


</div>
