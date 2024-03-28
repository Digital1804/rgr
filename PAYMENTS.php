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
                <!-- <button class="btn btn-primary" onclick="document.location='PAYMENTS.php'">Таблица PAYMENTS</button> -->
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
                <h2>Таблица PAYMENTS</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>PAYMENT_ID</th>
                        <th>USER_ID</th>
                        <th>PAY_DOC_ID</th>
                        <th>BILLING_ID</th>
                        <th>SUMM</th>
                        <th>ACCOUNT</th>
                        <th>PHONE</th>
                        <th>DOC_NUM</th>
                        <th>PAY_DATE</th>
                        <th>DATE_REC</th>
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
                        $payment_id = $_POST['payment_id'];
                        $user_id = $_POST['user_id'];
                        $pay_doc_id = $_POST['pay_doc_id'];
                        $billing_id = $_POST['billing_id'];
                        $summ = $_POST['summ'];
                        $account = $_POST['account'];
                        $phone = $_POST['phone'];
                        $doc_num = $_POST['doc_num'];
                        $pay_date = $_POST['pay_date'];
                        $date_rec = $_POST['date_rec'];

                        $sql = "UPDATE PAYMENTS SET USER_ID=$user_id, PAY_DOC_ID=$pay_doc_id, BILLING_ID=$billing_id, SUMM=$summ, ACCOUNT='$account', PHONE='$phone', DOC_NUM='$doc_num', PAY_DATE='$pay_date', DATE_REC='$date_rec' WHERE PAYMENT_ID=$payment_id";

                        if ($conn->query($sql) === TRUE) {
                            echo "Запись успешно обновлена";
                        } else {
                            echo "Ошибка при обновлении записи: " . $conn->error;
                        }
                    }

                    // SQL запрос для выборки данных из таблицы PAYMENTS
                    $sql = "SELECT PAYMENT_ID, USER_ID, PAY_DOC_ID, BILLING_ID, SUMM, ACCOUNT, PHONE, DOC_NUM, PAY_DATE, DATE_REC FROM PAYMENTS";
                    $result = $conn->query($sql);

                    // Вывод данных из таблицы с формой редактирования
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["PAYMENT_ID"] . "</td>";
                            echo "<td><input type='text' name='user_id' value='" . $row["USER_ID"] . "'></td>";
                            echo "<td><input type='text' name='pay_doc_id' value='" . $row["PAY_DOC_ID"] . "'></td>";
                            echo "<td><input type='text' name='billing_id' value='" . $row["BILLING_ID"] . "'></td>";
                            echo "<td><input type='text' name='summ' value='" . $row["SUMM"] . "'></td>";
                            echo "<td><input type='text' name='account' value='" . $row["ACCOUNT"] . "'></td>";
                            echo "<td><input type='text' name='phone' value='" . $row["PHONE"] . "'></td>";
                            echo "<td><input type='text' name='doc_num' value='" . $row["DOC_NUM"] . "'></td>";
                            echo "<td><input type='date' name='pay_date' value='" . $row["PAY_DATE"] . "'></td>";
                            echo "<td><input type='date' name='date_rec' value='" . $row["DATE_REC"] . "'></td>";
                            echo "<td><form action='' method='post'><input type='hidden' name='payment_id' value='" . $row["PAYMENT_ID"] . "'><input type='submit' name='edit' value='Редактировать'></form></td>";
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

