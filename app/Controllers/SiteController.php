<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use TCPDF;


use function PHPSTORM_META\type;

class SiteController extends BaseController
{
    public function __construct()
    {
        // Load the URL helper, it will be useful in the next steps
        // Adding this within the __construct() function will make it 
        // available to all views in the SiteController
        helper('url');
        $this->session = session();

    }

    /**
     * Loads the restaurant model and sets the resturant id in session to the origional
     * the renders the admin view
     * 
     */
    public function admin()
    {
        $_SESSION["restaurant_id"] = $_SESSION["admin_restaurant_id"];
        $restaurantModel = new \App\Models\RestaurantModel();
        $data['users'] = $restaurantModel->orderBy('username', 'ASC')->findAll();
        return view('admin', $data);
    }

    /**
     * @param int resturanut id
     * deletes the specivied resturant
     * then redirects to admin view
     * 
     */
    public function delete_restaurant($restaurant_id)
    {
        $restaurantModel = new \App\Models\RestaurantModel();
        $restaurantModel->delete($restaurant_id);

        $data['users'] = $restaurantModel->orderBy('username', 'ASC')->findAll();
        return redirect('admin');
    }

    /**
     * @param int resturanut id
     * sets the session to the specified restaurant
     * then redirects to the editing menu for the restauranut
     * 
     */
    public function admin_edit($restaurant_id)
    {
        $_SESSION["restaurant_id"] = $restaurant_id;
        return redirect('owner/edit');
    }

    /**
     * loads the index menu
     */
    public function index()
    {
        return view('landing_page');
    }

    public function table()
    {

        $restaurant_id = $_SESSION["restaurant_id"];
        $restaurantModel = new \App\Models\RestaurantModel();
        $data = $restaurantModel->where('restaurant_id', $restaurant_id)->find()[0];

        if ($this->request->getMethod() === 'POST') {
            $postData = $this->request->getPost();
            if ($postData['action'] == 'SET') {
                $data["tables"] = $postData["tableNo"];
            } else if ($postData['action'] == 'ADD') {
                $data["tables"] = $data["tables"] + 1;
            } else if ($postData['action'] == 'REMOVE') {
                if ($data["tables"] > 1) {
                    $data["tables"] = $data["tables"] - 1;
                }
            }
            $restaurantModel->update($restaurant_id, $data);
        }

        foreach (range(1, $data["tables"]) as $index) {
            $qrCode = QrCode::create('https://infs3202-a2db50f7.uqcloud.net/MenuScanOrder/menu/' . $restaurant_id . '/' . $index);
            $writer = new PngWriter;
            $data['qrcode'][$index] = $writer->write($qrCode)->getDataUri();
        }


        return view('table', $data);
    }

    public function downloadAll()
    {
        $restaurantModel = new \App\Models\RestaurantModel();
        $restaurant_id = $_SESSION["restaurant_id"];
        $data = $restaurantModel->where('restaurant_id', $restaurant_id)->find()[0];

        // Create new PDF document
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('MenuScanOrder');
        $pdf->SetTitle('Table PDF for ' . $data['name']);

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );


        // Add content
        foreach (range(1, $data['tables']) as $index) {

            if (($index - 1) % 4 == 0) {
                $pdf->AddPage();
            }

            if ($index % 4 == 0 || $index % 4 == 3) {
                $height = 100;
            } else {
                $height = 0;
            }

            if ($index % 2 == 0) {
                $pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,H', 105, $height + 10, 90, 90, $style);
                $pdf->Text(140, $height + 90, 'Table - ' . $index);
            } else {
                $pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,H', 10, $height + 10, 90, 90, $style);
                $pdf->Text(45, $height + 90, 'Table - ' . $index);
            }


        }

        // Output the PDF as a download 
        $pdf->Output('Table PDF for ' . $data['name'] . '.pdf', 'D');
    }

    public function downloadOne($table_no)
    {
        $restaurantModel = new \App\Models\RestaurantModel();
        $restaurant_id = $_SESSION["restaurant_id"];
        $data = $restaurantModel->where('restaurant_id', $restaurant_id)->find()[0];

        // Create new PDF document
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('MenuScanOrder');
        $pdf->SetTitle('Table PDF for ' . $data['name']);

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );

        $pdf->addPage();

        // Add content
        $pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,H', 60, 80, 90, 90, $style);
        $pdf->Text(95, 160, 'Table - ' . $table_no);


        // Output the PDF as a download 
        $pdf->Output('Table ' . $table_no . ' PDF for ' . $data['name'] . '.pdf', 'D');
    }


    public function edit_menu()
    {

        $restaurant_id = $_SESSION["restaurant_id"];
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



    public function edit_name()
    {
        $restaurant_id = $_SESSION["restaurant_id"];
        $restaurantModel = new \App\Models\RestaurantModel();
        $data = $this->request->getPost();
        $restaurantModel->update($restaurant_id, $data);
        return view('edit_menu', $this->menu_data($restaurant_id));
    }

    public function edit_type()
    {
        $restaurant_id = $_SESSION["restaurant_id"];
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


        return $data;
    }

    public function menu($restaurant_id, $table_no)
    {
        $data = $this->menu_data($restaurant_id);
        if ($data['restaurant']['tables'] < $table_no) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Table Not Found');
        }
        $data['table_no'] = $table_no;

        if ($this->request->getMethod() === 'POST') {
            $orderItemsModel = new \App\Models\OrderItemsModel();
            $ordersModel = new \App\Models\OrdersModel();

            $order['restaurant_id'] = $restaurant_id;
            $order['status'] = 'Cooking';
            $order['table'] = $table_no;
            $order['time_created'] = date('Y-m-d H:i:s', time());

            $orderItem['order_id'] = $ordersModel->insert($order);

            foreach ($this->request->getPost() as $item_id => $amount) {
                $orderItem['item_id'] = $item_id;
                $orderItem['amount'] = $amount;
                $orderItemsModel->insert($orderItem);
            }

        }

        return view('menu', $data);
    }

    public function orders()
    {
        $orderItemsModel = new \App\Models\OrderItemsModel();
        $ordersModel = new \App\Models\OrdersModel();
        $menuModel = new \App\Models\MenuModel();

        $restaurant_id = $_SESSION["restaurant_id"];

        if ($this->request->getMethod() === 'POST') {
            $order = $this->request->getPost();
            $update['status'] = 'Completed';
            $ordersModel->update($order['order_id'], $update);
        }

        $data['orders']['cooking'] = $ordersModel->where('restaurant_id', $restaurant_id)->where('status', 'Cooking')->findAll();
        $data['orders']['completed'] = $ordersModel->where('restaurant_id', $restaurant_id)->where('status', 'Completed')->findAll();
        $data['orders']['recalled'] = $ordersModel->where('restaurant_id', $restaurant_id)->where('status', 'Recalled')->findAll();

        foreach ($data['orders']['cooking'] as $order_id => $order) {
            $data['order_id'][$order['order_id']] = $orderItemsModel->where('order_id', $order['order_id'])->join('Menu', 'OrderItems.item_id=Menu.item_id')->findAll();
            $total = 0;
            foreach ($data['order_id'][$order['order_id']] as $item) {
                $total += $item['price'] * $item['amount'];
            }
            $data['orders']['cooking'][$order_id]['totalPrice'] = $total;
        }

        return view('orders', $data);
    }
}
