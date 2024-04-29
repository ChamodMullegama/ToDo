<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use domain\Facades\BannerFacade;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index()
    {
        $response['banners'] = Banner::all();
        return view('pages.banner.index')->with($response);
    }

    public function store(Request $request)
    {

        BannerFacade::store($request->all());
        return redirect()->back();
    }

    public function delete($task_id)
    {
        BannerFacade::delete($task_id);
        return redirect()->back();
    }

    public function status($task_id)
    {

        BannerFacade::status($task_id);
        return redirect()->back();
    }
}
