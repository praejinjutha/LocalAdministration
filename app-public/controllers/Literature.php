<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Literature extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Dashboard_model');
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('session');
    }

    public function index()
    {
        $this->data['view_file'] = 'literature';
        $this->load->view(THEMES, $this->data);
    }

    public function Prose()
    {
        $this->data['view_file'] = 'lit/prose';
        $this->load->view(THEMES, $this->data);
    }

    public function Kapyani()
    {
        $this->data['view_file'] = 'lit/kapyani';
        $this->load->view(THEMES, $this->data);
    }

    public function Botdoksoi()
    {
        $this->data['view_file'] = 'lit/botdoksoi';
        $this->load->view(THEMES, $this->data);
    }

    public function Sonnets()
    {
        $this->data['view_file'] = 'lit/sonnets';
        $this->load->view(THEMES, $this->data);
    }

    public function Poetry()
    {
        $this->data['view_file'] = 'lit/poetry';
        $this->load->view(THEMES, $this->data);
    }

    public function Glon()
    {
        $this->data['view_file'] = 'lit/glon';
        $this->load->view(THEMES, $this->data);
    }

    public function Botlenkongdek()
    {
        $this->data['view_file'] = 'lit/botlenkongdek';
        $this->load->view(THEMES, $this->data);
    }

    public function Patee()
    {
        $this->data['view_file'] = 'lit/patee';
        $this->load->view(THEMES, $this->data);
    }
    public function Botklomdek()
    {
        $this->data['view_file'] = 'lit/botklomdek';
        $this->load->view(THEMES, $this->data);
    }
    public function Botarkayan()
    {
        $this->data['view_file'] = 'lit/botarkayan';
        $this->load->view(THEMES, $this->data);
    }

    public function Sakkawa()
    {
        $this->data['view_file'] = 'lit/sakkawa';
        $this->load->view(THEMES, $this->data);
    }
    public function Sumnuanthai()
    {
        $this->data['view_file'] = 'lit/sumnuanthai';
        $this->load->view(THEMES, $this->data);
    }

    public function Supasit()
    {
        $this->data['view_file'] = 'lit/supasit';
        $this->load->view(THEMES, $this->data);
    }
    public function Kumpungpoei()
    {
        $this->data['view_file'] = 'lit/kumpungpoei';
        $this->load->view(THEMES, $this->data);
    }

    public function Tumnongsonpanya()
    {
        $this->data['view_file'] = 'lit/tumnongsonpanya';
        $this->load->view(THEMES, $this->data);
    }
    public function Tumnongsanor()
    {
        $this->data['view_file'] = 'lit/tumnongsanor';
        $this->load->view(THEMES, $this->data);
    }

    public function Wannagum()
    {
        $this->data['view_file'] = 'lit/wannagum';
        $this->load->view(THEMES, $this->data);
    }
    public function Botrsian()
    {
        $this->data['view_file'] = 'lit/botrsian';
        $this->load->view(THEMES, $this->data);
    }

    public function Botroyklong()
    {
        $this->data['view_file'] = 'lit/botroyklong';
        $this->load->view(THEMES, $this->data);
    }

    public function Kumkwan()
    {
        $this->data['view_file'] = 'lit/kumkwan';
        $this->load->view(THEMES, $this->data);
    }


    

}


