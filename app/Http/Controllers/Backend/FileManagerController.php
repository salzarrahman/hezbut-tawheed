<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Contracts\View\Factory;
use  Illuminate\Contracts\View\View;
use  Illuminate\Contracts\Foundation\Application;

class FileManagerController extends Controller
{

    public function index(): Factory|View|Application
    {
        return view('backend.uploaded_files.index');
    }
}
