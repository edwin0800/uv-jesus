/**************************
 * ************************
 * *******SHOP*************
 * ************************
 *************************/




$(".tallas").click(function(e) { 
	e.preventDefault();
	$(".tallas").each(function(){
		$(".tallas").removeClass("active");
	})
	$(this).addClass("active");
  
  

	
});



$("#zelle").click(function (e) { 
	e.preventDefault();
	// Swal.fire(	
	// 	'¿Desea comprar el siguiente producto?',
	// 	'<h5>Nombre ' + $("#nombreProducto").html() + '<br>Marca: ' + $("#marcaProducto").html() + '<br>Precio ' + $("#precioProducto").html() + '</h5>',
	// 	'question',
		
	//   )

	  Swal.fire({
		title: '¿Desea comprar el siguiente producto?',
		html: '<strong>Nombre: </strong>' + $("#nombreProducto").html() + "<br>" + '<strong>Marca: </strong> ' + $("#marcaProducto").html() + "<br>" + '<strong>Precio: </strong> ' + $("#precioProducto").html(),
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, quiero esos zapatos',
		cancelButtonText: 'Elegir otro'
	  }).then((result) => {
		if (result.value) {
		  Swal.fire(
			'Por favor Realiza Aqui el pago! <br> Metodo de pago Zelle',
			'Dirección de pago<br/> 614-8176199<br> Banco:<br/> Huntington Bank<br/>Mandar capture y dirección de envio, modelo del zapato, talla del zapato al siguiente correo:<br/> universalvenezuela@gmail.com',
			'success'
		  )
		}
	  })
	
});


$(".marcaSlide").click(function(e) { 
	e.preventDefault();
	$(".marcaItems").slideToggle(600);
	$(this).toggleClass("rotate");
});

$(".precioSlide").click(function(e) { 
	e.preventDefault();
	$(".precioItems").slideToggle(600);
	$(this).toggleClass("rotate");
});

$(".tallaSlide").click(function(e) { 
	e.preventDefault();
	$(".tallaItems").slideToggle(600);
	$(this).toggleClass("rotate");
});