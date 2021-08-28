
var texts = {
	1: {
		title: 'vernagir',
		description: 'informacia producti masin'
	},
	2: {
		title: 'vernagir',
		description: 'informacia producti masin'
	},
	3: {
		title: 'vernagir',
		description: 'informacia producti masin'
	},
	4: {
		title: 'vernagir',
		description: 'informacia producti masin'
	},










}



var images = [

	{ id: 1, url: 'images/sculptures/image-04-04-21-02-09-1.jpeg' },
	{ id: 1, url: 'images/sculptures/image-04-04-21-02-09-3.jpeg' },
	{ id: 1, url: 'images/sculptures/image-24-03-21-07-22-6.jpeg' },
	{ id: 2, url: 'images/witness/18) Guy ,Witness oil on canvas, 2020.jpeg' },
	{ id: 3, url: 'images/chorus/Oratories, oil on canvas, 70 x 90 cm , 2015.jpg' },
	{ id: 4, url: 'images/outside/Beyond boundaries, oil on canvas, 130x160cm..jpg' },

]






function updateImage(url) {
	var target = document.querySelector('.preview-image');
	target.src = url;
	target.parentNode.href = url;
	$([document.documentElement, document.body]).animate({
		scrollTop: $(".preview-image").offset().top - 100
	}, 400);
}

function createDOMElements(arr) {
	var list = document.querySelector('.items-list');
	var items = '';
	arr.map(item => {
		items += `
			<div id="${item.url}" class='col-md-4 px-half cursor-pointer' onclick="updateImage(this.id)">
				<img src="${item.url}" alt="${item.url}" />
			</div>
		`
	});
	list.innerHTML = items;
}

function initiateImageViewer(arr) {
	var imageContainer = document.querySelector('.preview-container');
	var descriptionContainer = document.querySelector('.description-container');
	if (!imageContainer || imageContainer.children.length) return;
	var item = arr[0];
	var image = `
		<a href="${item.url}" target="_blank">
			<img src='${item.url}' alt='img' class="preview-image" />
		</a>
	`;
	const data = texts[item.id] || {
		title: `Title ${item.id}`,
		description: `Description ${item.id}`
	};
	var content = `
		<h1 class='margin-bottom-40'>${data.title}</h1>
		<p>${data.description}</p>
	`

	imageContainer.innerHTML = image;
	descriptionContainer.innerHTML = content;
	createDOMElements(arr);
}

function initiateProductView() {
	var location = window.location;
	var search = location.search;
	if (search) {
		var id = search.substring(4);
		var fileredItems = images.filter(v => v.id == id);
		if (!fileredItems.length) return;
		initiateImageViewer(fileredItems)
	}
}

// Audio

var audio = document.querySelector('#divAudio')
$(window).load(function () {
	var _ccfa = getCookie('_ccfa')
	if (!_ccfa) {
		audio.play();
		if (audio.play()) {
			$('.shop-cart a i').removeClass('fa-music').addClass('fa-pause')
		}
	}
});

function initiateAudioPlay() {
	var btn = document.querySelector('.shop-cart');
	btn.onclick = function () {
		if (audio.paused) {
			audio.play()
			eraseCookie('_ccfa')
		} else {
			audio.pause()
			setCookie('_ccfa', 'g789sadqwe1245z___awqe%asdq7', 17500);
		}
		btn.children[0].innerHTML = `<i class="fa fa-${audio.paused ? 'music' : 'pause'}"></i>`;
	}
}

function initiatePage() {
	initiateProductView();
	initiateAudioPlay();
}

$(document).ready(function () {
	initiatePage();
})


$('.zoompro').elevateZoom({
	gallery: 'gallery',
	galleryActiveClass: 'active'
});

$('.sp-img_slider').slick({
	infinite: false,
	slidesToShow: 4,
	slidesToScroll: 1,
	arrows: false,
	prevArrow: '<button class="slick-prev"><i class="ion-ios-arrow-back"></i></button>',
	nextArrow: '<button class="slick-next"><i class="ion-ios-arrow-forward"></i></button>',
	responsive: [
		{
			breakpoint: 1199,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 520,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
			}
		}
	]
});

