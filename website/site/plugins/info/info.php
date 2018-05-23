<?php

function listFolders($type)
{
	$root = kirby()->roots()->site();

	$plugins = glob($root . DS . $type . DS . '*', GLOB_ONLYDIR);

	$p = [];

	foreach ($plugins as $plugin) {
		$string = @file_get_contents($plugin . DS . 'package.json');
		if ($string !== false) {
			$p[] = json_decode($string, true);
		} else {
			$p[] = ['name' => basename($plugin)];
		}
	}

	return $p;
}

kirby()->routes(array(
	array(
		'pattern' => 'info.json',
		'action' => function () {

			if (!c::get('ka.info.key', false)) {
				return response::error($message = 'Es ist kein Key in der Kirby Konfiguration hinterlegt', $code = 400);
			}

			if (!isset($_SERVER['HTTP_X_SECURITY_HEADER'])) {
				return response::error($message = 'Bitte einloggen', $code = 401);
			}

			if ($_SERVER['HTTP_X_SECURITY_HEADER'] !== c::get('ka.info.key')) {
				return response::error($message = 'Falsche zugangsdaten', $code = 401);
			}

			$panelVersion = 'not installed';

			// also check for the panel version, if it is installed
			if (is_dir(__DIR__ . '/../../../panel')) {
				if (!is_file(__DIR__ . '/../../../panel/app/bootstrap.php')) {
					throw new RuntimeException('The panel does not seem to be correctly installed');
				}
				// bootstrap the panel
				require_once __DIR__ . '/../../../panel/app/bootstrap.php';

				$panelVersion = panel::version();

			}

			//			require_once __DIR__ .'/../../../panel/app/bootstrap.php';

			return response::json([
				'settings' => [
					'debug' => c::get('debug'),
					'ssl' => c::get('ssl'),
					'cache' => c::get('cache')
				],
				'ka' => [
					'mailsActive' => c::get('ka.mails.active'),
					'piwikTracking' => c::get('ka.piwik.tracking')
				],
				'versions' => [
					'kirby' => kirby::version(),
					'toolkit' => toolkit::version(),
					'panel' => $panelVersion
				],
				'server' => [
					'php' => phpversion(),
					'server' => $_SERVER['SERVER_SOFTWARE'],
					'address' => $_SERVER['SERVER_ADDR'],
					'host' => $_SERVER['SERVER_NAME'],
					'root' => $_SERVER['DOCUMENT_ROOT']
				],
				'plugins' => listFolders('plugins'),
				'fields' => listFolders('fields'),
				'tags' => listFolders('tags'),
				// 'HTTPS' => $_SERVER['HTTPS'], // not working

			]);

		}
	)
));
