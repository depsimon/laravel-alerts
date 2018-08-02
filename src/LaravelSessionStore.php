<?php

namespace Depsimon\Alerts;

use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore
{
    private $session;

    function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function flash($name, $data)
    {
        $this->session->flash($name, $data);
    }
}