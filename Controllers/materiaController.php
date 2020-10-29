<?php


class materiaController extends Controller{
 

function __construct()
{
    parent::__construct();
}

public function index()
{

$this->_view->renderizar('materia');

}





}




?>