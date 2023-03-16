<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneybird_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger("id")->unique();
            $table->timestamps();
            $table->string("email")->unique()->nullable();
            $table->string("firstname")->nullable();
            $table->string("lastname")->nullable();
            $table->string("company_name")->nullable();
            $table->string("address1")->nullable();
            $table->string("address2")->nullable();
            $table->string("zipcode")->nullable();
            $table->string("city")->nullable();
            $table->string("country")->nullable();
            $table->string("phone")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moneybird_contacts');
    }
};
