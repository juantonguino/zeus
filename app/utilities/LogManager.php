<?php

namespace App\Utilities;

use DB;

class LogManager extends AnotherClass
{
    public function insertLogUpdate($old_values, $new_values, $type, $user)
    {
        DB::insert();
    }

    public function insertLogDelete($delete_values, $type, $user)
    {
        DB::insert("call insert_log_delete('".$user."', '".$delete_values."','".$type."');");
    }
}
