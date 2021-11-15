<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->id = 1;
        $admin->status_model_id = 2;//Boolean. True
        $admin->country_id = NULL;
        $admin->state_id = NULL;
        $admin->city_id = NULL;
        
        $admin->name = 'Henry';
        $admin->last_name = 'Ruiz';
        $admin->document = '20097857';
        $admin->email = 'henryruiz332@gmail.com';
        $admin->phone = '4142823998';
        $admin->email_verified_at = Carbon::now();
        $admin->password = bcrypt('henryruiz332@gmail.com');
        $admin->save();
        $admin->syncRoles('Admin');

       
    }
}
