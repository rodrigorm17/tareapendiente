<?php
// ===== Lógica matemática de cálculo =====

/** Calcula la superficie de un cuadrado dado su lado. */
function calcularSuperficieCuadrado(float $lado): float
{
    return $lado * $lado;
}

/** Calcula la superficie de un rectángulo. */
function calcularSuperficieRectangulo(float $base, float $altura): float
{
    return $base * $altura;
}

/** Calcula la superficie de un triángulo. */
function calcularSuperficieTriangulo(float $base, float $altura): float
{
    return ($base * $altura) / 2;
}

/** Calcula la superficie de un círculo. */
function calcularSuperficieCirculo(float $radio): float
{
    return round(M_PI * $radio ** 2, 2);
}

// ===== Utilidades de la aplicación =====

function h(?string $s): string { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

/** Devuelve el código fuente real de una función (con su comentario). */
function codigoFuente(string $fn): string
{
    $r = new ReflectionFunction($fn);
    $lineas = file($r->getFileName());
    $ini = $r->getStartLine() - 1;
    if ($doc = $r->getDocComment()) $ini -= substr_count($doc, "\n") + 1;
    $cuerpo = array_slice($lineas, $ini, $r->getEndLine() - $ini);
    return "<?php\n" . implode('', $cuerpo) . "?>";
}

/** Resalta PHP con colores del tema Dark+ de VS Code, con números de línea. */
function resaltarPHP(string $codigo): string
{
    $lineas = [''];
    $prev = token_get_all($codigo);
    foreach ($prev as $i => $t) {
        $clase = '';
        if (is_array($t)) {
            [$id, $txt] = $t;
            if (in_array($id, [T_COMMENT, T_DOC_COMMENT])) $clase = 'c';
            elseif ($id === T_VARIABLE) $clase = 'v';
            elseif ($id === T_CONSTANT_ENCAPSED_STRING) $clase = 's';
            elseif (in_array($id, [T_LNUMBER, T_DNUMBER])) $clase = 'n';
            elseif (in_array($id, [T_OPEN_TAG, T_CLOSE_TAG, T_FUNCTION, T_RETURN, T_IF, T_ELSE, T_FOREACH, T_ECHO])) $clase = 'k';
            elseif ($id === T_STRING) {
                $sig = $prev[$i + 1] ?? '';
                $clase = ($sig === '(' || (is_array($prev[$i - 2] ?? null) && ($prev[$i - 2][0] ?? 0) === T_FUNCTION)) ? 'f' : 't';
            }
        } else { $txt = $t; }
        foreach (explode("\n", $txt) as $j => $parte) {
            if ($j > 0) $lineas[] = '';
            $e = h($parte);
            $lineas[count($lineas) - 1] .= $clase && $e !== '' ? "<span class=\"tk-$clase\">$e</span>" : $e;
        }
    }
    $html = '';
    foreach ($lineas as $n => $l) $html .= '<div class="ln"><span class="num">' . ($n + 1) . '</span>' . $l . "</div>";
    return '<div class="vscode">' . $html . '</div>';
}

function urlCaso(int $id): string { return "caso$id.php"; }
