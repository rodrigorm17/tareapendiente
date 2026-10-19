<?php // Página 1: Menú principal
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/lib/funciones.php';
$casos = require __DIR__ . '/lib/casos.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach (['apellidos','semestre','turno'] as $k) $_SESSION[$k] = trim($_POST[$k] ?? '');
}
$porCategoria = [];
foreach ($casos as $id => $c) $porCategoria[$c['categoria']][$id] = $c;
$tituloPagina = 'Menú Principal';
include_once __DIR__ . '/includes/header.php';
?>
<h1 class="text-center fw-bold mb-4">MENÚ PRINCIPAL</h1>
<div class="card mb-4"><div class="card-header panel-head">RESOLUCIÓN DE EJERCICIOS</div>
<div class="card-body">
<?php foreach ($porCategoria as $cat => $lista): ?>
  <h2 class="h5 text-primary mt-2"><?= h($cat) ?></h2>
  <?php foreach ($lista as $id => $c): ?>
  <div class="border rounded p-3 mb-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
    <div><h3 class="h6 fw-bold mb-1">CASO <?= sprintf('%02d', $id) ?>: <?= h($c['titulo']) ?></h3>
      <span class="badge text-bg-secondary mb-1"><?= h($cat) ?></span>
      <div class="small"><strong>Enunciado detallado:</strong> <?= h($c['enunciado']) ?></div></div>
    <a class="btn btn-primary" href="<?= urlCaso($id) ?>">Ver caso →</a>
  </div>
  <?php endforeach; endforeach; ?>
</div></div>
<form method="post" class="card"><div class="card-body row g-3 align-items-end">
  <div class="col-md-5"><label class="form-label fw-semibold">APELLIDOS Y NOMBRES:</label>
    <input name="apellidos" class="form-control" value="<?= h($_SESSION['apellidos'] ?? '') ?>"></div>
  <div class="col-md-3"><label class="form-label fw-semibold">SEMESTRE:</label>
    <input name="semestre" class="form-control" value="<?= h($_SESSION['semestre'] ?? '') ?>"></div>
  <div class="col-md-2"><label class="form-label fw-semibold">TURNO:</label>
    <input name="turno" class="form-control" value="<?= h($_SESSION['turno'] ?? '') ?>"></div>
  <div class="col-md-2"><button class="btn btn-dark w-100">Guardar</button></div>
</div></form>
<?php include_once __DIR__ . '/includes/footer.php'; ?>
