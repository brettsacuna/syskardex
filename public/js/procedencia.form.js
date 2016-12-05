$("#formProcedencia").submit(function(event){
	event.preventDefault();
	$.post(url_aplication+'procedencia/process', $("#formProcedencia").serialize(), function(response) {
		if(response.result==true){
			tblProcedencia.fnReloadAjax();
			$("#modalProcedencia").modal("hide");
			Alerta("Registro Exitoso!!", "success");
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});//2225-2231