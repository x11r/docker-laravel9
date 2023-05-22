<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
//            $table->comment('休日テーブル');
			$table->id();
			$table->string('name')->comment('名称');
			$table->date('date')->comment('日付');
			$table->string('comment')->nullable()->comment('備考');

            $table->timestamps();
			$table->softDeletes();

			$table->index('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holiday');
    }
};
