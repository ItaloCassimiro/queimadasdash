<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Queimada;
use Illuminate\Support\Facades\File;

class ImportarQueimadas extends Command
{
    protected $signature = 'importar:queimadas';
    protected $description = 'Importa os arquivos JSON da pasta jsons para o banco';

    public function handle()
    {
        $jsonPath = base_path('jsons');
        $arquivos = File::files($jsonPath);

        foreach ($arquivos as $arquivo) {
            $ano = basename($arquivo->getFilename(), '.json');
            $dados = json_decode(File::get($arquivo), true);

            foreach ($dados as $registro) {
                Queimada::create([
                    'unidade_conservacao'     => $registro['Unidade de Conservação '] ?? '',
                    'ngi'                     => $registro['NGI'] ?? '',
                    'gr'                      => $registro['GR'] ?? '',
                
                    'incendio_ha'             => $registro['Incêndio (ha)'] ?? null,
                    'queima_prescrita_ha'     => $registro['Queima prescrita (ha)'] ?? null,
                    'queima_controlada_ha'    => $registro['Queima controlada (ha)'] ?? null,
                    'aceiro_ha'               => $registro['Aceiro (ha)'] ?? null,
                    'fogo_natural_ha'         => $registro['Fogo natural (ha)'] ?? null,
                    'indigenas_isolados_ha'   => $registro['Indígenas isolados (ha) '] ?? null,
                    'total_prevencao_ha'      => $registro['Total Prevenção (ha) '] ?? null,
                    'total_combate_ha'        => $registro['Total Combate (ha) '] ?? null,
                    'area_total_ha'           => $registro['Área TOTAL (ha)'] ?? null,
                    'area_uc_ha'              => $registro['Área UC (ha)'] ?? null,
                    'percentual_aaf_na_uc'    => $registro['% de AAF na UC'] ?? null,
                
                    'ano'                     => (int)$ano,
                ]);                
            }

            $this->info("Importado: {$arquivo->getFilename()}");
        }
    }
}

