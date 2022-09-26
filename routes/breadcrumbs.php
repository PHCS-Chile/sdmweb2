<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('inicio', function (BreadcrumbTrail $trail) {
    $trail->push('Inicio', route('dashboard'));
});

Breadcrumbs::for('reportes', function (BreadcrumbTrail $trail, $mercadoSeleccionado) {
    $trail->parent('inicio');
    $trail->push('Reportes');
});

Breadcrumbs::for('asignaciones', function (BreadcrumbTrail $trail, $estudio) {
    $trail->parent('inicio');
    $trail->push(sprintf("%s", $estudio->name), route('asignaciones.estudio', [$estudio->id]));
});

Breadcrumbs::for('asignacion', function (BreadcrumbTrail $trail, $asignacion) {
    $trail->parent('asignaciones', $asignacion->estudio);
    $trail->push(sprintf("Base de la asignación [#%s]", $asignacion->id), route('asignacions.ejecutivoevaluacionescallvoz', [$asignacion->id]));
});

Breadcrumbs::for('asignacion-agrupado', function (BreadcrumbTrail $trail, $asignacion) {
    $trail->parent('asignaciones', $asignacion->estudio);
    $trail->push(sprintf("Lista de ejecutivos [#%s]", $asignacion->id), route('asignacion.ejecutivos', [$asignacion->id]));
});

Breadcrumbs::for('asignacion-ejecutivo', function (BreadcrumbTrail $trail, $asignacion, $ejecutivo) {
    $trail->parent('asignacion-agrupado', $asignacion);
    $trail->push(sprintf("Base del ejecutivo '%s'", urldecode($ejecutivo)), route('asignacion.ejecutivo', [$asignacion->id, urldecode($ejecutivo)]));
});

Breadcrumbs::for('ejecutivo', function (BreadcrumbTrail $trail, $asignacionfinal, $rutejecutivo) {
    $trail->parent('asignacion', $asignacionfinal);
    $trail->push($rutejecutivo, route('asignacions.ejecutivoevaluaciones', [$asignacionfinal->id, $rutejecutivo]));
});

Breadcrumbs::for('evaluacion', function (BreadcrumbTrail $trail, $asignacionfinal, $rutejecutivo) {
    $trail->parent('asignacion', $asignacionfinal);
    $trail->push($rutejecutivo, route('asignacions.ejecutivoevaluaciones', [$asignacionfinal->id, $rutejecutivo]));
});

