$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
let th = $('table thead tr th')
let inputs = [], tds = []
$(document).on('click', '.edit-item', function () {
	$('.edit_body').empty()
	tds = []
	inputs = []
	tds = $(this).closest('tr').find('td')
	for (let i = 0; i < tds.length - 1; i++) {
		if (th[i].getAttribute('fname') == 'image' || th[i].getAttribute('fname') == 'avatar' || th[i].getAttribute('fname') == 'cover' || th[i].getAttribute('fname') == 'bread_image' || th[i].getAttribute('fname') == 'footer_image' || th[i].getAttribute('fname') == 'audio' || th[i].getAttribute('fname') == 'smallimage') {
			let label = $(`<label class="adm-input_label">${th[i].innerHTML}</label>`)
			let input = $(`<input title="${th[i].getAttribute('fname')}" type="file" value="${tds[i].getAttribute('fvalue')}" name="${th[i].getAttribute('fname')}" class="form-control">`)
			inputs.push(label, input)
		} else if (th[i].getAttribute('fname') == 'text' || th[i].getAttribute('fname') == 'text_EN' || th[i].getAttribute('fname') == 'text_RU' || th[i].getAttribute('fname') == 'description') {
			let label = $(`<label class="adm-input_label">${th[i].innerHTML}</label>`)
			let textarea = $(`<textarea title="${th[i].getAttribute('fname')}" id="${th[i].getAttribute('fname')}2" type="file" name="${th[i].getAttribute('fname')}" class="form-control">${tds[i].getAttribute('fvalue')}</textarea>`)
			inputs.push(label, textarea)
		} else if (th[i].getAttribute('fname') == 'title') {
			let label = $(`<label class="adm-input_label">${th[i].innerHTML}</label>`)
			let textarea = $(`<textarea title="${th[i].getAttribute('fname')}" id="${th[i].getAttribute('fname')}2" type="file" name="${th[i].getAttribute('fname')}" class="form-control">${tds[i].getAttribute('fvalue')}</textarea>`)
			inputs.push(label, textarea)
		} else if (th[i].getAttribute('fname') == 'tour_id') {
			let input = $(`<input title="${th[i].getAttribute('fname')}" type="hidden" value="${tds[i].getAttribute('fvalue')}" name="${th[i].getAttribute('fname')}" class="form-control">`)
			inputs.push(input)
		} else if (th[i].getAttribute('fname') == 'select') {
			let label = $(`<label class="adm-input_label">${th[i].innerHTML}</label>`)
			let values = th[i].getAttribute('fsvalue').split(',')
			let htmlvalues = th[i].getAttribute('fsnames').split(',')
			var forselect = $(`
				<select name="${th[i].getAttribute('foname')}" class="admin-select">
					<option value="notadd">Ընտրված չէ</option>
				</select>
			`)
			for (let j = 0; j < values.length; j++) {
				if (values[j] != '') {
					if (tds[i].getAttribute('actvalue') == values[j]) {
						var option = $(`
							<option selected value="${values[j]}">${htmlvalues[j]}</option>
						`)
					} else {
						var option = $(`
						<option value="${values[j]}">${htmlvalues[j]}</option>
					`)
					}
					forselect.append(option)
				}
			}
			inputs.push(label, forselect)
		} else if (th[i].getAttribute('fname') != 'id' && th[i].getAttribute('fname') != '0') {
			let label = $(`<label class="adm-input_label">${th[i].innerHTML}</label>`)
			let input = $(`<input title="${th[i].getAttribute('fname')}" type="text" value="${tds[i].getAttribute('fvalue')}" name="${th[i].getAttribute('fname')}" class="form-control">`)
			inputs.push(label, input)
		}
	}
	let trID = $(this).closest('tr').attr('trID')
	let tblName = $(this).closest('table').attr('tblName')
	let trinput = $(`<input type="hidden" name="trID" value="${trID}">`)
	let tblinput = $(`<input type="hidden" name="tblName" value="${tblName}">`)
	inputs.push(trinput, tblinput)
	$('.edit_body').append(inputs)
	// CKEDITOR.replace('cketext');
})



