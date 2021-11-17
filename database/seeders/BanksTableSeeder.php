<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\App\Bank;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'code' => '0156',
            'bank_name' => '100%BANCO'
        ]);
        Bank::create([
            'code' => '0196',
            'bank_name' => 'ABN-AMRO-BANK'
        ]);
        Bank::create([
            'code' => '0172',
            'bank_name' => 'BANCAMIGA-BANCO-MICROFINANCIERO'
        ]);
        Bank::create([
            'code' => '0171',
            'bank_name' => 'BANCO-ACTIVO-BANCO-COMERCIAL'
        ]);
        Bank::create([
            'code' => '0166',
            'bank_name' => 'BANCO-AGRICOLA'
        ]);
        Bank::create([
            'code' => '0175',
            'bank_name' => 'BANCO-BICENTENARIO'
        ]);
        Bank::create([
            'code' => '0128',
            'bank_name' => 'BANCO-CARONI-BANCO-UNIVERSAL'
        ]);
        Bank::create([
            'code' => '0164',
            'bank_name' => 'BANCO-DE-DESARROLLO-DEL-MICROEMPRESARIO'
        ]);
        Bank::create([
            'code' => '0102',
            'bank_name' => 'BANCO-DE-VENEZUELA'
        ]);
        Bank::create([
            'code' => '0114',
            'bank_name' => 'BANCO-DEL-CARIBE'
        ]);
        Bank::create([
            'code' => '0149',
            'bank_name' => 'BANCO-DEL-PUEBLO-SOBERANO'
        ]);
        Bank::create([
            'code' => '0163',
            'bank_name' => 'BANCO-DEL-TESORO'
        ]);
        Bank::create([
            'code' => '0176',
            'bank_name' => 'BANCO-ESPIRITO-SANTO'
        ]);
        Bank::create([
            'code' => '0115',
            'bank_name' => 'BANCO-EXTERIOR'
        ]); 
        Bank::create([
            'code' => '0003',
            'bank_name' => 'BANCO-INDUSTRIAL-DE-VENEZUELA'
        ]);
        Bank::create([
            'code' => '0173',
            'bank_name' => 'BANCO-INTERNACIONAL-DE-DESARROLLO'
        ]);
        Bank::create([
            'code' => '0105',
            'bank_name' => 'BANCO-MERCANTIL'
        ]);
        Bank::create([
            'code' => '0191',
            'bank_name' => 'BANCO-NACIONAL-DE-CREDITO'
        ]);
        Bank::create([
            'code' => '0116',
            'bank_name' => 'BANCO-OCCIDENTAL-DE-DESCUENTO'
        ]);
        Bank::create([
            'code' => '0138',
            'bank_name' => 'BANCO-PLAZA'
        ]);
        Bank::create([
            'code' => '0108',
            'bank_name' => 'BANCO-PROVINCIAL-BBVA'
        ]);
        Bank::create([
            'code' => '0104',
            'bank_name' => 'BANCO-VENEZOLANO-DE-CREDITO'
        ]);
        Bank::create([
            'code' => '0168',
            'bank_name' => 'BANCRECER-BANCO-DE-DESARROLLO'
        ]);
        Bank::create([
            'code' => '0134',
            'bank_name' => 'BANESCO-BANCO-UNIVERSAL'
        ]);
        Bank::create([
            'code' => '0177',
            'bank_name' => 'BANFANB'
        ]);
        Bank::create([
            'code' => '0146',
            'bank_name' => 'BANGENTE'
        ]);
        Bank::create([
            'code' => '0174',
            'bank_name' => 'BANPLUS-BANCO-COMERCIAL'
        ]);
        Bank::create([
            'code' => '0190',
            'bank_name' => 'CITIBANK'
        ]);
        Bank::create([
            'code' => '0121',
            'bank_name' => 'CORP-BANCA'
        ]);
        Bank::create([
            'code' => '0157',
            'bank_name' => 'DELSUR-BANCO-UNIVERSAL'
        ]);
        Bank::create([
            'code' => '0151',
            'bank_name' => 'FONDO-COMUN'
        ]);
        Bank::create([
            'code' => '0601',
            'bank_name' => 'INSTITUTO-MUNICIPAL-DE-CREDITO-POPULAR'
        ]);
        Bank::create([
            'code' => '0169',
            'bank_name' => 'MIBANCO-BANCO-DE-DESARROLLO'
        ]);
        Bank::create([
            'code' => '0137',
            'bank_name' => 'SOFITASA'
        ]);
    }
}
