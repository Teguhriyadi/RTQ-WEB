<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaturanController extends Controller
{
    public function pengaturan()
    {
        return view("app.super_admin.pengaturan.v_database");
    }

    public function download_database()
    {
        // $tables = array();

        // $result = DB::select("SHOW TABLES");

        // echo $result;

        // die();
        // foreach ($result as $row) {
        //     echo $tables[] = $row[0];
        // }

        // die();

        // $return = "";
        // foreach ($tables as $tb) {
        //     $result = DB::select("SELECT * FROM " . $tb);

        //     $num_fields = mysqli_num_fields($result);

        //     $return .= "DROP TABLE " . $tb . ';';
        //     $row2 = mysqli_fetch_row($con->query("SHOW CREATE TABLE " . $tb));
        //     $return .= "\n\n" . $row2[1] . ";\n\n";

        //     for ($i = 0; $i < $num_fields; $i++) {
        //         while ($row = mysqli_fetch_row($result)) {
        //             $return .= "INSERT INTO " . $tb . "VALUES (";
        //             for ($j = 0; $j < $num_fields; $j++) {
        //                 $row[$j] = addslashes($row[$j]);
        //                 if (isset($row[$j])) {
        //                     $return .= '"' . $row[$j] . '"';
        //                 } else {
        //                     $return .= '""';
        //                 }

        //                 if ($j < $num_fields - 1) {
        //                     $return .= ',';
        //                 }
        //             }
        //             $return .= ");\n";
        //         }
        //     }
        //     $return .= "\n\n\n";
        // }

        // $now = date("His");
        // $handle = fopen("backup" . $now . ".sql", "w+");
        // fwrite($handle, $return);
        // fclose($handle);
        // echo "Sukses";
    }
}
