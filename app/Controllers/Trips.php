<?php
namespace App\Controllers;

Use App\Helpers\Session;
Use App\Helpers\Url;
use System\BaseController;
use App\Models\Trip;
use App\Models\Rider;
use App\Models\Package;

class Trips extends BaseController {

    protected $rider;
    protected $trip;
    protected $package;
    
    public function __construct()
    {
        parent::__construct();
        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }
        $this->trip = new Trip();
        $this->rider= new Rider();
        $this->package= new Package();
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

    // public function assign_rider($id){

    //     if ( is_numeric($id)) {
            

    //         $trip = $this->trip->get_trip($id);
    
    //         if ($trip == null) {
    //             Url::redirect('/404');
    //         }

            
    //     }

    // }

    public function assign_trip($id){
        if ( is_numeric($id)) {

            $rider = $this->rider->get_id($id);  
            
            // if ($rider == null) {
            //     Url::redirect('/404');
            // }
    
            $errors = [];
    
            if (isset($_POST['submit'])) {
                $tripId  = (isset($_POST['tripId']) ? $_POST['tripId'] : null);
    
                if (count($errors) == 0) {
    
                    $data = [
                        'rider_id' =>$id
                    ];
    
                    $where = ['id' => $tripId];
    
                    $this->trip->update($data, $where);

                    //update rider status

                    $data2 = ["on_a_ride"=> 1];
                   
                    $where2 = ["id" => $id];
                    
                    $this->rider->update($data2, $where2);
    
                    Session::set('success', 'Rider Assigned');
    
                    Url::redirect('/trips');
    
                }
    
            }
    
            $title = 'Assign Trip';
            $this->view->render('admin/trips/assign', compact('rider', 'errors', 'title'));

        }       
    }

    public function start_trip($id){

        if ( is_numeric($id)) {

            $trip = $this->trip->get_trip($id);  
    
            $errors = [];

            if (count($errors) == 0) {
    
                $data = [
                    'trip_status' =>"IN_PROGRESS"
                ];

                $where = ['id' => $id];

                $this->trip->update($data, $where);

                Session::set('success', 'Trip Started');

                Url::redirect('/trips');               
    
            }

        }       

    }
    public function cancel_trip($id){

        if ( is_numeric($id)) {

            $trip = $this->trip->get_trip($id);  

            $riderId = $this->trip->trip_rider_id($id);
            // var_dump($riderId);
            //  die();
    
            $errors = [];

            if (count($errors) == 0) {
    
                $data = [
                    'trip_status' =>"CANCELLED"
                ];

                $where = ['id' => $id];

                $this->trip->update($data, $where);

                $data2 = ['on_a_ride' => 0];
                $where2 = ['id' => $riderId->rider_id];

                $this->rider->update($data2, $where2);

                Session::set('success', 'Trip Cancelled');

                Url::redirect('/trips');               
    
            }

        }       

    }

    public function end_trip($id){

        if ( is_numeric($id)) {

            $trip = $this->trip->get_trip($id);  

            $riderId = $this->trip->trip_rider_id($id);
            // var_dump($riderId);
            //  die();
            
            $packageId = $this->trip->trip_package_id($id);

            $errors = [];

            if (count($errors) == 0) {
    
                $data = [
                    'trip_status' =>"ENDED"
                ];

                $where = ['id' => $id];

                $this->trip->update($data, $where);

                $data2 = ['on_a_ride' => 0];
                $where2 = ['id' => $riderId->rider_id];

                $this->rider->update($data2, $where2);

                $data3 = ['package_status' => 'DELIVERED'];
                $where3 = ['id' => $packageId->package_id];

                $this->package->update($data3, $where3);
                
                Session::set('success', 'Trip Ended, Package Delivered');

                Url::redirect('/trips');               
    
            }

        }       
    }



        public function end_trip_2($id){

            if ( is_numeric($id)) {
    
                $trip = $this->trip->get_trip($id);  
    
                $riderId = $this->trip->trip_rider_id($id);
                // var_dump($riderId);
                //  die();
                
                $packageId = $this->trip->trip_package_id($id);
    
                $errors = [];
    
                if (count($errors) == 0) {
        
                    $data = [
                        'trip_status' =>"ENDED"
                    ];
    
                    $where = ['id' => $id];
    
                    $this->trip->update($data, $where);
    
                    $data2 = ['on_a_ride' => 0];
                    $where2 = ['id' => $riderId->rider_id];
    
                    $this->rider->update($data2, $where2);
    
                    $data3 = ['package_status' => 'NOT_DELIVERED'];
                    $where3 = ['id' => $packageId->package_id];
    
                    $this->package->update($data3, $where3);
                    
                    Session::set('success', 'Trip Ended, Package Not Delivered');
    
                    Url::redirect('/trips');               
        
                }
    
            }       
    

        }
}