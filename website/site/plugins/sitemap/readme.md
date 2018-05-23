# Sitemap Plugin

A plugin for [Kirby 2 CMS](http://getkirby.com) that generates an `sitemap.xml` and HTML sitemap.

## Installation

Copy or link the `sitemap` directory to `site/plugins/` **or** use the [Kirby CLI](https://github.com/getkirby/cli):

```
kirby plugin:install schnti/kirby-sitemap
```

### Config Variables

* ka.sitemap.excludeSites: Array of [page UIDs](http://getkirby.com/docs/cheatsheet/page/uid) (Default: `array('error')`)
* ka.sitemap.excludeTemplates: Array of [template names](https://getkirby.com/docs/cheatsheet/page/intended-template) (Default: `array()`)
* ka.sitemap.includeSites: Array of [page UIDs](http://getkirby.com/docs/cheatsheet/page/uid) (Default: `array()`)
* ka.sitemap.showInvisibleSites: true / false (Default: false)
* ka.sitemap.importantSites: Array of [page UIDs](http://getkirby.com/docs/cheatsheet/page/uid) (Default: `array('kontakt')`)


```php
c::set('ka.sitemap.excludeSites', array('error', 'sitemap', 'kontakt/danke'));
c::set('ka.sitemap.excludeTemplates', array('fahrzeug', 'leistung'));
c::set('ka.sitemap.includeSites', array('impressum', 'datenschutz'));
c::set('ka.sitemap.showInvisibleSites', false);
c::set('ka.sitemap.importantSites', array('kontakt'));
```

## How to use it

### sitemap.xml
Visit the sitemap at this url: http://example.com/sitemap.xml.

There is no actual file generated.


### HTML sitemap

Use this simple tag which lets you output an HTML sitemap.

In your text file you can use it as follows:

```
(sitemap:)
```
