<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoryHierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $structure = [
            'Inmuebles' => [
                'Venta' => [
                    'Apartamentos', 'Casas', 'Locales', 'Establecimiento'
                ],
                'Alquiler' => [
                    'Apartamento', 'Habitacion', 'Anexo', 'Local', 'Casa'
                ],
            ],
            'Vehiculos' => [
                'Motos' => [],
                'Automoviles' => [],
                'Camionetas' => [],
                'Taxis' => [],
                'Pesados' => [],
                'Otros Vehiculos' => [],
            ],
            'Empleos' => [
                'Empleos generales' => [],
                'Empleos Especializados' => [],
                'Empleos de servicio domestico' => [],
            ],
            'Servicios' => [
                'Servicios a domicilio' => [],
                'Servicios Especializados' => [],
            ],
        ];

        foreach ($structure as $categoryName => $subCategoriesArray) {
            // 1. Crear la Categoría (Variable en SINGULAR)
            $category = Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
            ]);

            foreach ($subCategoriesArray as $subCategoryName => $tagsArray) {
                // 2. Crear la Subcategoría (Variable en SINGULAR)
                $subCategory = SubCategory::create([
                    'category_id' => $category->id,
                    'name' => $subCategoryName,
                    'slug' => Str::slug($subCategoryName),
                ]);

                // 3. Crear las Etiquetas relacionadas (si existen)
                foreach ($tagsArray as $tagName) {
                    Tag::create([
                        'sub_category_id' => $subCategory->id,
                        'name' => $tagName,
                        'slug' => Str::slug($tagName),
                    ]);
                }
            }
        }

        $this->command->info('¡Éxito! Estructura de Inmuebles, Vehiculos, Empleos y Servicios cargada.');
    }
}