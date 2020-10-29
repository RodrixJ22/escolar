<?php


class gruposController extends Controller{
 

function __construct()
{
    parent::__construct();
}

public function index()
{

$this->_view->renderizar('grupos');

}





}




?>