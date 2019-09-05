<?php
class Proveedor
{
	//Atributo para conexión a SGBD
	private $pdo;



	//Método de conexión a SGBD.
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Databasesql::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método selecciona todas las tuplas de la tabla
	//agenda en caso de error se muestra por pantalla.
	public function ListarCitas()
	{
		try
		{
			$result = array();
			//Sentencia SQL para seleccion de datos.
			$stm = $this->pdo->prepare("select * from citas WHERE CODIGOIPS = 1001 ORDER BY FECHA");
			//Ejecucion de la sentencia SQL.
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
	

	public function RegistrarContarHistorias($data){
		
		foreach($data as $r)
		{
		
			try{
				$sql = $this->pdo->prepare("update conteo_sincro set total_sincronizado = ?, fecha_sincro = getdate() where CODIGOIPS = ?")
				->execute(
					array(
					$r->total_sincronizado,
				        $r->unidadID
					)
				);
			}
			catch(Exception $e)
			{
			//Obtener mensaje de error.
			die($e->getMessage());
			}
		}
	}
	

	public function RegistrarHistorias($data)
	{
		foreach($data as $r){
					try	
		{			
			//Sentencia SQL insertar citas.
			$sql = "INSERT INTO hist_clinica (IdAfiliado,Nap,motivo_consulta,rxs,ant_patologicos,ant_quirurgicos,ant_toxicoalergicos,ant_familiares,gineco_obs_m,gineco_obs_c,gineco_obs_fur,gineco_obs_gpacvm,gineco_obs_otros,ef_estado_general,ef_ta,ef_fr,ef_fc,ef_temp,ef_peso,ef_talla,ef_descripcion,impresion_diagnostica,sol_paraclinicos,plan_farmaco,evolucion_paciente,fecha_atencion,tipo_hist_clinica,regProfMedico,identMedico,nombre_medico,cod_cie,inicio_atencion,justificacion)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->motivo_consulta,
					$r->rxs,
					$r->ant_patologicos,
					$r->ant_quirurgicos,
					$r->ant_toxicoalergicos,
					$r->ant_familiares,
					$r->gineco_obs_m,
					$r->gineco_obs_c,
					$r->gineco_obs_fur,
					$r->gineco_obs_gpacvm,
					$r->gineco_obs_otros,
					$r->ef_estado_general,
					$r->ef_ta,
					$r->ef_fr,
					$r->ef_fc,
					$r->ef_temp,
					$r->ef_peso,
					$r->ef_talla,
					$r->ef_descripcion,
					$r->impresion_diagnostica,
					$r->sol_paraclinicos,
					$r->plan_farmaco,
					$r->evolucion_paciente,
					$r->fecha_atencion,
					$r->tipo_hist_clinica,
					$r->regProfMedico,
					$r->identMedico,
					$r->nombre_medico,
					$r->cod_cie,
					$r->inicio_atencion,
					$r->justificacion,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}
	
	public function RegistrarHCOdontologia($data)
	{
		foreach($data as $r){
					try	
		{			
			//Sentencia SQL insertar citas.
			$sql = "INSERT INTO odontologia (IdAfiliado,Nap,cod_cie,motivo_consulta,ant_medicos,observaciones,proced_realizado,remisiones,nombre_odontologo,regProfMedico,identMedico,ocupacion,acudiente,inicio_atencion,fecha_atencion,justificacion,odontograma)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->cod_cie,
					$r->motivo_consulta,
					$r->ant_medicos,
					$r->observaciones,
					$r->proced_realizado,
					$r->remisiones,
					$r->nombre_odontologo,
					$r->regProfMedico,
					$r->identMedico,
					$r->ocupacion,
					$r->acudiente,
					$r->inicio_atencion,
					$r->fecha_atencion,
					$r->justificacion,
					$r->odontograma,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}
	
	
	public function RegistrarOdontograma($data)
	{
		foreach($data as $r){
					try	
		{			
			//Sentencia SQL insertar citas.
			$sql = "INSERT INTO odontograma (idAfiliado,Nap,d11,d12,d13,d14,d15,d16,d17,d18,d21,d22,d23,d24,d25,d26,d27,d28,d31,d32,d33,d34,d35,d36,d37,d38,d41,d42,d43,d44,d45,d46,d47,d48,d51,d52,d53,d54,d55,d61,d62,d63,d64,d65,d71,d72,d73,d74,d75,d81,d82,d83,d84,d85)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->idAfiliado,
					$r->Nap,
					$r->d11,
					$r->d12,
					$r->d13,
					$r->d14,
					$r->d15,
					$r->d16,
					$r->d17,
					$r->d18,
					$r->d21,
					$r->d22,
					$r->d23,
					$r->d24,
					$r->d25,
					$r->d26,
					$r->d27,
					$r->d28,
					$r->d31,
					$r->d32,
					$r->d33,
					$r->d34,
					$r->d35,
					$r->d36,
					$r->d37,
					$r->d38,
					$r->d41,
					$r->d42,
					$r->d43,
					$r->d44,
					$r->d45,
					$r->d46,
					$r->d47,
					$r->d48,
					$r->d51,
					$r->d52,
					$r->d53,
					$r->d54,
					$r->d55,
					$r->d61,
					$r->d62,
					$r->d63,
					$r->d64,
					$r->d65,
					$r->d71,
					$r->d72,
					$r->d73,
					$r->d74,
					$r->d75,
					$r->d81,
					$r->d82,
					$r->d83,
					$r->d84,
					$r->d85,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}
	
	
	public function RegistrarTmpImprimibles($data)
	{
		foreach($data as $r){
					try	
		{			
			//Sentencia SQL insertar citas.
			$sql = "INSERT INTO tmp_imprimibles (descripcion_imp,idCita,idAfiliado,tipo_imp,id_tipo_imp,Nap,fecha_registro,cod_cie)
		        VALUES (?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->descripcion_imp,
					$r->idCita,
					$r->idAfiliado,
					$r->tipo_imp,
					$r->id_tipo_imp,
					$r->Nap,
					$r->fecha_registro,
					$r->cod_cie,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}
	
	
	
	public function RegistrarTmpIncapacidades($data)
	{
		foreach($data as $r){
					try	
		{			
			//Sentencia SQL insertar citas.
			$sql = "INSERT INTO tmp_incapacidades (IdAfiliado,Nap,identMedico,fecha_inicio,fecha_final,total_dias,fecha_registro,tipo_imp,cod_cie,justificacion)
		        VALUES (?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->identMedico,
					$r->fecha_inicio,
					$r->fecha_final,
					$r->total_dias,
					$r->fecha_registro,
					$r->tipo_imp,
					$r->cod_cie,
					$r->justificacion,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}
	

	public function RegistrarListaDocumentos($data)
	{
		foreach($data as $r){
		try	
		{			
			//Sentencia SQL insertar lista documentos.
			$sql = "INSERT INTO lista_documentos (IdAfiliado,Nap,tipo_documento)
		        VALUES (?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->tipo_documento,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}
	

	public function RegistrarCitaUsada($data)
	{
		foreach($data as $r){
					try	
		{			
			//Sentencia SQL insertar cita.
			$sql = "INSERT INTO cita (unidadID,Especialidad,medicoID,nombre_medico,identMedico,regProfMedico,Fecha,EstadoCitaID,IdAfiliado,Paciente,Nombres,Apellidos,Telefono,Direccion,Edad,Producto,Nap,Inasistencia,Multa,Pago,grupoUsu,empresaId,IdHorario,Motivo_NotaCita,desc_Motivo_NotaCita,UsuarioNTID,factura,fecha_factura,id_user_caja,cajaid,fechasincronizacion)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->unidadID,
					$r->Especialidad,
					$r->medicoID,
					$r->nombre_medico,
					$r->identMedico,
					$r->regProfMedico,
					$r->Fecha,
					$r->EstadoCitaID,
					$r->IdAfiliado,
					$r->Paciente,
					$r->Nombres,
					$r->Apellidos,
					$r->Telefono,
					$r->Direccion,
					$r->Edad,
					$r->Producto,
					$r->Nap,
					$r->Inasistencia,
					$r->Multa,
					$r->Pago,
					$r->grupoUsu,
					$r->empresaId,
					$r->IdHorario,
					$r->Motivo_NotaCita,
					$r->desc_Motivo_NotaCita,
					$r->UsuarioNTID,
					$r->factura,
					$r->fecha_factura,
					$r->id_user_caja,
					$r->cajaid,
					$r->fechasincronizacion,					
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}

	public function RegistrarTFControl($data)
	{
		foreach($data as $r){
		try	
		{			
			//Sentencia SQL insertar lista documentos.
			$sql = "INSERT INTO tf_control (IdAfiliado,Nap,diagnostico,evo_subjetiva,evo_objetivo,analisis_manejo,recomendaciones,inicio_atencion,fecha_consulta,justificacion,oswestry)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->diagnostico,
					$r->evo_subjetiva,
					$r->evo_objetivo,
					$r->analisis_manejo,
					$r->recomendaciones,
					$r->inicio_atencion,
					$r->fecha_consulta,
					$r->justificacion,
					$r->oswestry,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}


	public function RegistrarTFValoracion($data)
	{
		foreach($data as $r){
		try	
		{			
			//Sentencia SQL insertar lista documentos.
			$sql = "INSERT INTO tf_valoracion (IdAfiliado, Nap, motivo_consulta,ant_personales,expect_familiar,diagnostico,ef_estado_general,ef_lateralidad,ef_osteomuscular,ef_arcos_mov,ef_fuerza_mov,ef_retracciones,ef_sensibilidad,ef_marcha,ef_postura,ef_neurologo,ef_vascular_per,ef_piel_fanareas,analisis_manejo,recomendaciones,inicio_atencion,fecha_atencion,justificacion,oswestry)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->motivo_consulta,
					$r->ant_personales,
					$r->expect_familiar,
					$r->diagnostico,
					$r->ef_estado_general,
					$r->ef_lateralidad,
					$r->ef_osteomuscular,
					$r->ef_arcos_mov,
					$r->ef_fuerza_mov,
					$r->ef_retracciones,
					$r->ef_sensibilidad,
					$r->ef_marcha,
					$r->ef_postura,
					$r->ef_neurologo,
					$r->ef_vascular_per,
					$r->ef_piel_fanareas,
					$r->analisis_manejo,
					$r->recomendaciones,
					$r->inicio_atencion,
					$r->fecha_atencion,
					$r->justificacion,
					$r->oswestry,					
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}

	public function RegistrarTOControl($data)
	{
		foreach($data as $r){
		try	
		{			
			//Sentencia SQL insertar lista documentos.
			$sql = "INSERT INTO terapia_ocup_control (IdAfiliado,Nap,diagnostico,evo_subjetiva,evo_objetivo,analisis_manejo,recomendaciones,inicio_atencion,fecha_consulta,justificacion,escala_minimental,escala_ad)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->diagnostico,
					$r->evo_subjetiva,
					$r->evo_objetivo,
					$r->analisis_manejo,
					$r->recomendaciones,
					$r->inicio_atencion,
					$r->fecha_consulta,
					$r->justificacion,
					$r->escala_minimental,
					$r->escala_ad,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}
	
	public function RegistrarTOValoracion($data)
	{
		foreach($data as $r){
		try	
		{			
			//Sentencia SQL insertar lista documentos.
			$sql = "INSERT INTO terapia_ocup_val (IdAfiliado,Nap,motivo_consulta,ant_personales,expect_familiar,diagnostico,ef_actividades_diarias,ef_inst_diarias,ef_educacion,ef_trabajo,ef_juego,ef_ocio,ef_hab_motoras,ef_procesamiento,ef_comunicaciones,concepto_ocupacional,analisis_manejo,recomendaciones,inicio_atencion,fecha_atencion,justificacion,escala_minimental,escala_ad)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->motivo_consulta,
					$r->ant_personales,
					$r->expect_familiar,
					$r->diagnostico,
					$r->ef_actividades_diarias,
					$r->ef_inst_diarias,
					$r->ef_educacion,
					$r->ef_trabajo,
					$r->ef_juego,
					$r->ef_ocio,
					$r->ef_hab_motoras,
					$r->ef_procesamiento,
					$r->ef_comunicaciones,
					$r->concepto_ocupacional,
					$r->analisis_manejo,
					$r->recomendaciones,
					$r->inicio_atencion,
					$r->fecha_atencion,
					$r->justificacion,
					$r->escala_minimental,
					$r->escala_ad,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}


	public function RegistrarFonoControl($data)
	{
		foreach($data as $r){
		try	
		{			
			//Sentencia SQL insertar lista documentos.
			$sql = "INSERT INTO fono_control (IdAfiliado,Nap,diagnostico,evo_subjetiva,evo_objetivo,analisis_manejo,recomendaciones,inicio_atencion,fecha_consulta,justificacion)
		        VALUES (?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->diagnostico,
					$r->evo_subjetiva,
					$r->evo_objetivo,
					$r->analisis_manejo,
					$r->recomendaciones,
					$r->inicio_atencion,
					$r->fecha_consulta,
					$r->justificacion,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}

	public function RegistrarFonoValoracion($data)
	{
		foreach($data as $r){
		try	
		{			
			//Sentencia SQL insertar lista documentos.
			$sql = "INSERT INTO fono_valoracion (IdAfiliado,Nap,motivo_consulta,ant_personales,expect_familiar,diagnostico,ef_osteomuscular,ef_neurologico,evf_succion,evf_masticacion,evf_deglucion,evf_resp_lingu,evf_no_lingu,evf_linguistico,evf_organos_fono,evf_fonetico_fonolog,evf_sintaxis,evf_otras_obser,evf_respiracion,evf_voz,evf_lectura_auto,evf_lectura_compre,evf_escritura_auto,evf_escritura_compre,evf_dispo_basicos,diagnostico_fono,analisis_manejo,recomendaciones,inicio_atencion,fecha_atencion,justificacion)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->motivo_consulta,
					$r->ant_personales,
					$r->expect_familiar,
					$r->diagnostico,
					$r->ef_osteomuscular,
					$r->ef_neurologico,
					$r->evf_succion,
					$r->evf_masticacion,
					$r->evf_deglucion,
					$r->evf_resp_lingu,
					$r->evf_no_lingu,
					$r->evf_linguistico,
					$r->evf_organos_fono,
					$r->evf_fonetico_fonolog,
					$r->evf_sintaxis,
					$r->evf_otras_obser,
					$r->evf_respiracion,
					$r->evf_voz,
					$r->evf_lectura_auto,
					$r->evf_lectura_compre,
					$r->evf_escritura_auto,
					$r->evf_escritura_compre,
					$r->evf_dispo_basicos,
					$r->diagnostico_fono,
					$r->analisis_manejo,
					$r->recomendaciones,
					$r->inicio_atencion,
					$r->fecha_atencion,
					$r->justificacion,					
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}


	public function RegistrarEMinimental($data)
	{
		foreach($data as $r){
		try	
		{			
			//Sentencia SQL insertar lista documentos.
			$sql = "INSERT INTO escala_minimental (IdAfiliado,Nap,medicoID,identMedico,codIdPregunta,codEscalaForm,puntajePregunta,codRespuesta,fecha_registro)
		        VALUES (?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->medicoID,
					$r->identMedico,
					$r->codIdPregunta,
					$r->codEscalaForm,
					$r->puntajePregunta,
					$r->codRespuesta,
					$r->fecha_registro,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}

	public function RegistrarEADesarrollo($data)
	{
		foreach($data as $r){
		try	
		{			
			//Sentencia SQL insertar lista documentos.
			$sql = "INSERT INTO escala_ad (IdAfiliado,Nap,medicoID,identMedico,codIdPregunta,codEscalaForm,puntajePregunta,codRespuesta,observaciones,fecha_registro)
		        VALUES (?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->medicoID,
					$r->identMedico,
					$r->codIdPregunta,
					$r->codEscalaForm,
					$r->puntajePregunta,
					$r->codRespuesta,
					$r->observaciones,
					$r->fecha_registro,
										
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}


	public function RegistrarIOswestry($data)
	{
		foreach($data as $r){
		try	
		{			
			//Sentencia SQL insertar lista documentos.
			$sql = "INSERT INTO indice_oswestry (IdAfiliado,Nap,medicoID,identMedico,codIdPregunta,codEscalaForm,puntajePregunta,codRespuesta,fecha_registro)
		        VALUES (?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$r->IdAfiliado,
					$r->Nap,
					$r->medicoID,
					$r->identMedico,
					$r->codIdPregunta,
					$r->codEscalaForm,
					$r->puntajePregunta,
					$r->codRespuesta,
					$r->fecha_registro,									
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
			
		}
	}




}
