<?php

if (! function_exists('alert')) {

    function alert($message, $title = null, $type = 'info')
    {
        $notifier = app('alert');

        if (! is_null($message)) {
            return $notifier->$type($message, $title);
        }

        return $notifier;
    }
}

if (! function_exists('alert_info')) {

    function alert_info($message, $title = null)
    {
        return alert($message, $title, 'info');
    }
}

if (! function_exists('alert_warning')) {

    function alert_warning($message, $title = null)
    {
        return alert($message, $title, 'warning');
    }
}

if (! function_exists('alert_error')) {

    function alert_error($message, $title = null)
    {
        return alert($message, $title, 'error');
    }
}

if (! function_exists('alert_success')) {

    function alert_success($message, $title = null)
    {
        return alert($message, $title, 'success');
    }
}