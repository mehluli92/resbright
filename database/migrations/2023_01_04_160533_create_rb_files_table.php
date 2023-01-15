<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRbFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('document')->nullable();
            $table->string('ref')->nullable();	
            $table->boolean('import')->nullable();
            $table->string('entry_number')->nullable();	
            $table->string('importer')->nullable();	
            $table->string('supplier')->nullable();	
            $table->longText('description')->nullable(); 
            $table->longText('bill_of_lading')->nullable();	 //type of goods, quantity, destination
            $table->decimal('tarrif', 10, 2)->nullable(); //rate of duty from Zimra
            $table->decimal('weight', 8, 2)->nullable(); //wheight of goods 
            $table->integer('quantity_of_boxes')->nullable();	//quantity of boxes 
            $table->longText('manifest')->nullable();	 //how items appear
            $table->string('container')->nullable(); //are the things in the same container as others?
            $table->softDeletes('deleted_at', 0);	
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
        Schema::dropIfExists('rb_files');
    }
}
