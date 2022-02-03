<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('norm_nitrogen');
            $table->float('norm_phosphorus');
            $table->float('norm_potassium');
            $table->unsignedBigInteger('culture_group_id');
            $table->string('region');
            $table->float('price');
            $table->string('description');
            $table->string('purpose');
            $table->timestamps();

            $table->index('culture_group_id', 'fertilizer_culture_group_idx');
            $table->foreign('culture_group_id', 'fertilizer_culture_group_idk')
                ->on('culture_groups')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fertilizers');
    }
}
