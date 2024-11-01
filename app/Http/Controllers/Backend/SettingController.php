<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function settingForm($id)
    {
        $data = Setting::find($id);

        return view('backend.setting.main', compact('data'));
    }

    public function settingStore(Request $request, $id)
    {
        $data = Setting::find($id);

        if($request->hasFile('logo_1')) {
            $file1 = $request->file('logo_1');
            $filename1 = time() . '.' . $file1->getClientOriginalExtension();
            $request->file('logo_1')->move(storage_path("app/public/referensi/pengaturan/logo"), $filename1);
            $data->logo_1 = 'referensi/pengaturan/logo/' . $filename1;
        }

        if($request->hasFile('logo_2')) {
            $file2 = $request->file('logo_2');
            $filename2 = time() . '.' . $file2->getClientOriginalExtension();
            $request->file('logo_2')->move(storage_path("app/public/referensi/pengaturan/logo"), $filename2);
            $data->logo_2 = 'referensi/pengaturan/logo/' . $filename2;
        }

        if($request->hasFile('logo_3')) {
            $file3 = $request->file('logo_3');
            $filename3 = time() . '.' . $file3->getClientOriginalExtension();
            $request->file('logo_3')->move(storage_path("app/public/referensi/pengaturan/logo"), $filename3);
            $data->logo_3 = 'referensi/pengaturan/logo/' . $filename3;
        }

        $data->appname = $request->appname;
        $data->meta_description = $request->meta_description;
        $data->meta_keywords = $request->meta_keywords;
        $data->office_address = $request->office_address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->fax = $request->fax;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->instagram = $request->instagram;
        $data->theme_color = $request->theme_color;

        $data->update();

        return redirect()->back();
    }
}
