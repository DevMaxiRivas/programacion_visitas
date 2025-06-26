<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Cliente::create(['codigo' => 1638, 'razon_social' => "RUSSO MOSCHINO RAMON SALVADOR", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 1677, 'razon_social' => "ROCHA JULIO ERNESTO", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 2016, 'razon_social' => "BENAVIDEZ EVERARDO GUILLERMO", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 2109, 'razon_social' => "CASTAÑEDA MIGUEL ANGEL", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 2519, 'razon_social' => "SALES FRANCISCO JOSE", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 3919, 'razon_social' => "VICENTE MONCHO CONSTRUCCIONES SRL", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 3945, 'razon_social' => "M.S. BANCHIK Y CIA S.R.L.", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 4000, 'razon_social' => "UCASAL", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 4018, 'razon_social' => "CURTIEMBRE ARLEI SA", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 4122, 'razon_social' => "LUIS DAGUM CONSTRUCCIONES SA", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 4134, 'razon_social' => "ALLIANCE ONE TOBACCO ARGENTINA SA", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 4179, 'razon_social' => "AGROTECNICA FUEGUINA S.A.C.I.F.", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 4298, 'razon_social' => "ROMERO Y CIA SRL", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 4331, 'razon_social' => "CORNEJO-ROVALETTI S.R.L.", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 4471, 'razon_social' => "INGENIERO MEDINA SA", 'vendedor_id' => intval(rand(2,4))]);
    Cliente::create(['codigo' => 4507, 'razon_social' => "J.C. SEGURA CONSTRUCCIONES SA", 'vendedor_id' => intval(rand(2,4))]);
    }
}
