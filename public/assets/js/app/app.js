var app = {}

app.set = function(action,controller,module){
    
}



app.loadPage = function(dataUrl){
    if(dataUrl){
        $.ajax({
            dataType : "json",
            url : dataUrl
        }).done(function(html){
            console.log(html);
            $("#main-content").html(html)
        });
    }
}