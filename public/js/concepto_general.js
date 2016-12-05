var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addConcepto'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editConcepto'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delConcepto'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"concepto_general/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblConcepto = $("#table-concepto").dataTable(param);/*.columnFilter({
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
$('#table-concepto tbody').on('click','tr', function () {
    tblConcepto.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-concepto tbody').on('dblclick','tr', function () {
	rowSelected = tblConcepto.fnGetData(tblConcepto.$('tr.bg-warning'));
    editConcepto(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addConcepto").click(function(){
	$("#formConcepto input, #formConcepto select, #formConcepto textarea").val("");
	$("#myModalLabel span").html("Registrar");
	$("#modalConcepto").modal("show");
});

$("#editConcepto").click(function(){
	rowSelected = tblConcepto.fnGetData(tblConcepto.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		editConcepto(rowSelected.DT_RowId);
	}
});

$("#delConcepto").click(function(){
	rowSelected = tblConcepto.fnGetData(tblConcepto.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		delConcepto(rowSelected.DT_RowId);
	}
});

function editConcepto(id){
	$("#carga").show();
	$.post(url_aplication+'concepto_general/get', {id_con: id}, function(response) {
		$("#id_con").val(response.id_con);
		$("#desc_con").val(response.desc_con);
		$("#myModalLabel span").html("Editar");
		$("#modalConcepto").modal("show");
		$("#carga").fadeOut("fast");
	},'json');
}

function delConcepto(id){
	Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
		$.post(url_aplication+'concepto_general/delete', {id_con: id}, function(response) {
			if(response.result==true){
				Alerta("Registro eliminado", "success");
				tblConcepto.fnReloadAjax();
			}else{
				Alerta(response.msg, "danger");
			}
		},'json');
	}, function(){

	});
}