<?php
 namespace System;

 use App\Controllers\Customers;
 use App\Config;
 use App\Helpers\Database;
 /*
 * View - load template pages
 *
 */
 
 	class View{
         
        protected $customers;
        protected $trip;
        protected $db;
        protected $revenue;

        /** display customers, riders and other details on the dashboard */
        
        public function count_customers(){
            $config = Config::get();

            //connect to PDO here.
            $this->db = Database::get($config);

            $data = $this->db->select(" count(id) as customers
            FROM users
            WHERE user_type = 'CUSTOMER'");
            // var_dump($data);
            // die;
            
            return (isset($data[0]) ? $data[0] : null);
           
        }

        public function count_riders(){
            $config = Config::get();

            //connect to PDO here.
            $this->db = Database::get($config);

            $data = $this->db->select(" count(id) as riders
            FROM users
            WHERE user_type = 'RIDER'");
            // var_dump($data);
            // die;
            
            return (isset($data[0]) ? $data[0] : null);
           
        }

        public function count_trips(){
            $config = Config::get();

            //connect to PDO here.
            $this->db = Database::get($config);

            $data = $this->db->select(" count(id) as trips
            FROM trips");
            // var_dump($data);
            // die;
            
            return (isset($data[0]) ? $data[0] : null);
           
        }

        public function get_feedbacks(){
            $config = Config::get();

            //connect to PDO here.
            $this->db = Database::get($config);

            $data = $this->db->select("feedback_description from feedbacks ");
            // var_dump($data);
            // die;
            
            return (isset($data[0]) ? $data[0] : null);
           
        }

	 
    /**
    $path will hold the path of the requested file.
    $data will hold the content to be passed to the view file.
    $data is optional; note it has a default value of false. 
    This means if there is only one parameter passed to the render method, 
    then the data will not be used.
    */
	 
	public function render($path,$data= false){
		 
		if ($data) {
            // Extract the rendering variables.
            foreach ($data as $key => $value) {
                ${$key} = $value;
            }
        }

       $filepath = "../app/views/$path.php";
        // $filepath = APPDIR."views/$path.php";

        if (file_exists($filepath)) {
            require $filepath;
        } else {
            die("View: $path not found!");
        }

		 
		 
	 }
	 
	 
 }