# Laravel Package For [Milyoona](https://www.milyoona.com/)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/milyoona/laravel-ipg.svg?style=flat-square)](https://packagist.org/packages/milyoona/laravel-ipg)
[![GitHub issues](https://img.shields.io/github/issues/milyoona/laravel-ipg?style=flat-square)](https://github.com/milyoona/laravel-ipg/issues)
[![GitHub stars](https://img.shields.io/github/stars/milyoona/laravel-ipg?style=flat-square)](https://github.com/milyoona/laravel-ipg/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/milyoona/laravel-ipg?style=flat-square)](https://github.com/milyoona/laravel-ipg/network)
[![Total Downloads](https://img.shields.io/packagist/dt/milyoona/laravel-ipg.svg?style=flat-square)](https://packagist.org/packages/milyoona/laravel-ipg)
[![GitHub license](https://img.shields.io/github/license/milyoona/laravel-ipg?style=flat-square)](https://github.com/milyoona/laravel-ipg/blob/master/LICENSE)

This is a Laravel Package for milyoona payment gateway.

## <g-emoji class="g-emoji" alias="arrow_down" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/2b07.png">⬇️</g-emoji> How to install and config [milyoona/ipg](https://github.com/milyoona/ipg) package?

#### Install package
```bash
composer require milyoona/laravel-ipg
```
#### Publish configs

```bash
php artisan vendor:publish --tag=milyoona_ipg
```

## <g-emoji class="g-emoji" alias="gem" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f48e.png">💎</g-emoji> List of available methods
- getToken(): gives you a token and url
- pay(): auto redirect you to gateway
- verify(): verify your request just one time
- trace(): trace your request many times

## <g-emoji class="g-emoji" alias="book" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f4d6.png">📖</g-emoji> How to use exists methods and options

#### Use <code>getToken()</code> and <code>pay()</code> methods of package
```php
<?php
\Milyoona\Ipg\Facades\MilyoonaIpg::terminal('YOUR_TERMINAL_ID')
        ->amount('AMOUNT_OF_PRODUCT')
        ->callbackUrl('YOUR_CALLBACK_URL')
        ->getToken(); // or ->pay(); for redirect to gateway page
// If you set the terminal_id and callback_url in config/milyoona_ipg.php you not need to fill this methods.
\Milyoona\Ipg\Facades\MilyoonaIpg::amount('AMOUNT_OF_PRODUCT')
        ->getToken(); // or ->pay(); for redirect to gateway page
```
###### List of extra option
| Option  | description |
| ------------- | ------------- |
| mobile  | mobile number of customer  |
| national_code  | national code of customer  |
| order_id  | order id of product  |
| card_no  | limit customer for pay with a specific card number|
| description  | description of order  |

###### How to use this options
```php
<?php
\Milyoona\Ipg\Facades\MilyoonaIpg::terminal('YOUR_TERMINAL_ID')
        ->amount('AMOUNT_OF_PRODUCT')
        ->callbackUrl('YOUR_CALLBACK_URL')
        ->option([
            'mobile' => 'MOBILE',
            'national_code' => 'NATIONAL_CODE',
            'order_id' => 'ORDER_ID',
            'card_no' => 'CARD_NUMBER',
            'description' => 'YOUR_DESCRIPTION',
        ])
        ->getToken(); // or ->pay(); for redirect to gateway page
```

#### Use <code>verify()</code> and <code>trace()</code> methods of package
```php
<?php
\Milyoona\Ipg\Facades\MilyoonaIpg::terminal('YOUR_TERMINAL_ID')
        ->token('YOUR_TOKEN')
        ->verify(); // or ->trace();
// If you set the terminal_id in config/milyoona_ipg.php you not need to fill this method.
\Milyoona\Ipg\Facades\MilyoonaIpg::token('YOUR_TOKEN')
        ->verify(); // or ->trace();
```
