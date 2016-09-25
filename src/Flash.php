<?php

namespace SquareBoat\Flash;

use Illuminate\Session\Store;

class Flash
{
    /**
     * The session store implementation.
     *
     * @var \Illuminate\Session\Store
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param  \Illuminate\Session\Store $session
     */
    function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Fluses the flash notification from session.
     *
     * @return void
     */
    public function clear()
    {
        $this->session->forget('flash_notification.message');
    }

    /**
     * Flash an information message.
     *
     * @param string $message
     * @return $this
     */
    public function info($message)
    {
        $this->message($message, 'info', 'fa-info-circle');

        return $this;
    }

    /**
     * Flash a success message.
     *
     * @param  string $message
     * @return $this
     */
    public function success($message)
    {
        $this->message($message, 'success', 'fa-check-circle');

        return $this;
    }

    /**
     * Flash a warning message.
     *
     * @param  string $message
     * @return $this
     */
    public function warning($message)
    {
        $this->message($message, 'warning', 'fa-exclamation-circle');

        return $this;
    }

    /**
     * Flash an error message.
     *
     * @param  string $message
     * @return $this
     */
    public function error($message = null)
    {
        $message = !is_null($message) ? $message : 'Something went wrong, try again later!';

        $this->message($message, 'danger', 'fa-times-circle');

        return $this;
    }

    /**
     * Flash a general message.
     *
     * @param  string $message
     * @param  string $level
     * @param  string $icon
     * @return $this
     */
    public function message($message, $level = 'info', $icon = 'fa-info-circle')
    {
        $this->session->flash('flash_notification.message', $message);
        $this->session->flash('flash_notification.level', $level);
        $this->session->flash('flash_notification.icon', $icon);

        return $this;
    }


    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        $this->session->flash('flash_notification.important', true);
        return $this;
    }
}
