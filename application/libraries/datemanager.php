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
    //Comprueba si la cadena introducida es de la forma D/m/Y (15/04/1920)
    // if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $fecha))
    // {
    //   $bloques = explode("/", $fecha);
    //   if (($bloques[2]>12)||($bloques[2]<1))
    //   {
    //     return FALSE;
    //   }
    //   if (($bloques[2]==4)||($bloques[2]==6)||($bloques[2]==9)||($bloques[2]==11))
    //   {
    //     $dias_mes = 30;
    //   }
    //   else
    //   {
    //     if ($bloques[2]==2)
    //     { //febrero
    //       if((($bloques[3]%4==0)&&(!($bloques[3]%100==0)))||($bloques[3]%400==0))
    //       {
    //         $dias_mes = 29;
    //       }
    //       else{
    //         $dias_mes = 28;
    //       }
    //     }
    //     else
    //     {
    //       $dias_mes = 31;
    //     }
    //   }
    //   if (($bloques[1]<1)||($bloques[1]>$dias_mes)){
    //     return FALSE;
    //   }
    // }
    // else
    // {
    //   return FALSE;
    // }
    // return TRUE;
}