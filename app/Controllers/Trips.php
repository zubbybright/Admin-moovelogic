<?php
namespace App\Controllers;

Use App\Helpers\Session;
Use App\Helpers\Url;
use System\BaseController;
use App\Models\Trip;

class Trips extends BaseController {

    protected $trip;
    public function __construct()
    {
        parent::__construct();
        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }
        $this->trip = new Trip();
    }
    public function index()
    {
        $trips = $this->trip->get_trips();
        $title = 'Trips';
        return $this->view->render('admin/trips/index', compact('trips', 'title'));
    }

    public function view($id)
    {
        if (! is_numeric($id)) {
            Url::redirect('/roles');
        }

        $trip = $this->trip->get_trip($id);

        if ($trip == null) {
            Url::redirect('/404');
        }

        $title = 'View Trip';
        $this->view->render('admin/trips/view', compact('trip',  'title'));
    }

    public function edit($id)
    {   
        if ( is_numeric($id)) {
            

        $trip = $this->trip->get_trip($id);

        if ($trip == null) {
            Url::redirect('/404');
        }

        $errors = [];

        if (isset($_POST['submit'])) {
            $current_location  = (isset($_POST['current_location']) ? $_POST['current_location'] : null);
            $start_location = (isset($_POST['description']) ? $_POST['description'] : null); 
            $end_location = (isset($_POST['end_location']) ? $_POST['end_location'] : null); 
            $cost_of_trip = (isset($_POST['cost_of_trip ']) ? $_POST['cost_of_trip '] : null); 
            $trip_status= (isset($_POST['trip_status']) ? $_POST['trip_status'] : null); 
            $recipient_name = (isset($_POST['recipient_name']) ? $_POST['recipient_name'] : null); 
            $recipient_phone_number = (isset($_POST['recipient_phone_number']) ? $_POST['recipient_phone_number'] : null); 
            $who_pays = (isset($_POST['who_pays']) ? $_POST['who_pays'] : null); 
            $payment_method = (isset($_POST['payment_method']) ? $_POST['payment_method'] : null); 
            $rider_id = (isset($_POST['rider_id']) ? $_POST['rider_id'] : null); 
            $customer_id = (isset($_POST['customer_id']) ? $_POST['customer_id'] : null); 
            $package_id = (isset($_POST['package_id']) ? $_POST['package_id'] : null); 
            $date = (isset($_POST['date']) ? $_POST['date'] : null); 

            if (count($errors) == 0) {

                $data = [
                    'current_location' => $current_location,
                    'start_location' => $start_location,
                    'end_location' => $end_location,
                    'cost_of_trip' => $cost_of_trip,
                    'trip_status' => $trip_status,
                    'recipient_name' => $recipient_name,
                    'recipient_phone_number' => $recipient_phone_number,
                    'who_pays' => $who_pays,
                    'payment_method' => $payment_method,
                    'rider_id' => $rider_id,
                    'customer_id' => $customer_id,
                    'package_id' => $package_id,
                    'date' => $date,
                ];

                $where = ['id' => $id];

                $this->trip->update($data, $where);

                Session::set('success', 'Trip updated');

                Url::redirect('/trips');

            }

        }

        $title = 'Edit Trip';
        $this->view->render('admin/trips/edit', compact('trip', 'errors', 'title'));

        }
    }

    public function delete($id)
    {
        if (! is_numeric($id)) {
            Url::redirect('/trips');
        }

        $trip = $this->trip->get_trip($id);

        if ($trip == null) {
            Url::redirect('/404');
        }

        $where = ['id' => $trip->id];

        $this->trip->delete($where);

        Session::set('success', 'Trip deleted');

        Url::redirect('/trips');
    }
}