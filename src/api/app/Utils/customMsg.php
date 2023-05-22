<?php

namespace App\Utils;

function customMsg($error=false,$message='',$data=null){
return ['error'=>$error,'message'=>$message,'data'=>$data];
}