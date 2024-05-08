<?php

namespace App\Controllers;

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

    public function edit_menu($restaurant_id)
    {
        $restaurantModel = new \App\Models\RestaurantModel();
        $menuModel = new \App\Models\MenuModel();
        $typeModel = new \App\Models\TypeModel();

        if ($this->request->getMethod() === 'POST') {
            // Retrieve the submitted form data.
            $data['new'] = $this->request->getPost();
            $data['new']['restaurant_id'] = $restaurant_id;
            if (!$data['new']['item_id']) {
                if (!$typeModel->where("type", $data['new']['type'])->where("restaurant_id", $restaurant_id)->find()) {
                    $typeModel->insert($data['new']);
                }
                $menuModel->insert($data['new']);
            } else {
                $menuModel->update($data['new']['item_id'], $data['new']);
            }
        }

        $data['restaurant'] = $restaurantModel->find($restaurant_id);


        if (!$data['restaurant']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Restaurant Not Found');
        }

        $data['types'] = $typeModel->where("restaurant_id", $restaurant_id)->findAll();

        foreach ($data['types'] as $type) {
            $data[$type['type']] = $menuModel->where("restaurant_id", $restaurant_id)->where("type", $type['type'])->findAll();
        }

        $data['Drinks'] = $menuModel->where("restaurant_id", $restaurant_id)->where("type", 'Drinks')->findAll();

        return view('edit_menu', $data);
    }


    public function menu($restaurant_id)
    {
        $restaurantModel = new \App\Models\RestaurantModel();
        $menuModel = new \App\Models\MenuModel();
        $typeModel = new \App\Models\TypeModel();

        $data['restaurant'] = $restaurantModel->find($restaurant_id);


        if (!$data['restaurant']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Restaurant Not Found');
        }

        $data['types'] = $typeModel->where("restaurant_id", $restaurant_id)->findAll();

        foreach ($data['types'] as $type) {
            $data[$type['type']] = $menuModel->where("restaurant_id", $restaurant_id)->where("type", $type['type'])->findAll();
        }

        $data['Drinks'] = $menuModel->where("restaurant_id", $restaurant_id)->where("type", 'Drinks')->findAll();


        return view('menu', $data);
    }

    public function orders()
    {
        return view('orders');
    }
}
