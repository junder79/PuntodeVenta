$(document).ready(function(){
		$('#f-desde').on('change', function(){
		var desde = $('#f-desde').val();
		var hasta = $('#f-hasta').val();
		var url = 'php/buscar_ventas_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#f-desde').on('change', function(){
		var desde = $('#f-desde').val();
		var hasta = $('#f-hasta').val();
		var url = 'php/buscar_ventas_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
});