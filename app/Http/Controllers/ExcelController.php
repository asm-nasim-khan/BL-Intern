<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController extends Controller
{
    public function readExcel()
    {
        // Path to the Excel file
        $excelFile = public_path('Students.xlsx');

        // Load the Excel file
        $spreadsheet = IOFactory::load($excelFile);
        $sheetIndex = 0;
        $spreadsheet->setActiveSheetIndex($sheetIndex);
        

        // Get the first worksheet in the Excel file
        $worksheet = $spreadsheet->getActiveSheet();
        // Get and print the sheet name
        $sheetName = $worksheet->getTitle();
        if ($sheetName == 'test') {
           echo 'This is your desired Sheet. You have found it!';
         }

        //
        // Load the Excel file
        // $spreadsheet = IOFactory::load($excelFile);

        // // Set the index of the sheet you want to switch to (0-based index)
        // $sheetIndex = 1; // for example, to switch to the second sheet, use index 1

        // // Set the active sheet by index
        // $spreadsheet->setActiveSheetIndex($sheetIndex);

        // // Get the active sheet
        // $worksheet = $spreadsheet->getActiveSheet();
        //

        // Get the highest row and column in the worksheet
       // Get the highest row and column in the worksheet
        // Get the highest row and column in the worksheet
        $highestRow = $worksheet->getHighestRow();

        // // Find the highest non-empty row
        // while ($highestRow > 0) {
        //     // Check if any cell in the row has a value
        //     $cellValue = $worksheet->getCell('A' . $highestRow)->getValue();
        //     if (!empty($cellValue)) {
        //         break; // Break the loop if a non-empty cell is found
        //     }

        //     $highestRow--;
        // }

        // Now $highestRow contains the index of the highest non-empty row

        $highestColumn = Coordinate::columnIndexFromString($worksheet->getHighestColumn());

        // Find the highest non-empty column
        while ($highestColumn > 0) {
            $columnLetter = Coordinate::stringFromColumnIndex($highestColumn);

            // Check if any cell in the column has a value
            $cellValue = $worksheet->getCell($columnLetter . 1)->getValue();
            if (!empty($cellValue)) {
                break; // Break the loop if a non-empty cell is found
            }

            $highestColumn--;
        }

        // Now $highestColumn contains the index of the highest non-empty column

        
        $data = array();
        // Iterate through each row in the worksheet
        for ($row = 1; $row <= $highestRow; $row++) {
            $col_arr = array(); //Each row inside an array
            // Iterate through each column in the row
            $has_data = false;
            for ($col = 1; $col <= $highestColumn; $col++) {
                // Get the column letter from the column index
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                // Get the value of the current cell
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                // Output the cell value in a formatted way
                
                // if (!empty($cellValue)) {
                // array_push($col_arr,$cellValue);
                // }
                // print_r();
                $s = "|| ".gettype($cellValue) . " ||";
                printf($s); // Adjust the width as per your needs
                // echo '';
                array_push($col_arr,$cellValue);

            }
            // if there is atleast one value in this row, it means not an empty row
            $isEmpty = true;
            foreach ($col_arr as $col) {
                if (!empty($col)) {
                    $isEmpty = false;
                    break;
                }

            }

            if (!$isEmpty) {
            $data[] = $col_arr;
            }
            echo '</br>';
            echo '=================================================================================================================.</br>';
        }
        echo "\n";
        list($col_count , $row_count) = array(count($data),count($data[0]));
        echo '======================================================================= .</br>';
        foreach( $data as $row_item ) {
            foreach( $row_item as $cel_item ){
                print_r($cel_item.'|');
            }
            echo '</br>';
            echo '=================================================================================================================.</br>';
        }
    }


    public function createExcel()
    {
        // Create a new PhpSpreadsheet instance
        // $spreadsheet = new Spreadsheet();
        // Path to the Excel file
        $excelFile = public_path('Students.xlsx');

        // Load the Excel file
        $spreadsheet = IOFactory::load($excelFile);
        $sheetCount = $spreadsheet->getSheetCount();

        
        
        // dd($sheetCount);
        $newSheet = $spreadsheet->createSheet();
        $sheetCount = $spreadsheet->getSheetCount();
        // dd($sheetCount);

        // Set the title of the new sheet (optional)
        $newSheet->setTitle('newly_added');
        // $spreadsheet->setActiveSheetIndex($newSheet->$sheetCount);
        $spreadsheet->setActiveSheetIndex($sheetCount-1);
        // Now, you can work with the new sheet as the active sheet
        $sheet = $spreadsheet->getActiveSheet();
        // dd($sheet->getTitle());
        // // Set active sheet
        
        // $sheet = $spreadsheet->getActiveSheet();

        // Sample data to write to the Excel file
        $data = [
            [ 'Name', 'Age', 'Country' ],
            [ 'John', 30, 'USA' ],
            [ 'Jane', 25, 'UK' ],
            [ 'Doe', 40, 'Canada' ]
        ];

        // Populate cells with data
        foreach ($data as $row => $rowData) {
            foreach ($rowData as $col => $cellData) {
                $sheet->setCellValueByColumnAndRow($col + 1, $row + 1, $cellData);
            }
        }

        // Create a writer object
        $writer = new Xlsx($spreadsheet);

        // Set the file name and path to save the Excel file
        $excelFilePath = public_path('output.xlsx');

        // Save the spreadsheet to a file
        $writer->save($excelFilePath);

        return response()->download($excelFilePath)->deleteFileAfterSend(true);
        // return response($excelFilePath);

    }

}