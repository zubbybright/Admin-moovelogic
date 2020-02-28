<?php

namespace App\Controllers;

use System\BaseController;
use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\Location;

class Locations extends BaseController {

    protected $location;

    public function __construct(){
        parent::__construct();

        if (! Session::get('logged_in')) {
            Url::redirect('/admin/login');
        }

        $this->location = new Location();
    }

    public function index()
    {
        $locations = $this->location->get_locations();
        $title = 'Locations';
        return $this->view->render('admin/locations/index', compact('locations', 'title'));
    }

    public function add()
    {
        $errors = [];

        if (isset($_POST['submit'])) {
            $country  = (isset($_POST['country']) ? $_POST['country'] : null);
            $state = (isset($_POST['state']) ? $_POST['state'] : null);  
            $city = (isset($_POST['city']) ? $_POST['city'] : null);   
            $local_govt = (isset($_POST['local_govt']) ? $_POST['local_govt'] : null);   
            $address = (isset($_POST['full_address']) ? $_POST['full_address'] : null);            

            if (count($errors) == 0) {

                $data = [
                    'country' => $country,
                    'state' => $state,
                    'city' => $city,
                    'local_govt' => $local_govt,
                    'full_address' => $address,

                ];

                $this->location->insert($data);

                Session::set('success', 'Location created');

                Url::redirect('/locations');

            }

        }

        $this->view->render('admin/locations/add', compact('errors'));
    }

    public function edit($id)
    {   
        if ( is_numeric($id)) {
            

        $location = $this->location->get_location($id);

        if ($location == null) {
            Url::redirect('/404');
        }

        $errors = [];

        if (isset($_POST['submit'])) {
            $country  = (isset($_POST['country']) ? $_POST['country'] : null);
            $state = (isset($_POST['state']) ? $_POST['state'] : null);  
            $city = (isset($_POST['city']) ? $_POST['city'] : null);   
            $local_govt = (isset($_POST['local_govt']) ? $_POST['local_govt'] : null);   
            $address = (isset($_POST['full_address']) ? $_POST['full_address'] : null);     

            if (count($errors) == 0) {

                $data = [
                    'country' => $country,
                    'state' => $state,
                    'city' => $city,
                    'local_govt' => $local_govt,
                    'full_address' => $address,
                ];

                $where = ['id' => $id];

                $this->location->update($data, $where);

                Session::set('success', 'Location updated');

                Url::redirect('/Locations');

            }

        }

        $title = 'Edit Location';
        $this->view->render('admin/locations/edit', compact('location', 'errors', 'title'));

        }
    }

    public function delete($id)
    {
        if (! is_numeric($id)) {
            Url::redirect('/locations');
        }

        $location = $this->location->get_location($id);

        // var_dump($role);
        // die();

        if ($location == null) {
            Url::redirect('/404');
        }

        $where = ['id' => $location->id];

        $this->location->delete($where);

        Session::set('success', 'Location deleted');

        Url::redirect('/locations');
    }

    public function view($id)
    {
        if (! is_numeric($id)) {
            Url::redirect('/roles');
        }

        $location = $this->location->get_location($id);

        if ($location == null) {
            Url::redirect('/404');
        }

        $title = 'View Location';
        $this->view->render('admin/locations/view', compact('location',  'title'));
    }

}