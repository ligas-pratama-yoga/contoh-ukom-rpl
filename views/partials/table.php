<div class="card mb-4 mt-4">
    <div class="card-header d-flex justify-content-between align-items-center mb-4">
        <div>
            <i class="fas fa-table me-1"></i>
            Data
        </div>
        <div>
            <?php if($tambahBtn ?? true) : ?>
            <a href="<?php echo $_SERVER['REQUEST_URI'] . "/recovery" ?>"
                class="btn btn-info btn-sm">Recovery</a>
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
                    <?php if(($columns ?? false) && (!isset($tambahBtn))) : ?>
                    <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <?php if($totalPrice[0] ?? false) : ?>
            <tfoot>
                <th colspan="4">Total Harga</th>
                <th colspan="2"><?php echo $totalPrice[1] ?></th>
            </tfoot>
            <?php endif; ?>
            <tbody>
                <?php foreach($datas as $key => $data): ?>
                <tr>
                    <?php foreach($data as $value): ?>
                    <td><?php echo $value ?></td>
                    <?php endforeach; ?>
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
                          <?php if($tambahBtn ?? true) : ?>
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
                        <?php endif; ?>

                        <?php if($detailBtn ?? false) : ?>
                        <a href="<?php echo $detailLink . $data["ID"] ?? $data ?>"
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
