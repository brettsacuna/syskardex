$("#formUnidadMedida").submit(function(event){
	event.preventDefault();
	$.post(url_aplication+'unidad_medida/process', $("#formUnidadMedida").serialize(), function(response) {
		if(response.result==true){
			tblUnidadMedida.fnReloadAjax();
			$("#modalUnidadMedida").modal("hide");
			Alerta("Registro Exitoso!!", "success");
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});//2225-2231