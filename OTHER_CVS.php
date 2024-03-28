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
                <!-- <button class="btn btn-primary" onclick="document.location='OTHER_CVS.php'">Таблица OTHER_CVS</button> -->
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
                <h2>Таблица OTHER_SVC</h2>

            <table class="table table-bordered">
                <tr>
                    <th>OTH_SVC_ID</th>
                    <th>PAYMENT_ID</th>
                    <th>BILLING_ID</th>
                    <th>DEPT_ID</th>
                    <th>SVC_ID</th>
                    <th>USER_ID</th>
                    <th>ACCOUNT</th>
                    <th>PHONE</th>
                    <th>SVC_NMB</th>
                    <th>SUMM</th>
                    <th>TAX</th>
                    <th>OPERSUMM</th>
                    <th>SVC_DATE</th>
                    <th>DOC_NUM</th>
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
                    $oth_svc_id = $_POST['oth_svc_id'];
                    $payment_id = $_POST['payment_id'];
                    $billing_id = $_POST['billing_id'];
                    $dept_id = $_POST['dept_id'];
                    $svc_id = $_POST['svc_id'];
                    $user_id = $_POST['user_id'];
                    $account = $_POST['account'];
                    $phone = $_POST['phone'];
                    $svc_nmb = $_POST['svc_nmb'];
                    $summ = $_POST['summ'];
                    $tax = $_POST['tax'];
                    $opersumm = $_POST['opersumm'];
                    $svc_date = $_POST['svc_date'];
                    $doc_num = $_POST['doc_num'];

                    $sql = "UPDATE OTHER_SVC SET PAYMENT_ID=$payment_id, BILLING_ID=$billing_id, DEPT_ID=$dept_id, SVC_ID=$svc_id, USER_ID=$user_id, ACCOUNT='$account', PHONE='$phone', SVC_NMB=$svc_nmb, SUMM=$summ, TAX=$tax, OPERSUMM=$opersumm, SVC_DATE='$svc_date', DOC_NUM='$doc_num' WHERE OTH_SVC_ID=$oth_svc_id";

                    if ($conn->query($sql) === TRUE) {
                        echo "Запись успешно обновлена";
                    } else {
                        echo "Ошибка при обновлении записи: " . $conn->error;
                    }
                }

                // SQL запрос для выборки данных из таблицы OTHER_SVC
                $sql = "SELECT OTH_SVC_ID, PAYMENT_ID, BILLING_ID, DEPT_ID, SVC_ID, USER_ID, ACCOUNT, PHONE, SVC_NMB, SUMM, TAX, OPERSUMM, SVC_DATE, DOC_NUM FROM OTHER_SVC";
                $result = $conn->query($sql);

                // Вывод данных из таблицы с формой редактирования
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["OTH_SVC_ID"] . "</td>";
                        echo "<td><input type='text' name='payment_id' value='" . $row["PAYMENT_ID"] . "'></td>";
                        echo "<td><input type='text' name='billing_id' value='" . $row["BILLING_ID"] . "'></td>";
                        echo "<td><input type='text' name='dept_id' value='" . $row["DEPT_ID"] . "'></td>";
                        echo "<td><input type='text' name='svc_id' value='" . $row["SVC_ID"] . "'></td>";
                        echo "<td><input type='text' name='user_id' value='" . $row["USER_ID"] . "'></td>";
                        echo "<td><input type='text' name='account' value='" . $row["ACCOUNT"] . "'></td>";
                        echo "<td><input type='text' name='phone' value='" . $row["PHONE"] . "'></td>";
                        echo "<td><input type='text' name='svc_nmb' value='" . $row["SVC_NMB"] . "'></td>";
                        echo "<td><input type='text' name='summ' value='" . $row["SUMM"] . "'></td>";
                        echo "<td><input type='text' name='tax' value='" . $row["TAX"] . "'></td>";
                        echo "<td><input type='text' name='opersumm' value='" . $row["OPERSUMM"] . "'></td>";
                        echo "<td><input type='date' name='svc_date' value='" . $row["SVC_DATE"] . "'></td>";
                        echo "<td><input type='text' name='doc_num' value='" . $row["DOC_NUM"] . "'></td>";
                        echo "<td><form action='' method='post'><input type='hidden' name='oth_svc_id' value='" . $row["OTH_SVC_ID"] . "'><input type='submit' name='edit' value='Редактировать'></form></td>";
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
