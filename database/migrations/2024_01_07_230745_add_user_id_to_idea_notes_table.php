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
        Schema::table('idea_notes', function (Blueprint $table) {
            // カラムが存在することをチェック.
            if (!Schema::hasColumn('idea_notes', 'user_id')) {
                // カラム追加
                $table->unsignedBigInteger('user_id')->after('id')->default(1);
                // user_idを外部キーとして設定カラムの外部キー制約追加
                $table->foreign('user_id')->references('id')->on('users');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('idea_notes', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};