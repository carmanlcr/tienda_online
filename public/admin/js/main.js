$(document).ready(function(){
	$(".btn-detalle-pedido").on('click',function(e){
		e.preventDefault(); //Para que no ejecute la funcionalidad que tiene de forma predeterminada el enlace

		//obtener valores que se guardaron en los data
		var id_pedidos = $(this).data('id');
		var path = $(this).data('path');
		var token = $(this).data('token');
		var modal_title = $(".modal-title");
		var modal_body = $(".modal-body");
		var loading = '<p><i class="fa fa-circle-o-notch fa-spin"></i>Cargando Datos</p>';
		var table = $("#table-detalle-pedido tbody");
		var data = {'_token' : token,'ordenes_id' : id_pedidos}; //El formato es tipo JSON

		modal_title.html('Detalle del pedido: '+id_pedidos);
		table.html(loading); //En la tabla en la parte del tbody mostrará un icono de cargando datos

		//Función de Jquery llamada post para hacer peticion al servidor vía AJAX
		//Consta de 4 atributos
		//1 Path a donde se enviará 
		//2 La información que se va a enviar
		//3 Una función callback que recibirá la respuesta
		//Formato que queremos que nos responda el servidor
		$.post(path,data,function(item){
			table.html("");//Luego de recibir una respuesta se elimina el icono y el cargando datos

			for(var i = 0;i<item.length;i++){
				var fila ="<tr>";
				fila += "<td><img src='"+item[i].productos.imagen + "' width='30'></td>";
				fila +="<td>"+item[i].productos.nombre+"</td>";
				fila +="<td>"+parseFloat(item[i].precio).toFixed(2)+" Bs. </td>";
				fila +="<td>"+parseInt(item[i].cantidad)+"</td>";
				fila +="<td>"+item[i].productos.categorias.nombre+"</td>";
				fila +="<td>"+parseFloat(item[i].precio * item[i].cantidad).toFixed(2)+"</td>";
				fila +="</tr>";

				table.append(fila); //Se agrega lo anterior a la tabla con append metodo de Jquery
			}
		},'json');

	});

});