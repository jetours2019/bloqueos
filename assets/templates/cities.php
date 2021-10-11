<?php

function asignarNombreCiudad($codigo)
{
      $ciudades = array(
            "CLO" => "Cali",
            "BOG" => "Bogotá",
            "SMR" => "Santa Marta",
            "CTG" => "Cartagena",
            "ADZ" => "San Andrés",
            "BAQ" => "Barranquilla",
            "SDQ" => "Santo Domingo",
            "PTY" => "Panamá",
            "AUA" => "Aruba",
            "CUR" => "Curazao",
            "PUJ" => "Punta Cana",
            "CUN" => "Cancún",
            "PSO" => "Pasto",
            "PEI" => "Pereira",
            "BGA" => "Bucaramanga"
      );

      return $ciudades[$codigo];
}