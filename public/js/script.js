document.getElementById("anio").innerHTML = new Date().getFullYear();
// CUENTA DE USUARIO
// $("#usrlogpass").css({ border: "0px" });
// $('#usrname').css({ border: "0px" });
// $('#usrcorreo').css({ border: "0px" });
// $('#usrcel').css({ border: "0px" });

// $("#btn-changepass").click(function () {
//     $("#btnsupdatepass").css({ display: "block" });
//     $("#usrlogpass").css({ border: "1px solid #000" });
//     $("#usrlogpass").attr("readonly", false);
//   });

//   $("#btn-cancelpass").click(function () {
//     $("#btnsupdatepass").css({ display: "none" });
//     $("#usrlogpass").css({ border: "0px" });
//     $("#usrlogpass").attr("readonly", true);
//   });

//   $("#btn-changedata").click(function () {
//     $("#btnsupdatedata").css({ display: "block" });
//     $('#usrname,#usrcorreo,#usrcel').css({ border: "1px solid #000" });
//     $('#usrname,#usrcorreo,#usrcel').attr("readonly", false);
//   });

//   $("#btn-canceldata").click(function () {
//     $("#btnsupdatedata").css({ display: "none" });
//     $('#usrname,#usrcorreo,#usrcel').css({ border: "0px" });
//     $('#usrname,#usrcorreo,#usrcel').attr("readonly", true);
//   });

$("#btn-filtroreserva").click(function () {
      $("#text-reserva").text("Reservas fitradas");

    });
