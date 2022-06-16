<?php

namespace App\Imports;

use App\Imports\Data\SheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class DataImport implements WithMultipleSheets
{
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'Aguascalientes'                   => new SheetImport(),
            'Baja_California'                  => new SheetImport(),
            'Baja_California_Sur'              => new SheetImport(),
            'Campeche'                         => new SheetImport(),
            'Coahuila_de_Zaragoza'             => new SheetImport(),
            'Colima'                           => new SheetImport(),
            'Chiapas'                          => new SheetImport(),
            'Chihuahua'                        => new SheetImport(),
            'Distrito_Federal'                 => new SheetImport(),
            'Durango'                          => new SheetImport(),
            'Guanajuato'                       => new SheetImport(),
            'Guerrero'                         => new SheetImport(),
            'Hidalgo'                          => new SheetImport(),
            'Jalisco'                          => new SheetImport(),
            'México'                           => new SheetImport(),
            'Michoacán_de_Ocampo'              => new SheetImport(),
            'Morelos'                          => new SheetImport(),
            'Nayarit'                          => new SheetImport(),
            'Nuevo_León'                       => new SheetImport(),
            'Oaxaca'                           => new SheetImport(),
            'Puebla'                           => new SheetImport(),
            'Querétaro'                        => new SheetImport(),
            'Quintana_Roo'                     => new SheetImport(),
            'San_Luis_Potosí'                  => new SheetImport(),
            'Sinaloa'                          => new SheetImport(),
            'Sonora'                           => new SheetImport(),
            'Tabasco'                          => new SheetImport(),
            'Tamaulipas'                       => new SheetImport(),
            'Tlaxcala'                         => new SheetImport(),
            'Veracruz_de_Ignacio_de_la_Llave'  => new SheetImport(),
            'Yucatán'                          => new SheetImport(),
            'Zacatecas'                        => new SheetImport(),
        ];
    }
}
