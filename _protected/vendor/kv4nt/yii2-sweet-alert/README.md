SweetAlert Widget for Yii 2
======================
SweetAlert widget based on [SweetAlert](http://lipis.github.io/bootstrap-sweetalert/)

[![Latest Stable Version](https://poser.pugx.org/kv4nt/yii2-sweet-alert/v/stable.svg)](https://packagist.org/packages/kv4nt/yii2-sweet-alert)
[![Total Downloads](https://poser.pugx.org/kv4nt/yii2-sweet-alert/downloads.svg)](https://packagist.org/packages/kv4nt/yii2-sweet-alert)
[![Build Status](https://travis-ci.org/kv4nt/yii2-sweet-alert.svg?branch=master)](https://travis-ci.org/kv4nt/yii2-sweet-alert)


Installation 
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist kv4nt/yii2-sweet-alert "*"
```

or add

```json
"kv4nt/yii2-sweet-alert": "*"
```

to the require section of your composer.json.

Usage
-------

**For render the message from session flash you can use the following code:**

1) Set the message in your action, for example:

```php
Yii::$app->session->setFlash('success', 'This is the message');
```

2) Simply add widget to your page as follows:
```php
echo \kv4nt\sweetalert\SweetAlert::widget();
```

**For render the custom message you can use the following code:**
```php
// A replacement for the "prompt" function

echo \kv4nt\sweetalert\SweetAlert::widget([
    'useSessionFlash' => false,
    'options' => [
        'timer' => null,
        'type' => \kv4nt\sweetalert\SweetAlert::TYPE_INPUT,
        'title' => 'An input!',
        'text' => "Write something interesting",
        'confirmButtonText' => "Yes, delete it!",
        'closeOnConfirm' => false,
        'showCancelButton' => true,
        'animation' => "slide-from-top",
        'inputPlaceholder' => "Write something"
    ],
    'callback' => new \yii\web\JsExpression(' function(inputValue) { 
                if (inputValue === false) return false;      
                if (inputValue === "") { 
                    swal.showInputError("You need to write something!");     
                    return false;   
                }      
                swal("Good!", "You wrote: " + inputValue, "success"); 
    }')
]);
```

Alert Options 
----------------
You can find them on the [options page](https://sweetalert.js.org/docs/)
