$(document).ready(function () {
    //const nombretxt=$("#nombre").text
    /*
    $(".enviar").click(function(){
        const nombretxt=$("#nombre").text()
        const estructura=$("<div>").text(nombretxt)
        $("informacion").append(nombretxt)
        $()
    })*/
    $("form").submit(function(){
    alert("Subido");
  });
  $(".enviar").click(function(){
    $("form").submit();
    window.location.replace("submain.html");
    
  });
  $("p").each(function(i){
  $(this).on("click", {x:i}, function(event){
    alert("The " + $(this).index() + ". paragraph has data: " + event.data.x);
  });
});
})


//documentación
//https://dosideas.com/noticias/java/239-iajaxificando-un-formulario