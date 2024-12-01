<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('logs_acessos', function (Blueprint $table) {
            $table->renameColumn('ip_adress', 'ip_address');
        });
    }

    public function down(): void
    {
        Schema::table('logs_acessos', function (Blueprint $table) {
            $table->renameColumn('ip_address', 'ip_adress');
        });
    }
};
