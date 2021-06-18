<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string("address_1");
            $table->string("address_2");
            $table->string("location");
            $table->string("postal_code");
            $table->string("postal_area");
            $table->string("taluka");
            $table->string("suburb");
            $table->string("cardinal_directions");
            $table->string("city");
            $table->string("district");
            $table->string("state");
            $table->string("country");
            $table->unsignedBigInteger("employee_id");
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("employee_id")->references("id")->on("employees")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
