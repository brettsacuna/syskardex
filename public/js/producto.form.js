$("#formProducto").submit(function(event){
	event.preventDefault();
	$.post(url_aplication+'producto/process', $("#formProducto").serialize(), function(response) {
		if(response.result==true){
			tblProducto.fnReloadAjax();
			$("#modalProducto").modal("hide");
			Alerta("Registro Exitoso!!", "success");
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});//2225-2231