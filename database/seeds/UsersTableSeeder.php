<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();

        $admin = new User;
        $admin->name ="Sistema";
        $admin->email = "Sistemas@whipple.mx";
        $admin->password = 'Codesin.20';
        $admin->save();
    }
}
