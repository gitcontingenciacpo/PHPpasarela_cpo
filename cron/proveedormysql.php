<?php
class Proveedormysql
{
	//Atributo para conexión a SGBD
	private $pdo;

		//Atributos del objeto proveedor
    public $nit;
    public $razonS;
    public $dir;
    public $tel;

	//Método de conexión a SGBD.
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Databasemysql::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo proveedor a la tabla.
	//public function Registrar(proveedor $data)
	public function RegistrarCitas($data)
	{
		// sentencia sql liberar tabla citas
			$stm = $this->pdo->prepare("delete from cita where EstadoCitaID in (0,1,127,130,131,132,134)");
			$stm->execute();
		foreach($data as $r){
		try	
		{			
			//Sentencia SQL insertar citas.
			$sql = "INSERT INTO cita (unidadID,Especialidad,medicoID,nombre_medico,identMedico,regProfMedico,Fecha,EstadoCitaID,IdAfiliado,Paciente,Nombres,Apellidos,Telefono,Producto,Nap,Inasistencia,Multa,Pago,grupoUsu,empresaId,IdHorario,Motivo_NotaCita,desc_Motivo_NotaCita,UsuarioNTID,cajaid)
		        VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $r->CODIGOIPS,
                    $r->ESPECIALIDAD,
                    $r->MedicoId,
                    $r->NombreMedico,
                    $r->identMedico,
                    $r->regProfMedico,
                    $r->FECHA,
                    $r->Estado,
                    $r->DocIden,
                    $r->PACIENTEID,
                    $r->NombreSolicit,
                    $r->ApellidosSolicit,
                    $r->Telefono,
                    $r->NOMBREPLAN,
                    $r->nap,
                    $r->Inasistencia,
                    $r->Multa,
                    $r->PagoFinal,
                    $r->grupoUsu,
                    $r->empresaId,
                    $r->Id_Movimiento,
                    $r->Motivo_NotaCita,
                    $r->desc_Motivo_NotaCita,
                    $r->UsuarioNTID,
                    $r->cajaid,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}

	}

	public function ContarHistorias()
	{
			try
		{
			$result = array();
			$stm = $this->pdo->prepare("select count(*) as total_sincronizado, unidadID from cita where sincroniza = 1 group by unidadID");
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	
	
	}	

	
	public function ListarHistorias()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			//$stm = $this->pdo->prepare("select a.CODIGOIPS,a.ESPECIALIDAD,a.MedicoId,a.NombreMedico,a.FECHA,a.Estado,a.DocIden,a.PACIENTEID,a.NombreSolicit,a.ApellidosSolicit,'' as Telefono,a.NOMBREPLAN,a.nap,'0' as Inasistencia,'0' as Multa,a.PagoFinal,'A' as grupoUsu,CASE WHEN EmpresaUsuario = 'CAPITAL SALUD EPSS SAS' THEN 1 WHEN EmpresaUsuario = 'Salud Total EPS' THEN 2 ELSE 3 END as empresaId,a.Id_Movimiento,'' as Motivo_NotaCita,'' as desc_Motivo_NotaCita,'1' as UsuarioNTID,'' as factura,'0' as cajaid from dbo.H_AgendaPAD a inner join (select b.id,b.MedicoId,max(id_movimiento) as id_movimiento from dbo.H_AgendaPAD b where b.CODIGOIPS = '1001' and b.Fecha between DATEADD(day,1,convert(date, GETDATE())) and DATEADD(day,2,convert(date, GETDATE())) and b.estado<>1 group by b.id,b.MedicoId) as c on a.Id_Movimiento = c.id_movimiento");
			$stm = $this->pdo->prepare("select * from hist_clinica WHERE sincroniza = 1");
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateHistorias(){
			$stm = $this->pdo->prepare("update hist_clinica set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}

	
	public function ListarHCOdontologia()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			//$stm = $this->pdo->prepare("select a.CODIGOIPS,a.ESPECIALIDAD,a.MedicoId,a.NombreMedico,a.FECHA,a.Estado,a.DocIden,a.PACIENTEID,a.NombreSolicit,a.ApellidosSolicit,'' as Telefono,a.NOMBREPLAN,a.nap,'0' as Inasistencia,'0' as Multa,a.PagoFinal,'A' as grupoUsu,CASE WHEN EmpresaUsuario = 'CAPITAL SALUD EPSS SAS' THEN 1 WHEN EmpresaUsuario = 'Salud Total EPS' THEN 2 ELSE 3 END as empresaId,a.Id_Movimiento,'' as Motivo_NotaCita,'' as desc_Motivo_NotaCita,'1' as UsuarioNTID,'' as factura,'0' as cajaid from dbo.H_AgendaPAD a inner join (select b.id,b.MedicoId,max(id_movimiento) as id_movimiento from dbo.H_AgendaPAD b where b.CODIGOIPS = '1001' and b.Fecha between DATEADD(day,1,convert(date, GETDATE())) and DATEADD(day,2,convert(date, GETDATE())) and b.estado<>1 group by b.id,b.MedicoId) as c on a.Id_Movimiento = c.id_movimiento");
			$stm = $this->pdo->prepare("select * from odontologia WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
		
	
	public function UpdateHCOdontologia(){
			$stm = $this->pdo->prepare("update odontologia set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}
	
	
	
	public function ListarOdontograma()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			//$stm = $this->pdo->prepare("select a.CODIGOIPS,a.ESPECIALIDAD,a.MedicoId,a.NombreMedico,a.FECHA,a.Estado,a.DocIden,a.PACIENTEID,a.NombreSolicit,a.ApellidosSolicit,'' as Telefono,a.NOMBREPLAN,a.nap,'0' as Inasistencia,'0' as Multa,a.PagoFinal,'A' as grupoUsu,CASE WHEN EmpresaUsuario = 'CAPITAL SALUD EPSS SAS' THEN 1 WHEN EmpresaUsuario = 'Salud Total EPS' THEN 2 ELSE 3 END as empresaId,a.Id_Movimiento,'' as Motivo_NotaCita,'' as desc_Motivo_NotaCita,'1' as UsuarioNTID,'' as factura,'0' as cajaid from dbo.H_AgendaPAD a inner join (select b.id,b.MedicoId,max(id_movimiento) as id_movimiento from dbo.H_AgendaPAD b where b.CODIGOIPS = '1001' and b.Fecha between DATEADD(day,1,convert(date, GETDATE())) and DATEADD(day,2,convert(date, GETDATE())) and b.estado<>1 group by b.id,b.MedicoId) as c on a.Id_Movimiento = c.id_movimiento");
			$stm = $this->pdo->prepare("select * from odontograma WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateOdontograma(){
			$stm = $this->pdo->prepare("update odontograma set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}
	
	
	
	
	
	
	public function ListarTmpImprimibles(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			//$stm = $this->pdo->prepare("select a.CODIGOIPS,a.ESPECIALIDAD,a.MedicoId,a.NombreMedico,a.FECHA,a.Estado,a.DocIden,a.PACIENTEID,a.NombreSolicit,a.ApellidosSolicit,'' as Telefono,a.NOMBREPLAN,a.nap,'0' as Inasistencia,'0' as Multa,a.PagoFinal,'A' as grupoUsu,CASE WHEN EmpresaUsuario = 'CAPITAL SALUD EPSS SAS' THEN 1 WHEN EmpresaUsuario = 'Salud Total EPS' THEN 2 ELSE 3 END as empresaId,a.Id_Movimiento,'' as Motivo_NotaCita,'' as desc_Motivo_NotaCita,'1' as UsuarioNTID,'' as factura,'0' as cajaid from dbo.H_AgendaPAD a inner join (select b.id,b.MedicoId,max(id_movimiento) as id_movimiento from dbo.H_AgendaPAD b where b.CODIGOIPS = '1001' and b.Fecha between DATEADD(day,1,convert(date, GETDATE())) and DATEADD(day,2,convert(date, GETDATE())) and b.estado<>1 group by b.id,b.MedicoId) as c on a.Id_Movimiento = c.id_movimiento");
			$stm = $this->pdo->prepare("select * from tmp_imprimibles WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateTmpImprimibles(){
			$stm = $this->pdo->prepare("update tmp_imprimibles set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}
	
	
		public function ListarTmpIncapacidades(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			//$stm = $this->pdo->prepare("select a.CODIGOIPS,a.ESPECIALIDAD,a.MedicoId,a.NombreMedico,a.FECHA,a.Estado,a.DocIden,a.PACIENTEID,a.NombreSolicit,a.ApellidosSolicit,'' as Telefono,a.NOMBREPLAN,a.nap,'0' as Inasistencia,'0' as Multa,a.PagoFinal,'A' as grupoUsu,CASE WHEN EmpresaUsuario = 'CAPITAL SALUD EPSS SAS' THEN 1 WHEN EmpresaUsuario = 'Salud Total EPS' THEN 2 ELSE 3 END as empresaId,a.Id_Movimiento,'' as Motivo_NotaCita,'' as desc_Motivo_NotaCita,'1' as UsuarioNTID,'' as factura,'0' as cajaid from dbo.H_AgendaPAD a inner join (select b.id,b.MedicoId,max(id_movimiento) as id_movimiento from dbo.H_AgendaPAD b where b.CODIGOIPS = '1001' and b.Fecha between DATEADD(day,1,convert(date, GETDATE())) and DATEADD(day,2,convert(date, GETDATE())) and b.estado<>1 group by b.id,b.MedicoId) as c on a.Id_Movimiento = c.id_movimiento");
			$stm = $this->pdo->prepare("select * from tmp_incapacidades WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateTmpIncapacidades(){
			$stm = $this->pdo->prepare("update tmp_incapacidades set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}
	

	public function ListarListaDocumentos(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			//$stm = $this->pdo->prepare("select a.CODIGOIPS,a.ESPECIALIDAD,a.MedicoId,a.NombreMedico,a.FECHA,a.Estado,a.DocIden,a.PACIENTEID,a.NombreSolicit,a.ApellidosSolicit,'' as Telefono,a.NOMBREPLAN,a.nap,'0' as Inasistencia,'0' as Multa,a.PagoFinal,'A' as grupoUsu,CASE WHEN EmpresaUsuario = 'CAPITAL SALUD EPSS SAS' THEN 1 WHEN EmpresaUsuario = 'Salud Total EPS' THEN 2 ELSE 3 END as empresaId,a.Id_Movimiento,'' as Motivo_NotaCita,'' as desc_Motivo_NotaCita,'1' as UsuarioNTID,'' as factura,'0' as cajaid from dbo.H_AgendaPAD a inner join (select b.id,b.MedicoId,max(id_movimiento) as id_movimiento from dbo.H_AgendaPAD b where b.CODIGOIPS = '1001' and b.Fecha between DATEADD(day,1,convert(date, GETDATE())) and DATEADD(day,2,convert(date, GETDATE())) and b.estado<>1 group by b.id,b.MedicoId) as c on a.Id_Movimiento = c.id_movimiento");
			$stm = $this->pdo->prepare("select * from lista_documentos WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateListaDocumentos(){
			$stm = $this->pdo->prepare("update lista_documentos set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}	
	
	
	public function ListarCitaUsada(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			//$stm = $this->pdo->prepare("select a.CODIGOIPS,a.ESPECIALIDAD,a.MedicoId,a.NombreMedico,a.FECHA,a.Estado,a.DocIden,a.PACIENTEID,a.NombreSolicit,a.ApellidosSolicit,'' as Telefono,a.NOMBREPLAN,a.nap,'0' as Inasistencia,'0' as Multa,a.PagoFinal,'A' as grupoUsu,CASE WHEN EmpresaUsuario = 'CAPITAL SALUD EPSS SAS' THEN 1 WHEN EmpresaUsuario = 'Salud Total EPS' THEN 2 ELSE 3 END as empresaId,a.Id_Movimiento,'' as Motivo_NotaCita,'' as desc_Motivo_NotaCita,'1' as UsuarioNTID,'' as factura,'0' as cajaid from dbo.H_AgendaPAD a inner join (select b.id,b.MedicoId,max(id_movimiento) as id_movimiento from dbo.H_AgendaPAD b where b.CODIGOIPS = '1001' and b.Fecha between DATEADD(day,1,convert(date, GETDATE())) and DATEADD(day,2,convert(date, GETDATE())) and b.estado<>1 group by b.id,b.MedicoId) as c on a.Id_Movimiento = c.id_movimiento");
			$stm = $this->pdo->prepare("select * from cita WHERE sincroniza = 1 and EstadoCitaID = 128");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateCitaUsada(){
			$stm = $this->pdo->prepare("update cita set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}
	
	
	public function ListarTFControl(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			//$stm = $this->pdo->prepare("select a.CODIGOIPS,a.ESPECIALIDAD,a.MedicoId,a.NombreMedico,a.FECHA,a.Estado,a.DocIden,a.PACIENTEID,a.NombreSolicit,a.ApellidosSolicit,'' as Telefono,a.NOMBREPLAN,a.nap,'0' as Inasistencia,'0' as Multa,a.PagoFinal,'A' as grupoUsu,CASE WHEN EmpresaUsuario = 'CAPITAL SALUD EPSS SAS' THEN 1 WHEN EmpresaUsuario = 'Salud Total EPS' THEN 2 ELSE 3 END as empresaId,a.Id_Movimiento,'' as Motivo_NotaCita,'' as desc_Motivo_NotaCita,'1' as UsuarioNTID,'' as factura,'0' as cajaid from dbo.H_AgendaPAD a inner join (select b.id,b.MedicoId,max(id_movimiento) as id_movimiento from dbo.H_AgendaPAD b where b.CODIGOIPS = '1001' and b.Fecha between DATEADD(day,1,convert(date, GETDATE())) and DATEADD(day,2,convert(date, GETDATE())) and b.estado<>1 group by b.id,b.MedicoId) as c on a.Id_Movimiento = c.id_movimiento");
			$stm = $this->pdo->prepare("select * from tf_control WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateTFControl(){
			$stm = $this->pdo->prepare("update tf_control set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}
	
	
	public function ListarTFValoracion(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			//$stm = $this->pdo->prepare("select a.CODIGOIPS,a.ESPECIALIDAD,a.MedicoId,a.NombreMedico,a.FECHA,a.Estado,a.DocIden,a.PACIENTEID,a.NombreSolicit,a.ApellidosSolicit,'' as Telefono,a.NOMBREPLAN,a.nap,'0' as Inasistencia,'0' as Multa,a.PagoFinal,'A' as grupoUsu,CASE WHEN EmpresaUsuario = 'CAPITAL SALUD EPSS SAS' THEN 1 WHEN EmpresaUsuario = 'Salud Total EPS' THEN 2 ELSE 3 END as empresaId,a.Id_Movimiento,'' as Motivo_NotaCita,'' as desc_Motivo_NotaCita,'1' as UsuarioNTID,'' as factura,'0' as cajaid from dbo.H_AgendaPAD a inner join (select b.id,b.MedicoId,max(id_movimiento) as id_movimiento from dbo.H_AgendaPAD b where b.CODIGOIPS = '1001' and b.Fecha between DATEADD(day,1,convert(date, GETDATE())) and DATEADD(day,2,convert(date, GETDATE())) and b.estado<>1 group by b.id,b.MedicoId) as c on a.Id_Movimiento = c.id_movimiento");
			$stm = $this->pdo->prepare("select * from tf_valoracion WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateTFValoracion(){
			$stm = $this->pdo->prepare("update tf_valoracion set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}
	
	
	public function ListarTOControl(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("select * from terapia_ocup_control WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateTOControl(){
			$stm = $this->pdo->prepare("update terapia_ocup_control set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}
	

	public function ListarTOValoracion(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("select * from terapia_ocup_val WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateTOValoracion(){
			$stm = $this->pdo->prepare("update terapia_ocup_val set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}


	public function ListarFonoControl(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("select * from fono_control WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateFonoControl(){
			$stm = $this->pdo->prepare("update fono_control set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}


	public function ListarFonoValoracion(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("select * from fono_valoracion WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateFonoValoracion(){
			$stm = $this->pdo->prepare("update fono_valoracion set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}

	public function ListarEMinimental(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("select * from escala_minimental WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateEMinimental(){
			$stm = $this->pdo->prepare("update escala_minimental set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}


	public function ListarEADesarrollo(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("select * from escala_ad WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateEADesarrollo(){
			$stm = $this->pdo->prepare("update escala_ad set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}


	public function ListarIOswestry(){
				try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("select * from indice_oswestry WHERE sincroniza = 1");
			
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
	
	public function UpdateIOswestry(){
			$stm = $this->pdo->prepare("update indice_oswestry set sincroniza = 0 where sincroniza = 1");
			$stm->execute();
	}



	
	
}
