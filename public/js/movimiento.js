var rowSelected;

btns = "<button type='button' class='btn btn-flat btn-success' id='addMovimiento'><i class='fa fa-plus'></i> Registrar</button> ";
btns += "<button type='button' class='btn btn-flat btn-warning' id='editMovimiento'><i class='fa fa-pencil'></i> Editar</button> ";
btns += "<button type='button' class='btn btn-flat btn-danger' id='delMovimiento'><i class='fa fa-trash'></i> Eliminar</button> ";
param.language.lengthMenu = btns+param.language.lengthMenu;
param.sAjaxSource = url_aplication+"movimiento/grilla";
param.fnServerData = function( sUrl, aoData, fnCallback ) {
    $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "jsonp",
        "cache": false
    } );
};
var tblMovimiento = $("#table-movimiento").dataTable(param);/*.columnFilter({
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
$('#table-movimiento tbody').on('click','tr', function () {
    tblMovimiento.$('tr.bg-warning').removeClass('bg-warning');
    $(this).addClass('bg-warning');
});

$('#table-movimiento tbody').on('dblclick','tr', function () {
	rowSelected = tblMovimiento.fnGetData(tblMovimiento.$('tr.bg-warning'));
    editMovimiento(rowSelected.DT_RowId);
});

//operaciones CRUD
$("#addMovimiento").click(function(){
	$("#formMovimiento input, #formMovimiento select, #formMovimiento textarea").val("");
	$("#list-producto tbody").html("");
	$("#myModalLabel span").html("Registrar");
	$("#id_tmov").val(1);
	$("#id_tmov").trigger('change');
	$("#modalMovimiento").modal("show");
});

$("#editMovimiento").click(function(){
	rowSelected = tblMovimiento.fnGetData(tblMovimiento.$('tr.bg-warning'));
	if(rowSelected === null){
		Alerta("Seleccione un registro", "warning");
	}else{
		editMovimiento(rowSelected.DT_RowId);
	}
});

$("#delMovimiento").click(function(){
	rowSelected = tblMovimiento.fnGetData(tblMovimiento.$('tr.bg-warning'));
	if(rowSelected === null){
		Alerta("Seleccione un registro", "warning");
	}else{
		delMovimiento(rowSelected.DT_RowId);
	}
});

function editMovimiento(id){
	$("#carga").show();
	$.post(url_aplication+'movimiento/get', {id_mov: id}, function(response) {
		Movimiento = response.Movimiento;
		DetMovimiento = response.DetMovimiento;

		$("#id_mov").val(Movimiento.id_mov);
		$("#id_proc").val(Movimiento.id_proc);
		$("#id_tmov").val(Movimiento.id_tmov);
		$("#id_tmov").trigger('change');
		$("#solicitante").val(Movimiento.solicitante);
		$("#id_proc").val(Movimiento.id_proc);
		$("#id_ent").val(Movimiento.id_ent);
		$("#fac_mov").val(Movimiento.fac_mov);
		$("#fecha_mov").val(Movimiento.fecha_mov);

		$("#list-producto tbody").html("");
		$.each(DetMovimiento, function(index, obj) {
			t="<tr>";
		   t+="<td><input type='hidden' name='producto[]' class='producto-list' value='"+obj.id_pro+"'/>"+obj.desc_pro+"</td>";
		   t+="<td><input type='hidden' name='unidad-medida[]' value='"+obj.id_uni+"'/>"+obj.desc_uni+"</td>";
		   t+="<td><input type='text' class='precio-producto' name='precio[]' value='"+obj.pre_uni+"'/></td>";
		   t+="<td><input type='text' class='cantidad-producto' name='cantidad[]' value='"+obj.cant_pro+"' style='text-align: center;'/></td>";
		   t+="<td style='text-align:center'><a href='javascript:void(0)' class='btn btn-flat btn-sm btn-danger btnDelPro'><i class='fa fa-trash'></i></a></td>";
		   t+="</tr>";

		   $("#list-producto tbody").append(t);
		});

		$(".cantidad-producto, .precio-producto").numeric();


		$("#myModalLabel span").html("Editar");
		$("#modalMovimiento").modal("show");
		$("#carga").fadeOut("fast");
	},'json');
}

function delMovimiento(id){
	Confirmar("¿Estas seguro de liminar el registro seleccionado?", "warning", function(){
		$.post(url_aplication+'movimiento/delete', {id_mov: id}, function(response) {
			if(response.result===true){
				Alerta("Registro eliminado", "success");
				tblMovimiento.fnReloadAjax();
			}else{
				Alerta(response.msg, "danger");
			}
		},'json');
	}, function(){

	});
}