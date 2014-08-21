# skully-admin
Admin scaffold to use with Skully Framework

## Installation

Include this into your composer:

```
"require": {
    "skullyframework/admin": "0.1.*"
}
```

Then update your composer.

And then, basically look at vendor/skullyframework/skully-project/Tests/app/ and just follow the structure of that test app within your application.

### Don't Forget ###
In your App\Application class, add the following:

```
use SkullyAdmin\AdminTrait;
...

class Application extends \Skully\Application {
    use AdminTrait;
    protected function setupTheme() {
        parent::setupTheme();
        $this->addAdminTemplateDir();
    }
    ...
}
```

Copy vendor/skullyframework/skully-project/Tests/app/public/default/resources/images/admin to public/default/resources/images/admin.
Copy vendor/skullyframework/skully-project/Tests/app/public/default/resources/js/admin to public/default/resources/js/admin.
Copy vendor/skullyframework/skully-project/Tests/app/public/default/resources/js/plugins to public/default/resources/js/plugins.

## Example

There is a sample application ready in Tests/TestApp/app. To set this up:
1. Clone this repository into your web server ```git clone https://github.com/skullyframework/admin ```.
2. Create a database named `skully_admin` and `skully_admin_test`.
3. Browse to the test app ```cd Tests/app```.
4. Run db migration ```./console skully:schema db:migration```.
5. Browse to your app
=======