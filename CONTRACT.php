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
                <!-- <button class="btn btn-primary" onclick="document.location='CONTRACT.php'">Таблица CONTRACT</button> -->
                <button class="btn btn-primary" onclick="document.location='DEPT.php'">Таблица DEPT</button>

                <button class="btn btn-primary" onclick="document.location='HOUSES.php'">Таблица HOUSES</button>
                <button class="btn btn-primary" onclick="document.location='OTHER_CVS.php'">Таблица OTHER_CVS</button>
                <button class="btn btn-primary" onclick="document.location='PAYMENTS.php'">Таблица PAYMENTS</button>
                <button class="btn btn-primary" onclick="document.location='SALDO.php'">Таблица SALDO</button>

                <button class="btn btn-primary" onclick="document.location='SERVICES.php'">Таблица SERVICES</button>
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
                <h2>Таблица CONTRACT</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>Действия</th>
                        <th>CONTRACT_ID</th>
                        <th>USER_ID</th>
                        <th>NMB</th>
                        <th>DATEBEGIN</th>
                        <th>DATEEND</th>
                        <th>DEPT_ID</th>
                        <th>REQ_ID</th>
                        <th>HOUSE_ID</th>
                        <th>FLAT</th>
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
                        $contract_id = $_POST['contract_id'];
                        $user_id = $_POST['user_id'];
                        $nmb = $_POST['nmb'];
                        $datebegin = $_POST['datebegin'];
                        $dateend = $_POST['dateend'];
                        $dept_id = $_POST['dept_id'];
                        $req_id = $_POST['req_id'];
                        $house_id = $_POST['house_id'];
                        $flat = $_POST['flat'];

                        $sql = "UPDATE CONTRACT SET USER_ID=$user_id, NMB='$nmb', DATEBEGIN='$datebegin', DATEEND='$dateend', DEPT_ID=$dept_id, REQ_ID=$req_id, HOUSE_ID=$house_id, FLAT='$flat' WHERE CONTRACT_ID=$contract_id";

                        if ($conn->query($sql) === TRUE) {
                            echo "Запись успешно обновлена";
                        } else {
                            echo "Ошибка при обновлении записи: " . $conn->error;
                        }
                    }

                    // SQL запрос для выборки данных из таблицы CONTRACT
                    $sql = "SELECT CONTRACT_ID, USER_ID, NMB, DATEBEGIN, DATEEND, DEPT_ID, REQ_ID, HOUSE_ID, FLAT FROM CONTRACT";
                    $result = $conn->query($sql);

                    // Вывод данных из таблицы с формой редактирования
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><form action='' method='post'><input type='hidden' name='contract_id' value='" . $row["CONTRACT_ID"] . "'><input type='submit' name='edit' value='Редактировать'></form></td>";
                            echo "<td>" . $row["CONTRACT_ID"] . "</td>";
                            echo "<td><input type='text' name='user_id' value='" . $row["USER_ID"] . "'></td>";
                            echo "<td><input type='text' name='nmb' value='" . $row["NMB"] . "'></td>";
                            echo "<td><input type='date' name='datebegin' value='" . $row["DATEBEGIN"] . "'></td>";
                            echo "<td><input type='date' name='dateend' value='" . $row["DATEEND"] . "'></td>";
                            echo "<td><input type='text' name='dept_id' value='" . $row["DEPT_ID"] . "'></td>";
                            echo "<td><input type='text' name='req_id' value='" . $row["REQ_ID"] . "'></td>";
                            echo "<td><input type='text' name='house_id' value='" . $row["HOUSE_ID"] . "'></td>";
                            echo "<td><input type='text' name='flat' value='" . $row["FLAT"] . "'></td>";
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
