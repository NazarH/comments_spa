document.addEventListener('keydown', (event) => {
    if (event.key === 'Backspace') {
        setTimeout(function(){
            document.getElementById('prevArea').innerHTML = '';
            document.getElementById('prevArea').innerHTML += document.getElementById('textArea').value;
        },100);
    }
    setTimeout(function(){
        document.getElementById('prevArea').innerHTML = '';
        document.getElementById('prevArea').innerHTML += document.getElementById('textArea').value;
    },100);
});