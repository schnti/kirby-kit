<?php

c::set('license', 'put your license key here');

c::set('debug', false);

c::set('date.handler', 'strftime');
c::set('locale','de_DE.UTF-8');

c::set('panel.stylesheet', 'assets/css/panel.css');

// 3rd Party
//c::set('plugin.html.minifier.active', true);
//c::set('krb_html_min', true);

c::set('uniform.language', 'de');

// config


// ka plugins
c::set('ka.seo-checker.google.apikey', '');

c::set('ka.image.shrink.maxDimension', 1500);

// TODO piwik config
//c::set('ka.piwik.url', 'stats.kleiner-als.de');
//c::set('ka.piwik.id', 0);
//c::set('ka.piwik.tracking', false);
//c::set('ka.piwik.trackingIfLoggedIn', false);
//c::set('ka.piwik.widget', true);
//c::set('ka.piwik.apitoken', '');
//c::set('ka.piwik.language', 'de');

// TODO fancybox config
//c::set('ka.fancybox.small.width', 400);
//c::set('ka.fancybox.big.width', 1000);
//c::set('ka.fancybox.quality', 100);
//c::set('ka.fancybox.linkclass', 'fancybox');
//c::set('ka.fancybox.imgclass', 'fancybox');

// TODO cookie link config
//c::set('ka.cookie.link', '/datenschutzerklaerung');

// TODO sitemap config
//c::set('ka.sitemap.excludeSites', array('error', 'sitemap', 'kontakt/danke'));
//c::set('ka.sitemap.excludeTemplates', array('fahrzeug', 'leistung'));
//c::set('ka.sitemap.includeSites', array('impressum', 'datenschutzerklaerung'));
//c::set('ka.sitemap.showInvisibleSites', false);
//c::set('ka.sitemap.importantSites', array('kontakt'));

// TODO html mail config
//email::$services['html-mail'] = function ($email) {
//	$headers = array(
//		'From: ' . $email->from,
//		'Reply-To: ' . $email->replyTo,
//		'Return-Path: ' . $email->replyTo,
//		'Bcc: debug@kleiner-als.de',
//		'Message-ID: <' . time() . '-' . $email->from . '>',
//		'X-Mailer: PHP v' . phpversion(),
//		// changed:
//		'Content-Type: text/html; charset=utf-8',
//		'Content-Transfer-Encoding: 8bit',
//	);
//
//	if (!empty($email->options['cc'])) {
//		$headers[] = 'CC: ' . $email->options['cc'];
//	}
//
//	ini_set('sendmail_from', $email->from);
//	$send = mail($email->to, str::utf8($email->subject), str::utf8($email->body), implode(PHP_EOL, $headers));
//	ini_restore('sendmail_from');
//	if (!$send) {
//		throw new Error('The email could not be sent');
//	}
//};