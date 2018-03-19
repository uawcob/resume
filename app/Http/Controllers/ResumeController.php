<?php

namespace App\Http\Controllers;

use App\DigitalMeasures;
use razorbacks\digitalmeasures\rest\BadResponse;
use SimpleXMLElement;

class ResumeController extends Controller
{
    public function get($username)
    {
        $api = new DigitalMeasures;

        $endpoint = "/SchemaData/INDIVIDUAL-ACTIVITIES-University/USERNAME:$username/PCI";

        try {
            $xml = $api->get($endpoint);
        } catch (BadResponse $e) {
            return abort(404);
        }

        // strip namespaces
        // https://secure.php.net/manual/en/simplexmlelement.xpath.php#96153
        $xml = str_replace('xmlns=', 'ns=', $xml);

        $xml = new SimpleXMLElement($xml);

        $nodes = $xml->xpath('/Data/Record/PCI/FILE/UPLOAD_FILE');

        $filename = (string)($nodes[0] ?? null);

        if (empty($filename)) {
            return abort(404);
        }

        return redirect(config('digitalmeasures.storage')."/$filename");
    }
}
