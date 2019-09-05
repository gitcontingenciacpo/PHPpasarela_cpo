<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'proveedormysql.php';
require_once 'proveedor.php';


class ProveedorController{
	
	private $model;
	private $modelmysql;
    //Creación del modelo
    public function __CONSTRUCT(){
    $this->model = new proveedor();
	$this->modelmysql = new proveedormysql();
    }

    //Llamado plantilla principal
    public function Index(){
		$this->ListarHistorias();
		$this->UpdateHistorias();
		$this->ListarHCOdontologia();
    		$this->UpdateHCOdontologia();
		$this->ListarOdontograma();
    		$this->UpdateOdontograma();
		$this->ListarTmpImprimibles();
		$this->UpdateTmpImprimibles();
		$this->ListarTmpIncapacidades();
		$this->UpdateTmpIncapacidades();
		//$this->ListarListaDocumentos();
		//$this->UpdateListaDocumentos();
		$this->ListarCitaUsada();
		$this->UpdateCitaUsada();
		$this->ListarTFControl();
		$this->UpdateTFControl();
		$this->ListarTFValoracion();
		$this->UpdateTFValoracion();
		$this->ListarTOControl();
		$this->UpdateTOControl();
		$this->ListarTOValoracion();
		$this->UpdateTOValoracion();
		$this->ListarFonoControl();
		$this->UpdateFonoControl();
		$this->ListarFonoValoracion();
		$this->UpdateFonoValoracion();
		$this->ListarEMinimental();
		$this->UpdateEMinimental();
		$this->ListarEADesarrollo();
		$this->UpdateEADesarrollo();	
		$this->ListarIOswestry();
		$this->UpdateIOswestry();
		$this->ListarCitas();
		$this->Sincronizacion();
    }


	public function ListarCitas(){
		$pvd = new proveedor();
		$pvd = $this->model->ListarCitas();
		$object = (object) $pvd;
		$this->modelmysql->RegistrarCitas($object);
	}
	
	public function ListarHistorias(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarHistorias();
		$object = (object) $pvdmysql;
		$this->model->RegistrarHistorias($object);
	}
	
	public function UpdateHistorias(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateHistorias();
	}
	
	public function ListarHCOdontologia(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarHCOdontologia();
		$object = (object) $pvdmysql;
		$this->model->RegistrarHCOdontologia($object);
	}
	
	public function UpdateHCOdontologia(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateHCOdontologia();
	}
	
	public function ListarOdontograma(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarOdontograma();
		$object = (object) $pvdmysql;
		$this->model->RegistrarOdontograma($object);
	}
	
	public function UpdateOdontograma(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateOdontograma();
	}	
	
	public function ListarTmpImprimibles(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarTmpImprimibles();
		$object = (object) $pvdmysql;
		$this->model->RegistrarTmpImprimibles($object);
	} 
	
	public function UpdateTmpImprimibles(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateTmpImprimibles();
	}
	
	public function ListarTmpIncapacidades(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarTmpIncapacidades();
		$object = (object) $pvdmysql;
		$this->model->RegistrarTmpIncapacidades($object);
	} 
	
	public function UpdateTmpIncapacidades(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateTmpIncapacidades();
	}

	public function ListarListaDocumentos(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarListaDocumentos();
		$object = (object) $pvdmysql;
		$this->model->RegistrarListaDocumentos($object);
	} 
	
	public function UpdateListaDocumentos(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateListaDocumentos();
	}

	public function ListarCitaUsada(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarCitaUsada();
		$object = (object) $pvdmysql;
		$this->model->RegistrarCitaUsada($object);
	} 
	
	public function UpdateCitaUsada(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateCitaUsada();
	}
	
		
	public function ListarTFControl(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarTFControl();
		$object = (object) $pvdmysql;
		$this->model->RegistrarTFControl($object);
	} 
	
	public function UpdateTFControl(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateTFControl();
	}	
	
	
	public function ListarTFValoracion(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarTFValoracion();
		$object = (object) $pvdmysql;
		$this->model->RegistrarTFValoracion($object);
	} 
	
	public function UpdateTFValoracion(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateTFValoracion();
	}		


	public function ListarTOControl(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarTOControl();
		$object = (object) $pvdmysql;
		$this->model->RegistrarTOControl($object);
	} 
	
	public function UpdateTOControl(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateTOControl();
	}


	public function ListarTOValoracion(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarTOValoracion();
		$object = (object) $pvdmysql;
		$this->model->RegistrarTOValoracion($object);
	} 
	
	public function UpdateTOValoracion(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateTOValoracion();
	}

	public function ListarFonoControl(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarFonoControl();
		$object = (object) $pvdmysql;
		$this->model->RegistrarFonoControl($object);
	} 
	
	public function UpdateFonoControl(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateFonoControl();
	}

	public function ListarFonoValoracion(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarFonoValoracion();
		$object = (object) $pvdmysql;
		$this->model->RegistrarFonoValoracion($object);
	} 
	
	public function UpdateFonoValoracion(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateFonoValoracion();
	}

	public function ListarEMinimental(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarEMinimental();
		$object = (object) $pvdmysql;
		$this->model->RegistrarEMinimental($object);
	} 
	
	public function UpdateEMinimental(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateEMinimental();
	}
	
	public function ListarEADesarrollo(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarEADesarrollo();
		$object = (object) $pvdmysql;
		$this->model->RegistrarEADesarrollo($object);
	} 
	
	public function UpdateEADesarrollo(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateEADesarrollo();
	}
	
	
	
	public function ListarIOswestry(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ListarIOswestry();
		$object = (object) $pvdmysql;
		$this->model->RegistrarIOswestry($object);
	} 
	
	public function UpdateIOswestry(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->UpdateIOswestry();
	}		
		

	public function Sincronizacion(){
		$pvdmysql = new proveedormysql();
		$pvdmysql = $this->modelmysql->ContarHistorias();
		$object = (object) $pvdmysql;
		$this->model->RegistrarContarHistorias($object);
	}
	
	
	
	
}
