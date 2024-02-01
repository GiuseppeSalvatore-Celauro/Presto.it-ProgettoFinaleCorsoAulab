<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('country')->default('non inserito');
            $table->string('profile_pic')->default('/img/defaultProfile.jpg');
            $table->string('bg_pic')->default('/img/defaultProfile.jpg');
            $table->string('contacts')->default(0);
            $table->timestamps();
        });


        Profile::create([
            'user_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
