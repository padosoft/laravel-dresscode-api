<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dresscode_logs', function (Blueprint $table) {
            $table->id(); // unique ID for each row in the table
            $table->enum('type', ['in', 'out'])->comment('The type of request: "in" for incoming, "out" for outgoing'); // indicates if the request is incoming or outgoing
            $table->enum('method', ['GET', 'POST'])->comment('The HTTP method used'); // HTTP method used (GET or POST)
            $table->string('route')->comment('The requested route'); // requested route
            $table->boolean('zip')->default(false)->comment('Indicates if the data is compressed'); // indicates if the data is compressed (default value: false)
            $table->text('data')->comment('The sent or received data'); // sent or received data
            $table->string('ip_address')->comment('The IP address of the client'); // client IP address
            $table->timestamps(); // adds created_at and updated_at fields to track creation and modification times
        });
    }

    public function down()
    {
        Schema::dropIfExists('dresscode_logs'); // drops the 'logs' table if it exists
    }

};
