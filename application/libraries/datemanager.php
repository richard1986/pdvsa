<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datemanager
{
  
  public function date2mySQL($date)
  {
    $fecha = explode("/", $date);
    return $fecha[2]."-".$fecha[1]."-".$fecha[0];
  }

  public function date2normal($date)
  {
    $fecha = explode("-", $date);
    return $fecha[2]."/".$fecha[1]."/".$fecha[0];
  }

  public function is_date($fecha)
  {
    $f = explode("/", $fecha);
    if (checkdate($f[1], $f[0], $f[2])) {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function strdate2mySQL($date)
  {
    $meses = array( 'ene' => "01",
                    'feb' => "02",
                    'mar' => "03",
                    'abr' => "04",
                    'may' => "05",
                    'jun' => "06",
                    'jul' => "07",
                    'ago' => "08",
                    'sep' => "09",
                    'oct' => "10",
                    'nov' => "11",
                    'dic' => "12"
            );
    $fecha = explode("-", $date);
    return $fecha[2]."-".$meses[$fecha[1]]."-".$fecha[0];
  }


}