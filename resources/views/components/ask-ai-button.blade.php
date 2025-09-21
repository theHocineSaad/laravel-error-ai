<div class="relative" x-data="{
    menu: false
}" @click.outside="menu = false">
    <button x-cloak
        class="relative rounded-r-md sm:col-span-1 border-y border-r px-3 h-8 transition-colors duration-200 ease-in-out cursor-pointer shadow-xs text-neutral-600 dark:text-neutral-400 bg-white/5 border-neutral-200 hover:bg-neutral-100 dark:bg-white/5 dark:border-white/10 dark:hover:bg-white/10"
        @click="menu = ! menu">
        <x-laravel-exceptions-renderer::icons.chevron-down class="h-4 w-4" />
    </button>

    <div x-show="menu"
        class="absolute mt-1 right-0 z-10 flex origin-top-right flex-col rounded-md cursor-pointer shadow-xs text-neutral-600 dark:text-neutral-400 bg-neutral-50 dark:bg-neutral-900 border-neutral-200 dark:border-white/10"
        style="display: none" @click="menu = false">
        <a href="https://chatgpt.com/?hints=search&q={{ urlencode($markdown) }}" target="_blank"
            rel="noopener noreferrer"
            class="text-sm flex items-center gap-2 px-3 h-8 whitespace-nowrap rounded-t-md transition-colors duration-200 ease-in-out cursor-pointer shadow-xs text-neutral-600 dark:text-neutral-400 bg-white/5 border-neutral-200 hover:bg-neutral-100 dark:bg-white/5 dark:border-white/10 dark:hover:bg-white/10">
            <x-laravel-exceptions-renderer::icons.chatgpt-logo class="h-3 w-3" />
            Ask ChatGPT
        </a>
        <a href="https://claude.ai/new?q={{ urlencode($markdown) }}" target="_blank" rel="noopener noreferrer"
            class="text-sm flex items-center gap-2 px-3 h-8 whitespace-nowrap rounded-b-md transition-colors duration-200 ease-in-out cursor-pointer shadow-xs text-neutral-600 dark:text-neutral-400 bg-white/5 border-neutral-200 hover:bg-neutral-100 dark:bg-white/5 dark:border-white/10 dark:hover:bg-white/10">
            <x-laravel-exceptions-renderer::icons.claude-logo class="h-3 w-3" />
            Ask Claude
        </a>
    </div>
</div>
