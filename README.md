# skully-admin

Admin scaffold to use with Skully Framework

## Installation

Include this into your composer:

```
"require": {
    "triodigital/skully-admin": "dev-master"
},
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/triodigital/skully-admin"
    }
],
```

Then update your composer.

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

Copy vendor/triodigital/skully-project/Tests/app/public/default/resources/images/admin to public/default/resources/images/admin.
Copy vendor/triodigital/skully-project/Tests/app/public/default/resources/js/admin to public/default/resources/js/admin.
Copy vendor/triodigital/skully-project/Tests/app/public/default/resources/js/plugins to public/default/resources/js/plugins.

## Usage

See usage sample in Tests/TestApp/ . To run this sample, clone a copy of this repository somewhere else and access it via web browser.