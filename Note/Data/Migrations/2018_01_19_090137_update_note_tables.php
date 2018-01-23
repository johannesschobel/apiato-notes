<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;

class UpdateNoteTables extends Migration
{

    private $tablename;

    public function __construct()
    {
        $this->tablename = Config::get('notes.notes.table', 'notes');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->tablename, function (Blueprint $table) {

            // your custom changes here
            $table->boolean('is_completed')->default(false);
            $table->timestamp('completed_at')->nullable()->default(null);

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->tablename, function (Blueprint $table) {

            // your custom changes here
            $table->dropColumn('is_completed');
            $table->dropColumn('completed_at');

            $table->dropSoftDeletes();

        });
    }
}
