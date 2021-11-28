<?php

namespace Milyoona\Ipg\Core;

use Milyoona\Ipg\Driver\Milyoona;

class MilyoonaIpgManager
{
    // Config and driver
    protected $config;
    protected $driver;

    // Necessary options
    protected $terminal;
    protected $amount;
    protected $callbackUrl;

    // Optional options ['orderId', 'mobile', 'nationalId', 'cardNo', 'description']
    protected $option;

    // For verify and trace is necessary
    protected $token;

    public function __construct(Milyoona $milyoona)
    {
        $this->config = config('milyoona_ipg');
        $this->driver = $milyoona;
    }

    // Driver's methods
    public function getToken()
    {
        return $this->driver->getToken($this->terminal, $this->amount, $this->callbackUrl, $this->option);
    }

    public function pay()
    {
        return $this->driver->pay($this->terminal, $this->amount, $this->callbackUrl, $this->option);
    }

    public function verify()
    {
        return $this->driver->verify($this->terminal, $this->token);
    }

    public function trace()
    {
        return $this->driver->trace($this->terminal, $this->token);
    }

    // Parameters
    public function terminal($terminal = null)
    {
        $this->terminal = $terminal;
        return $this;
    }

    public function amount($amount)
    {
        $this->amount = (int) $amount;
        return $this;
    }

    public function callbackUrl($callbackUrl = null)
    {
        $this->callbackUrl = $callbackUrl;
        return $this;
    }

    public function option($option = [])
    {
        $this->option = $option;
        return $this;
    }

    public function token($token)
    {
        $this->token = $token;
        return $this;
    }
}
