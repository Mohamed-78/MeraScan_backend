<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRcodeController extends Controller
{
    public function index()
    {
        $employes = Employe::all();

        return view('welcome', compact('employes'));
    }

    public function generate(Request $request)
    {
        $employe = New Employe();
        $employe->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->email = $request->email;
        $employe->fonction = $request->fonction;
        $employe->slug = Str::slug(Hash::make($employe->nom), "-", 'Qrcode');

        $image = QrCode::format('png')->size(200)->style('dot')->eye('circle')->margin(3)->generate($employe->slug.'-MerakyTech');
        $output_file = 'qrcode-' . $request->nom . '.png';
        Storage::disk('public')->put($output_file, $image);

        $employe->qrcode = $output_file;

        $employe->save();

        return back();
    }
}
