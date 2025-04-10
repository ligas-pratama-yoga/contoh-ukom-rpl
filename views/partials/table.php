<div class="card mb-4 mt-4">
	<div class="card-header d-flex justify-content-between align-items-center mb-4">
		<div>
			<i class="fas fa-table me-1"></i>
			Data
		</div>
		<div>
			<?php if($tambahBtn ?? true) : ?>
			<a href="<?php echo $_SERVER['REQUEST_URI'] . "/recovery" ?>"
				class="btn btn-info btn-sm">
				Recovery
			</a>
			<button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target="#tambahData">
				<i class="fas fa-add"></i>
				Tambah Data
			</button>
			<?php endif; ?>
		</div>
	</div>
	<div class="card-body">
		<table id="datatablesSimple">
			<thead>
				<tr>
					<?php foreach($columns as $value): ?>
					<th><?php echo $value ?></th>
					<?php endforeach; ?>
					<?php if(($columns ?? false) && ($btnRecovery ?? true)) : ?>
					<th>Aksi</th>
					<?php endif; ?>
					<?php if(($columns ?? false) && (($tambahBtn ?? false))) : ?>
					<th>Aksi</th>
					<?php endif; ?>
				</tr>
			</thead>
			<?php // if($totalPrice[0] ?? false) :?>
			<!-- <tfoot>
				<th colspan="4">Total Harga</th>
				<th <?php echo ($tambahBtn == null ? "" : "colspan='2'") ?>><?php echo $totalPrice[1] ?>
			</th>
			</tfoot> -->
			<?php // endif;?>
			<tbody>
				<?php foreach($datas as $key => $data): ?>
				<tr>
					<?php foreach($data as $k => $value): ?>
					<?php if($k == "Status Pembayaran"): ?>
					<?php if($value == null): ?>
					<td style="color: red;">belum bayar</td>
					<?php continue; ?>
					<?php endif; ?>
					<?php endif; ?>
					<td><?php echo htmlspecialchars($value) ?></td>
					<?php endforeach; ?>
					<?php if(($btnRecovery ?? false)) : ?>
					<td>
						<form
							action="<?php echo $_SERVER['REQUEST_URI'] . "/{$data["ID"]}" ?>"
							method="post">
							<input type="hidden" name="id"
								value="<?php echo htmlspecialchars($data['ID']) ?>">
							<button class="btn btn-sm btn-info">
								Balikan
							</button>
						</form>
					</td>
					<?php endif; ?>
					<?php if($tambahBtn ?? true) : ?>
					<td>
						<?php if($btnRecovery ?? false) : ?>
						<form
							action="<?php echo $_SERVER['REQUEST_URI'] . "/{$data["ID"]}" ?>"
							method="post">
							<input type="hidden" name="id"
								value="<?php echo $data['ID'] ?>">
							<button class="btn btn-sm btn-info">
								Balikan
							</button>
						</form>
						<?php else: ?>
						<button type="button" class="btn btn-sm text-warning" onclick="setModal(this, 'editData')"
							datas-entity='<?php echo '["' . implode('", "', $data) . '"]' ?>'
							data-other="<?php echo ${$key_pair[0]}[$key][$key_pair[1]] ?? "" ?>">
							<i class="fas fa-pen"></i>
						</button>
						<button type="button" class="btn btn-sm text-danger" onclick="setModal(this, 'hapusData')"
							datas-entity='<?php echo '["' . $data["ID"] . '"]' ?>'>
							<i class="fas fa-trash"></i>
						</button>
						<?php endif; ?>

						<?php if($detailBtn ?? false) : ?>
						<a href="<?php echo $detailLink . $data["ID"] ?? $data ?>"
							class="btn btn-sm text-primary">
							<i class="fas fa-eye"></i>
						</a>
						<?php endif; ?>

					</td>
					<?php endif; ?>
				</tr>
				<?php endforeach; ?>
				<?php if($columns && ($totalPrice ?? false)): ?>
				<tr>
					<td colspan="4"><b>Total Harga</b></td>
					<td colspan="2"><b><?= htmlspecialchars($totalPrice[1]) ?></b></td>
				</tr>
				<tr>
					<td colspan="4"><b>Tunai</b></td>
					<td colspan="2"><b><?= $tunai ?? 0?></b></td>
				</tr>
				<tr>
					<td colspan="4"><b>Kembalian</b></td>
					<td colspan="2"><b><?= $kembalian ?? 0 ?></b>
					</td>
				</tr>
				<?php endif; ?>
			</tbody>

		</table>
	</div>
</div>