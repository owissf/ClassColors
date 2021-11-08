<?php 


namespace App\Http\Controllers;

use App\Service\FileService;
use Illuminate\Http\Client\Request;

class TestController extends Controller
{
    public function testFunction()
    {
        return response()->json(['data' => 'from test Contoller']);
    }

    public function testFunctionPost(Request $request)
    {
        FileService::saveFile($request, 'file');
        return response()->json(['data' => 'from test Post Contoller '. request()->name]);
    }
}

