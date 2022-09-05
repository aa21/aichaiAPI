<?php

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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("active")->default(0);

            $table->integer("purchase_validity_days")->default(30);
            $table->integer("purchase_count_min")->default(3);
            $table->integer("purchase_total_value_min")->default(100);
            $table->integer("redemption_per_customer")->default(1);

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
        Schema::dropIfExists('campaigns');
    }
};
