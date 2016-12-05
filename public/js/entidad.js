var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addEntidad'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editEntidad'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delEntidad'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"entidad/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblEntidad = $("#table-entidad").dataTable(param);/*.columnFilter({
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
$('#table-entidad tbody').on('click','tr', function () {
    tblEntidad.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-entidad tbody').on('dblclick','tr', function () {
	rowSelected = tblEntidad.fnGetData(tblEntidad.$('tr.bg-warning'));
    editEntidad(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addEntidad").click(function(){
	$("#formEntidad input, #formEntidad select, #formEntidad textarea").val("");
	$("#myModalLabel span").html("Registrar");
	$("#modalEntidad").modal("show");
});

$("#editEntidad").click(function(){
	rowSelected = tblEntidad.fnGetData(tblEntidad.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		editEntidad(rowSelected.DT_RowId);
	}
});

$("#delEntidad").click(function(){
	rowSelected = tblEntidad.fnGetData(tblEntidad.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		delEntidad(rowSelected.DT_RowId);
	}
});

function editEntidad(id){
	$("#carga").show();
	$.post(url_aplication+'entidad/get', {id_ent: id}, function(response) {
		$("#id_ent").val(response.id_ent);
		$("#desc_ent").val(response.desc_ent);
		$("#myModalLabel span").html("Editar");
		$("#modalEntidad").modal("show");
		$("#carga").fadeOut("fast");
	},'json');
}

function delEntidad(id){
	Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
		$.post(url_aplication+'entidad/delete', {id_ent: id}, function(response) {
			if(response.result==true){
				Alerta("Registro eliminado", "success");
				tblEntidad.fnReloadAjax();
			}else{
				Alerta(response.msg, "danger");
			}
		},'json');
	}, function(){

	});
}