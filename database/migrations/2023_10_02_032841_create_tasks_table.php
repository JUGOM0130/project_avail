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
        //  参照
        //  https://tech.amefure.com/php-laravel-migration-column

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("contact_id");
            $table->String("title");
            $table->String("detail");
            $table->timestamps();

            $table->foreign('contact_id') // 外部キーとして登録したいカラム
                    ->reference("id")       // 参照元テーブルカラム
                    ->on('contacts')        // 参照元テーブル
                    ->onDelete('cascade');  // 参照先が削除されたら同時に削除
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
