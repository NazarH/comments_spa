$('.comments__file').each(function (index) {
    lightGallery(document.querySelector('.img-block-'+index));
});

function showForm(action){
	document.getElementById('commentBlock').style='display: none';
	document.getElementById('formBlock').style='display: block';

	document.getElementById('formBlock').action=action;
}

function hideForm(){
	document.getElementById('commentBlock').style='display: flex';
	document.getElementById('formBlock').style='display: none';
}

function sort(action){
	document.getElementById('sort').action=action;
}

var count = 0;
function showMessages(id){
	if(count === 0){
		document.getElementById('commentArea'+id).style='display: table-row;';
		count++;
	} else {
		document.getElementById('commentArea'+id).style='display: none;';
		count = 0;
	}
}

