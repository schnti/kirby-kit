# Legal plugin (WIP)

A plugin for [Kirby 2 CMS](http://getkirby.com) that simply adds legal information.

## Installation

Copy or link the `legal` directory to `site/plugins/` **or** use the [Kirby CLI](https://github.com/getkirby/cli):

```
kirby plugin:install schnti/kirby-legal
```

## How to use it
```
(legal: datenschutz/datenschutz)
(legal: datenschutz/cookies)
(legal: datenschutz/server-logs)
(legal: datenschutz/kontaktformular)
(legal: datenschutz/piwik)
(legal: datenschutz/ssl)
(legal: datenschutz/widerspruch)
(legal: disclaimer/haftung-fuer-inhalte)
(legal: disclaimer/haftung-fuer-links)
(legal: disclaimer/urheberrecht)
(legal: quelle)

(legal: datenschutz)
(legal: disclaimer)

(legal: datenschutz1)
(legal: datenschutz2)

(legal: disclaimer1)
(legal: disclaimer2)`

(legal: disclaimer h1: ## h2: ###)`
(legal: disclaimer h1: false h2: #)`

(legal: datenschutz server-logs:false contact:false matomo:false maps:false fonts:false ssl:false recaptcha:false recht-auf:false)

default: h1 = # and h2 = ## 
```

## Source of legal texts
[e-recht24.de](https://www.e-recht24.de)