<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Category;
use App\Models\Publication;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        // Esta variable 'allCategories' se mantiene como colección siempre
        $allCategories = Category::with('subCategories.tags')->get();

        for ($i = 1; $i <= 25; $i++) {
            // Seleccionamos una y la guardamos en singular para no romper la original
            $currentCategory = $allCategories->random();

            $subCategory = $currentCategory->subCategories->random();
            $tag = $subCategory->tags->isNotEmpty() ? $subCategory->tags->random() : null;
            $user = $users->random();

            Publication::create([
                'user_id' => $user->id,
                'category_id' => $currentCategory->id,
                'sub_category_id' => $subCategory->id,
                'tag_id' => $tag?->id,
                'name' => "Publicación de prueba #$i - " . $currentCategory->name,
                'description' => "Esta es una descripción detallada para la publicación número $i de la categoría " . $currentCategory->name,
                'condition' => collect(['nuevo', 'usado', 'n/a'])->random(),
                'status' => 'disponible',
                'views' => rand(0, 500),
                'state' => 'Miranda',
                'city' => 'Caracas',
                'specs' => $this->generateSpecs($currentCategory->name),
            ]);
        }
    }

    // Lógica para llenar el JSON según la categoría
    private function generateSpecs($categoriesName)
    {
        return match ($categoriesName) {
            'Vehiculos' => [
                'marca' => collect(['Toyota', 'Ford', 'Chevrolet'])->random(),
                'año' => rand(2010, 2024),
                'modelo' => 'Corolla',
                'kilometraje' => rand(0, 150000),
                'transmision' => collect(['manual', 'automatico'])->random(),
            ],
            'Inmuebles' => [
                'habitaciones' => rand(1, 5),
                'baños' => rand(1, 3),
                'area' => rand(50, 300) . ' mt2',
                'estacionamiento' => rand(0, 2),
            ],
            'Empleos' => [
                'tipo_empleo' => 'Tiempo Completo',
                'experiencia' => '2 años',
                'salario' => rand(300, 1000),
            ],
            'Servicios' => [
                'precio_minimo' => rand(20, 100),
                'duracion' => '2 horas',
            ],
            default => [],
        };
    }
}
