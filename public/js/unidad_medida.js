var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addUnidadMedida'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editUnidadMedida'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delUnidadMedida'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"unidad_medida/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblUnidadMedida = $("#table-unidadmedida").dataTable(param);/*.columnFilter({
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
$('#table-unidadmedida tbody').on('click','tr', function () {
    tblUnidadMedida.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-unidadmedida tbody').on('dblclick','tr', function () {
	rowSelected = tblUnidadMedida.fnGetData(tblUnidadMedida.$('tr.bg-warning'));
    editUnidadMedida(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addUnidadMedida").click(function(){
	$("#formUnidadMedida input, #formUnidadMedida select, #formUnidadMedida textarea").val("");
	$("#myModalLabel span").html("Registrar");
	$("#modalUnidadMedida").modal("show");
});

$("#editUnidadMedida").click(function(){
	rowSelected = tblUnidadMedida.fnGetData(tblUnidadMedida.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		editUnidadMedida(rowSelected.DT_RowId);
	}
});

$("#delUnidadMedida").click(function(){
	rowSelected = tblUnidadMedida.fnGetData(tblUnidadMedida.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		delUnidadMedida(rowSelected.DT_RowId);
	}
});

function editUnidadMedida(id){
	$("#carga").show();
	$.post(url_aplication+'unidad_medida/get', {id_uni: id}, function(response) {
		$("#id_uni").val(response.id_uni);
		$("#desc_uni").val(response.desc_uni);
		$("#cant_uni").val(response.cant_uni);
		$("#myModalLabel span").html("Editar");
		$("#modalUnidadMedida").modal("show");
		$("#carga").fadeOut("fast");
	},'json');
}

function delUnidadMedida(id){
	Confirmar("¿Estas seguro de eliminar el registro seleccionado?", "warning", function(){
		$.post(url_aplication+'unidad_medida/delete', {id_uni: id}, function(response) {
			if(response.result==true){
				Alerta("Registro eliminado", "success");
				tblUnidadMedida.fnReloadAjax();
			}else{
				Alerta(response.msg, "danger");
			}
		},'json');
	}, function(){

	});
}