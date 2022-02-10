<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Visitor;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $visitorCount = 0;
        $onlineCount = 0;
        $pageCount = 0;
        $userCount = 0;
        $interval = intval($request->input('interval', 30));

        if($interval > 120){
            $interval = 120;
        }

        $dateInterval = date('Y-m-d H:i:s', strtotime('-'.$interval .' days'));
        $visitorCount = Visitor::where('data_access', '>=', $dateInterval)->count();

        $dateLimit = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $onlinelist = Visitor::select('ip')->where('data_access', '>=', $dateLimit)->groupBy('ip')->get();
        $onlineCount = count($onlinelist);

        $pageCount = Page::count();

        $userCount = User::count();


        $pagePie = [];
        $pagePieColors = [];
        $visitsAll = Visitor::selectRaw('page, count(page) as c')
            ->where('data_access', '>=', $dateInterval)
            ->groupBy('page')
            ->get();

        foreach($visitsAll as $visit){
            $pagePie[$visit['page']] = intval($visit['c']);
            $pagePieColors[] = 'rgba('.rand(0,255).','.rand(0,255).','.rand(0,255).')';
        }

        $pageLabels = json_encode(array_keys($pagePie));
        $pageValues = json_encode(array_values($pagePie));
        $pagePieColors = json_encode(array_values($pagePieColors));


        return view('admin.home', [
            'visitorCount' => $visitorCount,
            'onlineCount' => $onlineCount,
            'pageCount' => $pageCount,
            'userCount' => $userCount,
            'pageLabels' => $pageLabels,
            'pageValues' => $pageValues,
            'pagePieColors' => $pagePieColors,
            'dateInterval' => $interval
        ]);
    }
}
