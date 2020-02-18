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