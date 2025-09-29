<?php

namespace App\Filament\Widgets;

use App\Models\Queimada;
use Filament\Widgets\BarChartWidget;

class AreaQueimadaWidget extends BarChartWidget
{
    protected static ?string $heading = 'Área Queimada por Região';

    public ?string $ano = null;
    public ?string $gr = null;

    // Livewire escuta mudanças nessas propriedades e atualiza
    protected function getListeners(): array
    {
        return [
            'filtrosAtualizados' => 'updateChart',
        ];
    }

    public function updateChart($ano = null, $gr = null): void
    {
        $this->ano = $ano;
        $this->gr = $gr;
    }

    protected function getData(): array
    {
        $query = Queimada::query();

        if ($this->ano) {
            $query->where('ano', $this->ano);
        }

        if ($this->gr) {
            $query->where('gr', $this->gr);
        }

        $dados = $query
            ->selectRaw('gr, SUM(incendio_ha) as total')
            ->groupBy('gr')
            ->orderBy('gr')
            ->get();

        return [
            'labels' => $dados->pluck('gr')->toArray(),
            'datasets' => [
                [
                    'label' => 'Área Queimada (ha)',
                    'data' => $dados->pluck('total')->toArray(),
                    'backgroundColor' => '#f87171', // vermelho claro
                ],
            ],
        ];
    }
}