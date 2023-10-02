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
        Schema::create('contacts', function (Blueprint $t) {
            $t->id()->comment("exchangesTableがFKに設定されている");
            $t->string("project_name")->comment("案件名");
            $t->string("priority")->comment("優先順位、重み");
            $t->string("detail")->nullable()->comment("詳細");
            $t->date("start")->nullable()->comment("開始日");
            $t->date("end")->nullable()->comment("終了日");
            $t->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};