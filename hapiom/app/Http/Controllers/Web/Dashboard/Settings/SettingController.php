<?php

namespace App\Http\Controllers\Web\Dashboard\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AdminSetting;

class SettingController extends Controller
{
    public function index()
    {
        $agreement = AdminSetting::where('sname', 'agreement')->first();
        $agreementText = isset($agreement) ? $agreement->svalue : "";
        $privacy = AdminSetting::where('sname', 'privacy')->first();
        $privacyText = isset($privacy) ? $privacy->svalue : "";
        $termsofuse = AdminSetting::where('sname', 'termsofuse')->first();
        $termsofuseText = isset($termsofuse) ? $termsofuse->svalue : "";
        return view('dashboard.pages.settings.index', compact('agreementText', 'privacyText', 'termsofuseText'));
    }

    public function saveAgreement(Request $request)
    {
        $agreementText = $request->input('signup_agreement');

        $agreement = AdminSetting::where('sname', 'agreement')->first();
        if (is_null($agreement))
        {
            $agreement = new AdminSetting;
            $agreement->sname = "agreement";
        }
        $agreement->svalue = $agreementText;
        $agreement->save();

        if (isset($agreement->id))
        {
            flashWebResponse('updated', 'User Sign-up Agreement Text');
            return redirect()->route('admin-settings');
        }

        flashWebResponse('error');
        return redirect()->back();
    }

    public function privacy()
    {
        $privacy = AdminSetting::where('sname', 'privacy')->first();
        $privacyText = isset($privacy) ? $privacy->svalue : "";
        return view('dashboard.pages.settings.privacy', compact('privacyText'));
    }

    public function savePrivacy(Request $request)
    {
        $privacyText = $request->input('privacy');

        $privacy = AdminSetting::where('sname', 'privacy')->first();
        if (is_null($privacy))
        {
            $privacy = new AdminSetting;
            $privacy->sname = "privacy";
        }
        $privacy->svalue = $privacyText;
        $privacy->save();

        if (isset($privacy->id))
        {
            flashWebResponse('updated', 'Privacy Policy Text');
            return redirect()->route('admin-settings');
        }

        flashWebResponse('error');
        return redirect()->back();
    }

    public function termsofuse()
    {
        $termsofuse = AdminSetting::where('sname', 'termsofuse')->first();
        $termsofuseText = isset($termsofuse) ? $termsofuse->svalue : "";
        return view('dashboard.pages.settings.termsofuse', compact('termsofuseText'));
    }

    public function saveTermsofUse(Request $request)
    {
        $termsofuseText = $request->input('termsofuse');

        $termsofuse = AdminSetting::where('sname', 'termsofuse')->first();
        if (is_null($termsofuse))
        {
            $termsofuse = new AdminSetting;
            $termsofuse->sname = "termsofuse";
        }
        $termsofuse->svalue = $termsofuseText;
        $termsofuse->save();

        if (isset($termsofuse->id))
        {
            flashWebResponse('updated', 'Terms of Use Text');
            return redirect()->route('admin-settings');
        }

        flashWebResponse('error');
        return redirect()->back();
    }
}
