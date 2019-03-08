<?php

use Illuminate\Database\Seeder;
// use Illuminate\View\Factory;
// use Illuminate\Validation\Factory;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Todo::class, 7)->create();
    }
}
