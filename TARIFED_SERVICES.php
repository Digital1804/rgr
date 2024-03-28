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
                <button class="btn btn-primary" onclick="document.location='SVC_UNITS_REF.php'">Таблица SVC_UNITS_REF</button>

                <!-- <button class="btn btn-primary" onclick="document.location='TARIFED_SERVICES.php'">Таблица TARIFED_SERVICES</button> -->
                <button class="btn btn-primary" onclick="document.location='TAX_TARIF_REF.php'">Таблица TAX_TARIF_REF</button>
                <button class="btn btn-primary" onclick="document.location='TERRITORY_CONSTITUTE.php'">Таблица TERRITORY_CONSTITUTE</button>
                <button class="btn btn-primary" onclick="document.location='TERRITORY_TYPE.php'">Таблица TERRITORY_TYPE</button>

                <button class="btn btn-primary" onclick="document.location='TOWN.php'">Таблица TOWN</button>
                <button class="btn btn-primary" onclick="document.location='T_TOWN_TYPE.php'">Таблица T_TOWN_TYPE</button>
                <button class="btn btn-primary" onclick="document.location='USER_TYPE_REF.php'">Таблица USER_TYPE_REF</button>
                <button class="btn btn-primary" onclick="document.location='USERS.php'">Таблица USERS</button>
            </div>
            <div class="col-md-8">
                <h2>Таблица TARIFED_SERVICES</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>PRIVILEGE_MAKER_ID</th>
                        <th>USER_ID</th>
                        <th>SVC_ID</th>
                        <th>BILLING_ID</th>
                        <th>SERVICE_ID</th>
                        <th>SUMM</th>
                        <th>TAX</th>
                        <th>SVC_NMB</th>
                        <th>PRICE</th>
                        <th>EXACT_SUMM</th>
                        <th>EXACT_TAX</th>
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
                        $user_id = $_POST['user_id'];
                        $svc_id = $_POST['svc_id'];
                        $billing_id = $_POST['billing_id'];
                        $service_id = $_POST['service_id'];
                        $privilege_maker_id = $_POST['privilege_maker_id'];
                        $summ = $_POST['summ'];
                        $tax = $_POST['tax'];
                        $svc_nmb = $_POST['svc_nmb'];
                        $price = $_POST['price'];
                        $exact_summ = $_POST['exact_summ'];
                        $exact_tax = $_POST['exact_tax'];

                        $sql = "UPDATE TARIFED_SERVICES SET PRIVILEGE_MAKER_ID=$privilege_maker_id, SUMM=$summ, TAX=$tax, SVC_NMB=$svc_nmb, PRICE=$price, EXACT_SUMM=$exact_summ, EXACT_TAX=$exact_tax WHERE USER_ID=$user_id AND SVC_ID=$svc_id AND BILLING_ID=$billing_id AND SERVICE_ID=$service_id";

                        if ($conn->query($sql) === TRUE) {
                            echo "Запись успешно обновлена";
                        } else {
                            echo "Ошибка при обновлении записи: " . $conn->error;
                        }
                    }

                    // SQL запрос для выборки данных из таблицы TARIFED_SERVICES
                    $sql = "SELECT PRIVILEGE_MAKER_ID, USER_ID, SVC_ID, BILLING_ID, SERVICE_ID, SUMM, TAX, SVC_NMB, PRICE, EXACT_SUMM, EXACT_TAX FROM TARIFED_SERVICES";
                    $result = $conn->query($sql);

                    // Вывод данных из таблицы с формой редактирования
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><input type='text' name='privilege_maker_id' value='" . $row["PRIVILEGE_MAKER_ID"] . "'></td>";
                            echo "<td>" . $row["USER_ID"] . "</td>";
                            echo "<td>" . $row["SVC_ID"] . "</td>";
                            echo "<td>" . $row["BILLING_ID"] . "</td>";
                            echo "<td>" . $row["SERVICE_ID"] . "</td>";
                            echo "<td><input type='text' name='summ' value='" . $row["SUMM"] . "'></td>";
                            echo "<td><input type='text' name='tax' value='" . $row["TAX"] . "'></td>";
                            echo "<td><input type='text' name='svc_nmb' value='" . $row["SVC_NMB"] . "'></td>";
                            echo "<td><input type='text' name='price' value='" . $row["PRICE"] . "'></td>";
                            echo "<td><input type='text' name='exact_summ' value='" . $row["EXACT_SUMM"] . "'></td>";
                            echo "<td><input type='text' name='exact_tax' value='" . $row["EXACT_TAX"] . "'></td>";
                            echo "<td><form action='' method='post'><input type='hidden' name='user_id' value='" . $row["USER_ID"] . "'>
                            <input type='hidden' name='svc_id' value='" . $row["SVC_ID"] . "'>
                            <input type='hidden' name='billing_id' value='" . $row["BILLING_ID"] . "'>
                            <input type='hidden' name='service_id' value='" . $row["SERVICE_ID"] . "'>
                            <input type='hidden' name='summ' value='" . $row["SUMM"] . "'>
                            <input type='hidden' name='tax' value='" . $row["TAX"] . "'>
                            <input type='hidden' name='svc_nmb' value='" . $row["SVC_NMB"] . "'>
                            <input type='hidden' name='price' value='" . $row["PRICE"] . "'>
                            <input type='hidden' name='exact_summ' value='" . $row["EXACT_SUMM"] . "'>
                            <input type='hidden' name='exact_tax' value='" . $row["EXACT_TAX"] . "'>
                            ";
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
