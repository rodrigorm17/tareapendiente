<?php // Página 2: visor de código + resumen
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../lib/funciones.php';
$casos = require __DIR__ . '/../lib/casos.php';
$c = $casos[$id]; $actual = 'caso';
$ejemplo = $c['funcion'](...array_map(fn($f) => $f[2], $c['campos']));
$tituloPagina = "Caso $id: " . $c['titulo'];
include_once __DIR__ . '/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h2 fw-bold mb-0">CASO <?= $id ?>: <?= h($c['titulo']) ?></h1>
  <a class="btn btn-secondary" href="index.php">⮌ VOLVER Pág. PRINCIPAL</a>
</div>
<?php include __DIR__ . '/nav.php'; ?>
<div class="alert alert-secondary border-secondary"><strong>ENUNCIADO:</strong><br><?= h($c['enunciado']) ?></div>
<div class="row g-3">
  <div class="col-lg-7"><div class="card"><div class="card-header panel-head">VISUALIZACIÓN DE CÓDIGOS (PHP)</div>
    <div class="card-body p-0"><?= resaltarPHP(codigoFuente($c['funcion'])) ?></div></div></div>
  <div class="col-lg-5"><div class="card"><div class="card-header panel-head">ÁREA DE RESULTADOS</div>
    <div class="card-body text-center">
      <table class="table table-sm w-auto mx-auto text-start"><?php foreach ($c['campos'] as $f): ?>
        <tr><td><?= h($f[1]) ?></td><td><?= $f[2] ?></td></tr><?php endforeach; ?></table>
      <p class="fs-4 fw-bold mb-0">Área calculada: <?= $ejemplo . ' ' . $c['unidad'] ?></p>
    </div></div>
    <a class="btn btn-primary w-100 mt-3" href="app_caso<?= $id ?>.php">ACCEDER A LA APLICACIÓN (PÁG. 3)</a></div>
</div>
<?php include __DIR__ . '/nav.php'; include_once __DIR__ . '/footer.php'; ?>
