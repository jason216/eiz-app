<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ordersController extends Controller
{
	
	
    public function getOrders($id = null)
    {
		//print_r(app('request')->header('base_url'));exit;
		$user = json_decode(app('request')->header('sessionData'));
		return response()->json(['orders' => [$id, 'A', 'B', 'C']]);
    }
}