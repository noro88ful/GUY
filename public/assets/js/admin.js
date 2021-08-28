// function findWord(word, str, to) {
// 	word.html(word.html().replace(str,to));
// }

// const { cssNumber } = require("jquery");

// findWord($('.dataTables_length label'),'Show', 'Քանակ')
// findWord($('.dataTables_length label'),'entries', '')
// findWord($('.dataTables_filter'),'Search', 'Փնտրել')
// findWord($('.dataTables_info'),'Showing', 'Էջ')
// findWord($('.dataTables_info'),'to', '-ից')
// findWord($('.dataTables_info'),'of', 'ընդհանուր')
// findWord($('.dataTables_info'),'entries', '')
// findWord($('.paginate_button.previous a'),'Previous', 'Նախորդ')
// findWord($('.paginate_button.next a'),'Next', 'Հաջորդ')
// $.get("http://cb.am/latest.json.php", function(data){
// 	console.log(data)
// });



// function url_content(url){
// 	return $.get(url);
// }


// url_content("http://cb.am/latest.json.php").success(function(data){ 
//  alert(data['USD']);
// });

// $.ajax({
// 	url: 'http://cb.am/latest.json.php',
// 	headers: {
// 		 'Content-Type': 'application/x-www-form-urlencoded'
// 	},
// 	type: "GET", /* or type:"GET" or type:"PUT" */
// 	dataType: "json",
// 	data: {
// 	},
// 	success: function (result) {
// 		 console.log(result);
// 	},
// 	error: function () {
// 		 console.log("error");
// 	}
// });

// var xhr = new XMLHttpRequest();
// xhr.onreadystatechange = handleStateChange; // Implemented elsewhere.
// xhr.open("GET", chrome.extension.getURL('http://cb.am/latest.json.php'), true);
// xhr.send();

$(window).on('load',function(){
	$.each($('.color_tr'),function(){
		let status = $(this).find('.color_status').attr('fvalue')
		if(status==='1'){
			$(this).css('background-color','rgba(0, 128, 0, 0.3)')
			$(this).css('color','white')
		}
		else if(status==='2'){
			$(this).css('background-color','rgba(128, 0, 0, 0.3)')
			$(this).css('color','white')
		} else {
			$(this).css('color','white')
		}
	})
})

$.ajaxSetup({
	headers: {
		 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$('.accept-product').on('click',function(){
	$.ajaxSetup({
		headers: {
			 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	let id = $(this).closest('tr').find('.product-id').html()
	$.ajax({
		url:'/acceptproduct',
		type:'post',
		data:{id},
		success:(r)=>{
			$(this).parent().find($('.declare-product')).remove()
			$(this).closest('tr').css('background-color','rgba(0, 128, 0, 0.3)')
		}
	})
})
$('.declare-product').on('click',function(){
	$.ajaxSetup({
		headers: {
			 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	let id = $(this).closest('tr').find('.product-id').html()
	$.ajax({
		url:'/declareproduct',
		type:'post',
		data:{id},
		success:(r)=>{
			$(this).parent().find($('.accept-product')).remove()
			$(this).closest('tr').css('background-color','rgba(128, 0, 0, 0.3)')
		}
	})
})

$('.accept-forum').on('click',function(){
	$.ajaxSetup({
		headers: {
			 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	let id = $(this).closest('tr').find('.tab-id').html()
	$.ajax({
		url:'/acceptforum',
		type:'post',
		data:{id},
		success:(r)=>{
			$(this).parent().find($('.declare-forum')).remove()
			$(this).closest('tr').css('background-color','rgba(0, 128, 0, 0.3)')
		}
	})
})
$('.declare-forum').on('click',function(){
	$.ajaxSetup({
		headers: {
			 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	let id = $(this).closest('tr').find('.tab-id').html()
	$.ajax({
		url:'/declareforum',
		type:'post',
		data:{id},
		success:(r)=>{
			$(this).parent().find($('.accept-forum')).remove()
			$(this).closest('tr').css('background-color','rgba(128, 0, 0, 0.3)')
		}
	})
})

var currselect = document.querySelectorAll('.ex-select')
if(currselect.length>0){
	var currinput = document.querySelectorAll('.ex-input')
	var API_URL = "https://api.exchangeratesapi.io/latest";
	var currhtml = '';
	async function currency(){
		const res = await fetch(API_URL)
		const data = await res.json()
		const arrKeys = Object.keys(data.rates)
		const rates = data.rates
		arrKeys.map(item =>{
			return currhtml += `<option value=${item}>${item}</option>`;
		})
		for (let i = 0; i < currselect.length; i++) {
			currselect[i].innerHTML = currhtml;
		}
		function convert(i,j){
			currinput[i].value = currinput[j].value * rates[currselect[i].value] / rates[currselect[j].value];
		}
		currinput[0].addEventListener('keyup',()=> convert(1,0))
		currinput[1].addEventListener('keyup',()=> convert(0,1))
		currselect[0].addEventListener('change',()=> convert(1,0))
		currselect[1].addEventListener('change',()=> convert(0,1))
	}
	
	currency()
}


