<x-filament::page>
    <h2 class="text-xl font-bold mb-4">Dados de Queimadas em UCs Federais</h2>

    <table class="table-auto w-full text-sm">
        <thead>
            <tr>
                <th class="text-left">Unidade de Conservação</th>
                <th class="text-left">Ano</th>
                <th class="text-left">Área Queimada (ha)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $registro)
                <tr>
                    <td>{{ $registro['uc'] }}</td>
                    <td>{{ $registro['ano'] }}</td>
                    <td>{{ number_format($registro['area_queimada'], 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-filament::page>
