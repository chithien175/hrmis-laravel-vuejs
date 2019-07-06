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
        // Employees
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('fullname')->nullable();
            $table->boolean('sex')->default(true);
            $table->timestamp('birthday')->nullable();
            $table->string('id_card')->unique()->nullable();
            $table->timestamp('date_id_card')->nullable();
            $table->string('place_id_card')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('degree')->nullable();
            $table->string('graduate_school')->nullable();
            $table->string('graduate_year')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('finish_date')->nullable();
            $table->string('position')->nullable();
            $table->text('certificate')->nullable();
            // $table->integer('file')->nullabe();
            $table->timestamps();
        });

        // Departments
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('parent_id')->default(0);
            $table->timestamps();
        });

        // Department_Employee
        Schema::create('department_employee', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();

            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['department_id', 'employee_id']);
        });

        // Files
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        // File_Employee
        Schema::create('file_employee', function (Blueprint $table) {
            $table->unsignedBigInteger('file_id');
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();

            $table->foreign('file_id')
                ->references('id')->on('files')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['file_id', 'employee_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_employee');
        Schema::dropIfExists('files');
        Schema::dropIfExists('department_employee');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('employees');
    }
}
