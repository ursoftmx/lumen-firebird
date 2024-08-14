<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Firebird\City;

class CityController extends Controller
{
    public function paging()
    {
        try {
            $results = City::paginate(50);
            return response()->json($results, 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function byId(
        $id
    ) {
        try {
            $result = City::find($id);
            return response()->json($result, 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
