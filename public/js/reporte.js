$(document).ready(function() {
	param.language.lengthMenu = "N° de Registros "+param.language.lengthMenu;
	param.bServerSide = false;
	$("#tblStock, #tblPorTerminarStock, #tblSinStock").dataTable(param);

	$(".option-stock").click(function(event) {
		val = $(this).attr("key-id");
		$.post(url_aplication+'reporte/getMovimientos', {id_pro: val}, function(response) {
			$("#movimientos tbody").html("");
			$("#name_pro").html(response[0].desc_pro);

			$.each(response, function(index, obj) {
				t="<tr>";
				t+="<td>"+obj.desc_tmov+"</td>";
				t+="<td>"+obj.fac_mov+"</td>";
				t+="<td>"+obj.stock_act+"</td>";
				t+="<td>"+obj.cant_ent+"</td>";
				t+="<td>"+obj.stock_res+"</td>";
				t+="</tr>";
				$("#movimientos tbody").append(t);
			});
			$("#modalMovimiento").modal("show");
		},'json');
	});
});
