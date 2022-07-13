<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); //TODO: set null
//            $table->unsignedBigInteger('teacher_id');
//            $table->unsignedBigInteger('category_id');
//            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
//            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->string('title');
            $table->string('slug');
            $table->string('priority')->nullable();
            $table->string('price', 10);
            $table->string('percent', 5);
            $table->enum('type', ['free', 'cash']);
            $table->enum('status', ['completed', 'not-completed', 'lock']);
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
