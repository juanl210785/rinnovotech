<div>
    <section class="intro-y box col-span-12 lg:col-span-6">
        <header class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60">
            <h2 class="font-medium text-base mr-auto">Direcciones guardadas</h2>
        </header>
        <div class="p-5">
            @if ($addresses->count())
                
            @else
                <p class="text-center">
                    No se encontraron direcciones
                </p>
            @endif
        </div>
    </section>
</div>
