<?php

namespace App\Http\Controllers;
use App\Models\GeneratedQrCode;
use Illuminate\Http\Request;

class GeneratedQrCodeController extends Controller
{
    public function index()
    {
        return GeneratedQrCode::all();
    }
 
    public function show($id)
    {
        return GeneratedQrCode::find($id);
    }


    public function store(Request $request) {
        $qrcode = new GeneratedQrCode($request->all());
        $qrcode->qr_code_string = rand(100000, 999999);
        $qrcode->save();

        return $qrcode->qr_code_string;
    }

/*     public function update(Request $request, $id)
    {
        $qrcode = GeneratedQrCode::findOrFail($id);
        $qrcode->update($request->all());

        return $qrcode;
    }

    public function delete(Request $request, $id)
    {
        $qrcode = GeneratedQrCode::findOrFail($id);
        $qrcode->delete();

        return 204;
    } */
}
