# Migrate from Laravel Zend Form

## composer.json

```
"revolution/laravel-laminas-form": "^1.2",
```

## config/zend-form.php
Rename to `config/laminas-form.php`

```php
<?php
/**
 * Additional View Helpers
 *
 * https://github.com/laminas/laminas-form/blob/master/src/ConfigProvider.php
 */

use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'aliases'   => [
        'bootstrap4horizon' => Revolution\LaminasForm\View\Helper\Bootstrap4Horizon::class,
        'uikit3horizon'     => Revolution\LaminasForm\View\Helper\Uikit3Horizon::class,
    ],
    'factories' => [
        Revolution\LaminasForm\View\Helper\Bootstrap4Horizon::class => InvokableFactory::class,
        Revolution\LaminasForm\View\Helper\Uikit3Horizon::class     => InvokableFactory::class,
    ],
];

```
## Form class

```php
namespace App\Http\Forms;

use Revolution\LaminasForm\Form;
use Zend\Form\Element;

class SampleForm extends Form
{

}
```
