<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RbFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rb_files')->insert([
            'user_id' => 1,
            'document' => 'kkkkkk',
            'ref' => 'rb1',
            'import' => 1,
            'entry_number' => 'jkkjj',
            'description' => 'Overall',
        ]);
    }
}
