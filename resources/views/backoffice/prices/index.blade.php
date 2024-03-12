<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pricing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    this is the pricnig managment
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1>Prezzi e Piani</h1>

                <div class="pricing-table">
                    <div class="plan">
                        <h2>Piano Base</h2>
                        <p>Descrizione del piano base...</p>
                        <span class="price">$9.99/mese</span>
                        <a href="#" class="btn">Seleziona</a>
                    </div>

                    <div class="plan">
                        <h2>Piano Premium</h2>
                        <p>Descrizione del piano premium...</p>
                        <span class="price">$19.99/mese</span>
                        <a href="#" class="btn">Seleziona</a>
                    </div>

                    <div class="plan">
                        <h2>Piano Pro</h2>
                        <p>Descrizione del piano pro...</p>
                        <span class="price">$29.99/mese</span>
                        <a href="#" class="btn">Seleziona</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
