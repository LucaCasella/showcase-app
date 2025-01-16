<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function testRandomData(): JsonResponse
    {
        $randomData = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'address' => fake()->address(),
        ];


        return response()->json([
            'status' => 'success',
            'data' => $randomData
        ]);
    }
}
