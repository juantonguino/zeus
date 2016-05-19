<?php

namespace App\Utilities;

use DB;

class LogManager
{
    public static function insertLogUpdate($old_values, $new_values, $type, $user)
    {
        DB::insert("call insert_log_update('".$old_values."', '".$new_values."', '".$type."', '".$user."');");
    }

    public static function insertLogDelete($delete_values, $type, $user)
    {
        DB::insert("call insert_log_delete('".$user."', '".$delete_values."','".$type."');");
    }
}
