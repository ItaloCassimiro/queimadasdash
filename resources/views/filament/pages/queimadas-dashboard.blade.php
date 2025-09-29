<div class="space-y-6">
    {{-- Filtros --}}
    <div class="flex space-x-4 items-end">
        <div>
            <label for="ano">Ano</label>
            <select wire:model.defer="ano"
                    class="border rounded px-2 py-1
                    text-gray-900 dark:text-gray-100
                    bg-white dark:bg-gray-800
                    focus:ring-2 focus:ring-primary-500">
                <option value="">Todos</option>
                @foreach(range(2007, 2024) as $anoOption)
                    <option value="{{ $anoOption }}">{{ $anoOption }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="gr">Região (GR)</label>
            <select
                wire:model.defer="gr"
                class="border rounded px-2 py-1
                    text-gray-900 dark:text-gray-100
                    bg-white dark:bg-gray-800
                    focus:ring-2 focus:ring-primary-500"
            >
                <option value="">Todas</option>
                @foreach(\App\Models\Queimada::select('gr')->distinct()->pluck('gr') as $grOption)
                    <option value="{{ $grOption }}">{{ $grOption }}</option>
                @endforeach
            </select>
        </div>



        <div>
            <button
                wire:click="filtrosAtualizados"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
            >
                Atualizar
            </button>
        </div>

        <div wire:loading wire:target="filtrosAtualizados" class="text-sm text-gray-500">
            Atualizando...
        </div>
    </div>

    {{-- Total --}}
    <div>
        <h2>Total de Área Queimada (ha)</h2>
        <p class="text-3xl font-bold">
            {{ number_format($totalAreaQueimada, 2, ',', '.') }} ha
        </p>
    </div>

    {{-- Gráfico --}}
    @livewire(\App\Filament\Widgets\AreaQueimadaWidget::class)
</div>
