<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index() {

        $files = array_map('str_getcsv', file('content\2014\A_1_KH.csv'));
        unset($files[0]);
        $alllines = [];
        foreach ($files as $line) {
            array_push($alllines,explode(';',$line[0]));
        }
        //dd($files);
        return view('participation', [
            'data' => $alllines
            ]);
    }
}