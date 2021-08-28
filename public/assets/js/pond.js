//APP

// $("#image_input").on('change',function (e) {
// 	var _URL = window.URL || window.webkitURL;
//     var file, img;
//     if ((file = this.files[0])) {
//         img = new Image();
//         var objectUrl = _URL.createObjectURL(file);
//         img.onload = function () {
//             alert(this.width + " " + this.height);
//             _URL.revokeObjectURL(objectUrl);
//         };
//         img.src = objectUrl;
//     }
// });

let App = {};
App.init = (function() {
	//Init
	function handleFileSelect(evt) {
		const files = evt.target.files; // FileList object
		//files template
		if(files.length<11){
			let uploadedfiles = document.querySelectorAll('.template-body')
			if(uploadedfiles.length + files.length < 11){
				for (let i = 0; i < files.length; i++) {
					let types = ['jpg', 'jpeg', 'png', 'webp']
					if(types.indexOf( files[i].type.split('/')[1] ) != -1){
						if(Math.floor((files[i].size)/1048576)<11){
							var _URL = window.URL || window.webkitURL;
							var file, img;
							if ((file = files[i])) {
								img = new Image();
								var objectUrl = _URL.createObjectURL(file);
								img.onload = function () {
									if(this.width<50){
										let widtherror = $(`<p class="forgoterror">Նկարի լայնությունը պետք է լինի մինիմում 50 պիքսել <br> </p>`)
										$('.triggerFile').after(widtherror)
										setTimeout(function(){
											$('.forgoterror').hide("slow", function(){ $(this).remove(); })
										}, 3000);
									} else if(this.height<50){
										let widtherror = $(`<p class="forgoterror">Նկարի բարձրությունը պետք է լինի մինիմում 50 պիքսել <br> </p>`)
										$('.triggerFile').after(widtherror)
										setTimeout(function(){
											$('.forgoterror').hide("slow", function(){ $(this).remove(); })
										}, 3000);
									} else {
										let template = $(`
										<div class="template-body">
											<div class="template-img">
												<img width="125" src="${window.URL.createObjectURL(files[i])}" id="test_image" class="image_this file_img--${i}">
											</div>
											<div class="file file--${i}">
												<div class="name">
													<span>${files[i].name}</span>
													<div class="delete_image">X</div>
												</div>
												<div class="progress active"></div>
												<div class="done">
													<a href="" target="_blank">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000">
														<g><path id="path" d="M500,10C229.4,10,10,229.4,10,500c0,270.6,219.4,490,490,490c270.6,0,490-219.4,490-490C990,229.4,770.6,10,500,10z M500,967.7C241.7,967.7,32.3,758.3,32.3,500C32.3,241.7,241.7,32.3,500,32.3c258.3,0,467.7,209.4,467.7,467.7C967.7,758.3,758.3,967.7,500,967.7z M748.4,325L448,623.1L301.6,477.9c-4.4-4.3-11.4-4.3-15.8,0c-4.4,4.3-4.4,11.3,0,15.6l151.2,150c0.5,1.3,1.4,2.6,2.5,3.7c4.4,4.3,11.4,4.3,15.8,0l308.9-306.5c4.4-4.3,4.4-11.3,0-15.6C759.8,320.7,752.7,320.7,748.4,325z"</g>
														</svg>
													</a>
												</div>
											</div>
										</div>`)
										template.find('input').attr('value',template.find('.image_this').attr('src'))
										$("#drop").addClass("hidden");
										$("footer").addClass("hasFiles");
										$(".importar").addClass("active");
										setTimeout(() => {
											$(".list-files").append(template);
										}, 1000);

										for (let j = 0; j < files.length; j++) {
											let load = 1000 + (j * 1000); // fake load
											setTimeout(() => {
												$(`.file--${j}`).find(".progress").removeClass("active");
												$(`.file--${j}`).find(".done").addClass("anim");
											}, load);
										}
									}
								};
								img.src = objectUrl;
							}
						} else {
							let sizeerror = $(`<p class="forgoterror">Նկարի չափսը մեծ է 10MB-ից</p>`)
							$('.triggerFile').after(sizeerror)
							setTimeout(function(){
								$('.forgoterror').hide("slow", function(){ $(this).remove(); })
							}, 3000);
						}
					} else {
						let typeerror = $(`<p class="forgoterror">Ընտրվել է սխալ նկար</p>`)
						$('.triggerFile').after(typeerror)
						setTimeout(function(){
							$('.forgoterror').hide("slow", function(){ $(this).remove(); })
						}, 3000);
					}
				}
			} else {
				let pluscount = $(`<p class="forgoterror">Նկարների քանակը գերազանցում է 10-ը</p>`)
				$('.triggerFile').after(pluscount)
				setTimeout(function(){
					$('.forgoterror').hide("slow", function(){ $(this).remove(); })
				}, 3000);
			}
		} else {
			let counterror = $(`<p class="forgoterror">Նկարների քանակը գերազանցում է 10-ը</p>`)
			$('.triggerFile').after(counterror)
			setTimeout(function(){
				$('.forgoterror').hide("slow", function(){ $(this).remove(); })
			}, 3000);
		}
		
		

	}

	// trigger input
	$(document).on('click','.triggerFile',function(){
		console.log('asdasd')
		$(this).parent('.upload-files').find('#image_input').click();
	 });

	// drop events
	var drop = document.getElementById('drop');
	if(drop){
		$("#drop").ondragleave = evt => {
			$("#drop").classList.remove("active");
			evt.preventDefault();
		};
		$("#drop").ondragover = $("#drop").ondragenter = evt => {
			$("#drop").classList.add("active");
			evt.preventDefault();
		};
		$("#drop").ondrop = evt => {
			$("#image_input").files = evt.dataTransfer.files;
			$("footer").classList.add("hasFiles");
			$("#drop").classList.remove("active");
			evt.preventDefault();
		};
	}

	//upload more
	var importar = document.getElementsByClassName('importar');
	if(importar){
		$(document).on('click',".importar",function(){
			$(".list-files").innerHTML = "";
			$("footer").classList.remove("hasFiles");
			$(".importar").classList.remove("active");
			setTimeout(() => {
				$("#drop").classList.remove("hidden");
			}, 500);
		});
	}

	// input change
	var image_input = document.getElementById('image_input');
	if(image_input){
		$(document).on('change','#image_input',function(evt){
			handleFileSelect(evt);
	  });
	}
})();

$(document).on('click','.delete_image',function(){
	$(this).closest('.template-body').hide("slow", function(){ $(this).remove(); })
})