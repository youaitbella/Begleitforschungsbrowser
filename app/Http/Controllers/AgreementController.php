<?php

namespace App\Http\Controllers;

use Session;

class AgreementController extends Controller
{
    public function index() {
        return view('startpage');
    }

    public function agree() {
        Session::put('agreed', true);
        return view('startpage');
    }

    public function getAgreemend() {
        return view('agreement');
    }
}
