<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\App\StatusModel;

class StatusesModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new StatusModel;
        $status->id = 1;
        $status->name = NULL;
        $status->boolean = 0;
        $status->save();
        
        $status = new StatusModel;
        $status->id = 2;
        $status->name = NULL;
        $status->boolean = 1;
        $status->save();

        $status = new StatusModel;
        $status->id = 3;
        $status->name = 'Active';
        $status->boolean = NULL;
        $status->save();

        $status = new StatusModel;
        $status->id = 4;
        $status->name = 'Inactive';
        $status->boolean = NULL;
        $status->save();

        //Status Posts
        $status = new StatusModel;
        $status->name = 'DRAFT';
        $status->boolean = NULL;
        $status->table_name = 'posts';
        $status->save();

        $status = new StatusModel;
        $status->name = 'PUBLISHED';
        $status->boolean = NULL;
        $status->table_name = 'posts';
        $status->save();

        $status = new StatusModel;
        $status->name = 'REVISION';
        $status->boolean = NULL;
        $status->table_name = 'posts';
        $status->save();
    }
}
