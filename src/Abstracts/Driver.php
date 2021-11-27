<?php

namespace Milyoona\Ipg\Abstracts;

use Milyoona\Ipg\Contracts\DriverInterface;

abstract class Driver implements DriverInterface
{
    abstract public function getToken($terminal, $amount, $callbackUrl, $option = []);

    abstract public function pay($terminal, $amount, $callbackUrl, $option = []);

    abstract public function verify($terminal, $token);

    abstract public function trace($terminal, $token);

    public function defaultTerminal() {
        return lumen_config_path('milyoona_ipg.default_terminal_id');
    }

    public function defaultCallbackUrl() {
        return lumen_config_path('milyoona_ipg.default_callback_url');
    }
}
