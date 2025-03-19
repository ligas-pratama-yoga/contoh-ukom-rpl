<?php


foreach ($forms as $form) {
    partials(
        'form-control',
        [
            "column" => $form['column'] ?? "",
            "label" => $form['label'] ?? "",
            "type" => $form['type'] ?? "",
            "value" => $form['value'] ?? "",
            "placeholder" => $form['placeholder'] ?? "",
            ]
    );
}
?>
<div style="display: flex; justify-content: end;align-items: center;">
	<button class="btn btn-primary" type="submit">Submit</button>
</div>