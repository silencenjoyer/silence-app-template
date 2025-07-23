# 💻 Silence Application Template

[![Latest Stable Version](https://img.shields.io/packagist/v/silencenjoyer/silence-app-template.svg)](https://packagist.org/packages/silencenjoyer/silence-app-template)
[![PHP Version Require](https://img.shields.io/packagist/php-v/silencenjoyer/silence-app-template.svg)](https://packagist.org/packages/silencenjoyer/silence-app-template)
[![License](https://img.shields.io/github/license/silencenjoyer/silence-app-template)](LICENSE.md)

Web application template for [Silence PHP Framework](https://github.com/silencenjoyer/silence).

![Welcome to Silence](docs/wlcome_to_silence.png)

## ⚙️ Installation

```
composer create-project --stability=dev silencenjoyer/silence-app-template silence-app
cd silence-app
```

## 🚀 To run the app:

``
docker compose -p silence-app up -d
``

Now you should be able to access the application through the browser.
Usually it is http://localhost:80.

## 📁 Directory structure
```
app/                    Application files.
    Bootstrap/          Application and DI pre-configuration.
    Config/             Configuration files.
    Event/              Application Event System.
    Extensions/         Application Extensions.
    Http/               Everything related to HTTP processing.
        Controllers/
        Handlers/       PSR-15 Request Handlers.
        Middlewares/    PSR-15 Middlewares
    Routes/             Application Routes.
docker/                 Docker-specific files.
docs/                   Documentation.
public/                  Files publically accessible from the Internet.
    index.php           Entry script.
resources/              Application resources.
    views/              View templates.
storage/                Files generated during runtime.
var/                    Files generated during runtime.
tests/                  A set of Unit tests for the application.
vendor/                 Installed Composer packages.
```

## 📄 License
This package is distributed under the BSD-3 licence. For more details, see [LICENSE](LICENSE.md).
