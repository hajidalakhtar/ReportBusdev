<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("SUBMITPROPOSAL_TO_NEGOTIATION");
            $table->integer("NEGOTIATION_TO_SITESURVEY");
            $table->integer("SITESURVE_TO_BOQ");
            $table->integer("BOQ_TO_PNL");
            $table->integer("PNL_TO_PKSREVIEW");
            $table->integer("PKSREVIEW_TO_SIGNEDPKS");
            $table->integer("SIGNEDPKS_TO_ROLLOUT");
            $table->integer("ROLLOUT_TO_READYTOSELL");
            $table->integer("ROLLOUT_TO_REJECT");
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
        Schema::dropIfExists('slas');
    }
}
