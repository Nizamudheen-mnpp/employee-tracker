<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        return view('pages.users');
    }
    public function list(Request $request){
        
        $result = User::with('department','designation');

        $search = $request->search;

        if (!empty($search)) {
            $result->where('name', 'LIKE', "%{$search}%")
                ->orWhereHas('department', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('designation', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        }
        
        $results = $result->get();
        return apiResponse(0,'success',$results);
    }
}
