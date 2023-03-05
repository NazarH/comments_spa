function getRandIndex(maxLength){
	return Math.floor(Math.random()*maxLength);
}
var data;

function getCaptcha(){
	var canvas = document.getElementById('canvas');
	var pen = canvas.getContext('2d');
	var captch = Math.random().toString('36').substring(2,10);

	pen.font = "55px Georgia";
	pen.fillStyle = "grey";
	pen.fillRect(0,0,400,400);
	pen.fillStyle = "orange";
	maxLength = captch.length;
	index1 = getRandIndex(maxLength);
	index2 = getRandIndex(maxLength);

	captch = captch.substring(0, index1-1)+captch[index1].toUpperCase()+captch.substring(index1+1, maxLength);
	captch = captch.substring(0, index2-1)+captch[index2].toUpperCase()+captch.substring(index2+1, maxLength);

	data = captch;
	captch = captch.split('').join(' ');
	pen.fillText(captch, 73, 90, 150);
}

function checkIt(){
	typedData = document.getElementById('typedText').value;
	if(typedData == data){
		document.getElementById('typedText').value='correct'
		document.getElementById('typedText').style='border: 1px solid #46AD04; color: #46AD04; font-weight: bold';
		document.getElementById('typedText').setAttribute('readonly', '');
		document.getElementById('formSend').removeAttribute("disabled");
	} else {
		document.getElementById('typedText').style='border: 1px solid #D30E21;';
	}
}

$(document).ready(getCaptcha());

form = document.querySelector('form');
form.addEventListener('submit', function(event) {
	typedData = document.getElementById('typedText').value;
	if(typedData !== 'correct'){
		event.preventDefault();
	}
});