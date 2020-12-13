

function Load(){
    $.ajax("http://127.0.0.1:8000/test")
        .done(function (rt){
            $('#msg').html(rt);
        })
}
