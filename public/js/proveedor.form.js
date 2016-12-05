$("#formProveedor").submit(function(event){
	event.preventDefault();
	$.post(url_aplication+'proveedor/process', $("#formProveedor").serialize(), function(response) {
		if(response.result==true){
			tblProveedor.fnReloadAjax();
			$("#modalProveedor").modal("hide");
			Alerta("Registro Exitoso!!", "success");
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});//2225-2231