var usu_id = $("#usu_idx").val();
$(document).ready(function () {
  $.post(
    "../../controller/usuario.php?op=mostrar",
    { usu_id: usu_id },
    function (data) {
      data = JSON.parse(data);
      //   console.log(data);
      $("#usu_nom").val(data.usu_nom);
      $("#usu_apep").val(data.usu_apep);
      $("#usu_apem").val(data.usu_apem);
      $("#usu_correo").val(data.usu_correo);
      $("#usu_sex").val(data.usu_sex).trigger("change"); // select 2
      $("#usu_telf").val(data.usu_telf);
      $("#usu_pass").val(data.usu_pass);
    }
  );
});

$(document).on("click", "#btnactualizar", function () {
  $.post(
    "../../controller/usuario.php?op=update_perfil",
    {
      /*  name $_POST[] /  */
      usu_id: usu_id,
      usu_nom: $("#usu_nom").val(),
      usu_apep: $("#usu_apep").val(),
      usu_apem: $("#usu_apem").val(),
      usu_sex: $("#usu_sex").val(),
      usu_telf: $("#usu_telf").val(),
      usu_pass: $("#usu_pass").val(),
    },
    function (data) {}
  );
  swal.fire({
    title: "Correcto",
    text: "Se actualizo correctamente.",
    icon: "success",
    confirmButtonText: "Aceptar",
  });
});
