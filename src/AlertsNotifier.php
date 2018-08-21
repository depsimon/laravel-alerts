<?php

namespace Depsimon\Alerts;

class AlertsNotifier
{
    protected $session;

    public $alerts = [];

    function __construct(SessionStore $session)
    {
        $this->session = $session;
        $this->alerts = collect();
    }

    public static function all()
    {
        return self::$alerts;
    }

    public function alert($message, $title = null, $type = null)
    {
        if (! $message instanceof Alert) {
            $message = new Alert(compact('message', 'title', 'type'));
        }

        $this->alerts->push($message);

        return $this->flash();
    }

    public function info($message, $title = null)
    {
        $this->alert($message, $title, 'info');
    }

    public function success($message, $title = null)
    {
        $this->alert($message, $title, 'success');
    }

    public function error($message, $title = null)
    {
        $this->alert($message, $title, 'error');
    }

    public function warning($message, $title = null)
    {
        $this->alert($message, $title, 'warning');
    }

    public function clear()
    {
        $this->alerts = collect();

        return $this;
    }

    protected function flash()
    {
        $this->session->flash('alerts', $this->alerts);

        return $this;
    }
}