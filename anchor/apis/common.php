<?php

class allapi
{
 

  public function getallcategory()
  {
    $data = array(
      array(
        "id" => "1",
        "name" => "BTC",
        "sort" => 1
      ),
      array(
        "id" => 2,
        "name" => "BCH",
        "sort" => 2
      ),
      array(
        "id" => 3,
        "name" => "LTC",
        "sort" => 3
      )
    );
    $data=json_encode($data);
      return $data;
  }

  public function getallSubcategory()
  {
    $data = array(
      "1"=>array(
        "id" => "1",
        "name" => "BTC",
         "subcat"=>array(
          "INRA/BTC","USDA/BTC","EURA/BTC","GBPA/BTC","BRLA/BTC","PLNA/BTC","CADA/BTC","TRYA/BTC","RUBA/BTC","MXNA/BTC","CZKA/BTC","ILSA/BTC","NZDA/BTC","JPYA/BTC","SEKA/BTC","AUDA/BTC"
          ),
        "sort" => 1
      ),
      "2"=>array(
        "id" => 2,
        "name" => "BCH",
       "subcat"=>array(
          "INRA/BCH","USDA/BCH","EURA/BCH","GBPA/BCH","BRLA/BCH","PLNA/BCH","CADA/BCH","TRYA/BCH","RUBA/BCH","MXNA/BCH","CZKA/BCH","ILSA/BCH","NZDA/BCH","JPYA/BCH","SEKA/BCH","AUDA/BCH"
          ),
        "sort" => 2
      ),
      "3"=>array(
        "id" => 3,
        "name" => "LTC",
         "subcat"=>array(
          "INRA/LTC","USDA/LTC","EURA/LTC","GBPA/LTC","BRLA/LTC","PLNA/LTC","CADA/LTC","TRYA/LTC","RUBA/LTC","MXNA/LTC","CZKA/LTC","ILSA/LTC","NZDA/LTC","JPYA/LTC","SEKA/LTC","AUDA/LTC"
          ),
        "sort" => 3
      )
    );
    $data=json_encode($data);
    return $data;
  }

  public function getallcurrency()
  {
    $data = array(
          "BTC","BCH","LTC","INRA","USDA","EURA","GBPA","BRLA","PLNA","CADA","TRYA","RUBA","MXNA","CZKA","ILSA","NZDA","JPYA","SEKA","AUDA"
    );
    $data=json_encode($data);
    return $data;
  }
}



function page_protect()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            logout();
            exit;
        }
    }
}

function logout()
{
    global $db;
    global $pathString;
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email_id']);
    unset($_SESSION['user_session']);
    unset($_SESSION['user_admin']);
    unset($_SESSION['user_supportpin']);
    unset($_SESSION['HTTP_USER_AGENT']);
    session_unset();
    session_destroy();
    header("Location:".BASE_PATH.'home');
}
?>
