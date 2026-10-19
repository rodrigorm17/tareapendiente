<?php // Panel de navegación fluida. Requiere $id, $casos, $actual ('caso'|'app')
$ant = $casos[$id - 1] ?? null; $sig = $casos[$id + 1] ?? null;
$urlAnt = $ant ? ($actual === 'app' ? "app_caso" . ($id-1) . ".php" : urlCaso($id-1)) : null;
$urlSig = $sig ? ($actual === 'app' ? "app_caso" . ($id+1) . ".php" : urlCaso($id+1)) : null;
?>
<nav class="d-flex flex-wrap gap-2 justify-content-between my-3">
  <a class="btn btn-secondary <?= $ant ? '' : 'disabled' ?>" href="<?= $urlAnt ?? '#' ?>">← Caso Anterior</a>
  <a class="btn btn-dark" href="index.php">Regresar al Menú Principal</a>
  <a class="btn btn-secondary <?= $sig ? '' : 'disabled' ?>" href="<?= $urlSig ?? '#' ?>">Caso Siguiente →</a>
</nav>
