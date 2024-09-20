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
        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('currency', 3)->default('$');
            $table->enum('billing_cycle', ['monthly', 'annually']);
            $table->integer('trial_days')->nullable();
            $table->json('features')->nullable();
            $table->integer('max_users')->nullable();
            $table->integer('storage_space')->nullable();
            $table->string('support_level')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->integer('status')->default(1);
            $table->string('product_reference_id')->nullable();
            $table->string('plan_reference_id')->nullable();
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
        Schema::dropIfExists('pricing_plans');
    }
};
