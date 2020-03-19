<?php

include(realpath(dirname(__FILE__) . '/../DAL') . "/CMS_DAO.php"); //includes User_Dao script

class Event_logic
{
  private $DB_cms_conn;

  function __construct()
  {
      $this->DB_cms_conn = new CMS_DAO();
  }
  function GetAllFoodEvents()
  {

      $result=$this->DB_user_conn ->DB_GetAllFoodEvents();

      return $result;
  }

  function GetAllDanceEvents()
  {

      $result=$this->DB_user_conn ->DB_GetAllDanceEvents();

      return $result;
  }
  function GetAllJazzEvents()
  {

      $result=$this->DB_user_conn ->DB_GetAllJazzEvents();

      return $result;
  }
  function DisplayAllEvents()
  {

  }
  function DisplayFoodEvents()
  {

  }
  function DisplayJazzEvents()
  {

  }
  function DisplayDanceEvents()
  {

  }

}
 ?>
