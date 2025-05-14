<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\Usersinfo;
use App\Models\Upload;

class ReportController extends Controller
{
    public function index()
    {
        $fileTypes = Upload::select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->get();

        $userRegistrations = Usersinfo::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, count(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $birthYears = Usersinfo::selectRaw('YEAR(birthday) as year, count(*) as count')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        $fileUploads = Upload::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, count(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('reports', compact('fileTypes', 'userRegistrations', 'birthYears', 'fileUploads'));
    }
}
