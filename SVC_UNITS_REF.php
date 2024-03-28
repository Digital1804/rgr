<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр и редактирование таблицы CALLS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="btn-group-vertical">
                <button class="btn btn-primary" onclick="document.location='APUS.php'">Таблица APUS_PLAN</button>
                <button class="btn btn-primary" onclick="document.location='CALLS.php'">Таблица CALLS</button>
                <button class="btn btn-primary" onclick="document.location='CONTRACT.php'">Таблица CONTRACT</button>
                <button class="btn btn-primary" onclick="document.location='DEPT.php'">Таблица DEPT</button>

                <button class="btn btn-primary" onclick="document.location='HOUSES.php'">Таблица HOUSES</button>
                <button class="btn btn-primary" onclick="document.location='OTHER_CVS.php'">Таблица OTHER_CVS</button>
                <button class="btn btn-primary" onclick="document.location='PAYMENTS.php'">Таблица PAYMENTS</button>
                <button class="btn btn-primary" onclick="document.location='SALDO.php'">Таблица SALDO</button>

                <button class="btn btn-primary" onclick="document.location='SERVICES.php'">Таблица SERVICES</button>
                <button class="btn btn-primary" onclick="document.location='STREETS_REF.php'">Таблица STREETS_REF</button>
                <button class="btn btn-primary" onclick="document.location='SVC_REF.php'">Таблица SVC_REF</button>
                <!-- <button class="btn btn-primary" onclick="document.location='SVC_UNITS_REF.php'">Таблица SVC_UNITS_REF</button> -->

                <button class="btn btn-primary" onclick="document.location='TARIFED_SERVICES.php'">Таблица TARIFED_SERVICES</button>
                <button class="btn btn-primary" onclick="document.location='TAX_TARIF_REF.php'">Таблица TAX_TARIF_REF</button>
                <button class="btn btn-primary" onclick="document.location='TERRITORY_CONSTITUTE.php'">Таблица TERRITORY_CONSTITUTE</button>
                <button class="btn btn-primary" onclick="document.location='TERRITORY_TYPE.php'">Таблица TERRITORY_TYPE</button>

                <button class="btn btn-primary" onclick="document.location='TOWN.php'">Таблица TOWN</button>
                <button class="btn btn-primary" onclick="document.location='T_TOWN_TYPE.php'">Таблица T_TOWN_TYPE</button>
                <button class="btn btn-primary" onclick="document.location='USERS.php'">Таблица USERS</button>
                <button class="btn btn-primary" onclick="document.location='USER_TYPE_REF.php'">Таблица USER_TYPE_REF</button>
            </div>
            <div class="col-md-8">
                <h2>Таблица SVC_UNITS_REF</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>Действия</th>
                        <th>SVCUNITS_ID</th>
                        <th>CODE</th>
                        <th>NAME</th>
                        <th>SHORT_NAME</th>
                    </tr>

                    <?php
                    $sql=mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
                    mysqli_select_db($sql, "student1") or die("Нет такой таблицы!");
                    
                    $req = "SELECT SVCUNITS_ID, CODE, NAME, SHORT_NAME FROM SVC_UNITS_REF";
                    $rows=mysqli_query($sql, $req);
                    echo "<tr><form action='' method='get'><input type='hidden' name='svcunits_id' value='" . $row["SVCUNITS_ID"] . "'>";
                    echo "<td><input type='submit' name='add' value='Добавить запись'></td>";
                    echo "<td><input type='text' name='svcunits_id' value='" . $row["SVCUNITS_ID"] . "'></td>";
                    echo "<td><input type='text' name='code' value='" . $row["CODE"] . "'></td>";
                    echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                    echo "<td><input type='text' name='short_name' value='" . $row["SHORT_NAME"] . "'></td>";
                    echo "</form></tr>";
                    
                    if ($rows->num_rows > 0) {
                        while($row=mysqli_fetch_array($rows)) {
                            echo "<tr><form action='' method='get'><input type='hidden' name='svcunits_id_p' value='" . $row["SVCUNITS_ID"] . "'>";
                            echo "<td><input type='submit' name='edit' value='Редактировать'><br>";
                            echo "<input type='submit' name='del' value='Удалить'></td>";
                            echo "<td><input type='text' name='svcunits_id' value='" . $row["SVCUNITS_ID"] . "'></td>";
                            echo "<td><input type='text' name='code' value='" . $row["CODE"] . "'></td>";
                            echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                            echo "<td><input type='text' name='short_name' value='" . $row["SHORT_NAME"] . "'></td>";
                            echo "</form></tr>";
                        }
                    } else {
                        echo "0 результатов";
                    }
                    if(isset($_GET['edit'])) {
                        $svcunits_id_p = $_GET['svcunits_id_p'];
                        $svcunits_id = $_GET['svcunits_id'];
                        $code = $_GET['code'];
                        $name = $_GET['name'];
                        $short_name = $_GET['short_name'];
                        $req = "UPDATE SVC_UNITS_REF SET SVCUNITS_ID=$svcunits_id, CODE='$code', NAME='$name', SHORT_NAME='$short_name' WHERE SVCUNITS_ID=$svcunits_id_p";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_GET['del'])) {
                        $svcunits_id = $_GET['svcunits_id'];
                        $req = "DELETE FROM SVC_UNITS_REF WHERE SVCUNITS_ID=$svcunits_id";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_GET['add'])) {
                        $svcunits_id = $_GET['svcunits_id'];
                        $code = $_GET['code'];
                        $name = $_GET['name'];
                        $short_name = $_GET['short_name'];
                        $req = "INSERT INTO SVC_UNITS_REF (SVCUNITS_ID, CODE, NAME, SHORT_NAME) VALUES ($svcunits_id, '$code', '$name', '$short_name')";
                        mysqli_query($sql, $req);
                        echo $req;
                    }
                    $sql->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
