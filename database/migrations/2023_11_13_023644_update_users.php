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
        //
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id')->after('profile_photo_path')->default('1');
            $table->unsignedBigInteger('usertype_id')->after('department_id')->default('2');

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('usertype_id')->references('id')->on('user_types');
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
