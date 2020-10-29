<?php
class Database extends PDO
{



    


    function _construct(){



        Parent::_construct('mysql:host='.DB_HOST.';dbname='.DB_NAME.', DB_USER, DB_PASS');

    }


}


?>