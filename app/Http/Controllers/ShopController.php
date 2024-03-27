<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index()
    {
        $shop = Shop::with('images')->paginate(2);
    return view('shop.index', compact('shop'));
    }
    public function live()
    {
        $shops = Shop::with('images')->get();
        return view('shop.live', compact('shops'));
    }
    public function block()
    {
        $shops = Shop::all();
        return view('shop.block', compact('shops'));
    }

    public function view($id)
    {
        // $shop = Shop::findOrFail($id);
        $shop = Shop::with('images')->find($id);
        return view('shop.show', compact('shop'));
    }

    public function add()
    {
        return view('shop.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'shop_name' => 'required',
            'contact' => 'required|numeric',
            'address' => 'required',
            'status' => 'required',
            // 'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for image files
        ], [
            'shop_name.required' => 'The name field is required.',
            'contact.required' => 'The amount field is required.',
            'contact.numeric' => 'The amount must be a number.',
            'address.required' => 'The quantity field is required.',
            'status.required' => 'The status field is required.',
            'image.*.required' => 'The image field is required.',
            'image.*.image' => 'The file must be an image.',
            'image.*.mimes' => 'The file must be a file of type: jpeg, png, jpg, gif.',
            'image.*.max' => 'The file may not be greater than 2048 kilobytes.',
        ]);

        $shop = new Shop();
        $shop->shop_name = $request->shop_name;
        $shop->contact = $request->contact;
        $shop->address = $request->address;
        $shop->status = $request->status;
        $shop->save();

        foreach ($request->file('image') as $imagefile) {
            $image = new Image;
            $path = $imagefile->store('shops', ['disk' => 'my_files']);
            $image->url = $path;
            $image->shop_id = $shop->id;
            $image->save();
        }

        return redirect('/dashboard')->with('success', 'Shop created successfully.');
    }




    public function edit($id)
    {
        $shop = Shop::with('images')->find($id);
        return view('shop.edit', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'shop_name' => 'required',
            'contact' => 'required|numeric',
            'address' => 'required',
            'status' => 'required',
        ], [
            'shop_name.required' => 'The name field is required.',
            'contact.required' => 'The amount field is required.',
            'contact.numeric' => 'The amount must be a number.',
            'address.required' => 'The quantity field is required.',
            'status.required' => 'The status field is required.',
        ]);

        $shop = Shop::findOrFail($id);
        $shop->shop_name = $request->shop_name;
        $shop->contact = $request->contact;
        $shop->address = $request->address;
        $shop->status = $request->status;
        $shop->update();

        // Delete old images
        if (count($request->file('image') ?? []) > 0) {
            $shop->images()->delete();
        }

        // Save new images
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $imagefile) {
                $image = new Image;
                $path = $imagefile->store('shops', ['disk' => 'my_files']); // Remove 'public/' from the path
                $image->url = $path;
                $image->shop_id = $shop->id;
                $image->save();
            }
        }

        return redirect('/dashboard')->with('success', 'Shop updated successfully.');
    }

    public function downloadSh($id)
    {
        // Find the shop by ID along with its images
        $shop = Shop::with('images')->find($id);
        
        $dompdf = new Dompdf();
        $pdfContent = '<h1>Shop Details</h1>';
        //  dd($shop->shop_name, $shop->contact);
        $pdfContent .= '<p>Name: ' . $shop->shop_name . '</p>';
        $pdfContent .= '<p>Contact: ' . $shop->contact . '</p>';
        $pdfContent .= '<p>Address: ' . $shop->address . '</p>';

        // Add images to the PDF
        foreach ($shop->images as $image) {
            $imagePath = $image->url;
            $fullPath = Storage::disk('my_files')->path($imagePath);
            $imageData = file_get_contents($fullPath);
            $imageBase64 = base64_encode($imageData);
           
            if (Storage::disk('my_files')->exists($imagePath)) {
                // Embed the image in the PDF content
                $pdfContent .= '<img src="data:image/jpeg;base64,' . $imageBase64 . '" alt="shop' . basename($imagePath) . '" style="width: 100px; height:100px;" /><br>';
                // dd($pdfContent);
            }
        }

        // Load HTML content into the Dompdf instance
        $dompdf->loadHtml($pdfContent);

        // Render the PDF
        $dompdf->render();

        // Generate a unique filename
        $filename = 'shop_details_' . $shop->id . '.pdf';

        // Download the PDF file
        return $dompdf->stream($filename);
    }



    public function delete($id)
    {
        $shop = Shop::with('images')->find($id);

        // Delete images associated with the shop
        foreach ($shop->images as $image) {
            $image->delete();
        }

        // Delete the shop
        $shop->delete();

        return redirect('/dashboard')->with('success', 'Shop deleted successfully.');
    }

}
