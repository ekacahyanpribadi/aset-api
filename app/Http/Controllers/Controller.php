<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function respResult($code = null, $messege = null, $data = null)
    {
        date_default_timezone_set('Asia/Jakarta');
        $dateNow = date("Y-m-d H:i:s");
        header_remove();
        http_response_code($code);
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        header('Content-Type: application/json');
        $status = array(
            200 => '200',
            400 => '400',
            422 => '442',
            500 => '500'
        );
        header('Status: ' . $status[$code]);

        $jsonData = array(
            'code' => $code < 300,
            'timestamp' => $dateNow,
            'messege' => $messege,
            'data' => $data
        );
        echo json_encode($jsonData);
    }

    public function acakAngka($bdigit)
    {
        $var0 = str_split('0123456789'); // and any other characters
        shuffle($var0); // probably optional since array_is randomized; this may be redundant
        $var1 = '';
        foreach (array_rand($var0, $bdigit) as $var3)
            $var1 .= $var0[$var3];
        return $var1;
    }
    //MAKS 10 DIGIT
//echo acakAngka(10);

    public function acakHuruf($bdigit)
    {
        $var0 = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
        shuffle($var0); // probably optional since array_is randomized; this may be redundant
        $var1 = '';
        foreach (array_rand($var0, $bdigit) as $var3)
            $var1 .= $var0[$var3];
        return $var1;
    }

    public function getPk()
    {
        $var1 = date('YmdHis');
        $var2 = Controller::acakHuruf(6);
        $var = $var1 . $var2;

        return $var;
    }

    public function dateNow()
    {
        date_default_timezone_set('Asia/Jakarta');
        $dateNow = date("Y-m-d H:i:s");
        return $dateNow;
    }

    public function tokenAccess()
    {
        $tokenAccess = 'ZDwIspryCX3j7Lfdoo9B1rxjm2DfLerQsiVwJmrp3qDJYzVg0wj9iSrsTqaeFIcK';
        return $tokenAccess;
    }
}
