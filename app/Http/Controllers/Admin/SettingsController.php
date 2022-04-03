<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Response;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller{

    function updateSettings(Request $request){
        $settings = Setting::all();
        if(count($settings) < 0) return Response::redirectBack('error', 'App Configuration has not been set');
        $settings[0]->update($request->all());

        return Response::redirectBack('success', "App Configuration updated");
    }

    function appSettings(Request $request){
        $settings = Setting::all();
        return Response::view('admin.app-settings', [
            'settings' => $settings[0]
        ]);
    }

}
