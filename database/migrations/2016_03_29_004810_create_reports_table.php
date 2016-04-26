<?php
// Creacion de db reports tiene todos los datos de la tabla
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Info para crear la db, se necesitas todos los datos a menos que especifique que es nullable
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->text('Cockpit');           
            $table->text('Market')->nullable();
            $table->text('FGI')->nullable(); //Focos de Gerencia de Innovación
            $table->text('FGE')->nullable(); //Focos de Gerencia de Entel
            $table->text('Horizontes')->nullable();
            $table->text('Proyects');
            $table->text('Activities');
            $table->text('Innovation_Categories')->nullable();
            $table->text('Priority')->nullable();
            $table->date('Finish_at');
            $table->longtext('Responsable');
            $table->text('Leadership');
            $table->text('Rol'); //Chart
            $table->longtext('comments')->nullable();
            $table->integer('Progress');
            $table->boolean('Status');
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
        Schema::drop('reports');
    }
}
