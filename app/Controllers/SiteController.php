<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use function PHPSTORM_META\type;

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
        $menuModel = new \App\Models\MenuModel();
        $typeModel = new \App\Models\TypeModel();

        if ($this->request->getMethod() === 'POST') {
            // Retrieve the submitted form data.
            $data = $this->request->getPost();
            $data['restaurant_id'] = $restaurant_id;
            if ($data['action'] == 'Delete') {
                if ($menuModel->delete($data['item_id'])) {
                    if (!$menuModel->where("restaurant_id", $restaurant_id)->where('type', $data['type'])->find()) {
                        $type_to_delete = $typeModel->where("restaurant_id", $restaurant_id)->where("type", $data['type'])->find();
                        if ($type_to_delete) {
                            $typeModel->delete($type_to_delete[0]['type_id']);
                        }
                    }
                }
            } elseif ($data['action'] == 'Modify') {
                if (!$data['item_id']) {
                    if (!$typeModel->where("type", $data['type'])->where("restaurant_id", $restaurant_id)->find()) {
                        #if (is_int($data['type'])) {
                        #    $newtype["type"] = $data['type'] . "";
                        #}
                        $newtype["type"] = $data['type'];
                        $newtype['restaurant_id'] = $restaurant_id;
                        $typeModel->insert($newtype);
                    }
                    $menuModel->insert($data);
                } else {
                    $menuModel->update($data['item_id'], $data);
                }
            }
        }

        return view('edit_menu', $this->menu_data($restaurant_id));
    }



    public function edit_name($restaurant_id)
    {
        $restaurantModel = new \App\Models\RestaurantModel();
        $data = $this->request->getPost();
        $restaurantModel->update($restaurant_id, $data);
        return view('edit_menu', $this->menu_data($restaurant_id));
    }

    public function edit_type($restaurant_id)
    {
        $typeModel = new \App\Models\TypeModel();
        $data = $this->request->getPost();
        $typeModel->update($data["type_id"], $data);
        return view('edit_menu', $this->menu_data($restaurant_id));
    }

    public function menu_data($restaurant_id)
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
            $data["_" . $type['type']] = $menuModel->where("restaurant_id", $restaurant_id)->where("type", $type['type'])->findAll();
        }

        $data['Drinks'] = $menuModel->where("restaurant_id", $restaurant_id)->where("type", 'Drinks')->findAll();


        return $data;
    }

    public function menu($restaurant_id)
    {
        return view('menu', $this->menu_data($restaurant_id));
    }

    public function orders()
    {
        return view('orders');
    }
}
