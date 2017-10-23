<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->default('default.png');
            $table->string('nom_eleve')->nullable();
            $table->string('prenom_eleve')->nullable();
            $table->string('age')->nullable();
            $table->string('ville_residence_eleve')->nullable();
            $table->string('region_residence_eleve')->nullable();
            $table->string('contact_eleve')->nullable();
            $table->string('cv_eleve')->nullable();
            $table->string('experience_professionnel_eleve')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['avatar','nom_eleve','prenom_eleve','age','ville_residence_eleve','region_residence_eleve','contact_eleve','cv_eleve']);
        });
    }
}
