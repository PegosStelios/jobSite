<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('company');
            $table->text('company_url');
            $table->text('location');
            $table->text('logo')->nullable();
            $table->boolean('is_highlighted')->default(false);
            $table->boolean('is_active')->default(true);
            $table->text('content');
            $table->string('apply_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('listings');
    }
};
