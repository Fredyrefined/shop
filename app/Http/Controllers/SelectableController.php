<?php

namespace App\Http\Controllers;
use App\Models\PDFData;
use PDF;
use Illuminate\Support\Facades\File;
use App\PDFGenerate;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class SelectableController extends Controller
{
    public function index()
    {
     
    return view('searchable.searchable');
    }

    public function Date()
    {
     
    return view('searchable.date');
    }

    public function showpdf()
    {
    $pdfs = PDFData::get();
    return view('pdf.showpdf', compact('pdfs'));
    }

    public function downloadPDF($id) {
        $pdfs = PDFData::find($id);
        // dd($pdfs->date);
        $pdf = PDF::loadView('pdf.downpdf', compact('pdfs'));
        
        // Generate a filename for the downloaded PDF, e.g., based on the data ID or any other relevant information
        $filename = 'pdf_' . $id . '.pdf';
    
        // Download the PDF with the specified filename
        return $pdf->download($filename);
    }
    
    public function getData(Request $request)
    {
        $jsonData = File::get(base_path('storage/options/op-set-1.json')); 
        $options = json_decode($jsonData, true)['options'];
        return response()->json($options);
        
    }

    public function switchModes(Request $request)
    {
        // Logic to toggle between dark and light themes
        if (session('theme') == 'dark') {
            session(['theme' => 'light']);
        } else {
            session(['theme' => 'dark']);
        }

        return redirect()->back(); // Redirect back to the previous page
    }
    
    
    

}
    

