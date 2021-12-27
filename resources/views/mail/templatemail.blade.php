<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color:grey">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="550" bgcolor="white"
       style="border:2px solid black">
    <tbody>
    <tr>
        <td align="center">
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="col-550" width="550">
                <tbody>
                <tr>
                    <td align="center" style="background-color: #5CA2E2; height: 50px;">
                        <a href="#" style="text-decoration: none;">
                            <p style="color:white; font-weight:bold;">
                                AQParking
                            </p>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr style="height: 300px;">
        <td align="center" style="border: none;
                            border-bottom: 2px solid #5CA2E2;
                            padding-right: 20px;padding-left:20px">

            <p style="font-weight: bolder;font-size: 42px;
                            letter-spacing: 0.025em;
                            color:black;">
                ¡BUENAS!
                <br> SE ACABA DE REGISTRAR UNA NUEVA RESERVA EN TU ESTACIONAMIENTO : {{$DatosCorreo->Estacionamiento->nombre}}
            </p>
        </td>
    </tr>

    <tr style="display: inline-block;">
        <td style="height: 150px;
                            padding: 20px;
                            border: none;
                            border-bottom: 2px solid #361B0E;
                            background-color: white;">

            <h2 style="text-align: left;
                                align-items: center;">
                Algunos Datos de la Reserva


            </h2>
            <p class="data" style="text-align: justify-all;
                            align-items: center;
                            font-size: 15px;
                            padding-bottom: 12px;">
                Fecha de Registro: {{$DatosCorreo->fecha}}
            </p>
            <p class="data" style="text-align: justify-all;
                            align-items: center;
                            font-size: 15px;
                            padding-bottom: 12px;">
                Placa del Vehiculo para la reserva: {{$DatosCorreo->Vehiculo->placa}}
            </p>
            <p class="data" style="text-align: justify-all;
                            align-items: center;
                            font-size: 15px;
                            padding-bottom: 12px;">
                Modelo del Vehiculo para la reserva: {{$DatosCorreo->Vehiculo->modelo}}
            </p>
            <p class="data" style="text-align: justify-all;
                            align-items: center;
                            font-size: 15px;
                            padding-bottom: 12px;">
                Color del Vehiculo para la reserva: {{$DatosCorreo->Vehiculo->color}}
            </p>
            <p class="data" style="text-align: justify-all;
                            align-items: center;
                            font-size: 15px;
                            padding-bottom: 12px;">
                Nombre del Propietario del Vehiculo: {{$DatosCorreo->Vehiculo->Usuario->nombre}} {{$DatosCorreo->Vehiculo->Usuario->apellido}}
            </p>
            <p class="data" style="text-align: justify-all;
                            align-items: center;
                            font-size: 15px;
                            padding-bottom: 12px;">
                DNI del Propietario del Vehiculo: {{$DatosCorreo->Vehiculo->Usuario->documento}}
            </p>
            <p>
                <p>Para Registrar la hora de entrada del Vehiculo de la Reserva</p>
                <a href="{{route('reserva-show',$DatosCorreo->reserva_ID)}}" style="text-decoration: none;
                                color:black;
                                border: 2px solid #5CA2E2;
                                padding: 10px 30px;
                                font-weight: bold;">Click Aqui
                </a>
            </p>
        </td>
    </tr>
    <tr style="border: none;
            background-color: #5CA2E2;
            height: 40px;
            color:white;
            padding-bottom: 20px;
            text-align: center;">

        <td height="40px" align="center">

            <a href="#" style="border:none;
            text-decoration: none;
            padding: 5px;">
                <p style="color:white;
        line-height: 1.5em;">
                    AQParking
                </p>
            </a>

        </td>
    </tr>

    </tbody>
</table>


</body>

<script src="feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

</html>
