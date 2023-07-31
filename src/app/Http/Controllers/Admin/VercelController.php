<?php

namespace Backpack\Vercel\app\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

use Backpack\Vercel\app\Models\Vercel;

class VercelController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function redeploy()
    {
       $vercel = new Vercel();
       $status = $vercel->redeploy();

       return redirect()->back();
    }

    public function vercel()
    {
      $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.admin')     => backpack_url('dashboard'),
            "Vercel" => false,
        ];
        
        $vercel = new Vercel();
        $this->data['deployments'] = $vercel->getDeployments();

        //dd($deployments);
        return view('backpack-vercel::base.vercel', $this->data);
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(backpack_url('dashboard'));
    }
}
