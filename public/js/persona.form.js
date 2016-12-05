$("#dni_pers, #fnacimiento_pers").numeric();
$("#fnacimiento_pers").datepicker({
      autoclose: true,
      language: 'es',
      //format: 'dd/mm/yyyy',
      format: 'yyyy-mm-dd'
});

$("#formPersona").submit(function(event){
	event.preventDefault();
	$.post(url_aplication+'persona/process', $("#formPersona").serialize(), function(response) {
		if(response.result==true){
			tblPersona.fnReloadAjax();
			$("#modalPersona").modal("hide");
			Alerta("Registro Exitoso!!", "success");
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});