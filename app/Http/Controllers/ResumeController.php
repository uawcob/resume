<?php

namespace App\Http\Controllers;

use App\DigitalMeasures;

class ResumeController extends Controller
{
    public function get($username)
    {
        $api = new DigitalMeasures;

        $endpoint = "/SchemaData/INDIVIDUAL-ACTIVITIES-Business/USERNAME:$username";

        return $api->get($endpoint);
    }
}
