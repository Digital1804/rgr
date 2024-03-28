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

                <!-- <button class="btn btn-primary" onclick="document.location='SERVICES.php'">Таблица SERVICES</button> -->
                <button class="btn btn-primary" onclick="document.location='STREETS_REF.php'">Таблица STREETS_REF</button>
                <button class="btn btn-primary" onclick="document.location='SVC_REF.php'">Таблица SVC_REF</button>
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
                <h2>Таблица SERVICES</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>SERVICE_ID</th>
                        <th>DEPT_ID</th>
                        <th>CONTRACT_TARIF</th>
                        <th>SVC_ID</th>
                        <th>USER_ID</th>
                        <th>SVC_NMB</th>
                        <th>PHONE</th>
                        <th>DATE_BEGIN</th>
                        <th>DATE_END</th>
                        <th>FLAT</th>
                        <th>INSERT_DATE</th>
                        <th>ISFREE</th>
                        <th>HOUSE_ID</th>
                        <th>ID_PLAN</th>
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
                        $service_id = $_POST['service_id'];
                        $dept_id = $_POST['dept_id'];
                        $contract_tarif = $_POST['contract_tarif'];
                        $svc_id = $_POST['svc_id'];
                        $user_id = $_POST['user_id'];
                        $svc_nmb = $_POST['svc_nmb'];
                        $phone = $_POST['phone'];
                        $date_begin = $_POST['date_begin'];
                        $date_end = $_POST['date_end'];
                        $flat = $_POST['flat'];
                        $insert_date = $_POST['insert_date'];
                        $isfree = $_POST['isfree'];
                        $house_id = $_POST['house_id'];
                        $id_plan = $_POST['id_plan'];

                        $sql = "UPDATE SERVICES SET DEPT_ID=$dept_id, CONTRACT_TARIF=$contract_tarif, SVC_ID=$svc_id, USER_ID=$user_id, SVC_NMB=$svc_nmb, PHONE='$phone', DATE_BEGIN='$date_begin', DATE_END='$date_end', FLAT='$flat', INSERT_DATE='$insert_date', ISFREE='$isfree', HOUSE_ID=$house_id, ID_PLAN=$id_plan WHERE SERVICE_ID=$service_id";

                        if ($conn->query($sql) === TRUE) {
                            echo "Запись успешно обновлена";
                        } else {
                            echo "Ошибка при обновлении записи: " . $conn->error;
                        }
                    }

                    // SQL запрос для выборки данных из таблицы SERVICES
                    $sql = "SELECT SERVICE_ID, DEPT_ID, CONTRACT_TARIF, SVC_ID, USER_ID, SVC_NMB, PHONE, DATE_BEGIN, DATE_END, FLAT, INSERT_DATE, ISFREE, HOUSE_ID, ID_PLAN FROM SERVICES";
                    $result = $conn->query($sql);

                    // Вывод данных из таблицы с формой редактирования
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["SERVICE_ID"] . "</td>";
                            echo "<td><input type='text' name='dept_id' value='" . $row["DEPT_ID"] . "'></td>";
                            echo "<td><input type='text' name='contract_tarif' value='" . $row["CONTRACT_TARIF"] . "'></td>";
                            echo "<td><input type='text' name='svc_id' value='" . $row["SVC_ID"] . "'></td>";
                            echo "<td><input type='text' name='user_id' value='" . $row["USER_ID"] . "'></td>";
                            echo "<td><input type='text' name='svc_nmb' value='" . $row["SVC_NMB"] . "'></td>";
                            echo "<td><input type='text' name='phone' value='" . $row["PHONE"] . "'></td>";
                            echo "<td><input type='date' name='date_begin' value='" . $row["DATE_BEGIN"] . "'></td>";
                            echo "<td><input type='date' name='date_end' value='" . $row["DATE_END"] . "'></td>";
                            echo "<td><input type='text' name='flat' value='" . $row["FLAT"] . "'></td>";
                            echo "<td><input type='date' name='insert_date' value='" . $row["INSERT_DATE"] . "'></td>";
                            echo "<td><input type='text' name='isfree' value='" . $row["ISFREE"] . "'></td>";
                            echo "<td><input type='text' name='house_id' value='" . $row["HOUSE_ID"] . "'></td>";
                            echo "<td><input type='text' name='id_plan' value='" . $row["ID_PLAN"] . "'></td>";
                            echo "<td><form action='' method='post'><input type='hidden' name='service_id' value='" . $row["SERVICE_ID"] . "'><input type='submit' name='edit' value='Редактировать'></form></td>";
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

