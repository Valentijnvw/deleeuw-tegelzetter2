<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opdrachten', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('start_datum');
            $table->time('start_tijd')->nullable();
            $table->date('eind_datum');
            $table->time('eind_tijd')->nullable();
            // $table->foreign('klant_moneybird_id')->references('moneybird_id')->on('users');
            $table->bigInteger('klant_moneybird_id')->nullable();
            $table->text('titel');
            $table->text('omschrijving');
            $table->bigInteger('aannemer_user_id') // moet foreignId worden
                // ->constrained('users')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opdrachten');
    }
};
