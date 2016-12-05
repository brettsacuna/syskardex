$("#formConcepto").submit(function(event){
	event.preventDefault();
	$.post(url_aplication+'concepto_general/process', $("#formConcepto").serialize(), function(response) {
		if(response.result==true){
			tblConcepto.fnReloadAjax();
			$("#modalConcepto").modal("hide");
			Alerta("Registro Exitoso!!", "success");
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});