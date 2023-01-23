<?php

class Landingpages extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => "Homepage mankamenten"
        ];
        $this->view('landingpages/index', $data);
    }
}
