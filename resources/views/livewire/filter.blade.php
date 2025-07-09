<div class="bg-white dark:bg-slate-800 py-12">

    <x-container class="flex px-4">
        <aside class="w-52 flex-shrink-0 mr-8">
            <ul id="faq-accordion-1" class="space-y-4 accordion">
                @foreach ($options as $option)
                    <div class="accordion-item">
                        <li x-data="{ open: false }" x-init="$watch('open', () => window.redrawLucideIcons())">
                            <button
                                class="px-4 py-2 bg-emerald-200 dark:bg-slate-200 w-full text-left font-semibold text-primary dark:text-slate-600 flex justify-between items-center"
                                @click="open = !open">
                                {{ $option->name }}
                                <i :data-lucide="open ? 'chevron-down' : 'chevron-up'"></i>
                            </button>

                            <ul class="mt-2 space-y-2" x-show="open">
                                @foreach ($option->features as $feature)
                                    <li>
                                        <label class=" inline-flex items-center">
                                            <input id="checkbox-switch-1" class="form-check-input mr-2" type="checkbox"
                                                value="">
                                            {{ $feature->description }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </div>
                @endforeach
            </ul>
        </aside>
        <div class="flex-1">

        </div>
    </x-container>
</div>
