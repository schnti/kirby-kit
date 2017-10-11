<table>
    <tbody>
	<?php
	foreach ($data as $field => $value):
		if (is_array($value)) {
			$value = implode(', ', array_filter($value, function ($i) {
				return $i !== '';
			}));
		}
		?>
        <tr>
            <td style="vertical-align: top"><?= ucfirst($field); ?>:</td>
            <td><?= nl2br($value); ?></td>
        </tr>
	<?php endforeach; ?>
    </tbody>
</table>
