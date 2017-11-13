<?php

namespace App;

use razorbacks\digitalmeasures\rest\Api;

class DigitalMeasures extends Api
{
    public function __construct()
    {
        $username = config('digitalmeasures.username');
        $password = config('digitalmeasures.password');
        parent::__construct($username, $password);
    }
}
