<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;

/**
 * Class UpdateNoteTables
 *
 * @author Johannes Schobel <johannes.schobel@googlemail.com>
 */
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
        // this is kind of retarded, because laravel only supports one single dropColumn statement per SQL statement
        // when using a SQLite database (e.g., for testing!)
        // so we need to make a single call for every statement..
        Schema::table($this->tablename, function (Blueprint $table) {
            $table->dropColumn('is_completed');
        });

        Schema::table($this->tablename, function (Blueprint $table) {
            $table->dropColumn('completed_at');
        });

        Schema::table($this->tablename, function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
