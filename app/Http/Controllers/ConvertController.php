<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\ConvertHelper;
use Storage;

class ConvertController extends Controller
{
    private  $image_ext = ['gif', 'jpg', 'png', 'webp'];

    public function index()
    {
        return view('index')->with('options', $this->image_ext);
    }

    public function convert(Request $request)
    {
        $file = $request->file('file');
        $full_name = $file->getClientOriginalName();
        $name = pathinfo($full_name, PATHINFO_FILENAME);

        Storage::putFileAs('public', $file, $full_name);
        $result = ConvertHelper::convert(public_path() . '\\storage\\' . $full_name, $request->to, $name);

        if(!$result['success'])
            return view('index')->with('options', $this->image_ext)->with('error', $result['desc']);

        return response()->download($result['link']);
    }
}
