<div dir="rtl">
# پکیج درگاه پرداخت میلیونا
[![Latest Version on Packagist](https://img.shields.io/packagist/v/milyoona/laravel-ipg.svg?style=flat-square)](https://packagist.org/packages/milyoona/laravel-ipg)
[![GitHub issues](https://img.shields.io/github/issues/milyoona/laravel-ipg?style=flat-square)](https://github.com/milyoona/laravel-ipg/issues)
[![GitHub stars](https://img.shields.io/github/stars/milyoona/laravel-ipg?style=flat-square)](https://github.com/milyoona/laravel-ipg/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/milyoona/laravel-ipg?style=flat-square)](https://github.com/milyoona/laravel-ipg/network)
[![Total Downloads](https://img.shields.io/packagist/dt/milyoona/laravel-ipg.svg?style=flat-square)](https://packagist.org/packages/milyoona/laravel-ipg)
[![GitHub license](https://img.shields.io/github/license/milyoona/laravel-ipg?style=flat-square)](https://github.com/milyoona/laravel-ipg/blob/master/LICENSE)

#### این پکیج برای نصب بر روی پروژه‌های لاراول توسط تیم توسعه میلیونا تهیه شده است.
<p><img src="https://s19.picofile.com/file/8437672584/laravel_ipg.png?raw=true"></p>

## <g-emoji class="g-emoji" alias="arrow_down" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/2b07.png">⬇️</g-emoji> نحوه نصب و پیکربندی پکیج [درگاه میلیونا](https://github.com/milyoona/ipg)

#### نحوه نصب پکیج
```bash
composer require milyoona/laravel-ipg
```
#### انتشار فایل تنظیمات

```bash
php artisan vendor:publish --tag=milyoona_ipg
```

## <g-emoji class="g-emoji" alias="gem" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f48e.png">💎</g-emoji> لیست متدهای موجود در پکیج
- <code>getToken()</code>: دریافت توکن پرداخت
- <code>pay()</code>: هدایت کاربر به صفحه پرداخت بصورت مستقیم
- <code>verify()</code>: تایید تراکنش که فقط یکبار انجام می‌شود
- <code>trace()</code>: پیگیری تراکنش

## <g-emoji class="g-emoji" alias="book" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f4d6.png">📖</g-emoji> نحوه استفاده از متدهای اختصاصی و گزینه‌های دیگر

- #### استفاده از متدهای <code>getToken()</code> و <code>pay()</code>
    ```php
    <?php
    use Milyoona\Ipg\Facades\MilyoonaIpg;
    
    MilyoonaIpg::terminal('YOUR_TERMINAL_ID')
        ->amount('AMOUNT_OF_PRODUCT')
        ->callbackUrl('YOUR_CALLBACK_URL')
        ->getToken(); // یا ->pay(); برای هدایت به درگاه بصورت مستقیم
            
    // اگر در فایل تنظیمات مقادیر terminal_id و callback_url را درج نمایید نیازی به نوشتن آنها در درخواست‌ها نیست
    MilyoonaIpg::amount('PRICE_OF_PRODUCT')->getToken(); // یا ->pay(); برای هدایت به درگاه بصورت مستقیم
    ```
    ###### لیست دیگر گزینه‌های اختیاری
    | Option  | description |
    | ------------- | ------------- |
    | mobile  | شماره تلفن پرداخت کننده  |
    | national_code  | کد ملی پرداخت کننده  |
    | order_id  | شماره سفارش ارسال از سمت پذیرنده  |
    | card_no  | شماره کارت پرداخت کننده|
    | description  | توضیحات پذیرنده  |
    
    ###### نحوه استفاده از گزینه‌های اختیاری
    ```php
    <?php
    use Milyoona\Ipg\Facades\MilyoonaIpg;
    
    MilyoonaIpg::terminal('YOUR_TERMINAL_ID')
        ->amount('PRICE_OF_PRODUCT')
        ->callbackUrl('YOUR_CALLBACK_URL')
        ->option([
            'mobile' => 'MOBILE',
            'national_code' => 'NATIONAL_CODE',
            'order_id' => 'ORDER_ID',
            'card_no' => 'CARD_NUMBER',
            'description' => 'YOUR_DESCRIPTION',
        ])
        ->getToken(); // یا ->pay(); برای هدایت به درگاه بصورت مستقیم
    ```

- #### استفاده از متدهای <code>verify()</code> و <code>trace()</code>
    ```php
    <?php
    use Milyoona\Ipg\Facades\MilyoonaIpg;
    
    MilyoonaIpg::terminal('YOUR_TERMINAL_ID')
        ->token('YOUR_TOKEN')
        ->verify(); // or ->trace();
        
    // اگر در فایل تنظیمات مقدار terminal_id را درج کرده باشید نیازی به استفاده از متد آن نیست
    MilyoonaIpg::token('YOUR_TOKEN')
        ->verify(); // یا ->trace();
    ```
  
#### تهیه شد با :heart: برای توسعه دهندگان
</div>