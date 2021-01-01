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
            'boxing' => 'primary',
            'soccer' => 'secondary',
            'swimming' => 'danger',
            'fun' => 'success',
            'education' => 'light'
        ];

        foreach ($tags as $name => $style) {
            $tag = new Tag([
                'name' => $name,
                'style' => $style
            ]);

            $tag->save();
        }
    }
}
