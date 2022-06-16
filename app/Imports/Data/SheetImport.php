<?php

namespace App\Imports\Data;

use App\Models\City;
use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SheetImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        #region federal entity

        $first_row = $rows[0];

        $federal_entity = FederalEntity::create([
            'name' => $first_row['d_estado'],
            'code' => $first_row['c_estado']
        ]);

        #endregion
        #region models

        foreach ($rows as $row) {
            $code_city            = $row['c_cve_ciudad'];
            $code_municipality    = $row['c_mnpio'];
            $code_settlement      = $row['id_asenta_cpcons'];
            $code_settlement_type = $row['c_tipo_asenta'];

            $municipality = Municipality::firstOrCreate([
                'name'              => $row['d_mnpio'],
                'code'              => $code_municipality,
                'federal_entity_id' => $federal_entity->id
            ]);

            $zip_code = ZipCode::firstOrCreate([
                'zip_code'          => $row['d_codigo'],
                'federal_entity_id' => $federal_entity->id,
                'municipality_id'   => $municipality->id,
            ]);

            $settlement_type = SettlementType::firstOrCreate([
                'name' => $row['d_tipo_asenta'],
                'code' => $code_settlement_type
            ]);

            if ($code_city) {
                $city = City::firstOrCreate([
                    'name' => $row['d_ciudad'],
                    'code' => $code_city
                ]);

                $zip_code->cities()->syncWithoutDetaching($city->id);
            }

            $settlement = Settlement::firstOrCreate([
                'name'               => $row['d_asenta'],
                'code'               => $code_settlement,
                'zone_type'          => $row['d_zona'],
                'settlement_type_id' => $settlement_type->id,
                'municipality_id'    => $municipality->id
            ]);

            $zip_code->settlements()->syncWithoutDetaching($settlement->id);
        }

        #endregion
    }
}
