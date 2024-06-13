<?php
    include('pago.php');

    if (isset($_POST['btnProcesar'])) {
        $fecha = date('d-m-y');
        $trabajador = $_POST['txtTrabajador'];
        $categoria = $_POST['selCategoria'];
        $horas = $_POST['txtHoras'];

        $objPago = new pago($fecha, $trabajador, $categoria, $horas);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>PAGO DE TRABAJADORES</title>
</head>
<body class="bg-light">
    <div class="container">
        <header class="my-4 text-center">
            <h1 class="display-4">PAGO DE TRABAJADORES</h1>
            <h5 class="text-muted">MANEJO DE METODO CONSTRUCTOR</h5>
        </header>
        <section>
            <form method="POST" class="bg-white p-4 rounded shadow-sm">
                <table class="table table-borderless">
                    <tr>
                        <td class="fw-bold">FECHA</td>
                        <td></td>
                        <td></td>
                        <td><?php echo date('d-m-y'); ?></td>
                        <td rowspan="7">
                            <img src="img.jpg" class="img-fluid rounded" alt="Imagen del trabajador">
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">TRABAJADOR</td>
                        <td colspan="3">
                            <input type="text" name="txtTrabajador" class="form-control" size="70" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">CATEGORIA</td>
                        <td>
                            <select name="selCategoria" class="form-select" required>
                                <option value="Operario">Operario</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Jefe">Jefe</option>
                            </select>
                        </td>
                        <td class="fw-bold">HORAS TRABAJADAS</td>
                        <td>
                            <input type="number" name="txtHoras" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-center">
                            <button type="submit" name="btnProcesar" class="btn btn-primary">Procesar</button>
                        </td>
                    </tr>
                    <?php if (isset($_POST['btnProcesar'])): ?>
                        <tr>
                            <td class="fw-bold">COSTO POR HORA</td>
                            <td colspan="3"><?php echo '$' . number_format($objPago->determinaCostoHora(), 2); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">SALARIO BRUTO</td>
                            <td colspan="3"><?php echo '$' . number_format($objPago->calculaSubtotal(), 2); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">DESCUENTO</td>
                            <td colspan="3"><?php echo '$' . number_format($objPago->calculaDescuento(), 2); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">SALARIO NETO</td>
                            <td colspan="3"><?php echo '$' . number_format($objPago->calculaNeto(), 2); ?></td>
                        </tr>
                    <?php endif; ?>
                </table>
            </form>
        </section>
        <footer class="text-center my-4">
            <h5 class="text-muted">Departamento de Contabilidad</h5>
        </footer>
    </div>
</body>
</html>


