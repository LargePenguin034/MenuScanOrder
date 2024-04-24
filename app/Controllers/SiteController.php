<?php namespace App\Controllers;

use CodeIgniter\Controller;

class SiteController extends BaseController
{
    public function __construct()
    {
        // Load the URL helper, it will be useful in the next steps
        // Adding this within the __construct() function will make it 
        // available to all views in the SiteController
        helper('url'); 
    }

    public function index()
    {
        return view('landing_page');
    }

    public function table()
    {
        return view('table');
    }

    public function edit_menu()
    {
        return view('edit_menu');
    }

    public function menu($resturaunt_id)
    {
        return view('menu', $resturaunt_id);
    }

    public function orders()
    {
        return view('orders');
    }

}