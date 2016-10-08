<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAgendamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('veiculo_id')->nullable();
            $table->foreign('veiculo_id')->references('id')->on('veiculos');
            $table->string('motorista',100);
            $table->string('servidores');
            $table->string('municipios');
            $table->date('data_saida');
            $table->date('data_retorno');
            $table->string('hora_saida',5);
            $table->enum('status',['Pendente', 'Aprovado', 'Recusado'])->default('Pendente');
            $table->text('descricao')->nullable();
            $table->string('cod_siad',12)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agendamentos');
    }
}
