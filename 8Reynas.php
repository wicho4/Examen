<?php

	//Imprimir la matriz
	function Tablero(&$chess)
	{
		$n = 8;
		for ($i = 0; $i < $n; ++$i)
		{
			for ($j = 0; $j < $n; ++$j)
				echo $chess[$i][$j] . " ";

			echo "<br/>";
		}
	}
	//Comprueba las condiciones
	function Condiciones(&$chess, $row, $col)
	{
		$n = 8;
		$i; $j;
		//Comprobar si hay alguna a reina a la izquierda
		for ($i = 0; $i < $col; ++$i)
			if ($chess[$row][$i])
				return false;
		//comprueba si hay alguna reina en la diagonal superior izquierda
		for ($i = $row, $j = $col; $i >= 0 && $j >= 0; --$i, --$j)
			if ($chess[$i][$j])
				return false;
		//comprueba si hay alguna reina en la diagonal inferior izquierda
		for ($i = $row, $j = $col; $j >= 0 && $i < $n; ++$i, --$j)
			if ($chess[$i][$j])
				return false;

		return true;
	}
	//Colocar las reinas en un lugar particular
	function Reyna(&$chess, $col)
	{
		$n =8;
		
		if ($col >= $n)
			return true;
		//para cada fila, verifique si es posible almacenar la reina
		for ($i = 0; $i < $n; ++$i)
		{
			if (Condiciones($chess, $i, $col))
			{
				//si es posible, coloque la reina en el lugar (i, col)
				$chess[$i][$col] = 1;

				if (Reyna($chess, $col + 1))
					return true;
				//Cuando no hay lugar quitar la reina
				$chess[$i][$col] = 0;
			}
		}

		return false;
	}

	function Respuesta()
	{
		// Define array 
		$chess = array( 
			array(0, 0, 0, 0,0, 0, 0, 0),
			array(0, 0, 0, 0,0, 0, 0, 0),
			array(0, 0, 0, 0,0, 0, 0, 0),
			array(0, 0, 0, 0,0, 0, 0, 0),
			array(0, 0, 0, 0,0, 0, 0, 0),
			array(0, 0, 0, 0,0, 0, 0, 0),
			array(0, 0, 0, 0,0, 0, 0, 0),
			array(0, 0, 0, 0,0, 0, 0, 0)
		);

		if (Reyna($chess, 0) == false)
			return false;

		Tablero($chess);
		return true;
	}
//Llamar a la funcion
	Respuesta();
?>