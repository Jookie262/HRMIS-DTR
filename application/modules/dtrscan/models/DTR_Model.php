<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DTR_Model extends MY_Controller 
{
    public function __construct()
	{
        $this->load->helper('url'); 
        $this->load->database();
    }

    // Save Input from Contoller to Database
    public function save($code)
    {
        $data = array('code' => $code);
        $this->db->insert('dtr', $data);
    }
}

?>