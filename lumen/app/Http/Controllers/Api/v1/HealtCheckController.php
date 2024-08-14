<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class HealtCheckController extends Controller
{

    public function index()
    {
        try {
            $data = [
                'firebirdConnection' => !!DB::connection('firebird')->getPdo(),
                'postgreSqlConnection' => !!DB::connection('pgsql')->getPdo()
            ];
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
