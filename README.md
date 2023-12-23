<div dir="rtl">

گرفتن اطلاعات درگاه از دیتابیس : 
با استفاده از جدول gateways اطلاعات رو در دیتابیس ذخیره کنید:

name = نام درگاه  <br>
config = اطلاعات درگاه (به صورت جیسون )   <br>
is_default = پیشفرض بودن درگاه
* ممکنه چندین اطلاعات متفاوت برای یک درگاه داشته باشید و بخواین یکیشون اطلاعات پیشفرضتون باشه. با تغییر این فیلد به true این اتفاق میافتته.

</div>
<br> <br>
<br> <br>


برای assign کردن یک درگاه به یوزر بعد از مایگریت کردن دیتابیس :
* تریت HasGateway رو به مدل User اضافه کنید <br>
درگاه رو به یوزر اضافه کنید :
```php
 $gatewayModel = َApp\Models\Gateway::first();
 $user->attachGateway($gatewayModel)  /// مدل یا آی دی مدل رو به عنوان ورودی به تابع میدیم
/// or  $user->attachGateway($gateway->id)
```

حالا موقع استفاده از تابع make از فساد gateway یوزر رو به عنوان ورودی دوم بدید : 
```php
 $gateway = \Gateway::make('saman',$user);
```
