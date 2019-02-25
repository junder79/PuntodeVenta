$(document).on('ready' , constructor);
function constructor()
{
	sumarEntradas();
}

function sumarEntradas()
{
	$('#contenido').on('change' , '#valor1, #valor2' ,function(){

		var num1=parseInt($('#valor1').val());
		var num2=parseInt($('#valor2').val());

		if (isNaN(num1)) {
			num1=0;
		}

		if (isNaN(num2)) {
			num2=0;
		}

		$('#total_t').val(num1+num2);

	} );
}