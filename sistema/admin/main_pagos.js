$(buscar_datos());

function buscar_datos(consulta)
{
	$.ajax({
		url:'main_pagos.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta:consulta},
	})
	.done(function(respuesta) 
	{
		//div en el que se van a mostrar los valores consultados
		$("#pagos").html(respuesta);
	})
	.fail(function()
	{
			console.log("error");
	})

}


$(document).on('keyup','#caja_pagos',function()
{
	var valor = $(this).val();
	if(valor != "")
	{
		buscar_datos(valor);
	}
	else
	{
		buscar_datos();
	}
});