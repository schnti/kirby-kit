<?php
// TODO uniform mailer controller
//use Uniform\Form;
//
//return function ($site, $pages, $page) {
//
//	$form = new Form([
//		'name' => [
//			'rules' => ['required'],
//			'message' => 'Name wird benötigt.',
//		],
//		'verein' => [],
//		'email' => [
//			'rules' => ['required', 'email'],
//			'message' => 'E-Mail wird benötigt.',
//		],
//		'telefon' => [],
//		'von' => [
//			'rules' => ['required', 'email'],
//			'message' => 'Von wird benötigt.',
//		],
//		'bis' => [
//			'rules' => ['required', 'email'],
//			'message' => 'Bis wird benötigt.',
//		],
//		'nachricht' => []
//	]);
//
//	if (r::is('POST')) {
//		$form->emailAction([
//			'to' => 'timo@schnti.de',
//			'from' => 'timo@schnti.de',
//			'subject' => 'Ihre Nachricht an: ' . $site->title(),
//			'service' => 'html-mail',
//			'snippet' => 'forms/email-template'
//		]);
//		//			->logAction([
//		//				'file' => kirby()->roots()->site() . '/../log/contact-form.log'
//		//			]);
//	}
//
//	return compact('form');
//};