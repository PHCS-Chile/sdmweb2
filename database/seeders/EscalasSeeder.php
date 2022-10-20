<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class EscalasSeeder
 * @package Database\Seeders
 * @version 3
 */
class EscalasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escalas')->insert($this->escalas);
    }

    private $escalas = [
        ['id' => 4, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 1, 'name' => 'Bolsas, Servicios VAS o Servicios Restringidos', 'isActive' => 1],
        ['id' => 6, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 2, 'name' => 'Beneficios Club Entel', 'isActive' => 1],
        ['id' => 7, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 3, 'name' => 'Bloqueo por Robo o Perdida', 'isActive' => 1],
        ['id' => 8, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 4, 'name' => 'Cambio de Equipo', 'isActive' => 1],
        ['id' => 9, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 5, 'name' => 'Cambio de Plan o Condiciones comerciales', 'isActive' => 1],
        ['id' => 10, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 6, 'name' => 'Campaña o Cross-selling', 'isActive' => 1],
        ['id' => 11, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 7, 'name' => 'Canales de Atención', 'isActive' => 1],
        ['id' => 12, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 8, 'name' => 'Cargas Manuales o Devoluciones Compensatorias', 'isActive' => 1],
        ['id' => 13, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 9, 'name' => 'Condiciones Comerciales de Planes, Servicios y Equipo', 'isActive' => 1],
        ['id' => 14, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 11, 'name' => 'Contingencia de Servicios', 'isActive' => 1],
        ['id' => 15, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 18, 'name' => 'Problemas de Señal / Cobertura / Conexión', 'isActive' => 1],
        ['id' => 16, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 12, 'name' => 'Estado de Deuda o Reposición', 'isActive' => 1],
        ['id' => 17, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 13, 'name' => 'Explicación del detalle o trafico de boleta', 'isActive' => 1],
        ['id' => 18, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 14, 'name' => 'Proceso de facturación o pagos', 'isActive' => 1],
        ['id' => 19, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 15, 'name' => 'Funciones o Configuración de Equipo', 'isActive' => 1],
        ['id' => 20, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 26, 'name' => 'Medios de Pago o Recarga', 'isActive' => 1],
        ['id' => 21, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 17, 'name' => 'Objeción de Cobros Plan, equipo o adicionales (no VAS)', 'isActive' => 1],
        ['id' => 22, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 19, 'name' => 'Retención y/o Renuncias', 'isActive' => 1],
        ['id' => 23, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 20, 'name' => 'Roaming o LDI', 'isActive' => 1],
        ['id' => 24, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 21, 'name' => 'Saldos Prepagos o Controlados', 'isActive' => 1],
        ['id' => 25, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 22, 'name' => 'Seguimiento de Negocios', 'isActive' => 1],
        ['id' => 26, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 27, 'name' => 'Seguros y Asistencias', 'isActive' => 1],
        ['id' => 27, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 23, 'name' => 'Servicio Técnico de Equipos', 'isActive' => 1],
        ['id' => 28, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 24, 'name' => 'Venta de Productos y Servicios', 'isActive' => 1],
        ['id' => 29, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 25, 'name' => 'Otras Consultas o Requerimientos', 'isActive' => 1],
        ['id' => 30, 'grupo_id' => 2, 'descripcion' => 'Resolución en Linea', 'value' => 1, 'name' => 'Si', 'isActive' => 1],
        ['id' => 31, 'grupo_id' => 2, 'descripcion' => 'Resolución en Linea', 'value' => 2, 'name' => 'No, por pasos operacionales fuera de línea', 'isActive' => 1],
        ['id' => 33, 'grupo_id' => 2, 'descripcion' => 'Resolución en Linea', 'value' => 3, 'name' => 'No, por derivación a otro canal', 'isActive' => 1],
        ['id' => 34, 'grupo_id' => 2, 'descripcion' => 'Resolución en Linea', 'value' => 4, 'name' => 'No, por responsabilidad del Ejecutivo', 'isActive' => 1],
        ['id' => 35, 'grupo_id' => 2, 'descripcion' => 'Resolución en Linea', 'value' => 5, 'name' => 'No, por contingencias', 'isActive' => 1],
        ['id' => 36, 'grupo_id' => 2, 'descripcion' => 'Resolución en Linea', 'value' => 6, 'name' => 'No, por otro motivo', 'isActive' => 1],
        ['id' => 37, 'grupo_id' => 3, 'descripcion' => 'Responsable PEC - Pauta Call Voz', 'value' => 1, 'name' => 'Falta de Formación Agente', 'isActive' => 1],
        ['id' => 38, 'grupo_id' => 3, 'descripcion' => 'Responsable PEC - Pauta Call Voz', 'value' => 2, 'name' => 'Uso Incorrecto de Herramientas/Procedimientos', 'isActive' => 1],
        ['id' => 39, 'grupo_id' => 3, 'descripcion' => 'Responsable PEC - Pauta Call Voz', 'value' => 3, 'name' => 'Faltas a la Ética', 'isActive' => 1],
        ['id' => 40, 'grupo_id' => 3, 'descripcion' => 'Responsable PEC - Pauta Call Voz', 'value' => 4, 'name' => 'Falta a la capacidad de análisis', 'isActive' => 1],
        ['id' => 41, 'grupo_id' => 3, 'descripcion' => 'Responsable PEC - Pauta Call Voz', 'value' => 5, 'name' => 'Actitud Profesional y/o Habilidades Blandas', 'isActive' => 1],
        ['id' => 42, 'grupo_id' => 3, 'descripcion' => 'Responsable PEC - Pauta Call Voz', 'value' => 6, 'name' => 'No conoce cambios al procedimiento', 'isActive' => 1],
        ['id' => 43, 'grupo_id' => 3, 'descripcion' => 'Responsable PEC - Pauta Call Voz', 'value' => 7, 'name' => 'Otro', 'isActive' => 1],
        ['id' => 44, 'grupo_id' => 4, 'descripcion' => 'Ruidos o problemas de calidad en el audio - Pauta Call Voz', 'value' => 1, 'name' => 'Sin Observaciones', 'isActive' => 1],
        ['id' => 45, 'grupo_id' => 4, 'descripcion' => 'Ruidos o problemas de calidad en el audio - Pauta Call Voz', 'value' => 2, 'name' => 'Ruido Ambiente', 'isActive' => 1],
        ['id' => 46, 'grupo_id' => 4, 'descripcion' => 'Ruidos o problemas de calidad en el audio - Pauta Call Voz', 'value' => 3, 'name' => 'Intermitencias', 'isActive' => 1],
        ['id' => 47, 'grupo_id' => 4, 'descripcion' => 'Ruidos o problemas de calidad en el audio - Pauta Call Voz', 'value' => 4, 'name' => 'Audio degradado o ecos', 'isActive' => 1],
        ['id' => 48, 'grupo_id' => 4, 'descripcion' => 'Ruidos o problemas de calidad en el audio - Pauta Call Voz', 'value' => 5, 'name' => 'Alta latencia', 'isActive' => 1],
        ['id' => 49, 'grupo_id' => 5, 'descripcion' => 'Tipo de Negocio - Pauta Call Voz', 'value' => 1, 'name' => 'No aplica', 'isActive' => 1],
        ['id' => 50, 'grupo_id' => 5, 'descripcion' => 'Tipo de Negocio - Pauta Call Voz', 'value' => 2, 'name' => 'Portabilidad', 'isActive' => 1],
        ['id' => 51, 'grupo_id' => 5, 'descripcion' => 'Tipo de Negocio - Pauta Call Voz', 'value' => 3, 'name' => 'Línea Adicional', 'isActive' => 1],
        ['id' => 52, 'grupo_id' => 5, 'descripcion' => 'Tipo de Negocio - Pauta Call Voz', 'value' => 4, 'name' => 'Migración PP a SS', 'isActive' => 1],
        ['id' => 53, 'grupo_id' => 5, 'descripcion' => 'Tipo de Negocio - Pauta Call Voz', 'value' => 5, 'name' => 'Servicios Hogar', 'isActive' => 1],
        ['id' => 54, 'grupo_id' => 5, 'descripcion' => 'Tipo de Negocio - Pauta Call Voz', 'value' => 6, 'name' => 'Cambio de equipo', 'isActive' => 1],
        ['id' => 55, 'grupo_id' => 2, 'descripcion' => 'Resolución en Linea', 'value' => 7, 'name' => 'No, Cliente no continua con la atención', 'isActive' => 1],
        ['id' => 56, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 10, 'name' => 'Consultas 727', 'isActive' => 0],
        ['id' => 57, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 16, 'name' => 'Nursery', 'isActive' => 0],
        ['id' => 61, 'grupo_id' => 7, 'descripcion' => 'Resolución en Linea - Call Center Voz', 'value' => 1, 'name' => 'Si', 'isActive' => 1],
        ['id' => 62, 'grupo_id' => 7, 'descripcion' => 'Resolución en Linea - Call Center Voz', 'value' => 2, 'name' => 'No, por responsabilidad del Ejecutivo', 'isActive' => 1],
        ['id' => 63, 'grupo_id' => 7, 'descripcion' => 'Resolución en Linea - Call Center Voz', 'value' => 3, 'name' => 'No, por pasos operacionales fuera de línea', 'isActive' => 1],
        ['id' => 64, 'grupo_id' => 7, 'descripcion' => 'Resolución en Linea - Call Center Voz', 'value' => 4, 'name' => 'No, por derivación a otro canal', 'isActive' => 1],
        ['id' => 65, 'grupo_id' => 7, 'descripcion' => 'Resolución en Linea - Call Center Voz', 'value' => 5, 'name' => 'No, por transferencia a otro nivel', 'isActive' => 1],
        ['id' => 66, 'grupo_id' => 7, 'descripcion' => 'Resolución en Linea - Call Center Voz', 'value' => 6, 'name' => 'No, Otro', 'isActive' => 1],
        ['id' => 67, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 28, 'name' => 'Objeción de Cobros VAS', 'isActive' => 1],
        ['id' => 68, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 29, 'name' => 'Problemas de Navegación', 'isActive' => 1],
        ['id' => 69, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 30, 'name' => 'Problemas de Comunicación VOZ', 'isActive' => 1],
        ['id' => 70, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 31, 'name' => 'Problemas Canales TV / Premium / EntelTV', 'isActive' => 1],
        ['id' => 71, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 32, 'name' => 'Visitas Técnicas Reparación / Instalación Hogar', 'isActive' => 1],
        ['id' => 72, 'grupo_id' => 1, 'descripcion' => 'Motivo', 'value' => 33, 'name' => 'Traslado de Servicios Hogar', 'isActive' => 1],
        ['id' => 73, 'grupo_id' => 8, 'descripcion' => 'Resolución en Linea - 2022', 'value' => 1, 'name' => 'Si', 'isActive' => 1],
        ['id' => 74, 'grupo_id' => 8, 'descripcion' => 'Resolución en Linea - 2022', 'value' => 2, 'name' => 'No, por responsabilidad del Ejecutivo', 'isActive' => 1],
        ['id' => 75, 'grupo_id' => 8, 'descripcion' => 'Resolución en Linea - 2022', 'value' => 3, 'name' => 'No, por pasos operacionales fuera de línea', 'isActive' => 1],
        ['id' => 76, 'grupo_id' => 8, 'descripcion' => 'Resolución en Linea - 2022', 'value' => 4, 'name' => 'No, por derivación a otro canal', 'isActive' => 1],
        ['id' => 77, 'grupo_id' => 8, 'descripcion' => 'Resolución en Linea - 2022', 'value' => 5, 'name' => 'No, escalamiento o transferencia a otro ', 'isActive' => 1],
        ['id' => 78, 'grupo_id' => 8, 'descripcion' => 'Resolución en Linea - 2022', 'value' => 6, 'name' => 'No, por otro motivo', 'isActive' => 1],
        ['id' => 79, 'grupo_id' => 8, 'descripcion' => 'Resolución en Linea - 2022', 'value' => 7, 'name' => 'No, por contingencias', 'isActive' => 1],
        ['id' => 80, 'grupo_id' => 8, 'descripcion' => 'Resolución en Linea - 2022', 'value' => 8, 'name' => 'No, Cliente no continua con la atención', 'isActive' => 1],
        ['id' => 81, 'grupo_id' => 9, 'descripcion' => 'Motivo del llamado', 'value' => 1, 'name' => 'Reclamo', 'isActive' => 1],
        ['id' => 82, 'grupo_id' => 9, 'descripcion' => 'Motivo del llamado', 'value' => 2, 'name' => 'Consulta', 'isActive' => 1],
        ['id' => 83, 'grupo_id' => 9, 'descripcion' => 'Motivo del llamado', 'value' => 3, 'name' => 'Requerimiento', 'isActive' => 1],
        ['id' => 84, 'grupo_id' => 10, 'descripcion' => 'Motivo del llamado 2', 'value' => 1, 'name' => 'Consultar', 'isActive' => 1],
        ['id' => 85, 'grupo_id' => 10, 'descripcion' => 'Motivo del llamado 2', 'value' => 2, 'name' => 'Contratar nuevos servicios', 'isActive' => 1],
        ['id' => 86, 'grupo_id' => 10, 'descripcion' => 'Motivo del llamado 2', 'value' => 3, 'name' => 'Reclamar', 'isActive' => 1],
        ['id' => 87, 'grupo_id' => 10, 'descripcion' => 'Motivo del llamado 2', 'value' => 4, 'name' => 'Renunciar', 'isActive' => 1],
        ['id' => 88, 'grupo_id' => 10, 'descripcion' => 'Motivo del llamado 2', 'value' => 5, 'name' => 'Solicitar modificación', 'isActive' => 1],

    ];

}
