<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RefundHistory;
use App\Http\Controllers\Controller;

class RefundHistoryController extends Controller
{
    public function index()
    {
        $histories = RefundHistory::latest()->get();
        return view('admin.refundhistory.index', compact('histories'));
    }
}
