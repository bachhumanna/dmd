<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Franchisee;
class FranchiseController extends Controller {
    public function franchiselist(){
        $allfranchise = Franchisee::select('id', 'name')->get()->toArray();
        return response()->json(['response' => 1, 'data' => $allfranchise]);
    }
}
