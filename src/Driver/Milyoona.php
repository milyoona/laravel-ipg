<?php

namespace Milyoona\Ipg\Driver;

use Illuminate\Http\Response;
use Milyoona\Ipg\Abstracts\Driver;
use Illuminate\Support\Facades\Http;

class Milyoona extends Driver
{
    private $getTokenUrl    = 'https://api.milyoona.com/payment/token';
    private $payTokenUrl    = 'https://api.milyoona.com/payment/token';

    private $gateUrl        = 'https://api.milyoona.com/ipg/';

    private $verifyTokenUrl = 'https://api.milyoona.com/payment/verify';
    private $traceTokenUrl  = 'https://api.milyoona.com/payment/trace';

    public function getToken($terminal, $amount, $callbackUrl, $option = [])
    {
        try {
            $parameters = [
                'terminal' => $terminal ?? $this->defaultTerminal(),
                'amount' => $amount,
                'callback_url' => $callbackUrl ?? $this->defaultCallbackUrl(),
            ];

            if(isset($option['mobile']))
                $parameters = array_merge($parameters, ['mobile' => $option['mobile']]);
            if(isset($option['national_code']))
                $parameters = array_merge($parameters, ['national_code' => $option['national_code']]);
            if(isset($option['order_id']))
                $parameters = array_merge($parameters, ['order_id' => $option['order_id']]);
            if(isset($option['card_no']))
                $parameters = array_merge($parameters, ['card_no' => $option['card_no']]);
            if(isset($option['description']))
                $parameters = array_merge($parameters, ['description' => $option['description']]);

            $response = Http::post($this->getTokenUrl, $parameters);
            if(isset($response['data'])) {
                $response = $response['data'];
                $response['url'] = $this->gateUrl . $response['token'];
                return $response;
            }
            return $response;

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function pay($terminal, $amount, $callbackUrl, $option = [])
    {
        try {
            $parameters = [
                'terminal' => $terminal ?? $this->defaultTerminal(),
                'amount' => $amount,
                'callback_url' => $callbackUrl ?? $this->defaultCallbackUrl(),
            ];
            if(isset($option['mobile']))
                $parameters = array_merge($parameters, ['mobile' => $option['mobile']]);
            if(isset($option['national_code']))
                $parameters = array_merge($parameters, ['national_code' => $option['national_code']]);
            if(isset($option['order_id']))
                $parameters = array_merge($parameters, ['order_id' => $option['order_id']]);
            if(isset($option['card_no']))
                $parameters = array_merge($parameters, ['card_no' => $option['card_no']]);
            if(isset($option['description']))
                $parameters = array_merge($parameters, ['description' => $option['description']]);

            $response = Http::post($this->payTokenUrl, $parameters);
            if(isset($response['data'])) {
                $response = $response['data'];
                header( 'Location: ' . $this->gateUrl . $response['token']);
                die();
            }
            return $response;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function verify($terminal, $token)
    {
        try {
            $parameters = [
                'terminal' => $terminal ?? $this->defaultTerminal(),
                'token' => $token
            ];

            $response = Http::post($this->verifyTokenUrl, $parameters);
            if(isset($response['data'])) {
                return $response['data'];
            }
            return $response;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function trace($terminal, $token)
    {
        try {
            $parameters = [
                'terminal' => $terminal ?? $this->defaultTerminal(),
                'token' => $token
            ];

            $response = Http::post($this->traceTokenUrl, $parameters);
            if(isset($response['data'])) {
                return $response['data'];
            }
            return $response;
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
