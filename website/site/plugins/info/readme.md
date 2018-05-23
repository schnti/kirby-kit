# Info plugin FIRST DRAFT

A plugin for [Kirby 2 CMS](http://getkirby.com) that lists info about the kirby installation for your CI process.

## Installation

Copy or link the `info` directory to `site/plugins/` **or** use the [Kirby CLI](https://github.com/getkirby/cli):

```
kirby plugin:install schnti/kirby-info
```

### Config Variables

* ka.info.key: Security Key

```php
c::set('ka.info.key', 'MySuperSecret42');
```


## How to use it

### Request

```bash
GET /info.json HTTP/1.1
Host: yoursite.com
X-SECURITY-HEADER: MySuperSecret42
```

## Response

```json
{
    "settings": {
        "debug": false,
        "ssl": null,
        "cache": true
    },
    "ka": {
        "mailsActive": null,
        "piwikTracking": true
    },
    "versions": {
        "kirby": "2.5.6",
        "toolkit": "2.5.6",
        "panel": "2.5.6"
    },
    "server": {
        "php": "7.1.6",
        "server": "Apache/2.4.27",
        "address": "127.0.0.1",
        "host": "yoursite.com",
        "root": "/kunden/123456_54321/websites/yoursite"
    },
    "plugins": [
        {
            "name": "cookie",
            "description": "kirby cookie approval plugin",
            "author": "Timo Schneider",
            "license": "MIT",
            "version": "0.5.0",
            "type": "kirby-plugin",
            "repository": {
                "type": "git",
                "url": "https://github.com/schnti/kirby-cookie"
            }
        },
        {
            "name": "image-shrink",
            "description": "kirby image upload shrink plugin",
            "author": "Timo Schneider",
            "license": "MIT",
            "version": "0.2.0",
            "type": "kirby-plugin",
            "repository": {
                "type": "git",
                "url": "https://github.com/schnti/kirby-image-shrink"
            }
        },
        [...]
    ],
    "fields": [
        {
            "name": "imageradio",
            "description": "Add illustrations to radio buttons",
            "author": "Sylvain Julé",
            "version": "1.0.0",
            "type": "kirby-field",
            "license": "MIT",
            "repository": {
                "type": "git",
                "url": "https://github.com/sylvainjule/kirby-imageradio"
            }
        }
    ],
    "tags": []
}
```