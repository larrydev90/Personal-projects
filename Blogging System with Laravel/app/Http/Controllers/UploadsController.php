<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadsController extends Controller
{
    public function index() {
        return view('uploads.upload');
    }

    public function upload(Request $request) {
        $request->photo->store('public');
        return "File uploaded!";
    }
}
