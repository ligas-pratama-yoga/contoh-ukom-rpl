<div class="card mb-4 mt-4">
	<div class="card-header d-flex justify-content-between align-items-center mb-4">
		<div>
			<i class="fas fa-table me-1"></i>
			Data
		</div>
		<div>
			<a href="<?=$_SERVER['REQUEST_URI'] . "/recovery" ?>"
				class="btn btn-info btn-sm">Recovery</a>
			<button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#tambahData">
				<i class="fas fa-add"></i>
				Tambah Data
			</button>
		</div>
	</div>
	<div class="card-body">
		<table id="datatablesSimple">
			<thead>
				<tr>
					<?php foreach($columns as $value): ?>
					<th><?= $value ?></th>
					<?php endforeach; ?>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php if($totalPrice[0] ?? false): ?>
			<tfoot>
				<th colspan="4">Total Harga</th>
				<th colspan="2"><?= $totalPrice[1] ?></th>
			</tfoot>
			<?php endif; ?>
			<tbody>
				<?php foreach($datas as $key => $data): ?>
				<tr>
					<?php foreach($data as $value): ?>
					<td><?= $value ?></td>
					<?php endforeach; ?>
					<td>
						<?php if($btnRecovery ?? false): ?>
						<form
							action="<?= $_SERVER['REQUEST_URI'] . "/{$data["ID"]}" ?>"
							method="post">
							<input type="hidden" name="id" value="<?= $data['ID'] ?>">
							<button class="btn btn-sm btn-info">
								Balikan
							</button>
						</form>
						<?php else: ?>
						<button type="button" class="btn btn-sm text-warning" onclick="setModal(this, 'editData')"
							datas-entity='<?= '["' . implode('", "', $data) . '"]' ?>'
							data-other="<?= ${$key_pair[0]}[$key][$key_pair[1]] ?? "" ?>">
							<i class="fas fa-pen"></i>
						</button>
						<button type="button" class="btn btn-sm text-danger" onclick="setModal(this, 'hapusData')"
							datas-entity='<?= '["' . $data["ID"] . '"]' ?>'>
							<i class="fas fa-trash"></i>
						</button>
						<?php endif; ?>

						<?php if($detailBtn ?? false): ?>
						<a href="<?= $detailLink . $data["ID"] ?? $data ?>"
							class="btn btn-sm text-primary">
							<i class="fas fa-eye"></i>
						</a>
						<?php endif; ?>

					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div>
</div>