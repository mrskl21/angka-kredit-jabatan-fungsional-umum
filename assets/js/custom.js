$(document).ready(function() {
	$('#flash_message').delay(5000).fadeOut('slow');
});

function updateStatus(status, route) {
	let container = document.querySelector('#statusButtonContainer')
	let statusText = (status === 'draft') ? 'Publish this Item' : 'Take down this Item'
	let alertColor = (status === 'draft') ? 'success' : 'warning'

	let strAvailable = `
        <a  href="${route}/status"
            class="btn btn-`+alertColor+`"
        >
            `+statusText+`
        </a>
    `

	return container.innerHTML = strAvailable
}

function deleteData(route) {
	let container = document.querySelector('#deleteButtonContainer')

	let strAvailable = `
        <a  href="${route}/delete"
            class="btn btn-danger"
        >
           Delete this item
        </a>
    `

	return container.innerHTML = strAvailable
}

function loadData(route, model) {
	$.ajax({
		type: 'GET',
		url: route,
		success: function(data) {
			if (model === 'slider') showSlider(data, route)
			if (model === 'file') showFile(data, route)
		},
		error: function(data) { console.log(data) }
	})
}

function showSlider(data, route) {
	let image_link = '<a href="/assets/uploads/images/sliders/' + data.image + '" target="_blank"> ' + data.image + ' </a>';
	$("#formEditSlider").attr('action', route + '/update');
	$("#formEditSlider input[name=title]").val(data.title)
	$("#formEditSlider #currentImage").html(image_link)
	$("#formEditSlider textarea[name=description]").val(data.description)
	$("#formEditSlider input[name=link]").val(data.link)
	$("#formEditSlider input[name=order_by]").val(data.order_by)
	$("#formEditSlider select[name=status]").val(data.status)
}


function showFile(data, route) {
	let file_link = '<a href="/assets/uploads/files/' + data.file + '" target="_blank"> ' + data.file + ' </a>';
	$("#formEditFile").attr('action', route + '/update');
	$("#formEditFile input[name=title]").val(data.title)
	$("#formEditFile #currentFile").html(file_link)
	$("#formEditFile textarea[name=description]").val(data.description)
	$("#formEditFile select[name=status]").val(data.status)
}
