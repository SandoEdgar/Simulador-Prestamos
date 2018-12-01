<?php 
	
	Class Conexion{

		public function ConectarBD(){
			$link=new PDO("mysql:host=localhost;dbname=simulador_prestamo","root","");
			return $link;
		}
	}

