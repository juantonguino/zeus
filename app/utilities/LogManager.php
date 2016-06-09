<?php

namespace App\Utilities;

use App\Cliente;

use App\Conductor;

use App\Dia;

use App\EmpresaTransporte;

use App\Grupo;

use App\Hotel;

use App\Proveedor;

use App\Reserva;

use App\Restaurante;

use App\TarifaHotel;

use App\User;

use DB;

class LogManager
{
    public static function insertLogUpdate($old_values, $new_values, $type, $user)
    {
        //dd($old_values, $new_values, $type, $user);
        $string_old=LogManager::createStringForValues($old_values);
        $string_new=LogManager::createStringForValues($new_values);
        //dd($string_old, $string_new);
        DB::insert("call insert_log_update('".$string_old."', '".$string_new."', '".$type."', '".$user."')");
    }

    public static function insertLogDelete($delete_values, $type, $user)
    {
        $cadena="call insert_log_delete('".$user."', '"."'$delete_values'"."','".$type."')";
        echo $cadena;
        DB::insert($cadena);
    }

    public static function createStringForValues($values)
    {
      $json=json_encode($values);
      //$arreglo=json_decode($json,true);
      //$string= implode(",",$arreglo);
      return $json;
    }
}
