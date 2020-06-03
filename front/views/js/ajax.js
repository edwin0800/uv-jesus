
$(".subcategorias").click(function(e) { 
	e.preventDefault();
	$(".subcategorias").each(function(){
		$(".subcategorias").removeClass("active");
	})
	$(this).addClass("active");
	var producto = $(this).attr("nomCat");
    var action = 'subcategorias';    


	$.ajax({
        url: "views/ajax/ajax.php",
        type: "POST",
        async: true,
        data: {action:action,producto:producto},

        success: function (response) {
           

            if(response != "error"){
				console.log(response);
				$(".items-masonry__items").html(response);
            }
        },
        error: function(error){
           
        }
	});
	
});





$("input[name=categoria]").click(function(e) { 

	var producto = $(this).attr("nomCat");
    var action = 'subcategorias';



	$.ajax({
        url: "views/ajax/ajax.php",
        type: "POST",
        async: true,
        data: {action:action,producto:producto},

        success: function (response) {

            // console.log(response);

            $(".shop-dropdown__value span").html("BUSCANDO POR MARCA");
           

            if(response != "error"){
                console.log(response);
                if(response == "" || response == null || !response){
                    $(".shop-items-grid").html("<h1 class='text-center display-2 mt-5'>NO SE ENCONTRÓ NADA POR AQUÍ</h1>");
                }else{
                    $(".shop-items-grid").html(response);
                }
				
			
            }
        },
        error: function(error){
           
        }
	});
	
});



$("select#orden").change(function(e) { 

	var producto = $(this).val();
    var action = 'orden';

    // alert(producto);


	$.ajax({
        url: "views/ajax/ajax.php",
        type: "POST",
        async: true,
        data: {action:action,producto:producto},

        success: function (response) {
           

            if(response != "error"){
                console.log(response);
                if(response == "" || response == null || !response){
                    $(".shop-items-grid").html("<h1 class='text-center display-2 mt-5'>NO SE ENCONTRÓ NADA POR AQUÍ</h1>");
                }else{
                    $(".shop-items-grid").html(response);
                }
				
			
            }
        },
        error: function(error){
           
        }
	});
	
});



$("input[name=precio]").click(function(e) { 

	var producto = $(this).attr("prec");
    var action = 'precio';

	$.ajax({
        url: "views/ajax/ajax.php",
        type: "POST",
        async: true,
        data: {action:action,producto:producto},

        success: function (response) {
           
            $(".shop-dropdown__value span").html("BUSCANDO POR PRECIO");
            if(response != "error"){
                console.log(response);
                if(response == "" || response == null || !response){
                    $(".shop-items-grid").html("<h1 class='text-center display-2 mt-5'>NO SE ENCONTRÓ NADA POR AQUÍ</h1>");
                }else{
                    $(".shop-items-grid").html(response);
                }
				
			
            }
        },
        error: function(error){
           
        }
	});
	
});



$(".tallas").click(function(e) { 

	var producto = $(this).attr("etiq");
    var action = 'talla';



	$.ajax({
        url: "views/ajax/ajax.php",
        type: "POST",
        async: true,
        data: {action:action,producto:producto},

        success: function (response) {
            $(".shop-dropdown__value span").html("BUSCANDO POR TALLA");

            if(response != "error"){
                console.log(response);
                if(response == "" || response == null || !response){
                    $(".shop-items-grid").html("<h1 class='text-center display-2 mt-5'>NO SE ENCONTRÓ NADA POR AQUÍ</h1>");
                }else{
                    $(".shop-items-grid").html(response);
                }
				
			
            }
        },
        error: function(error){
           
        }
	});
	
});


$(".shop-dropdown__button span").click(function(e) { 

	var producto = null;
    var action = 'todos';

	$.ajax({
        url: "views/ajax/ajax.php",
        type: "POST",
        async: true,
        data: {action:action,producto:producto},

        success: function (response) {
           
            $(".shop-dropdown__value span").html("NINGÚN FILTRO");
            if(response != "error"){
                console.log(response);
                if(response == "" || response == null || !response){
                    $(".shop-items-grid").html("<h1 class='text-center display-2 mt-5'>NO SE ENCONTRÓ NADA POR AQUÍ</h1>");
                }else{
                    $(".shop-items-grid").html(response);
                }
				
			
            }
        },
        error: function(error){
           
        }
	});
	
});