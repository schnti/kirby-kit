<?php

/**
 * @param Page $p
 * @return bool
 */
function check($p)
{
	$excludeSites = c::get('ka.sitemap.excludeSites', array('error'));
	$excludeTemplates = c::get('ka.sitemap.excludeTemplates', array());
	$includeSites = c::get('ka.sitemap.includeSites', array());
	$showInvisibleSites = c::get('ka.sitemap.showInvisibleSites', false);

	// invisible or include
	if ($showInvisibleSites == true || ($p->isVisible() && ($p->depth() == 1 || $p->parent()->isVisible())) || in_array($p->uri(), $includeSites)) {
		// excluded site or template
		if (!in_array($p->uri(), $excludeSites) && !in_array($p->intendedTemplate(), $excludeTemplates)) {
			return true;
		}
	}
	return false;
}

function recursiveNavigationJson($subpages = null)
{
	$array = array();

	if ($subpages == null) {
		$subpages = site()->pages();
	}

	foreach ($subpages AS $p) :

		if (!check($p))
			continue;

		$sub = null;

		//		$sitemap .= '<a href="' . $p->url() . '">' . $p->title() . '</a>';

		if ($p->hasChildren()) {
			$result = recursiveNavigationJson($p->children());

			if ($result && $result['pages']) {
				$sub = $result['pages'];
			}
		}

		// Response
		$array['pages'][] = [
			'url' => $p->url(),
			'title' => $p->title()->value(),
			'id' => str_replace('/', '', $p->id()),
			'pages' => $sub
		];

	endforeach;

	return $array;
}

/**
 * @param Children $subpages
 * @return string HTML Sitemap
 */
function recursiveNavigation($subpages = null)
{

	if ($subpages == null) {
		$subpages = site()->pages();
	}

	$sitemap = '<ul>';

	foreach ($subpages AS $p) {

		if (!check($p))
			continue;

		$sitemap .= '<li>';

		$sitemap .= '<a href="' . $p->url() . '">' . $p->title() . '</a>';

		if ($p->hasChildren()) {
			$sitemap .= recursiveNavigation($p->children());
		}

		$sitemap .= '</li>';
	}
	$sitemap .= '</ul>';

	return $sitemap;
}

$kirby->set('tag', 'sitemap', array(
	'html' => function () {
		return recursiveNavigation();
	}
));

kirby()->routes(array(
	array(
		'pattern' => 'sitemap.xml',
		'action' => function () {

			$importantSites = c::get('ka.sitemap.importantSites', array());

			$sitemap = '<?xml version="1.0" encoding="utf-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

			// get all pages
			$pages = site()->pages()->index();

			foreach ($pages as $p) {

				if (!check($p))
					continue;

				$sitemap .= '<url><loc>' . html($p->url());
				$sitemap .= '</loc><lastmod>' . date('c', $p->modified()) . '</lastmod><priority>';
				$sitemap .= ($p->isHomePage() || in_array($p->uri(), $importantSites)) ? 1 : 0.6 / $p->depth();
				$sitemap .= '</priority></url>';

			}

			$sitemap .= '</urlset>';

			return new Response($sitemap, 'xml');

		}
	)
));

kirby()->routes(array(
	array(
		'pattern' => 'sitemap.json',
		'action' => function () {

			$array = recursiveNavigationJson();

			return response::json($array);

		}
	)
));
