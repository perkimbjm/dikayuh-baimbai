<?php

namespace App\Http\Controllers;

use App\Models\ContentPage;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->ContentPage = new ContentPage();

    }

    public function index(Request $request)
    {
      
    }

    

    public function download()
    {

        $data = [
            'title'     => 'Download Peraturan',
            'download'  => $this->ContentPage->download(),
        ];

        return view('v_download', $data);
    }
}
