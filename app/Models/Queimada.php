<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queimada extends Model
{
    //
    protected $fillable = [
        'unidade_conservacao',
        'ngi',
        'gr',
        'incendio_ha',
        'queima_prescrita_ha',
        'queima_controlada_ha',
        'aceiro_ha',
        'fogo_natural_ha',
        'indigenas_isolados_ha',
        'total_prevencao_ha',
        'total_combate_ha',
        'area_total_ha',
        'area_uc_ha',
        'percentual_aaf_na_uc',
        'ano',
    ];
    
}
