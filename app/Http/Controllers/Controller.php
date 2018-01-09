<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
}













// function create1(Request $req)
// {
//     $title = $req->input('title');
//     $description = $req->input('description');
//     $information = $req->input('information');
   

//     $data = array("title"=>$title,"description"=>$description,"information"=>$information);
    
//     DB::table('tasks')->insert($data);

//     echo("SUCCESS");
    
// }