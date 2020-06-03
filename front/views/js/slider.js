
jQuery(document).ready(function($) {
	$(".tp-thumb").on("click",function(){

		console.log("click")
		var ref = $(this).attr("data-liref")

		var li = $("li[data-index=\""+ref+"\"]")

		if (li.hasClass('show_video')) {
			console.log("es un video")
			ver_video(li.attr("data-producto"),li.attr("data-video"))
		}
	})
});



$(".slider-close").on("click",function(){
	var id = $(this).attr("data-id-slider")
	$(".img-container-slider").html("")
	$(`.slider-${id}`).hide()
})

$(".changeImgSlider").on("click",function(){
	var id = $(this).attr("data-id-slider")
	var ind = $(this).attr("data-c")
	var limit = $(`.slider-${id}`).attr("data-limit")

	var img =  $(`.img-bar-${id} .img-item-selected img`)
	var video = $(`.img-bar-${id} .img-item-selected video`)
	console.log(img)
	console.log(video)

	if (img.length != 0) {
		var index = img.attr("data-index")
		var type = "image"	
	}else{
		var index = video.attr("data-index")
		var type = "video"
	}
		
	if (ind == '-1') {
		var nuevoIndex = (Number(index) - 1);
		if (nuevoIndex < 1) {
			nuevoIndex = limit
		}
	}else if (ind == '+1') {
		var nuevoIndex = (Number(index) + 1);
		if (nuevoIndex > limit) {
			nuevoIndex = 1
		}
	}

	$(".slider-options").removeClass("img-item-selected")
	var src_img = $(`img[data-index='${nuevoIndex}']`).attr("src")
	var src_video = $(`video[data-index='${nuevoIndex}']`).attr("src")

	if (src_img != undefined) {
		$(`img[data-index='${nuevoIndex}']`).parent().addClass("img-item-selected")	
	}else{
		$(`video[data-index='${nuevoIndex}']`).parent().addClass("img-item-selected")	
	}
	
	$(".img-actual-info").html(nuevoIndex)


	if (src_img != undefined) {
		var x_conten = `<img src="${src_img}">`

	}else{
		var x_conten = `
			<video  controls>
			  	<source src="${src_video}" type="video/mp4">
			</video>
		`
	}

	$(".img-slide-content-"+id).html(x_conten)

})


function ver_video(id,my_self){

	var datos = {
        verMediaSlide: true,
        id_prodcto: id
    }

    $(".img-bar").html("")
    ajax.peticion("normal", datos, "views/ajax/gestorProductos.php")
        .then((data)=>{           
        	// c(data)
        	var contador = 1;
        	var auxContador = 0;
        	var ln = data.length
        	$(".slider-overlay").attr('data-limit', ln);

        	for(var i = 0; i < data.length; i++){

        		var idnt = data[i].id_media
        		var link = data[i].path_media
        		var type = data[i].name_key
        		var selected = (idnt == my_self) ? "img-item-selected" : ""

        		if (type == "image") {
        			var media_big = `<img src="backend/${link}">`
        			var media_min = `<img src="backend/${link}" data-id-slider='1' data-type="image" data-index='${contador}'>`
        		}else{
        			var media_big = `
        				<video  controls>
						  	<source src="backend/${link}" type="video/mp4">
						</video>
					`
					var media_min = `
        				<video data-id-slider='1' data-index='${contador}' data-type="video" src='backend/${link}'>
						  	<source src="backend/${link}" type="video/mp4">
						</video>
					`
        		}

        		if (selected != "") {
        			$(".img-container-slider").html(media_big)
        			auxContador = contador
        		}
        		
        		$(".img-bar").append(`					
					<div>
                        <div class="img-container slider-img-container slider-options ${selected}">
                            ${media_min}
                        </div>
                    </div>
        		`)

        		contador++
        	}

        	$(".slider-overlay").show()
        	$(".info-bar").html(`
				<span class='img-actual-info'>${auxContador}</span> / <span class='total-imagenes'>${ln}</span> . 
				<a href="#" class='simple-a verLista' data-estado='0'>ver lista <i class='fas fa-angle-down'></i> </a>
        	`)

        	$(".slider-options img,video").on("click",function(){
				var id = $(this).attr("data-id-slider")
				var index = $(this).attr("data-index")
				var type = $(this).attr("data-type")
				var path = $(this).attr("src")

				console.log(type)
				console.log(path)

				$(".slider-options").removeClass("img-item-selected")
				$(this).parent().addClass("img-item-selected")
				$(".img-actual-info").html(index)

				if (type == "image") {
					var cont_m = `<img src="${path}">`
				}else if (type == "video") {
					var cont_m = `
						<video  controls>
						  	<source src="${path}" type="video/mp4">
						</video>
					`
				}

				$(".img-slide-content-"+id).html(cont_m)
			})
			$(".verLista").on("click",function(e){
				e.preventDefault()
				var estado = $(this).attr("data-estado")

				if (estado == 0) {
					$(".slider-footer").css('bottom', '5px');
					$(this).attr("data-estado",'1')
				}else{
					$(".slider-footer").css('bottom', '-82px');
					$(this).attr("data-estado",'0')
				}
			});
			
        }, (fail)=>{
            c("fallo")
            c(fail)
        })

	
}




