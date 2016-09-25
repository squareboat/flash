<?php

use SquareBoat\Flash\Flash;

class FlashTest extends PHPUnit_Framework_TestCase
{
    /**
     * The session store implementation.
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * The package's flash implementation.
     *
     * @var \SquareBoat\Flash\Flash
     */
    protected $flash;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        $this->session = Mockery::mock('Illuminate\Session\Store');

        $this->flash = new Flash($this->session);
    }

    /** @test */
    public function it_displays_default_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash_notification.message', 'This is a default message');
        $this->session->shouldReceive('flash')->with('flash_notification.level', 'info');
        $this->session->shouldReceive('flash')->with('flash_notification.icon', 'fa-info-circle');

        $this->flash->message('This is a default message');
    }

    /** @test */
    public function it_displays_info_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash_notification.message', 'This is an info message');
        $this->session->shouldReceive('flash')->with('flash_notification.level', 'info');
        $this->session->shouldReceive('flash')->with('flash_notification.icon', 'fa-info-circle');

        $this->flash->info('This is an info message');
    }

    /** @test */
    public function it_displays_success_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash_notification.message', 'This is a success message');
        $this->session->shouldReceive('flash')->with('flash_notification.level', 'success');
        $this->session->shouldReceive('flash')->with('flash_notification.icon', 'fa-check-circle');

        $this->flash->success('This is a success message');
    }

    /** @test */
    public function it_displays_error_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash_notification.message', 'This is an error message');
        $this->session->shouldReceive('flash')->with('flash_notification.level', 'danger');
        $this->session->shouldReceive('flash')->with('flash_notification.icon', 'fa-times-circle');

        $this->flash->error('This is an error message');
    }

    /** @test */
    public function it_displays_warning_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash_notification.message', 'This is a warning message');
        $this->session->shouldReceive('flash')->with('flash_notification.level', 'warning');
        $this->session->shouldReceive('flash')->with('flash_notification.icon', 'fa-exclamation-circle');

        $this->flash->warning('This is a warning message');
    }

    /** @test */
    public function it_displays_important_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash_notification.message', 'This is an important message');
        $this->session->shouldReceive('flash')->with('flash_notification.level', 'info');
        $this->session->shouldReceive('flash')->with('flash_notification.icon', 'fa-info-circle');
        $this->session->shouldReceive('flash')->with('flash_notification.important', true);

        $this->flash->message('This is an important message')->important();
    }
}
