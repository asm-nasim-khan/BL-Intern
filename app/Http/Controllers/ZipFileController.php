<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ExtentionController;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ZipFileController extends Controller
{
    public function createZip()
    {
        $files = ['mySample.xml', 'newfile.txt']; // Replace these with your actual file names

        $zip = new \ZipArchive();
        $zipFileName = 'compressed_files.zip'; // Replace with your desired zip file name

        if ($zip->open($zipFileName, \ZipArchive::CREATE) === TRUE) {
            foreach ($files as $file) {
                $zip->addFile($file);
            }

            $zip->close();
            echo 'Files compressed successfully into ' . $zipFileName;
} else {
    echo 'Failed to create zip archive';
}
    }
}
