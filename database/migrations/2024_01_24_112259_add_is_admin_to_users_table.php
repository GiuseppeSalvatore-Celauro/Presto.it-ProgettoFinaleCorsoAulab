<?php

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false)->after('is_revisor');
        });

        User::create([
            'name' => 'Admin',
            'surname' => 'User',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'is_admin' => 1
        ]);

        Artisan::call('AttoZetta:is_admin', ['email'=> 'admin@gmail.com']);
        Artisan::call('AttoZetta:is_revisor', ['email'=> 'admin@gmail.com']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};
