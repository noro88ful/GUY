//DOM
// const $ = document.querySelector.bind(document);

//APP

$(window).on('load',function(){
	if($('.photo-input').find('.uploadedimages').length) {
		let App = {};
		let images = document.querySelectorAll('.uploadedimages p')

		//files template
		for (let i = 1; i < images.length; i++) {
			let template = $(`
			<div class="template-body">
			<div class="template-img">
			<img width="125" src="/files/${images[0].innerHTML}/tempfolder/${images[i].innerHTML}" class="image_this file_img--${i}">
			<input type="hidden" name="imageblob[]" value="">
			</div>
			<div class="file file--${i}">
				<div class="name"><span>${images[i].innerHTML}</div>
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
			$("#drop").addClass("hidden");
			$("footer").addClass("hasFiles");
			$(".importar").addClass("active");
			setTimeout(() => {
				$(".list-files").append(template);
			}, 1000);
		}

		for (let j = 0; j < images.length; j++) {
			let load = 1000 + (j * 1000); // fake load
			setTimeout(() => {
				$(`.file--${j}`).find(".progress").removeClass("active");
				$(`.file--${j}`).find(".done").addClass("anim");
			}, load);
		}
		// for (let i = 0; i < images.length; i++) {
		// 	let template = $(`
		// 		<div class="template-body">
		// 			<div class="template-img">
		// 				<img width="125" src="${images[i].innerHTML}" class="file_img--${i}">
		// 			</div>
		// 			<div class="file file--${i}">
		// 				<div class="name"><span></span></div>
		// 				<div class="progress active"></div>
		// 				<div class="done">
		// 					<a href="" target="_blank">
		// 						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000">
		// 						<g><path id="path" d="M500,10C229.4,10,10,229.4,10,500c0,270.6,219.4,490,490,490c270.6,0,490-219.4,490-490C990,229.4,770.6,10,500,10z M500,967.7C241.7,967.7,32.3,758.3,32.3,500C32.3,241.7,241.7,32.3,500,32.3c258.3,0,467.7,209.4,467.7,467.7C967.7,758.3,758.3,967.7,500,967.7z M748.4,325L448,623.1L301.6,477.9c-4.4-4.3-11.4-4.3-15.8,0c-4.4,4.3-4.4,11.3,0,15.6l151.2,150c0.5,1.3,1.4,2.6,2.5,3.7c4.4,4.3,11.4,4.3,15.8,0l308.9-306.5c4.4-4.3,4.4-11.3,0-15.6C759.8,320.7,752.7,320.7,748.4,325z"</g>
		// 						</svg>
		// 					</a>
		// 				</div>
		// 			</div>
		// 		</div>`)
		// 		$("#drop").addClass("hidden");
		// 		$("footer").addClass("hasFiles");
		// 		$(".importar").addClass("active");
		// 		setTimeout(() => {
		// 			$(".list-files").html(template);
		// 		}, 1000);
		
		// 		Object.keys(files).forEach(file => {
		// 			let load = 2000 + (file * 2000); // fake load
		// 			setTimeout(() => {
		// 				$(`.file--${file}`).find(".progress").removeClass("active");
		// 				$(`.file--${file}`).find(".done").addClass("anim");
		// 			}, load);
		// 		});
		// }
		
	}
})




// function readURL(input) {
// 	if (input.files && input.files[0]) {
// 		for (let i = 0; i < input.files.length; i++) {
// 			var reader = new FileReader();
// 			console.log(reader)
// 			// reader.onload = function(e) {
// 			// 	console.log(e)
// 			// 	// $(`.file_img--${i}`).attr('src', e.target.result)
// 			// }
// 			// reader.readAsDataURL(input.files[i]); // convert to base64 string
// 		}
// 	}
//  }
//  $("#image_input").on('change',function() {
// 	readURL(this);
//  });