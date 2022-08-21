<?php

use App\Models\Browser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBrowser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('browsers', function (Blueprint $table) {
            $table->id();
            $table->string(Browser::CLIENT_IP);
            $table->string(Browser::PLATFORM);
            $table->string(Browser::BROWSER_TYPE);
            $table->string(Browser::DEVICE);
            $table->unsignedBigInteger(Browser::SHORTURL_ID)->index();
            $table->foreign(Browser::SHORTURL_ID)->references('id')->on('short_urls');
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
        Schema::dropIfExists('browsers');
    }
}
