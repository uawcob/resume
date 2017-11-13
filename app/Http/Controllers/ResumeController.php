<?php

namespace App\Http\Controllers;

use App\DigitalMeasures;
use razorbacks\digitalmeasures\rest\BadResponse;

class ResumeController extends Controller
{
    public function get($username)
    {
        $api = new DigitalMeasures;

        $endpoint = "/SchemaData/INDIVIDUAL-ACTIVITIES-Business/USERNAME:$username";

        try {
            $xml = $api->get($endpoint);
        } catch (BadResponse $e) {
            return abort(404);
        }

        return $xml;
    }
}
