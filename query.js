$(document).ready(function () {
  
  
  let nombreformfin=JSON.parse(localStorage.getItem("nombre"))
  let apellidoformfin=JSON.parse(localStorage.getItem("apellido"))
  let correoformfin=JSON.parse(localStorage.getItem("correo"))
  let telefonoformfin=JSON.parse(localStorage.getItem("telefono"))
  let temaformfin=JSON.parse(localStorage.getItem("tema"))
  $("#nombrefin").text(nombreformfin)
  $("#apellidosfin").text(apellidoformfin)
  $("#correofin").text(correoformfin);
  $("#telefonofin").text(telefonoformfin)
  $("#temafin").text(temaformfin)
  
  
  $(".enviar").click(function(){
    if($("#nombre").val().length >0 && $("#apellido").val().length >0 && $("#correo").val().length >0 && $("#telefono").val().length >0 && $("#tema").val().length >0){
      $(".emergencia").css("display", "none")
      $(".emailmal").css("display", "none")
      let telefonoform=$("#telefono").val();
      const regex = /^[0-9]*$/;
      if(regex.test(telefonoform)==true){
        $(".emergencia").css("display", "none")
        $(".invalido").css("display", "none")
        const emailvalido = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        let correoform=$("#correo").val();
        if (emailvalido.test(correoform)==true) {
          let nombreform=$("#nombre").val();
          let apellidoform=$("#apellido").val();
          let temaform=$("#tema").val();
          localStorage.setItem("nombre",JSON.stringify(nombreform));
          localStorage.setItem("apellido",JSON.stringify(apellidoform));
          localStorage.setItem("correo",JSON.stringify(correoform));
          localStorage.setItem("telefono",JSON.stringify(telefonoform));
          localStorage.setItem("tema",JSON.stringify(temaform));
          window.location.replace("submain.html");
          
        } else {
          $(".emailmal").css("display", "contents")
        }
      }
      else{
        $(".invalido").css("display", "contents")
        $(".emailmal").css("display", "none")
      }
    }else{
      $(".emergencia").css("display", "contents")
      $(".invalido").css("display", "none")
    }
    
  });
})


//documentación
//https://dosideas.com/noticias/java/239-iajaxificando-un-formulario