<?php

function asignarNombreCiudad($codigo)
{
      $ciudades = array(
            "CLO" => "Cali",
            "VUP" => "Valledupar",
            "LET" => "Leticia",
            "RCH" => "Riohacha",
            "PSO" => "Pasto",
            "APO" => "Carepa",
            "MGN" => "Magangué",
            "NVA" => "Neiva",
            "CUC" => "Cúcuta",
            "CVE" => "Coveñas",
            "SVI" => "San Vicente Del Caguán",
            "EBG" => "El Bagre",
            "UIB" => "Quibdó",
            "BOG" => "Bogota",
            "AXM" => "Armenia",
            "PVA" => "Providencia",
            "EYP" => "El Yopal",
            "EOH" => "Medellín",
            "BAQ" => "Barranquilla",
            "MVP" => "Mitú",
            "BUN" => "Buenaventura",
            "PAL" => "La Dorada",
            "PCR" => "Puerto Carreño",
            "API" => "Apiay",
            "PPN" => "Popayán",
            "FLA" => "Florencia",
            "ADZ" => "San Andrés",
            "TME" => "Tame",
            "ULQ" => "Tuluá",
            "SJE" => "San José Del Guaviare",
            "MCJ" => "La Mina-Maicao",
            "BSC" => "Bahía Solano",
            "MDE" => "Medellín",
            "GPI" => "Guapi",
            "CAQ" => "Caucasia",
            "TCO" => "Tumaco",
            "MZL" => "Manizales",
            "CZU" => "Corozal",
            "ELB" => "El Banco",
            "MTR" => "Montería",
            "MQU" => "Mariquita",
            "PEI" => "Pereira",
            "PDA" => "Puerto Inírida",
            "BGA" => "Bucaramanga",
            "PZA" => "Paz De Ariporo",
            "IBE" => "Ibagué",
            "PTX" => "Pitalito",
            "CTG" => "Cartagena",
            "IPI" => "Ipiales",
            "CRC" => "Cartago",
            "AUC" => "Arauca",
            "GIR" => "Girardot",
            "SMR" => "Santa Marta",
            "PUU" => "Puerto Asís",
            "TQS" => "Tres Esquinas",
            "VVC" => "Villavicencio",
            "EJA" => "Barrancabermeja",
            "PUJ" => "Punta Cana",
            "CUN" => "Cancún",
            "CUR" => "Curazao",
            "AUA" => "Aruba",
            "PTY" => "Panamá",
            "BLB" => "Panamá",
            "SDQ" => "Santo Domingo",
      );

      return $ciudades[$codigo];
}
