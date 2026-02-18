<?php

namespace Database\Seeders;

use App\Models\Publication;
use App\Models\PublicationImage;
use Illuminate\Database\Seeder;

class PublicationImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $publications = Publication::all();
        $placeholderPath = 'publications/placeholder.png';
        foreach ($publications as $publication){
            for ($i = 0; $i < 5; $i++){
                PublicationImage::create([
                    'publication_id' => $publication->id,
                    'path'           => $placeholderPath,
                    'is_featured'    => $i == 1?1:0,
                    'sort_order' => $i+1
                ]);
                

            }
        }

    }
}
