<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;

class QueimadasService
{
    public static function getDados()
    {
        $path = storage_path('app/public/queimadas.xlsx');

         return self::ler($path);
    }

    public static function ler(string $path)
    {
        if (!file_exists($path)) {
            return ['Erro' => "Arquivo não encontrado em: $path"];
        }

        $dados = Excel::toArray([], $path);

        // 🔍 Mostra o conteúdo bruto da planilha no terminal para debug
        dump($dados);

        // Retorna a primeira aba, ignorando o cabeçalho
        return array_slice($dados[0], 1);
    }
}
