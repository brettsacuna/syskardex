var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addProcedencia'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editProcedencia'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delProcedencia'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"procedencia/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblProcedencia = $("#table-procedencia").dataTable(param);/*.columnFilter({
// Set filter type
	aoColumns: [
		{ type: "text" },
		{ type: "text" },
		{ type: "text" },
		{ type: "text" },
		{ type: "text" }
	]
});*/
//SELECCIONAR GRILLA
$('#table-procedencia tbody').on('click','tr', function () {
    tblProcedencia.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-procedencia tbody').on('dblclick','tr', function () {
	rowSelected = tblProcedencia.fnGetData(tblProcedencia.$('tr.bg-warning'));
    editProcedencia(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addProcedencia").click(function(){
	$("#formProcedencia input, #formProcedencia select, #formProcedencia textarea").val("");
	$("#myModalLabel span").html("Registrar");
	$("#modalProcedencia").modal("show");
});

$("#editProcedencia").click(function(){
	rowSelected = tblProcedencia.fnGetData(tblProcedencia.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		editProcedencia(rowSelected.DT_RowId);
	}
});

$("#delProcedencia").click(function(){
	rowSelected = tblProcedencia.fnGetData(tblProcedencia.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		delProcedencia(rowSelected.DT_RowId);
	}
});

function editProcedencia(id){
	$("#carga").show();
	$.post(url_aplication+'procedencia/get', {id_proc: id}, function(response) {
		$("#id_proc").val(response.id_proc);
		$("#desc_proc").val(response.desc_proc);
		$("#myModalLabel span").html("Editar");
		$("#modalProcedencia").modal("show");
		$("#carga").fadeOut("fast");
	},'json');
}

function delProcedencia(id){
	Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
		$.post(url_aplication+'procedencia/delete', {id_proc: id}, function(response) {
			if(response.result==true){
				Alerta("Registro eliminado", "success");
				tblProcedencia.fnReloadAjax();
			}else{
				Alerta(response.msg, "danger");
			}
		},'json');
	}, function(){

	});
}