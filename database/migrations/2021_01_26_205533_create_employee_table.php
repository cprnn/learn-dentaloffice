<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('registry'); //matrícula -> autogenerated

            //documents
            $table->string('rg');
            $table->string('cpf');
            $table->string('ctpsnumber');
            $table->string('ctpsserie');
            $table->string('ctpsUF');

            //personal info
            $table->string('role');
            $table->string('address');
            $table->date('birthDate');
            $table->string('contractType'); //CLT or MEI

            //HR info
            $table->boolean('is_active'); //->contrato ativo ou inativo?
            $table->string('payment')->nullable();
            $table->date('admissionDate');
            $table->string('departament');
            
            $table->timestamps();
            $table->softDeletes();

            #Foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
