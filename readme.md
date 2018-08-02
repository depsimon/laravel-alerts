# Easy alerts with Vue.js for your Laravel App

This package offers a Tailwind CSS & Vue.js optimized notifications setup for your Laravel applications.

![https://imgur.com/RH5Cmud](https://imgur.com/RH5Cmud)

## Installation

You can install the package via composer:

``` bash
composer require depsimon/laravel-alerts
```

## Usage

Within your controllers, before you perform a redirect, make a call to the `alert()` function.

```php
public function show()
{
    alert('Resource Found!');

    return back();
}
```

You may also do:

- `alert_info('Info Message')`: Alert an 'info' message.
- `alert_success('Success Message')`: Alert an 'success' message.
- `alert_warning('Warning Message')`: Alert an 'warning' message.
- `alert_error('Error Message')`: Alert an 'error' message.
- `alert('Alert Message', 'Alert Title')`: Alert a message with a title.

After you've setup the alerts, you may display them in your views. We provide you with a template out of the box that works with Vue.js & Tailwind CSS.

You're free to use it and customize it the way you want.

```html
@include('alerts::alerts')
```

You'll also need to publish our Vue.js components. By default it'll import them in the `/resources/assets/js/vendor/alerts` folder.

```bash
php artisan vendor:publish --provider="Depsimon\Alerts\AlertsServiceProvider" --tag="components"
```

Then import them in your app.

```js
window.Vue = require('vue')

Vue.component('alerts', require('./vendor/alerts/components/Alerts.vue'))
```

If you don't want to use the default template or the Vue.js component, you can publish the views and customize it the way you want. Just know the session key is `alerts`.

Here's an example custom template without Vue.js:

```html
@foreach (session('alerts', collect())->toArray() as $alert)
    <div class="alert alert-{{ $alert['type'] }}">
        @if ($alert['title'])
        <div class="alert-title">{{ $alert['title'] }}</div>
        @endif

        <div class="alert-message">{!! $alert['message'] !!}</div>
    </div>
@endforeach

{{ session()->forget('alerts') }}
```

## Multiple Alerts

Need to send multiple alerts? No problem.

```php
alert_success('Account Created with Success!');
alert_info('Welcome aboard!');

return redirect('home');
```

## Icons

Default icons are from FontAwesome. You easily customize them in the `Alert.vue` component.