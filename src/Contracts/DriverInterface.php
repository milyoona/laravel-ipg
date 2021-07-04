<?php

namespace Milyoona\Ipg\Contracts;

interface DriverInterface
{
    public function getToken($terminal, $amount, $callbackUrl, $option = []);

    public function pay($terminal, $amount, $callbackUrl, $option = []);

    public function verify($terminal, $token);

    public function trace($terminal, $token);
}
