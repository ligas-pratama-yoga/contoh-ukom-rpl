<?php
partials("head");
partials("banner");
partials("navigation");
?>

<main>
	<div class="container-fluid px-4">
		<h1 class="mt-4"><?= $headOne ?></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active"><?= $headOne ?></li>
		</ol>
		<?php partials("table", ["datas" => $datas, "columns" => $columns, "btnRecovery" => true]) ?>

	</div>
</main>

<?php
require __DIR__ . "/partials/footer.php";
require __DIR__ . "/partials/foot.php";
?>