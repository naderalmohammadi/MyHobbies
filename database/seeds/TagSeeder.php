<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'boxing',
            'soccer',
            'swimming'
        ];

        foreach ($tags as $name) {
            $tag = new Tag([
                'name' => $name
            ]);

            $tag->save();
        }
    }
}
