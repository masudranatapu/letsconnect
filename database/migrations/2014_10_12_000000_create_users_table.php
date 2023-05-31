<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('role_id')->default(2);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('auth_type')->nullable();
            $table->longText('profile_image')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('term')->nullable();
            $table->longText('plan_details')->nullable();
            $table->string('plan_validity')->nullable();
            $table->timestamp('plan_activation_date')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('type')->nullable();
            $table->string('vat_number')->nullable();
            $table->longText('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zipcode')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_email')->nullable();
            $table->integer('status')->default(1);
            $table->string('paypal_plan_id')->nullable();
            $table->string('paypal_data')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
