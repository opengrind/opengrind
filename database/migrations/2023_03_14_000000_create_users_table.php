<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('slug');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('password', 60);
            $table->string('locale')->default('en');
            $table->string('timezone')->default('UTC');
            $table->datetime('born_at')->nullable();
            $table->string('age_preferences')->default(User::AGE_HIDDEN);
            $table->boolean('has_public_profile')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }
};
