$("#fecha_mov").datepicker({
      autoclose: true,
      language: 'es',
      //format: 'dd/mm/yyyy',
      format: 'yyyy-mm-dd'
});

$("#id_tmov").change(function(){
   $(".cboSalida, .cboEntrada").css("display", "none");
   $("#solicitante, #id_proc, #id_ent").val("");
   val = parseInt($("#id_tmov").val());
   if(val==1){
      $(".cboEntrada").show();
      $("#id_ent").attr("required", true);
      $("#id_proc").removeAttr("required");
      $("#solicitante").removeAttr("required");
   }else if(val==2){
      $(".cboSalida").show();
      $("#id_ent").removeAttr("required");
      $("#id_proc").attr("required", true);
      $("#solicitante").attr("required", true);
   }
});

$("#cant_pro").numeric();

$("#id_pro").select2();

$("#formMovimiento").submit(function(event){
	event.preventDefault();

   if($("#list-producto tbody").html()===""){
      Alerta("Agregue los productos a la tabla", "warning");
      return false;
   }

	$.post(url_aplication+'movimiento/process', $("#formMovimiento").serialize(), function(response) {
		if(response.result===true){
			tblMovimiento.fnReloadAjax();
			$("#modalMovimiento").modal("hide");
			Alerta("Registro Exitoso!!", "success");
		}else{
			Alerta(response.msg, "warning");
		}
	},'json');
});

$("#putProducto").click(function(){
   if($("#id_pro").val()===""){
      Alerta("Seleccione un producto", "warning");
      $("#id_pro").select2("open");
      return false;
   }else{
      if($(".producto-list[value='"+$("#id_pro").val()+"']").length){
         Alerta("El producto ya esta agregado", "warning");
         return false;
      }
   }

   if($("#id_uni").val()===""){
      Alerta("Seleccione una unidad de medida", "warning");
      $("#id_uni").focus();
      return false;
   }

   if(parseInt($("#id_tmov").val())===1){
      if($("#pre_uni").val()===""){
         Alerta("Ingrese el precio unitario del producto", "warning");
         $("#pre_uni").focus();
         return false;
      }
   }

   if($("#cant_pro").val()===""){
      Alerta("Seleccione una unidad de medida", "warning");
      $("#cant_pro").focus();
      return false;
   }


   //console.log($("#id_pro option:selected").html());
   t="<tr>";
   t+="<td><input type='hidden' name='producto[]' class='producto-list' value='"+$("#id_pro").val()+"'/>"+$("#id_pro option:selected").html()+"</td>";
   t+="<td><input type='hidden' name='unidad-medida[]' value='"+$("#id_uni").val()+"'/>"+$("#id_uni option:selected").html()+"</td>";
   t+="<td><input type='text' class='precio-producto' name='precio[]' value='"+$("#pre_uni").val()+"' style='text-align: center;'/></td>";
   t+="<td><input type='text' class='cantidad-producto' name='cantidad[]' value='"+$("#cant_pro").val()+"' style='text-align: center;'/></td>";
   t+="<td style='text-align:center'><a href='javascript:void(0)' class='btn btn-flat btn-sm btn-danger btnDelPro'><i class='fa fa-trash'></i></a></td>";
   t+="</tr>";

   $("#list-producto tbody").append(t);

   $(".cantidad-producto, .precio-producto").numeric();

   $("#id_pro").val("").select2();
   $("#id_uni, #cant_pro").val("");

});


$(document).on('click', '.btnDelPro', function(event) {
   $(this).parent().parent().remove();
});