function Alerta(text, typ){
	$.notify({
		// options
		message: text
	},{
		// settings
		type: typ,
		z_index: 1300,
		delay: 2000,
		placement: {
			from: "top",
			align: "center"
		},
		position:"fixed",
		timer: 50,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		}
	});
}

function Confirmar(title, type, fnA, fnC, btnType) {
	if(btnType==""||btnType==undefined){
		btnType = "btn-danger";
	}

    swal({
        title: title,
        type: type,
        showCancelButton: true,
  		confirmButtonClass: btnType,
        confirmButtonText: "Aceptar"
    }, function (isConfirm) {
        if (isConfirm) {
            if (typeof (fnA) == 'function')
                fnA();
        } else {
            if (typeof (fnC) == 'function')
                fnC();
        }
    });
}

function Mensaje(msg, type){
	swal("", msg, type);
}

$(document).on("mouseover", ".dataTable tbody tr", function(){
	if(!$(this).hasClass('bg-warning')){
		$(this).parent().removeClass('bg-info');
		$(this).addClass('bg-info');
	}
});

$(document).on("mouseout", ".dataTable tbody tr", function(){
	if(!$(this).hasClass('bg-warning')){
		$(this).removeClass('bg-info');
	}
});