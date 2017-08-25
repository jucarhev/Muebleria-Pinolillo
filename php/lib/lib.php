<?php 
include_once("constantes.php");
/*
 * Clase Lib Desarrollada por
 * @autor ChicoPulpo
 *
 */
	class Lib extends Constantes
	{
	function conectar(){
			$this->CONEXION=new mysqli($this->HOSTNAME,$this->USERNAME,$this->USERPASS,$this->BASENAME);
			if ($this->CONEXION->connect_errno) {
				echo $this->error_Conexion;
			}
			else{
				return $this->CONEXION;
			}
	}
	function cerrarConexion(){
		$this->CONEXION->close();
	}
	function procesaCUD($query){
			$this->conectar();
			if(!$this->CONEXION->query($query)){
				return false;
			}else{
				return true;
			}
			$this->cerrarConexion();
	}//Fin de la funcion procesaCUD
	function guardarRegistros($cadena=array(),$tabla,$where){
			$campos=null;
			$valores=null;
			foreach ($cadena as $key => $val) {
				$campos.=",".$key;
				$valores.=",'".$val."'";
			}
			if ($where=="") {
				$query='INSERT INTO '.$tabla.'('.substr($campos, 1, strlen($campos)).') VALUES('.substr($valores, 1,strlen($valores)).');';
			}else{
				$query='INSERT INTO '.$tabla.'('.substr($campos, 1, strlen($campos)).') VALUES('.substr($valores, 1,strlen($valores)).') where '.$where.';';
			}
			if($this->procesaCUD($query)==true){
				return $this->ejecutar_Query;
			}else{
				return $this->error_Query;
			}
	}//Fin de la funcion guardarRegistros
	function conteo($sql){
			$this->conectar();
			$res=$this->CONEXION->query($sql);
			$total=$res->num_rows;
			return $total;
			$this->cerrarConexion();
	}//Fin de la funcion conteo
	function paginarListadoRegistros($tabla,$data=array(),$where,$funciones_JS=array(),$idvisible,$limit,$registros_Pagina){
			$this->conectar();
			$num=count($data);
			$numb=count($funciones_JS);
			$tr="";
			$funciones="";
			$campos="";
						
			for ($in=0; $in < $num; $in++) { 
				$campos.=",".$data[$in];
			}
			$campos_limpios=substr($campos,1,strlen($campos));
			if ($where=="" and $limit=="" and $registros_Pagina=="") {
				$sql="SELECT ".$campos_limpios." FROM ".$tabla;
			}else if (!$where=="" and $limit=="" and $registros_Pagina=="") {
				$sql="SELECT ".$campos_limpios." FROM ".$tabla." WHERE ".$where;
			}
			else{
				$sql="SELECT ".$campos_limpios." FROM ".$tabla." ".$where." LIMIT ".$limit." , ".$registros_Pagina;
			}
			//echo $sql;
			$res=$this->CONEXION->query($sql);
			$total=$res->num_rows;
			if ($res->num_rows>0) {
				while ($fila=$res->fetch_array()) {
					$tr.="<tr>";
					if ($idvisible=="false") {
						for ($i=1; $i < $num; $i++) { 
							$idRegistro=$fila[$data[0]];
							$tr.="<td>".$fila[$data[$i]]."</td>";
						}//Fin del for
					}else if($idvisible=="true"){
						for ($i=0; $i < $num; $i++) { 
							$idRegistro=$fila[$data[0]];
							$tr.="<td>".$fila[$data[$i]]."</td>";
						}//Fin del for
					}
					if (!$funciones_JS==null) {
						if ($funciones_JS[3]==1) {
							$tr.='<td><a href="#" onclick="'.$funciones_JS[0].'('.$idRegistro.');return false"><img src="'.$this->img_boton_ventana2.'"></a></td>';
						}elseif ($funciones_JS[3]==2) {
							$tr.='<td><a href="#" onclick="'.$funciones_JS[0].'('.$idRegistro.');return false"><img src="'.$this->img_boton_ventana2.'"></a></td>';
							$tr.='<td><a href="#" onclick="'.$funciones_JS[1].'('.$idRegistro.');return false" '.$this->atributo_dato1.'><img src="'.$this->img_boton_ventana1.'"></a></td>';
						}elseif ($funciones_JS[3]==3) {
							$tr.='<td><a href="#" onclick="'.$funciones_JS[0].'('.$idRegistro.');return false"><img src="'.$this->img_boton_ventana2.'"></a></td>';
							$tr.='<td><a href="#" onclick="'.$funciones_JS[1].'('.$idRegistro.');return false" '.$this->atributo_dato1.'><img src="'.$this->img_boton_ventana1.'"></a></td>';
							$tr.='<td><a href="#" onclick="'.$funciones_JS[2].'('.$idRegistro.');return false" '.$this->atributo_dato.'><img src="'.$this->img_boton_ventana.'"></a></td>';
						}elseif ($funciones_JS[3]==4){
							$tr.='<td><a href="#" onclick="'.$funciones_JS[0].'('.$idRegistro.');return false"><img src="'.$this->img_boton_ventana2.'"></a></td>';
							$tr.='<td><a href="#" onclick="'.$funciones_JS[1].'('.$idRegistro.');return false" '.$this->atributo_dato1.'><img src="'.$this->img_boton_ventana.'"></a></td>';
						}elseif($funciones_JS[3]==5){
							$tr.='<td><a href="#" onclick="'.$funciones_JS[0].'('.$idRegistro.');return false" '.$this->atributo_dato1.'><img src="'.$this->img_boton_ventana3.'"></a></td>';
						}else{}
					}//Fin del if
					$tr.="</tr>";
				}//Fin del while
				return $tr;
			}//Fin del if
			else{
				return $tr.="<tr><td colspan='".$num."'>No hay registros</td></tr>";
			}
	}//Fin de la funcion paginarListadoRegistros
	function paginas($tabla,$where,$pagina_Actual,$funcionJS){
			//$registros_Pagina=2;
			$numero_Paginas=0;
			$total_registro=0;
			$paginacion="";

			$sql="";
			if ($where="") {
				$sql="SELECT * FROM ".$tabla;
			}
			else{
				$sql="SELECT * FROM ".$tabla." ".$where;
			}
			$total_registro=$this->conteo($sql);
			$numero_Paginas=ceil($total_registro/$this->registros_Pagina);
			if ($pagina_Actual > 1) {
				$paginacion = $paginacion.'<li><a href="" onclick="js:'.$funcionJS.'('.($pagina_Actual-1).');return false">Anterior</a></li>';
			}
			for ($i=1; $i <=$numero_Paginas ; $i++) { 
				if ($i == $pagina_Actual) {
					$paginacion = $paginacion.'<li class="active"><a href="js:'.$funcionJS.'('.$i.');return false">'.$i.'</a></li>';
				}else{
					$paginacion=$paginacion.'<li><a href="" onclick="js:'.$funcionJS.'('.$i.');return false">'.$i.'</a></li>';
				}
			}
			if ($pagina_Actual < $numero_Paginas) {
				$paginacion = $paginacion.'<li><a href="" onclick="js:'.$funcionJS.'('.($pagina_Actual+1).');return false">Siguiente</a></li>';
			}
			if ($pagina_Actual<=1) {
				$limit=0;
			}else{
				$limit=$this->registros_Pagina*($pagina_Actual-1);
			}
			return $parametro_paginacion = array(0 => $limit, 1 => $this->registros_Pagina, 2 => $paginacion);
	}//Fin de la funcion paginas
	function Obtendatos($sql){
			$this->conectar();
			$res=$this->CONEXION->query($sql);
			$query = $res->fetch_all(MYSQLI_ASSOC);
			return $query;
	}
	function Obtendatos2($sql){
			$this->conectar();
			$res=$this->CONEXION->query($sql);
			$query = $res->fetch_all(MYSQLI_ASSOC);
			return $query;
	}
	/*-------------------------------------------------------------------------- Mejoras*/
	function paginarRegistros($tabla,$where,$pagina_Actual,$funcionJS){
			//$registros_Pagina=2;
			$numero_Paginas=0;
			$total_registro=0;
			$paginacion="<ul class='".$this->paginacion_Clase."'>";

			$sql="";
			if ($where="") {
				$sql="SELECT * FROM ".$tabla;
			}
			else{
				$sql="SELECT * FROM ".$tabla." ".$where;
			}
			$total_registro=$this->conteo($sql);
			$numero_Paginas=ceil($total_registro/$this->registros_Pagina);
			if ($pagina_Actual > 1) {
				$paginacion = $paginacion.'<li><a href="" onclick="js:'.$funcionJS.'('.($pagina_Actual-1).');return false">Anterior</a></li>';
			}
			for ($i=1; $i <=$numero_Paginas ; $i++) { 
				if ($i == $pagina_Actual) {
					$paginacion = $paginacion.'<li class="active"><a href="js:'.$funcionJS.'('.$i.');return false">'.$i.'</a></li>';
				}else{
					$paginacion=$paginacion.'<li><a href="" onclick="js:'.$funcionJS.'('.$i.');return false">'.$i.'</a></li>';
				}
			}
			if ($pagina_Actual < $numero_Paginas) {
				$paginacion = $paginacion.'<li><a href="" onclick="js:'.$funcionJS.'('.($pagina_Actual+1).');return false">Siguiente</a></li>';
			}
			if ($pagina_Actual<=1) {
				$limit=0;
			}else{
				$limit=$this->registros_Pagina*($pagina_Actual-1);
			}
			$paginacion=$paginacion."</ul>";
			return $parametro_paginacion = array(0 => $limit, 1 => $this->registros_Pagina, 2 => $paginacion);
	}//Fin de la funcion paginas
	function save_return_id($tabla,$datos=array()){
		$datano="";
		$this->conectar();
		foreach ($datos as $key => $val) {
			$this->campos.=",".$key;
			$this->valores.=",'".$val."'";
		}

		$query='INSERT INTO '.$tabla.'('.substr($this->campos, 1, strlen($this->campos)).') VALUES('.substr($this->valores, 1,strlen($this->valores)).');';

		foreach ($datos as $key => $val) {
			$this->campos2.="and ".$key.'="'.$val.'" ';
		}

		$query_r='SELECT '.$this->retorno_valor.' from '.$tabla.' where '.substr($this->campos2, 3, strlen($this->campos2)).';';
		
		if(!$this->CONEXION->query($query)){
			return false;
		}else{
			return $this->dato_q($query_r);
			//return $query_r;
		}
		$this->cerrarConexion();
	}
	function dato_q($query_r){
		$this->conectar();
		$this->id="";
		$sentencia=$this->CONEXION->query($query_r);
		$total=$sentencia->num_rows;
		if ($sentencia->num_rows>0) {
			while ($fila=$sentencia->fetch_array()) {
				$this->id=$fila['id'];
			}
		}else{
			$this->id="";
		}
		return $this->id;
		$this->cerrarConexion();
	}
	function actualizar_datos($tabla,$data=array(),$where){
		$this->conectar();
		$query="UPDATE ".$tabla." SET";
		foreach ($data as $key => $val) {
			$this->campos.=", ".$key."='".$val."'";
		}
		$query.=substr($this->campos, 1, strlen($this->campos))." where ".$where.";";
		if(!$this->CONEXION->query($query)){
			return $this->error_query;
		}else{
			return $this->exito;
		}
		$this->cerrarConexion();
	}
	function menu($items=array(),$att){
		$this->menu="<ul class='".$this->clase_menu."''>";
		foreach ($items as $key => $value) {
			$this->numerador++;
			if ($att==$this->numerador) {
				$this->menu.="<li ".$this->atributo_menu."><a href='#' onclick='".$value."(".$this->numerador.");return false'>".$key."</a></li>";
			}else{
				$this->menu.="<li><a href='#' onclick='".$value."(".$this->numerador.");return false'>".$key."</a></li>";
			}
		}
		return $this->menu.="</ul>";
	}
	function tablabasica($tabla){
		$tabla_datos="<table class='".$this->clase_tabla."' ".$this->atributos_tabla."><tr>";
		$this->conectar();
		$query = "SELECT * from ".$tabla;
		$resultado=$this->conexion->query($query);
		$datosvalores2="";

		if ($resultado = mysqli_query($this->conexion, $query)) {
		    $info_campo = mysqli_fetch_fields($resultado);

		    foreach ($info_campo as $valor) {
		        $this->datosvalores.=",".strtoupper($valor->name);
		        $datosvalores2.=",".$valor->name;
		    }
		    mysqli_free_result($resultado);
		}

		$campos_limpios2=substr($datosvalores2,1,strlen($datosvalores2));
		$campos_limpios=substr($this->datosvalores,1,strlen($this->datosvalores));

		$arreglo = explode(",", $campos_limpios);
		$arreglo2 = explode(",", $campos_limpios2);

		$conteo=count($arreglo);
		for ($i=0; $i < $conteo; $i++) { 
			$tabla_datos.="<th>".$arreglo[$i]."</th>";
		}

		$sentencia=$this->conexion->query($query);
		$total=$sentencia->num_rows;

		if ($sentencia->num_rows>0) {
			while ($fila=$sentencia->fetch_array()) {
				$tabla_datos.="<tr>";
				for ($i=0; $i < $conteo; $i++) { 
					$tabla_datos.="<td>".$fila[$arreglo2[$i]]."</td>";
				}

				$tabla_datos.="</tr>";
			}

		}else
		{
			echo "No hay registros";
		}

		$tabla_datos.="</tr>";
		$tabla_datos.="</table>";
		return $tabla_datos;
		$this->cerrarConexion();
	}//Fin de la funcion tablabasica
	function testing(){
		return "Hola";
	}
	function un_dato($dato,$query){
		$this->conectar();
		$sentencia=$this->CONEXION->query($query);
		if ($sentencia->num_rows>0) {
			while ($fila=$sentencia->fetch_array()) {
				return $fila[$dato];
			}
		}
		
		$this->cerrarConexion();
	}
	
}
?>