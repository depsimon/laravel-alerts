<?php

namespace Depsimon\Alerts;

interface SessionStore
{
    public function flash($name, $data);
}