<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateQuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25);
            $table->timestamp('due_date');
            $table->timestamps();
        });

        DB::table('quotas')->insert([
            [
                'name' => '2021/22',
                'due_date' => (new DateTime('2021-10-01', new DateTimeZone('Europe/Lisbon')))
            ],
            [
                'name' => '2022/23',
                'due_date' => (new DateTime('2022-10-01', new DateTimeZone('Europe/Lisbon')))
            ],
            [
                'name' => '2023/24',
                'due_date' => (new DateTime('2023-10-01', new DateTimeZone('Europe/Lisbon')))
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotas');
    }
}
