<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sec1 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url', 'text'));
    }

    public function index()
    {
        
        $this->data['view_file'] = 'section1/sec1';
        $this->load->view(THEMES, $this->data);
    }

    public function Territorial()
    {        
        $this->data['view_file'] = 'section1/territorial';
        $this->load->view(THEMES, $this->data);
    }

    public function Area()
    {        
        $this->data['view_file'] = 'section1/area';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub1p2()
    {        
        $this->data['view_file'] = 'section1/sub1p2';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub1p3()
    {        
        $this->data['view_file'] = 'section1/sub1p3';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub1p4()
    {        
        $this->data['view_file'] = 'section1/sub1p4';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub2()
    {        
        $this->data['view_file'] = 'section1/sub2';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub2p1()
    {        
        $this->data['view_file'] = 'section1/sub2p1';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub2p2()
    {        
        $this->data['view_file'] = 'section1/sub2p2';
        $this->load->view(THEMES, $this->data);
    }


    public function Parliamentmem()
    {        
        $this->data['view_file'] = 'section1/parliamentmem';
        $this->load->view(THEMES, $this->data);
    }
    
    
    public function Sub3p1()
    {        
        $this->data['view_file'] = 'section1/sub3p1';
        $this->load->view(THEMES, $this->data);
    }


    public function Sub3p2()
    {        
        $this->data['view_file'] = 'section1/sub3p2';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub4p1()
    {        
        $this->data['view_file'] = 'section1/sub4p1';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub4p2()
    {        
        $this->data['view_file'] = 'section1/sub4p2';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub4p3()
    {        
        $this->data['view_file'] = 'section1/sub4p3';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub4p4()
    {        
        $this->data['view_file'] = 'section1/sub4p4';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub4p5()
    {        
        $this->data['view_file'] = 'section1/sub4p5';
        $this->load->view(THEMES, $this->data);
    }


    public function Sub5p1()
    {        
        $this->data['view_file'] = 'section1/sub5p1';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub5p2()
    {        
        $this->data['view_file'] = 'section1/sub5p2';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub5p3()
    {        
        $this->data['view_file'] = 'section1/sub5p3';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub5p4()
    {        
        $this->data['view_file'] = 'section1/sub5p4';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub5p5()
    {        
        $this->data['view_file'] = 'section1/sub5p5';
        $this->load->view(THEMES, $this->data);
    }


    public function Sub6p1()
    {        
        $this->data['view_file'] = 'section1/sub6p1';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub6p2()
    {        
        $this->data['view_file'] = 'section1/sub6p2';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub6p3()
    {        
        $this->data['view_file'] = 'section1/sub6p3';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub6p4()
    {        
        $this->data['view_file'] = 'section1/sub6p4';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub6p5()
    {        
        $this->data['view_file'] = 'section1/sub6p5';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub6p6()
    {        
        $this->data['view_file'] = 'section1/sub6p6';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub6p7()
    {        
        $this->data['view_file'] = 'section1/sub6p7';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub6p8()
    {        
        $this->data['view_file'] = 'section1/sub6p8';
        $this->load->view(THEMES, $this->data);
    }


    public function Sub7p1()
    {        
        $this->data['view_file'] = 'section1/sub7p1';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub7p2()
    {        
        $this->data['view_file'] = 'section1/sub7p2';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub7p3()
    {        
        $this->data['view_file'] = 'section1/sub7p3';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub7p4()
    {        
        $this->data['view_file'] = 'section1/sub7p4';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub8p1()
    {        
        $this->data['view_file'] = 'section1/sub8p1';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub8p2()
    {        
        $this->data['view_file'] = 'section1/sub8p2';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub8p3()
    {        
        $this->data['view_file'] = 'section1/sub8p3';
        $this->load->view(THEMES, $this->data);
    }

    public function Sub8p4()
    {        
        $this->data['view_file'] = 'section1/sub8p4';
        $this->load->view(THEMES, $this->data);
    }


    public function Sub9()
    {        
        $this->data['view_file'] = 'section1/sub9';
        $this->load->view(THEMES, $this->data);
    }
}
