<?php

class HomeController extends Controller{

    public function index(){
        $this->loader->view('index');
    }

    public function about(){
        $this->loader->view('about');
    }

    public function login(){
        $this->loader->view('login');
    }

    public function registration(){
        $this->loader->view('registration');
    }

    public function projects(){
        $this->loader->view('about-projects');
    }

    public function charity(){
        $this->loader->view('about-charity');
    }

    public function sports(){
        $this->loader->view('about-sports');
    }
}


?>