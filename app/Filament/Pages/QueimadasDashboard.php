<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Queimada;

class QueimadasDashboard extends Page
{
    public ?string $ano = null;
    public ?string $gr = null;
    public float $totalAreaQueimada = 0;

    protected static string $view = 'filament.pages.queimadas-dashboard';

    public function mount(): void
    {
        $this->filtrosAtualizados(); // Corrigido aqui
    }

    public function updatedAno()
    {
        $this->filtrosAtualizados();
    }

    public function updatedGr()
    {
        $this->filtrosAtualizados();
    }

    public function filtrosAtualizados(): void
    {
        $query = Queimada::query();

        if ($this->ano) {
            $query->where('ano', $this->ano);
        }

        if ($this->gr) {
            $query->where('gr', $this->gr);
        }

        $this->totalAreaQueimada = $query->sum('incendio_ha');

        // Emite evento para o widget atualizar
        $this->dispatch('filtrosAtualizados', $this->ano, $this->gr);
    }
}