// $(".verSlide").on("click",function(){
// 	var id = $(this).attr("data-id")
// 	var my_self = $(this).attr("data-self")

// 	var datos = {
//         verMediaSlide: true,
//         id_prodcto: id
//     }

//     $(".img-bar").html("")
//     ajax.peticion("normal", datos, "views/ajax/gestorProductos.php")
//         .then((data)=>{           
//         	// c(data)
//         	var contador = 1;
//         	var auxContador = 0;
//         	var ln = data.length
//         	$(".slider-overlay").attr('data-limit', ln);

//         	for(var i = 0; i < data.length; i++){

//         		var idnt = data[i].id_media
//         		var link = data[i].path_media
//         		var type = data[i].name_key
//         		var selected = (idnt == my_self) ? "img-item-selected" : ""

//         		if (type == "image") {
//         			var media_big = `<img src="backend/${link}">`
//         			var media_min = `<img src="backend/${link}" data-id-slider='1' data-type="image" data-index='${contador}'>`
//         		}else{
//         			var media_big = `
//         				<video  controls>
// 						  	<source src="backend/${link}" type="video/mp4">
// 						</video>
// 					`
// 					var media_min = `
//         				<video data-id-slider='1' data-index='${contador}' data-type="video" src='backend/${link}'>
// 						  	<source src="backend/${link}" type="video/mp4">
// 						</video>
// 					`
//         		}

//         		if (selected != "") {
//         			$(".img-container-slider").html(media_big)
//         			auxContador = contador
//         		}
        		
//         		$(".img-bar").append(`					
// 					<div>
//                         <div class="img-container slider-img-container slider-options ${selected}">
//                             ${media_min}
//                         </div>
//                     </div>
//         		`)

//         		contador++
//         	}

//         	$(".slider-overlay").show()
//         	$(".info-bar").html(`
// 				<span class='img-actual-info'>${auxContador}</span> / <span class='total-imagenes'>${ln}</span> . 
// 				<a href="#" class='simple-a verLista' data-estado='0'>ver lista <i class='fas fa-angle-down'></i> </a>
//         	`)

//         	$(".slider-options img,video").on("click",function(){
// 				var id = $(this).attr("data-id-slider")
// 				var index = $(this).attr("data-index")
// 				var type = $(this).attr("data-type")
// 				var path = $(this).attr("src")

// 				console.log(type)
// 				console.log(path)

// 				$(".slider-options").removeClass("img-item-selected")
// 				$(this).parent().addClass("img-item-selected")
// 				$(".img-actual-info").html(index)

// 				if (type == "image") {
// 					var cont_m = `<img src="${path}">`
// 				}else if (type == "video") {
// 					var cont_m = `
// 						<video  controls>
// 						  	<source src="${path}" type="video/mp4">
// 						</video>
// 					`
// 				}

// 				$(".img-slide-content-"+id).html(cont_m)
// 			})
// 			$(".verLista").on("click",function(e){
// 				e.preventDefault()
// 				var estado = $(this).attr("data-estado")

// 				if (estado == 0) {
// 					$(".slider-footer").css('bottom', '5px');
// 					$(this).attr("data-estado",'1')
// 				}else{
// 					$(".slider-footer").css('bottom', '-82px');
// 					$(this).attr("data-estado",'0')
// 				}
// 			});
			
//         }, (fail)=>{
//             c("fallo")
//             c(fail)
//         })

	
// })