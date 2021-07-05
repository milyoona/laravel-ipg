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

## زبان‌های راهنمای استفاده
- [فارسی](https://github.com/milyoona/laravel-ipg/blob/main/README_PERSIAN.md)
- [English](https://github.com/milyoona/laravel-ipg/blob/main/README.md)


## <g-emoji class="g-emoji" alias="arrow_down" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/2b07.png">⬇️</g-emoji> نحوه نصب و پیکربندی پکیج [درگاه میلیونا](https://github.com/milyoona/ipg)

#### نحوه نصب پکیج
</div>

```bash
composer require milyoona/laravel-ipg
```

<div dir="rtl">

#### انتشار فایل تنظیمات
</div>

```bash
php artisan vendor:publish --tag=milyoona_ipg
```

<div dir="rtl">

## <g-emoji class="g-emoji" alias="gem" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f48e.png">💎</g-emoji> لیست متدهای موجود در پکیج
- <code>()getToken</code>: دریافت توکن پرداخت
- <code>()pay</code>: هدایت کاربر به صفحه پرداخت بصورت مستقیم
- <code>()verify</code>: تایید تراکنش که فقط یکبار انجام می‌شود
- <code>()trace</code>: پیگیری تراکنش

## <g-emoji class="g-emoji" alias="book" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f4d6.png">📖</g-emoji> نحوه استفاده از متدهای اختصاصی و گزینه‌های دیگر

- #### استفاده از متدهای <code>()getToken</code> و <code>()pay</code> </div>

    ```php
    <?php
    use Milyoona\Ipg\Facades\MilyoonaIpg;
    
    MilyoonaIpg::terminal('شماره ترمینال')
        ->amount('مبلغ تراکنش')
        ->callbackUrl('مسیر تعین شده برای برگشت از درگاه')
        ->getToken(); // یا ->pay(); برای هدایت به درگاه بصورت مستقیم
            
    // اگر در فایل تنظیمات مقادیر ترمینال و لینک بازگشت را درج نمایید نیازی به نوشتن آنها در درخواست‌ها نیست
    MilyoonaIpg::amount('PRICE_OF_PRODUCT')->getToken(); // یا ->pay(); برای هدایت به درگاه بصورت مستقیم
    ```
  <div dir="rtl">
  
    ###### لیست دیگر گزینه‌های اختیاری

    | Option  | description |
    | ------------- | ------------- |
    | mobile  | شماره تلفن پرداخت کننده  |
    | national_code  | کد ملی پرداخت کننده  |
    | order_id  | شماره سفارش ارسال از سمت پذیرنده  |
    | card_no  | شماره کارت پرداخت کننده|
    | description  | توضیحات پذیرنده  |
    
    ###### نحوه استفاده از گزینه‌های اختیاری</div>
    ```php
    <?php
    use Milyoona\Ipg\Facades\MilyoonaIpg;
    
    MilyoonaIpg::terminal('شماره ترمینال')
        ->amount('مبلغ تراکنش')
        ->callbackUrl('مسیر تعیین شده برای برگشت از درگاه')
        ->option([
            'mobile' => 'شماره تلفن',
            'national_code' => 'شماره ملی',
            'order_id' => 'شماره سفارش',
            'card_no' => 'شماره کارت',
            'description' => 'توضیحات',
        ])
        ->getToken(); // یا ->pay(); برای هدایت به درگاه بصورت مستقیم
    ```
<div dir="rtl">

- #### استفاده از متدهای <code>()verify</code> و <code>()trace</code> </div>
    ```php
    <?php
    use Milyoona\Ipg\Facades\MilyoonaIpg;
    
    MilyoonaIpg::terminal('شماره ترمینال')
        ->token('توکن')
        ->verify(); // or ->trace();
        
    // اگر در فایل تنظیمات مقدار ترمینال را درج کرده باشید نیازی به ارسال آن نیست
    MilyoonaIpg::token('توکن')
        ->verify(); // یا ->trace();
    ```

<div dir="rtl">

#### تهیه شد با :heart: برای توسعه دهندگان.

</div>
