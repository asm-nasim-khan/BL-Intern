<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;
use Illuminate\Support\Facades\File;
class XmlController extends Controller
{
    public function readXmlFile()
    {
        // Specify the path to your XML file
        $filePath = public_path('mySample.xml');

        // Check if the file exists
        if (File::exists($filePath)) {
            // // Read the XML file
            // $xmlString = File::get($filePath);

            // // Parse the XML string
            // $xml = new SimpleXMLElement($xmlString);

            // // Do something with the XML data
            // // For example, you can loop through elsements
            // foreach ($xml->children() as $child) {
            //     // Process each element as needed
            //     // For example, you can access element values using $child->elementName
            //     // $child represents each child element in the XML
            // }

            // Return a response or view
            // return response()->json(['message' => 'XML file successfully read', 'data' => $xml]);
            return response()->json(['message' => 'XML file successfully read', 'data' => ""]);

        } else {
            // Return an error response if the file doesn't exist
            return response()->json(['error' => 'XML file not found'], 404);
        }
    }
}
