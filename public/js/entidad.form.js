$("#formEntidad").submit(function(event){
	event.preventDefault();
	$.post(url_aplication+'entidad/process', $("#formEntidad").serialize(), function(response) {
		if(response.result==true){
			tblEntidad.fnReloadAjax();
			$("#modalEntidad").modal("hide");
			Alerta("Registro Exitoso!!", "success");
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});//2225-2231