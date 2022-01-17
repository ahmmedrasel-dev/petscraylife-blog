<?php

namespace App\Http\Controllers;

use App\Models\Siteinfo;
use App\Models\Weblogo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
  public function settings()
  {
    return view('backend.settings.settings', [
      'logo' => Weblogo::first(),
    ]);
  }


  public function settingsPost(Request $request)
  {
    $logocout = Weblogo::count();
    if ($logocout < 1) {
      if ($request->hasFile('main_logo')) {
        // Main Logo Uploaded
        $mainLogo = $request->file('main_logo');
        $mainLogo_name = 'main_logo' . '-' . random_int(1, 1000) . '.' . $mainLogo->getClientOriginalExtension();
        Image::make($mainLogo)->save('backend-assets/upload_images/logo/' . $mainLogo_name);
        $logomain = 'backend-assets/upload_images/logo/' . $mainLogo_name;

        $logo = new Weblogo;
        $logo->main_logo = $logomain;
        $logo->save();
      } else if ($request->hasFile('footer_logo')) {
        $footerlogo = $request->file('footer_logo');
        $footerlogoName = 'footer_logo' . '-' . random_int(1, 1000) . '.' . $footerlogo->getClientOriginalExtension();
        Image::make($footerlogo)->save('backend-assets/upload_images/logo/' . $footerlogoName);
        $footerlogoPath = 'backend-assets/upload_images/logo/' . $footerlogoName;

        $logo = new Weblogo;
        $logo->footer_logo = $footerlogoPath;
        $logo->save();
      }
    } else {
      $logo = Weblogo::where('id', 1)->first();

      if ($request->hasFile('main_logo')) {
        // Main Logo Uploaded
        $mainLogo = $request->file('main_logo');
        $mainLogo_name = 'main_logo' . '-' . random_int(1, 1000) . '.' . $mainLogo->getClientOriginalExtension();
        Image::make($mainLogo)->save('backend-assets/upload_images/logo/' . $mainLogo_name);
        $logomain = 'backend-assets/upload_images/logo/' . $mainLogo_name;
        $logo->main_logo = $logomain;
        $logo->save();
      } else if ($request->hasFile('footer_logo')) {
        $footerlogo = $request->file('footer_logo');
        $footerlogoName = 'footer_logo' . '-' . random_int(1, 1000) . '.' . $footerlogo->getClientOriginalExtension();
        Image::make($footerlogo)->save('backend-assets/upload_images/logo/' . $footerlogoName);
        $footerlogoPath = 'backend-assets/upload_images/logo/' . $footerlogoName;
        $logo->footer_logo = $footerlogoPath;
        $logo->save();
      }
    }

    // if ($request->file('main_logo') !== null) {
    //   // Main Logo Uploaded
    //   $mainLogo = $request->file('main_logo');
    //   $mainLogo_name = 'main_logo' . '-' . random_int(1, 1000) . '.' . $mainLogo->getClientOriginalExtension();
    //   Image::make($mainLogo)->save('backend-assets/upload_images/logo/' . $mainLogo_name);
    //   $logomain = 'backend-assets/upload_images/logo/' . $mainLogo_name;

    //   $logo = new Weblogo;
    //   $logo->main_logo = $logomain;
    //   $logo->save();
    // } elseif ($request->file('footer_logo') !== null) {
    //   // Footer Logo
    //   $footerlogo = $request->file('footer_logo');
    //   $footerlogoName = 'footer_logo' . '-' . random_int(1, 1000) . '.' . $footerlogo->getClientOriginalExtension();
    //   Image::make($footerlogo)->save('backend-assets/upload_images/logo/' . $footerlogoName);
    //   $footerlogoPath = 'backend-assets/upload_images/logo/' . $footerlogoName;

    //   $logo = new Weblogo;
    //   $logo->footer_logo = $footerlogoPath;
    //   $logo->save();
    // }

    // // Website Information
    // $siteinfo = new Siteinfo;
    // $siteinfo->site_title = $request->site_title;
    // $siteinfo->meta_description = $request->meta_description;
    // $siteinfo->copyright_text = $request->copyright;
    // $siteinfo->save();
    // return back();
  }
}
