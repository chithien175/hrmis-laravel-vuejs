<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HrmSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('fullname')->nullable();
            $table->boolean('sex')->default(true);
            $table->timestamps('birthday')->nullable();
            $table->string('id_card')->unique()->nullable();
            $table->timestamps('date_id_card')->nullable();
            $table->string('place_id_card')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('degree')->nullable();
            $table->string('graduate_school')->nullable();
            $table->string('graduate_year')->nullable();
            $table->timestamps('start_date')->nullable();
            $table->timestamps('finish_date')->nullable();
            $table->string('position')->nullable();
            // $table->integer('department')->default(0);
            $table->text('certificate')->nullable();
            $table->integer('file')->nullabe();
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('parent_id')->default(0);
            $table->timestamps();
        });

        Schema::create('department_employee', function (Blueprint $table) {
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')
                  ->on('departments')->onDelete('cascade');
            
            $table->integer('employee_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')
                  ->on('employees')->onDelete('cascade');

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
        Schema::dropIfExists('employees');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('department_employee');
    }
}
