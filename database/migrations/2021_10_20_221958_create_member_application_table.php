<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_application', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 50);
            $table->string('email', 50)->nullable();
            $table->string('document', 50);
            $table->foreignId('document_type_id');
            $table->string('picture', 255)->nullable();
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
        Schema::dropIfExists('member_application');
    }
}
