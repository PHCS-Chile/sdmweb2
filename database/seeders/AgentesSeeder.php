<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class AgentesSeeder
 * @package Database\Seeders
 * @version 3
 */
class AgentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agentes')->insert($this->agentes);
    }

    /*
     * TODO: Utilizar factory
     */
    private $agentes = [
        ['name' => 'SCCP Hogar Fibra', 'habilidad' => 'Hogar Fibra', 'campana' => 'FIBRA', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Hogar', 'status' => '2', 'servicio_id' => 1],
        ['name' => 'SCCP Hogar Inalambrico', 'habilidad' => 'Hogar Inalambrico', 'campana' => 'HOGAR_INALAMBRICO', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 1],
        ['name' => 'SCCP Cuenta Controlada', 'habilidad' => 'Cuenta Controlada', 'campana' => 'NURSERY_CC', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 1],
        ['name' => 'SCCP Prepago', 'habilidad' => 'Prepago', 'campana' => 'PREPAGO', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 1],
        ['name' => 'SCCP S2S Hogar', 'habilidad' => 'S2S Hogar', 'campana' => 'S2S_HOGAR', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 1],
        ['name' => 'KONPE RRSS', 'habilidad' => 'Facebook y Twitter', 'campana' => 'FACEBOOK TWITTER', 'tipo_habilidad' => 'RRSS', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 2],
        ['name' => 'KONPE Cuenta Controlada', 'habilidad' => 'Cuenta Controlada', 'campana' => 'NURSERY_CC', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 2],
        ['name' => 'KONPE Roaming', 'habilidad' => 'Roaming', 'campana' => 'ROAMING', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 2],
        ['name' => 'KONPE S2S Móvil', 'habilidad' => 'S2S Móvil', 'campana' => 'S2S_MOVIL', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 2],
        ['name' => 'KONPE Suscripción', 'habilidad' => 'Suscripción', 'campana' => 'SUSCRIPCION', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 2],
        ['name' => 'KONPE Venta Privada', 'habilidad' => 'Venta Privada', 'campana' => 'VENTA_PRIVADA', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 2],
        ['name' => 'TEMPORAL', 'habilidad' => 'CC Temp', 'campana' => 'Temp', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Temp', 'status' => '2', 'servicio_id' => 2],
        ['name' => 'SCCP S2S Móvil', 'habilidad' => 'S2S Móvil', 'campana' => 'S2S_MOVIL', 'tipo_habilidad' => 'Whatsapp', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 1],
        ['name' => 'A365 S2S Móvil', 'habilidad' => 'S2S Móvil', 'campana' => 'S2S Móvil', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 7],
        ['name' => 'A365 Front Hogar', 'habilidad' => 'Front Hogar', 'campana' => 'Front Hogar', 'tipo_habilidad' => 'Front', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 7],
        ['name' => 'A365 S2S Hogar', 'habilidad' => 'S2S Hogar', 'campana' => 'S2S Hogar', 'tipo_habilidad' => 'Front', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 7],
        ['name' => 'ECC 105', 'habilidad' => 'Reclamos 105', 'campana' => 'Reclamos 105', 'tipo_habilidad' => 'Especialista', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 6],
        ['name' => 'KONECTA S2S Móvil', 'habilidad' => 'S2S Móvil', 'campana' => 'S2S Móvil', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 3],
        ['name' => 'KONECTA S2S Hogar', 'habilidad' => 'S2S Hogar', 'campana' => 'S2S Hogar', 'tipo_habilidad' => 'Front', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 3],
        ['name' => 'KONECTA Comercial', 'habilidad' => 'Comercial', 'campana' => 'Comercial', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 3],
        ['name' => 'KONECTA Técnico', 'habilidad' => 'Técnico', 'campana' => 'Técnico', 'tipo_habilidad' => 'Especialista', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 3],
        ['name' => 'KONECTA Masivo', 'habilidad' => 'Masivo', 'campana' => 'Masivo', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 3],
        ['name' => 'KONECTA CHILE Hogar Inalámbrico', 'habilidad' => 'Hogar Inalámbrico', 'campana' => 'Hogar Inalámbrico', 'tipo_habilidad' => 'Front', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 4],
        ['name' => 'KONECTA CHILE Adulto Mayor', 'habilidad' => 'Adulto Mayor', 'campana' => 'Adulto Mayor', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 4],
        ['name' => 'KONECTA CHILE Cuenta', 'habilidad' => 'Cuenta', 'campana' => 'Cuenta', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 4],
        ['name' => 'KONECTA CHILE Comercial', 'habilidad' => 'Comercial', 'campana' => 'Comercial', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 4],
        ['name' => 'KONECTA CHILE Masivo', 'habilidad' => 'Masivo', 'campana' => 'Masivo', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 4],
        ['name' => 'SCCP Hogar Inalámbrico', 'habilidad' => 'Hogar Inalámbrico', 'campana' => 'Hogar Inalámbrico', 'tipo_habilidad' => 'Front', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 5],
        ['name' => 'SCCP Convergente', 'habilidad' => 'Convergente', 'campana' => 'Convergente', 'tipo_habilidad' => 'Front', 'mercado' => 'Mixto', 'status' => '1', 'servicio_id' => 5],
        ['name' => 'SCCP Cuenta', 'habilidad' => 'Cuenta', 'campana' => 'Cuenta', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 5],
        ['name' => 'SCCP Masivo', 'habilidad' => 'Masivo', 'campana' => 'Masivo', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 5],
        ['name' => 'SCCP Reclamos', 'habilidad' => 'Reclamos', 'campana' => 'Reclamos', 'tipo_habilidad' => 'Especialista', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 5],
        ['name' => 'SCCP Suscripción VIP', 'habilidad' => 'Suscripción VIP', 'campana' => 'Suscripción VIP', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 5],
        ['name' => 'SCCP S2S - Móvil', 'habilidad' => 'S2S Móvil', 'campana' => 'S2S Móvil', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 5],
        ['name' => 'SCCP Hogar Fibra', 'habilidad' => 'Hogar Fibra', 'campana' => 'Hogar Fibra', 'tipo_habilidad' => 'Front', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 5],
        ['name' => 'SCCP GRI', 'habilidad' => 'GRI', 'campana' => 'GRI', 'tipo_habilidad' => 'Especialista', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 5],
        ['name' => 'A365 C2C Hogar Privado', 'habilidad' => 'C2C Hogar Privado', 'campana' => 'C2C Hogar Privado', 'tipo_habilidad' => 'Online Privado', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 C2C Hogar Publico', 'habilidad' => 'C2C Hogar Público', 'campana' => 'C2C Hogar Público', 'tipo_habilidad' => 'Online Público', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 C2C Móvil Privado', 'habilidad' => 'C2C Móvil Privado', 'campana' => 'C2C Móvil Privado', 'tipo_habilidad' => 'Online Privado', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 C2C Movil Publico', 'habilidad' => 'C2C Móvil Público', 'campana' => 'C2C Móvil Público', 'tipo_habilidad' => 'Online Público', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 Fibra Hogar', 'habilidad' => 'Fibra Hogar', 'campana' => 'Fibra Hogar', 'tipo_habilidad' => 'Outbound', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 Migraciones', 'habilidad' => 'Migraciones', 'campana' => 'Migraciones', 'tipo_habilidad' => 'Outbound', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 Portabilidad Exclusiva', 'habilidad' => 'Portabilidad Exclusiva', 'campana' => 'Portabilidad Exclusiva', 'tipo_habilidad' => 'Outbound', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 Portabilidad IVR', 'habilidad' => 'Portabilidad IVR', 'campana' => 'Portabilidad IVR', 'tipo_habilidad' => 'Outbound', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 Portabilidad Recuperados', 'habilidad' => 'Portabilidad Recuperados', 'campana' => 'Portabilidad Recuperados', 'tipo_habilidad' => 'Outbound', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 Segundas Lineas', 'habilidad' => 'Segundas Líneas', 'campana' => 'Segundas Líneas', 'tipo_habilidad' => 'Outbound', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 Web Hogar Privado', 'habilidad' => 'Web Hogar Privado', 'campana' => 'Web Hogar Privado', 'tipo_habilidad' => 'Online Privado', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 Web Hogar Publico', 'habilidad' => 'Web Hogar Público', 'campana' => 'Web Hogar Público', 'tipo_habilidad' => 'Online Público', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 Web Móvil Privado', 'habilidad' => 'Web Móvil Privado', 'campana' => 'Web Móvil Privado', 'tipo_habilidad' => 'Online Privado', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 Web Móvil Publico', 'habilidad' => 'Web Móvil Público', 'campana' => 'Web Móvil Público', 'tipo_habilidad' => 'Online Público', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'Ampliffica C2C Móvil', 'habilidad' => 'C2C Móvil', 'campana' => 'C2C Móvil', 'tipo_habilidad' => 'Online Público', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 11],
        ['name' => 'Konecta No Clientes y Portabilidad', 'habilidad' => 'No Clientes y Portabilidad', 'campana' => 'No Clientes y Portabilidad', 'tipo_habilidad' => 'Outbound', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 9],
        ['name' => 'SCCP Migraciones', 'habilidad' => 'Migraciones', 'campana' => 'Migraciones', 'tipo_habilidad' => 'Outbound', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 10],
        ['name' => 'SCCP Segundas Lineas', 'habilidad' => 'Segundas Líneas', 'campana' => 'Segundas Líneas', 'tipo_habilidad' => 'Outbound', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 10],
        ['name' => 'SCCP No Clientes y Portabilidad', 'habilidad' => 'No Clientes y Portabilidad', 'campana' => 'No Clientes y Portabilidad', 'tipo_habilidad' => 'Outbound', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 10],
        ['name' => 'A365 Fonocompras Móvil', 'habilidad' => 'Fonocompras Móvil', 'campana' => 'Fonocompras Móvil', 'tipo_habilidad' => 'Ventas Remotas', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'A365 Fonocompras Hogar', 'habilidad' => 'Fonocompras Hogar', 'campana' => 'Fonocompras Hogar', 'tipo_habilidad' => 'Ventas Remotas', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 8],
        ['name' => 'Konecta Re-Marketing Móvil ', 'habilidad' => 'Re-Marketing Móvil', 'campana' => 'Re-Marketing Móvil', 'tipo_habilidad' => 'Ventas Remotas', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 9],
        ['name' => 'Konecta Chat Móvil', 'habilidad' => 'Chat Móvil', 'campana' => 'Chat Móvil', 'tipo_habilidad' => 'Ventas Remotas', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 9],
        ['name' => 'SCCP VIP', 'habilidad' => 'VIP', 'campana' => 'VIP', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 5],
        ['name' => 'Konecta Perú S2S Hogar', 'habilidad' => 'S2S Hogar', 'campana' => 'S2S Hogar', 'tipo_habilidad' => 'Front', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 3],
        ['name' => 'ECC Masivo', 'habilidad' => 'Masivo', 'campana' => 'Masivo', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 6],
        ['name' => 'SCCP Entel TV', 'habilidad' => 'Entel TV', 'campana' => 'Entel TV', 'tipo_habilidad' => 'Front', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 5],
        ['name' => 'Back Konecta Facturación Móvil', 'habilidad' => 'Back Facturación Móvil', 'campana' => 'Back Facturación Móvil', 'tipo_habilidad' => 'Front ', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 12],
        ['name' => 'Stic Back Ecommerce', 'habilidad' => 'Back Ecommerce', 'campana' => 'Back Ecommerce', 'tipo_habilidad' => 'Front ', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 13],
        ['name' => 'Stic Back Facturación Hogar', 'habilidad' => 'Back Facturación Hogar', 'campana' => 'Back Facturación Hogar', 'tipo_habilidad' => 'Front ', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 13],
        ['name' => 'Stic Back Facturación Móvil', 'habilidad' => 'Back Facturación Móvil', 'campana' => 'Back Facturación Móvil', 'tipo_habilidad' => 'Front ', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 13],
        ['name' => 'Stic Back Sernac Subtel', 'habilidad' => 'Back Sernac Subtel', 'campana' => 'Back Sernac Subtel', 'tipo_habilidad' => 'Front ', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 13],
        ['name' => 'Stic Back Tecnico', 'habilidad' => 'Back Tecnico', 'campana' => 'Back Tecnico', 'tipo_habilidad' => 'Front ', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 13],
        ['name' => 'SCCP Retenciones N2 - Hogar', 'habilidad' => 'Retenciones N2 - Hogar', 'campana' => 'Retenciones N2 - Hogar', 'tipo_habilidad' => 'Front', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 14],
        ['name' => 'SCCP Retenciones N2 - Móvil', 'habilidad' => 'Retenciones N2 - Móvil', 'campana' => 'Retenciones N2 - Móvil', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 14],
        ['name' => 'SCCP Retenciones N3 - Hogar', 'habilidad' => 'Retenciones N3 - Hogar', 'campana' => 'Retenciones N3 - Hogar', 'tipo_habilidad' => 'Front', 'mercado' => 'Hogar', 'status' => '1', 'servicio_id' => 14],
        ['name' => 'SCCP Retenciones N3 - Móvil', 'habilidad' => 'Retenciones N3 - Móvil', 'campana' => 'Retenciones N3 - Móvil', 'tipo_habilidad' => 'Front', 'mercado' => 'Móvil', 'status' => '1', 'servicio_id' => 14],

    ];

}
