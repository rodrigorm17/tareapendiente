<?php // Página 3: aplicación con formulario en vivo
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../lib/funciones.php';
$casos = require __DIR__ . '/../lib/casos.php';
$c = $casos[$id]; $actual = 'app'; $res = null; $err = null; $vals = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($c['campos'] as $f) {
    $v = $_POST[$f[0]] ?? '';
    $vals[$f[0]] = $v;
    if (!is_numeric($v) || $v <= 0) $err = 'Ingrese valores numéricos mayores que cero.';
  }
  if (!$err) $res = $c['funcion'](...array_map('floatval', $vals));
}
$tituloPagina = "Aplicación - Caso $id";
include_once __DIR__ . '/header.php';
?>
<h1 class="h2 fw-bold">Aplicación en vivo – Caso <?= $id ?>: <?= h($c['titulo']) ?></h1>
<p class="text-muted"><?= h($c['enunciado']) ?></p>
<div class="card shadow-sm"><div class="card-body">
  <form method="post" class="row g-3 align-items-end">
    <?php foreach ($c['campos'] as $f): ?>
    <div class="col-md-4"><label class="form-label"><?= h($f[1]) ?></label>
      <input type="number" step="any" min="0" name="<?= $f[0] ?>" class="form-control" required value="<?= h($vals[$f[0]] ?? $f[2]) ?>"></div>
    <?php endforeach; ?>
    <div class="col-md-4"><button class="btn btn-success w-100">Calcular</button></div>
  </form>
  <?php if ($err): ?><div class="alert alert-danger mt-3"><?= h($err) ?></div>
  <?php elseif ($res !== null): ?><div class="alert alert-success mt-3 fs-5">Área calculada: <strong><?= $res . ' ' . $c['unidad'] ?></strong></div><?php endif; ?>
</div></div>
<div class="mt-3"><a href="caso<?= $id ?>.php" class="btn btn-outline-dark">Ver código fuente del caso</a></div>
<?php include __DIR__ . '/nav.php'; include_once __DIR__ . '/footer.php'; ?>
