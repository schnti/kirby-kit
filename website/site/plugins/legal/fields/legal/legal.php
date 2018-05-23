<?php

class LegalField extends InputField
{

	protected $cache;

	public $structure = null;

	public function value()
	{
		$value = parent::value();
		//		if (!is_array($value)) {
		//			$value = str::split($value, ',');
		//		}

		//		$value = unserialize($value);
		$value = json_decode($value, true);

		return $value;
	}

	public function input()
	{
		$value = func_get_arg(0);
		$input = parent::input($value);
		$input->removeClass('input');
		$input->addClass('checkbox');
		$input->attr('type', 'radio');
		$input->attr(array(
			'name'     => $this->name() . '[' . $value . ']',
			'type'     => 'checkbox',
			'value'    => $value,
			'checked'  => ($this->value === 'all') ? true : in_array($value, (array)$this->value()),
			'required' => false,
		));

		if ($this->readonly) {
			$input->attr('disabled', true);
		}

		return $input;
	}

	public function label()
	{
		//		return null;

		$label = parent::label();
		if (is_null($label)) return null;
		// use a legend to avoid having a label
		// that is just connected to the first input
		return $label->tag('legend')->attr('for', false);
	}


	public function item($key, $value)
	{
		$input = $this->input($key);

		$label = new Brick('label');
		$label->addClass('input');
		$label->addClass('input-with-checkbox');
		$label->attr('data-focus', 'true');
		$label->append('<div class="checkbox-illustration as-background"></div>');
		$label->append($input);
		$label->append('<span>' . $this->i18n($value) . '</span>');
		if ($this->readonly) {
			$label->addClass('input-is-readonly');
		}
		return $label;
	}

	public function itemInput($key)
	{


		$input = parent::input();
		$input->tag('textarea');
		$input->removeAttr('type');
		$input->removeAttr('value');
		$input->attr('name', $this->name() . '[' . $key . ']');
		$input->html(isset($this->value()[$key]) ? htmlentities($this->value()[$key], ENT_NOQUOTES, 'UTF-8') : false);
		$input->data('field', 'editor');
		return $input;

		//		$label = new Brick('label');
		//		$label->addClass('input');
		////		$label->addClass('input-with-checkbox');
		//		$label->attr('data-focus', 'true');
		//		$label->append($input);
		//		return $label;
	}

	public function content()
	{

		$html = '';

		$html .= '<legend class="label">Settings</legend>';
		$html .= '<ul class="input-list field-grid cf">';
		$html .= '<li class="input-list-item field-grid-item field-grid-item-1-3">';
		$html .= $this->item('h1', 'H1 Überschrift anzeigen');
		$html .= '</li>';
		$html .= '</ul>';

		$html .= '<div class="field field-grid-item field-grid-item-1-2 field-with-textarea" style="padding-left: 0">';
		$html .= '<label class="label" for="form-field-textleft">Verantwortlichen Stelle</label>';
		$html .= '<div class="field-content">';
		$html .= $this->itemInput('verantwortlichen-stelle');
		$html .= '</div></div>';

		$html .= '<div class="field field-grid-item field-grid-item-1-2 field-with-textarea">';
		$html .= '<label class="label" for="form-field-textleft">Datenschutzbeauftragter</label>';
		$html .= '<div class="field-content">';
		$html .= $this->itemInput('datenschutzbeauftragter');
		$html .= '</div></div>';


		$root = __DIR__ . DS . '..' . DS . '..' . DS . 'assets' . DS . 'datenschutz';
		if ($dirs = dir::read($root)) {

			foreach ($dirs as $dir) {

				if ($files = dir::read($root . DS . $dir)) {

					$folderLabel = str_replace('-', ' ', $dir);
					$folderLabel = substr($folderLabel, strpos($folderLabel, ' ') + 1);;

					$html .= '<legend class="label">' . $folderLabel . '</legend>';
					$html .= '<ul class="input-list field-grid cf">';

					foreach ($files as $file) {

						$key = substr($file, 0, strrpos($file, '.'));

						$fileLabel = str_replace('-', ' ', $key);
						$fileLabel = substr($fileLabel, strpos($fileLabel, ' ') + 1);;

						$html .= '<li class="input-list-item field-grid-item field-grid-item-1-3">';
						$html .= $this->item($dir . DS . $key, $fileLabel);
						$html .= '</li>';
					}

					$html .= '</ul>';
				}
			}
		}

		$content = new Brick('div');
		$content->addClass('field-content');
		$content->append($html);
		return $content;
	}

	public function result()
	{
		$result = parent::result();

		//		return serialize($result);
		return json_encode($result);

		//		return is_array($result) ? implode(', ', $result) : '';


		//		$result = parent::result();
		//		return $this->structure()->toYaml();
	}

	public function validate()
	{
		return true;
	}
}