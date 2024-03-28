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
                <!-- <button class="btn btn-primary" onclick="document.location='SVC_REF.php'">Таблица SVC_REF</button> -->
                <button class="btn btn-primary" onclick="document.location='SVC_UNITS_REF.php'">Таблица SVC_UNITS_REF</button>

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
                <h2>Таблица SVC_REF</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>SVC_ID</th>
                        <th>DEPT_ID</th>
                        <th>COD</th>
                        <th>NAME</th>
                        <th>ISCONST</th>
                        <th>SVCTYPE</th>
                        <th>FULL_COD</th>
                        <th>FULL_NAME</th>
                        <th>SELDOM_USED</th>
                        <th>SERVICE_TYPE_ID</th>
                        <th>EQUIP_TYPE_ID</th>
                        <th>SVCUNITS_ID</th>
                        <th>Действия</th>
                    </tr>

                    <?php
                    // Подключение к базе данных
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "student1";

                    // Создание соединения с базой данных
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Проверка соединения
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Обработка формы редактирования
                    if(isset($_POST['edit'])) {
                        $svc_id = $_POST['svc_id'];
                        $dept_id = $_POST['dept_id'];
                        $cod = $_POST['cod'];
                        $name = $_POST['name'];
                        $isconst = $_POST['isconst'];
                        $svctype = $_POST['svctype'];
                        $full_cod = $_POST['full_cod'];
                        $full_name = $_POST['full_name'];
                        $seldom_used = $_POST['seldom_used'];
                        $service_type_id = $_POST['service_type_id'];
                        $equip_type_id = $_POST['equip_type_id'];
                        $svcunits_id = $_POST['svcunits_id'];

                        $sql = "UPDATE SVC_REF SET DEPT_ID=$dept_id, COD='$cod', NAME='$name', ISCONST='$isconst', SVCTYPE='$svctype', FULL_COD='$full_cod', FULL_NAME='$full_name', SELDOM_USED=$seldom_used, SERVICE_TYPE_ID='$service_type_id', EQUIP_TYPE_ID='$equip_type_id', SVCUNITS_ID=$svcunits_id WHERE SVC_ID=$svc_id";

                        if ($conn->query($sql) === TRUE) {
                            echo "Запись успешно обновлена";
                        } else {
                            echo "Ошибка при обновлении записи: " . $conn->error;
                        }
                    }

                    // SQL запрос для выборки данных из таблицы SVC_REF
                    $sql = "SELECT SVC_ID, DEPT_ID, COD, NAME, ISCONST, SVCTYPE, FULL_COD, FULL_NAME, SELDOM_USED, SERVICE_TYPE_ID, EQUIP_TYPE_ID, SVCUNITS_ID FROM SVC_REF";
                    $result = $conn->query($sql);

                    // Вывод данных из таблицы с формой редактирования
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["SVC_ID"] . "</td>";
                            echo "<td><input type='text' name='dept_id' value='" . $row["DEPT_ID"] . "'></td>";
                            echo "<td><input type='text' name='cod' value='" . $row["COD"] . "'></td>";
                            echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                            echo "<td><input type='text' name='isconst' value='" . $row["ISCONST"] . "'></td>";
                            echo "<td><input type='text' name='svctype' value='" . $row["SVCTYPE"] . "'></td>";
                            echo "<td><input type='text' name='full_cod' value='" . $row["FULL_COD"] . "'></td>";
                            echo "<td><input type='text' name='full_name' value='" . $row["FULL_NAME"] . "'></td>";
                            echo "<td><input type='text' name='seldom_used' value='" . $row["SELDOM_USED"] . "'></td>";
                            echo "<td><input type='text' name='service_type_id' value='" . $row["SERVICE_TYPE_ID"] . "'></td>";
                            echo "<td><input type='text' name='equip_type_id' value='" . $row["EQUIP_TYPE_ID"] . "'></td>";
                            echo "<td><input type='text' name='svcunits_id' value='" . $row["SVCUNITS_ID"] . "'></td>";
                            echo "<td><form action='' method='post'><input type='hidden' name='svc_id' value='" . $row["SVC_ID"] . "'><input type='submit' name='edit' value='Редактировать'></form></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 результатов";
                    }
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
