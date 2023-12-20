<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shortlink;

class ShortlinkController extends Controller
{
    public function shortURL(Request $request){
        $url = Shortlink::create([
            'long_url' => $request->long_url,
            'short_url' => $request->short_url,
            'code' => $request->code,
        ]); 
        if($url){
            return response()->json(['message' => 'url terdaftar', $url, 200]);
        }else{
            return response()->json(['message' => 'gagal', 400]);
        }
    }
    public function redirectLongURL(Request $request, $code)
    {
        $shortlink = Shortlink::where('code', $code)->first();

        if ($shortlink) {
            return redirect($shortlink->long_url);
        } else {
            // Jika code tidak ditemukan, Anda dapat mengembalikan response 404 atau tindakan lain sesuai kebutuhan aplikasi Anda.
            return response()->json(['message' => 'Not Found', 404]);
        }
    }
}
