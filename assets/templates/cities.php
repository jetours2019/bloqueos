<?php

function asignarNombreCiudad($codigo)
{
      $ciudad = "";
      switch ($codigo) {
            case "CLO":
                  $ciudad = "Cali";
                  break;
            case "BOG":
                  $ciudad = "Bogotá";
                  break;
            case "SMR":
                  $ciudad = "Santa Marta";
                  break;
            case "CTG":
                  $ciudad = "Cartagena";
                  break;
            case "ADZ":
                  $ciudad = "San Andrés";
                  break;
            case "BAQ":
                  $ciudad = "Barranquilla";
                  break;
            case "SDQ":
                  $ciudad = "Santo Domingo";
                  break;
            case "PTY":
                  $ciudad = "Panamá";
                  break;
            case "AUA":
                  $ciudad = "Aruba";
                  break;
            case "CUR":
                  $ciudad = "Curazao";
                  break;
            case "PUJ":
                  $ciudad = "Punta Cana";
                  break;
            case "CUN":
                  $ciudad = "Cancún";
                  break;
            case "PSO":
                  $ciudad = "Pasto";
                  break;
            case "PEI":
                  $ciudad = "Pereira";
                  break;
      }

      return $ciudad;
}