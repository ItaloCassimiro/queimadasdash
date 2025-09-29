<?php

namespace App\Providers\Filament;

use App\Services\QueimadasService;

public function getViewData(): array
{
    $dados = QueimadasService::getDados();

    return [
        'dados' => $dados,
    ];
}


