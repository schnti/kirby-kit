<?php

$kirby->set('field', 'legal', __DIR__ . DS . 'fields' . DS . 'legal');

$kirby->set('field::method', 'legal', function ($field) {

	//	$elements = (str::split($field->value(), ','));
	$elements = json_decode($field->value(), true);

//	return print_r($elements);

	if (is_array($elements) && count($elements) > 2) {

		$texts = [];

		if (in_array('h1', $elements)) {
			$texts[] = 'h_ Datenschutzerklärung';
		}

		$headlines = [
			'Datenschutz auf einen Blick',
			'Allgemeine Hinweise und Pflichtinformationen',
			'Datenschutzbeauftragter',
			'Datenerfassung auf unserer Website',
			'Analyse Tools und Werbung',
			'Newsletter',
			'Plugins und Tools',
			'Zahlungsanbieter'
		];

		$h1 = '#';
		$h2 = '##';
		$h3 = '###';
		$h4 = '####';

		$lastId = null;
		$i = 1;

		foreach ($elements as $element) {
			$file = __DIR__ . DS . 'assets' . DS . 'datenschutz' . DS . $element . '.txt';

			// index
			$index = intval(substr($element, 0, strrpos($element, '-')));
			if ($index !== $lastId) {
				if (isset($headlines[$index - 1])) {
					$texts[] = 'h__ ' . $i . '. ' . $headlines[$index - 1];

					$i++;
				}

				$lastId = $index;
			}


			if (f::exists($file)) {

				$content = f::read($file);

				if ($element === '3-Datenschutzbeauftragter/1-Gesetzlich-vorgeschriebener-Datenschutzbeauftragter' && isset($elements['datenschutzbeauftragter'])) {
					$content .= "\n\r" . $elements['datenschutzbeauftragter'];
				} else if ($element === '2-Allgemeine-Hinweise-und-Pflichtinformationen/2-Hinweis-zur-verantwortlichen-Stelle' && isset($elements['verantwortlichen-stelle'])) {
					$content .= "\n\r" . $elements['verantwortlichen-stelle'];
				}

				$texts[] = $content;
			}
		}

		if (count($texts) > 0) {

			$content = implode("\n\r", $texts);

			if ($h1 !== 'false')
				$content = preg_replace("/h_\b/", $h1, $content);

			$content = preg_replace("/h__\b/", $h2, $content);
			$content = preg_replace("/h___\b/", $h3, $content);
			$content = preg_replace("/h____\b/", $h4, $content);

			return kirbytext($content);
		} else {
			return '<i>Something went wrong</i>';
		}
	}

	return '';

});

$kirby->set('tag', 'legal', array(
	'attr' => array(
		'h1',
		'h2'
	),
	'html' => function ($tag) {

		$value = strtolower($tag->attr('legal'));
		$h1 = ($tag->attr('h1')) ? $tag->attr('h1') : '#';
		$h2 = ($tag->attr('h2')) ? $tag->attr('h2') : '##';

		$texts = [];

		switch ($value) {
			case 'disclaimer':
				if ($h1 !== 'false')
					$texts[] = 'h_ Haftungsausschluss (Disclaimer)';
				$elements = [
					'disclaimer/haftung-fuer-inhalte',
					'disclaimer/haftung-fuer-links',
					'disclaimer/urheberrecht',
					//					'quelle'
				];
				break;
			case 'disclaimer1':
				$elements = [
					'disclaimer/haftung-fuer-inhalte',
					'disclaimer/haftung-fuer-links',
				];
				break;
			case 'disclaimer2':
				$elements = [
					'disclaimer/urheberrecht',
					//					'quelle'
				];
				break;
			default:
				$elements = [$value];
				break;
		}

		foreach ($elements as $element) {
			$file = __DIR__ . DS . 'assets' . DS . $element . '.txt';
			if (f::exists($file)) {
				$texts[] = f::read($file);
			}
		}

		if (count($texts) > 0) {

			$content = implode("\n\r", $texts);

			if ($h1 !== 'false')
				$content = preg_replace("/h_\b/", $h1, $content);

			$content = preg_replace("/h__\b/", $h2, $content);

			return kirbytext($content);
		} else {
			return '<i><b>' . $value . '</b> is not a valid</i>';
		}
	}
));