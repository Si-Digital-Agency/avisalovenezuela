<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->timestamps();
        });


        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });



        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('sub_category_id')->constrained();
            $table->foreignId('tag_id')->nullable()->constrained();

            $table->string('name');
            $table->text('description');
            $table->enum('condition', ['nuevo', 'usado', 'n/a']);
            $table->enum('status', ['disponible', 'en negociacion', 'no disponible'])->default('disponible');

            $table->unsignedInteger('views')->default(0);
            $table->string('state');
            $table->string('city');

            $table->json('specs');

            $table->timestamp('published_at')->useCurrent();
            $table->timestamps();
        });

        Schema::create('publication_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id')->constrained()->onDelete('cascade');
            $table->string('path'); // Ruta en el storage: 'publications/abc12345.jpg'
            $table->boolean('is_featured')->default(false); // Para marcar cuál es la foto de portada
            $table->integer('sort_order')->default(0); // Para que el usuario pueda ordenarlas (1, 2, 3, 4, 5)
            $table->timestamps();
        });
    
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
