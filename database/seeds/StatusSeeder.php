<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * новые > в разработке > выполнен > отменен
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert(
            [
                [
                    'name' => 'new',
                    'label' => 'Новые',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'dev',
                    'label' => 'В разработке',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'done',
                    'label' => 'Выполнен',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'cancel',
                    'label' => 'Отменен',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]
        );
    }
}