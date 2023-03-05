$('form input[type=file]').on('change', function() {
    var count = 0;
    document.getElementById('fileList').innerHTML='';
    for (var i = 0; i < this.files.length; i++) {
        count++;
        document.getElementById('fileList').innerHTML 
            += '<div class="form__file">'+this.files[i].name+'</div>';
    }
    script++;
});

function read(src, fileName){
    $.ajax({
        url: src,
        success: function(data){
            $("#fileDownload").attr("href", 'http://127.0.0.1:8000'+src);
            $("#fileTxt").css('display', 'flex');
            $("#fileName").html(fileName);
            $("#whatchFile").html(data);
        }
    });
}

function fileClose(){
    document.getElementById('fileTxt').style="display: none";
}
