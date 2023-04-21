<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ApiLogController extends Controller
{
    public function createAPILogFile($request,$method){
        $today = Carbon::now()->format('y_m_d');
        $text_name = $method.'_' . time() . '.txt';
        $url = 'API_CALL/'.$today.'/'.$text_name;
        $data = "";
        foreach($request as $id => $value){
            $data = $data."".$id." => ".$value."\n";
        }

        Storage::put($url, $data);
    }
}
