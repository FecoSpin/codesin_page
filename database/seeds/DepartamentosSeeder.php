<?php

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $departamento = new Departamento;
        $departamento->name = "Consejo";
        $departamento->save();

        $departamento = new Departamento;
        $departamento->name = "Oficina Estatal";
        $departamento->save();

        $departamento = new Departamento;
        $departamento->name = "Zona Norte";
        $departamento->save();

        $departamento = new Departamento;
        $departamento->name = "Zona Centro Norte";
        $departamento->save();

        $departamento = new Departamento;
        $departamento->name = "Zona Centro";
        $departamento->save();

        $departamento = new Departamento;
        $departamento->name = "Zona Sur";
        $departamento->save();

        $departamento = new Departamento;
        $departamento->name = "Consejo CIT";
        $departamento->save();
    }
}
