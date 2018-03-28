<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function downloadManual($dataYear) {
        $file= "/content/$dataYear/manual/G-DRG-Begleitforschungsbrowser$dataYear.pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return redirect($file);
        //return response()->download($file, 'G-DRG-Begleitforschungsbrowser.pdf', $headers);
    }

    public function downloadData($dataYear) {
        $file= "/content/$dataYear/download/Begleit-Daten-$dataYear.zip";
        $headers = array(
            'Content-Type: application/zip',
        );
        return redirect($file);
        //return response()->download($file, 'Begleit-Daten.zip', $headers);
    }
}
