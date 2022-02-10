<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $settings = [];

        $confSettings = Setting::get();

        foreach($confSettings as $confSetting){
            $settings[$confSetting['name']] = $confSetting['content'];
        }


        return view('admin.settings.index', [
            'settings' => $settings
        ]);
    }

    public function save(Request $request)
    {
        $data = $request->only([
            'title',
            'subtitle',
            'email',
            'bgcolor',
            'textcolor'
        ]);


        $validator = $this->validator($data);

        if($validator->fails()){
            return redirect()->route('settings')
                ->withErrors($validator);
        }

        foreach($data as $key => $value){
            Setting::where('name', $key)->update([
                'content' => $value
            ]);
        }

        return redirect()->route('settings')
            ->with('warning', 'Dados atualizados com sucesso');

    }

    protected function validator($rules)
    {
        return Validator::make($rules, [
            'title' => ['string', 'max:255'],
            'subtitle' => ['string', 'max:255'],
            'email' => ['string', 'email'],
            'bgcolor' => ['string', 'regex:/#[a-zA-Z0-9]{6}/i'],
            'textcolor' => ['string', 'regex:/#[a-zA-Z0-9]{6}/i']
        ]);
    }
}
