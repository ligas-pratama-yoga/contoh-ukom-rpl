<div class="mb-3">
				<label for="<?= $column ?>" class="form-label"><?= $label ?></label>
				<input type="<?= $type ?? 'text' ?>" class="form-control" id="<?= $column ?>" name="<?= $column ?>" value="<?= $value ?? '' ?>" placeholder="<?= $placeholder ?? '' ?>">
			</div>