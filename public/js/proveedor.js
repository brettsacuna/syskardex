var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addProveedor'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editProveedor'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delProveedor'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"proveedor/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblProveedor = $("#table-proveedor").dataTable(param);/*.columnFilter({
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
$('#table-proveedor tbody').on('click','tr', function () {
    tblProveedor.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-proveedor tbody').on('dblclick','tr', function () {
	rowSelected = tblProveedor.fnGetData(tblProveedor.$('tr.bg-warning'));
    editProveedor(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addProveedor").click(function(){
	$("#formProveedor input, #formProveedor select, #formProveedor textarea").val("");
	$("#myModalLabel span").html("Registrar");
	$("#modalProveedor").modal("show");
});

$("#editProveedor").click(function(){
	rowSelected = tblProveedor.fnGetData(tblProveedor.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		editProveedor(rowSelected.DT_RowId);
	}
});

$("#delProveedor").click(function(){
	rowSelected = tblProveedor.fnGetData(tblProveedor.$('tr.bg-warning'));
	if(rowSelected == null){
		Alerta("Seleccione un registro", "warning")
	}else{
		delProveedor(rowSelected.DT_RowId);
	}
});

function editProveedor(id){
	$("#carga").show();
	$.post(url_aplication+'proveedor/get', {id_prov: id}, function(response) {
		$("#id_prov").val(response.id_prov);
		$("#desc_prov").val(response.desc_prov);
		$("#tel_prov").val(response.tel_prov);
		$("#dir_prov").val(response.dir_prov);
		$("#myModalLabel span").html("Editar");
		$("#modalProveedor").modal("show");
		$("#carga").fadeOut("fast");
	},'json');
}

function delProveedor(id){
	Confirmar("¿Estas seguro de eliminar el registro seleccionado?", "warning", function(){
		$.post(url_aplication+'proveedor/delete', {id_prov: id}, function(response) {
			if(response.result==true){
				Alerta("Registro eliminado", "success");
				tblProveedor.fnReloadAjax();
			}else{
				Alerta(response.msg, "danger");
			}
		},'json');
	}, function(){

	});
}