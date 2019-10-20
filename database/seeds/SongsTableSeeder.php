<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'image' => 'image',
                'artist_name' => 'あいみょん',
                'song_name' => '夢追いベンガル',
                'comment'  => 'ガツガツ食べたいぜ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
