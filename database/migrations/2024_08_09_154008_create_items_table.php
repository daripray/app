<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_items_table.php

    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->boolean('status')->default(false);
            $table->timestamps();
			$table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('items');
    }

};
