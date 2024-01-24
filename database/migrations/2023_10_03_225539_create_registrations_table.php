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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fname');
            $table->string('cnic');
            $table->string('gender');
            $table->string('dist');
            $table->date('dob');
            $table->date('lc')->nullable();
            $table->date('hc')->nullable();
            $table->date('sc')->nullable();
            $table->date('since')->nullable();
            $table->string('barReg');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('addr');
            $table->string('photo')->nullable();
            $table->string('cnicF')->nullable();
            $table->string('cnicB')->nullable();
            $table->string('bCard')->nullable();
            $table->string('bCardB')->nullable();
            $table->string('licenses')->nullable();
            $table->string('status');
            $table->text('notes')->nullable();
            $table->string('password');
            $table->foreignId('assigned')->constrained('users', 'id');
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
