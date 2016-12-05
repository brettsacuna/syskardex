var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addProducto'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editProducto'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delProducto'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"producto/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblProducto = $("#table-producto").dataTable(param);/*.columnFilter({
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
$('#table-producto tbody').on('click','tr', function () {
    tblProducto.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-producto tbody').on('dblclick','tr', function () {
	rowSelected = tblProducto.fnGetData(tblProducto.$('tr.bg-warning'));
    editProducto(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addProducto").click(function(){
	$("#formProducto input, #formProducto select, #formProducto textarea").val("");
	$("#myModalLabel span").html("Registrar");
	$("#modalProducto").modal("show");
});

$("#editProducto").click(function(){
	rowSelected = tblProducto.fnGetData(tblProducto.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		editProducto(rowSelected.DT_RowId);
	}
});

$("#delProducto").click(function(){
	rowSelected = tblProducto.fnGetData(tblProducto.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		delProducto(rowSelected.DT_RowId);
	}
});

function editProducto(id){
	$("#carga").show();
	$.post(url_aplication+'producto/get', {id_pro: id}, function(response) {
		$("#id_pro").val(response.id_pro);
		$("#desc_pro").val(response.desc_pro);
		$("#id_con").val(response.id_con);
		$("#cuenta_contable").val(response.cuenta_contable);
		$("#clasificador").val(response.clasificador);
		$("#myModalLabel span").html("Editar");
		$("#modalProducto").modal("show");
		$("#carga").fadeOut("fast");
	},'json');
}

function delProducto(id){
	Confirmar("¿Estas seguro de eliminar el registro seleccionado?", "warning", function(){
		$.post(url_aplication+'producto/delete', {id_pro: id}, function(response) {
			if(response.result==true){
				Alerta("Registro eliminado", "success");
				tblProducto.fnReloadAjax();
			}else{
				Alerta(response.msg, "danger");
			}
		},'json');
	}, function(){

	});
}