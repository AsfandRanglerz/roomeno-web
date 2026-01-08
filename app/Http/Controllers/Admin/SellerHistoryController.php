<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SellerHistory;
use App\Http\Controllers\Controller;

class SellerHistoryController extends Controller
{
    public function index()
    {
        $histories = SellerHistory::latest()->get();
        return view('admin.sellerhistory.index', compact('histories'));
    }
}
