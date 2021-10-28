<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('number', false, true)->unique();
            $table->string('name', 255);
            $table->string('phone', 50)->nullable()->default(null);
            $table->string('email', 100)->nullable()->default(null);
            $table->string('document', 50);
            $table->foreignId('document_type_id');
            $table->string('address', 255)->nullable()->default(null);
            $table->string('picture', 255)->nullable()->default(null);
            $table->timestamp('deleted_at')->nullable()->default(null);
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
        Schema::dropIfExists('members');
    }
}
