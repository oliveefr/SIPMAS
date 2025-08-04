@props(['title', 'count', 'iconBg'])

<div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
    <div class="p-5 flex items-center">
        <div class="flex-shrink-0">
            <div class="h-12 w-12 rounded-full flex items-center justify-center text-white {{ $iconBg }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 12v.01M12 18h.01M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
            </div>
        </div>
        <div class="ml-5">
            <dt class="text-sm font-medium text-gray-500 truncate">{{ $title }}</dt>
            <dd class="text-xl font-semibold text-gray-900">{{ $count }}</dd>
        </div>
    </div>
</div>
