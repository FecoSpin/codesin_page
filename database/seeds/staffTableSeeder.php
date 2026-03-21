<?php

use Illuminate\Database\Seeder;
use App\Models\Staff;

class staffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Staff::truncate();

        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. Quirino Ordaz Coppel';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Presidente';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Dr. José Lauro Meléndrez Parra';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Presidente Ejecutivo';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'C. P. Javier Lizárraga Mercado';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Propietario Ges Vocal Ejecutivo';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'C. P. Humberto Andrade Gámez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Presidente CRPE Zona Centro Norte';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'María Fernanda Domíguez Gámez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Asistente de Dirección General';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Aiko Mitzue Tanamachi Ibarra';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutiva de Vinculación Institucional';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. Héctor Orrantia Coppel';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Ing. Jesús Gonzalo Pérez Carranza';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente CRPE Zona Centro Norte';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Ing. Luis Alberto de la Vega Armenta';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Propietario GES';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. Rolando Mendívil Rascón';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Presidente CRPE Zona Norte';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'C. Antonio J. López Puerta Hernández';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. Eduardo Arámbula Pérez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente CRPE Zona Norte';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Ing. Manuel E. Tarriba Urtuzuástegui';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Director General';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. José Mario Cadena Bójorquez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Propietario CSE*';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Ing. Rodolfo Madero Rodríguez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente CSE';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. Óscar Pérez Barros';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Propietario GES';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Ing. José Óscar Sánchez Osuna';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Propietario CSE';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'C. Mónica del Carmen Coppel Tirado';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. Jorge Samuel Ritz Habermann';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente CSE';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. Alfredo Ruelas Solís';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Presidente CRPE Zona Sur';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Ing. Juan Manuel Ley Bastidas';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Propietario CSE';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. Guillermo Romero Rodríguez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente CRPE Zona Sur';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. Alejandro Sánchez Chávez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente CSE';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Ing. José Luis Sandoval Bojóquez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Presidente CRPE Zona Centro';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Ing. Sebastián Arana Escobar';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Propietario CSE';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. Héctor Ley Pineda';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente CRPE Zona Centro';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Ing. Guillermo Elizondo Macías';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente CSE';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 1;
        $staf->name = 'Lic. Guillermo Romero Rodríguez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Suplente CRPE Zona Sur';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'Thania Karina Parra y Parra';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Director General';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'FALTA NOMBRE';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Director de Políticas Públicas';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'Luz Gabriela Escoto González';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Directora de Planeación y Seguimiento';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'Jesús Alfonso Ceballos Madueña';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Director de Administración y Finanzas';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'María Fernanda Domíguez Gámez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Asistente de Dirección General';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'Aiko Mitzue Tanamachi Ibarra';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutiva de Vinculación Institucional';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'Ramsés Hernández Cancino';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Coordinador de Comunicación y Relaciones Institucionales';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'Alexis Galván Cárdenas';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutivo de Diseño Gráfico';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'Magaly Berenice Montoya Rojo';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutiva de Planeación e Innovación';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'FALTA NOMBRE';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutivo de Planeación e Innovación';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'Solange Nallely Rangel Jacobo';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Contadora';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'Maritza Paola Félix Váquez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutiva de Control Interno';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'Claudia Alatorre Monge';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutiva de Administración';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 2;
        $staf->name = 'Carolina Amarillas Romero';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Analista Económico';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 3;
        $staf->name = 'Alberto Cruz Soto';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Director del Comité Regional';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 3;
        $staf->name = 'Sara Angélica Acosta Cervantes';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutivo de Administración';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 3;
        $staf->name = 'Karla Patricia Barraza Urías';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutiva de Promoción';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 4;
        $staf->name = 'Mercedes Dorado Bojórquez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutivo de Administración';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 4;
        $staf->name = 'José Eduardo Cuadras Camacho';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutiva de Promoción';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 4;
        $staf->name = ' María Lizbeth Castro López';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutivo de Administración';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 5;
        $staf->name = 'Felipe Báez Salomón';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Director del Comité Regional';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 5;
        $staf->name = 'Andrés Cárdenas Hidalgo';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutiva de Promoción';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 6;
        $staf->name = 'Araceli Tirado Sánchez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Director del Comité Regional';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 6;
        $staf->name = 'Angélica María Zatarain Hernández';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutivo de Administración';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 6;
        $staf->name = 'Mireya Herrera Avena';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutiva de Promoción';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 6;
        $staf->name = 'Rafael Padilla Beltrán';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutiva de Promoción';
        $staf->user_id = 1;
        $staf->save();
        
        $staf = new Staff;
        $staf->departamento_id = 7;
        $staf->name = 'Jesús Germán Rivera Carlón';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Director Ejecutivo';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 7;
        $staf->name = 'Eduardo López Murillo';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Director de Desarrollo Empresarial';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 7;
        $staf->name = '';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = '';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 7;
        $staf->name = 'Enrique Soto';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Director de Inversión Extranjera';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 7;
        $staf->name = 'Claudia Lizbeth Angulo Castro';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Coordinadora Administrativa';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 7;
        $staf->name = 'Ana Violeta Pérpulli L.';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Coordinador Operativo';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 7;
        $staf->name = 'David Francisco Riveros Sánchez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutivo de Inversión Turística';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 7;
        $staf->name = 'Mara Cervantes Valdés';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Directora de Inversión Turística';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 7;
        $staf->name = 'Heber Aziel Heredia Sánchez';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutivo de Promoción';
        $staf->user_id = 1;
        $staf->save();

        $staf = new Staff;
        $staf->departamento_id = 7;
        $staf->name = 'Benette Medina Loredo';
        $staf->urlimg = 'img/default/user.png';
        $staf->email = '';
        $staf->job = 'Ejecutivo Regional Zona Centro Norte';
        $staf->user_id = 1;
        $staf->save();

    }
}
