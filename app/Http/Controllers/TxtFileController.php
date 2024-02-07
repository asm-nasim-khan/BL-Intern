<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TxtFileController extends Controller
{
    public function create(){
        echo 'Welcome <br>';
        $filename = 'text.txt';
        $file = fopen($filename,'w+');
        for($i = 0; $i < 1000; $i++){
            $data = 'Hello, This Is my line'.$i;
            fwrite($file,$data);
            fwrite($file,"\n");
            // printf("%d", $i);
        }
        $filesize = filesize($filename);
        // $filetext = fread($file,$filesize);
        
        fclose($file);
        for($i = 0; $i < 1000; $i++){
            // $data = 'Hello, This Is my line'.$i;
            // fwrite($file,$data);
            // fwrite($file,"\n");
            print_r($i);
        }
        return response()->download($filename)->deleteFileAfterSend(true);
        // $filename = 'text.txt';
        // $file = fopen($filename,'r');
        // // fwrite($file,'Hello, This Is my line');
        // $filesize = filesize($filename);
        // $filetext = fread($file,$filesize);
        // echo ( "File size : $filesize  bytes"."<br>" );
        // echo($filetext."<br>");
        // echo("file name: $filename"."<br>");
        // $arr = array('a', 'b', 'c');
        // foreach($arr as $key => $value){
        //     echo ''. $key .''. $value .'<br>';
        // }
        // $file = fopen('text.txt','r');
        



    }
}
