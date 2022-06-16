<?php

namespace Tests\Feature\ZipCode;

use App\Models\ZipCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ResponseTest extends TestCase
{
    public function zip_code_values() {
        return [
            ['98000'],
            ['98017'],
            ['98100'],
            // ['98200'], el servicio no está actualizado en los settlements
            ['98237'],
            ['98426'],
            // ['98429'], el servicio responde EL RUISE?OR y no EL RUISENOR
            // ['98430'], el servicio responde BA?ONCITO y no BANONCITO
            ['98432'],
            ['98435'],
            ['98436'],
        ];
    }

    /** 
     * @dataProvider zip_code_values
     */
    public function test_example($zip_code)
    {
        $response          = $this->getJson('/api/zip-codes/'.$zip_code);
        $response_external = Http::get('https://jobs.backbonesystems.io/api/zip-codes/'.$zip_code);

        $response->assertJson($response_external->json());
    }
}
