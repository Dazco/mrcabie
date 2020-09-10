<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPagesController extends Controller
{
    //
    public function page_get($type){
        $page = Page::where('type', $type)->first();
        return view("admin/pages/edit", compact("page", "type"));
    }

    public function page_post(Request $request, $type){
        $request->validate([
           'content' => 'required|string'
        ]);

        $page = Page::where('type', $type)->firstOrCreate([],['type' => $type, 'content' => '']);
        $page->update([
            'content' => $request->all()['content']
        ]);

        Session::flash("alert-success", ucfirst($type)." Page has successfully been updated");
        return redirect()->back();
    }

    public function services_get(){
        $services = Services::first();
        return view("admin/pages/services", compact( "services"));
    }

    public function services_post(Request  $request){
        $services = Services::firstOrCreate([],['local' => '', 'outstation' => '', 'oneway' => '']);
        $services->update([
            'local' => $request->local ?? '',
            'outstation' => $request->outstation ?? '',
            'oneway' => $request->oneway ?? ''
        ]);

        Session::flash("alert-success", "Services have successfully been updated");
        return redirect()->back();
    }
}
