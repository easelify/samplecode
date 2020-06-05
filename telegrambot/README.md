如何通过电报机器人给自己或群组发消息
==============================

SendForm是一个Yii2的模型, 如果你也是用Yii框架, 直接使用即可。

你必须先安装SDK

```shell
composer require telegram-bot/api
```

使用方法:

```php
use frontend\models\SendForm;
$model = new SendForm();
$model->token = 'aaa:bbb';
$model->chatid = 'xxx';
$model->message = '不用上班的程序员';
$model->send();
```

请关注微信公众号: 不用上班的程序员 获取更多实用案例。
