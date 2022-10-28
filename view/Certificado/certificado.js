const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
// Inicializamos imagen
const image = new Image();
// Ruta de Imagen
image.src = "../../public/certificado.svg";

$(document).ready(function () {
  var curd_id = getUrlParameter("curd_id");

  $.post(
    "../../controller/usuario.php?op=mostrar_curso_detalle",
    { curd_id: curd_id },
    function (data) {
      data = JSON.parse(data);
      $("#cur_descrip").html(data.cur_descrip);

      // Dimensionamos y seleccionamos imagen
      ctx.drawImage(image, 0, 10, canvas.width, canvas.height);
      // Definimos tamaño de la fuente
      ctx.font = "25px Arial";
      ctx.textAlign = "center";
      ctx.textBaseline = "middle";
      var x = canvas.width / 2;
      ctx.fillText(
        data.usu_nom + " " + data.usu_apep + " " + data.usu_apem,
        x,
        440
      );

      ctx.fillText("Por completar el curso de " + data.cur_nom, x, 500);
      ctx.fillText(
        "Fecha de Inicio: " +
          data.cur_fechini +
          " / Fecha de finalización: " +
          data.cur_fechfin,
        x,
        550
      );
      ctx.fillText(data.inst_nom + " " + data.inst_apep, x, 690);
      ctx.fillText("Instructor", x, 720);
    }
  );
});

//botones descargar
$(document).on("click", "#btnpng", function () {
  let lblpng = document.createElement("a");
  lblpng.download = "Certificado.png";
  lblpng.href = canvas.toDataURL();
  lblpng.click();
});

$(document).on("click", "#btnpdf", function () {
  var imgData = canvas.toDataURL("image/png");
  var doc = new jsPDF("l", "mm"); // l-> formato horizontal imagen
  doc.addImage(imgData, "PNG", 30, 15); // inserta imagen en pdf
  doc.save("Certificado.pdf"); // nombre descargar
});

// Funcion obtener parametros de Url
var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split("&"),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split("=");

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : sParameterName[1];
    }
  }
};
