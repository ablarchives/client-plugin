<?php namespace AlbrightLabs\Client\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('albrightlabs_client_clients', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->integer('admin_id')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->text('customFields')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('albrightlabs_client_clients');
    }
}
