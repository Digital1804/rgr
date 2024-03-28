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

                <button class="btn btn-primary" onclick="document.location='TARIFED_SERVICES.php'">Таблица TARIFED_SERVICES</button>
                <button class="btn btn-primary" onclick="document.location='TAX_TARIF_REF.php'">Таблица TAX_TARIF_REF</button>
                <button class="btn btn-primary" onclick="document.location='TERRITORY_CONSTITUTE.php'">Таблица TERRITORY_CONSTITUTE</button>
                <button class="btn btn-primary" onclick="document.location='TERRITORY_TYPE.php'">Таблица TERRITORY_TYPE</button>

                <button class="btn btn-primary" onclick="document.location='TOWN.php'">Таблица TOWN</button>
                <button class="btn btn-primary" onclick="document.location='T_TOWN_TYPE.php'">Таблица T_TOWN_TYPE</button>
                <!-- <button class="btn btn-primary" onclick="document.location='USERS.php'">Таблица USERS</button> -->
                <button class="btn btn-primary" onclick="document.location='USER_TYPE_REF.php'">Таблица USER_TYPE_REF</button>
            </div>
            <div class="col-md-8">
                <h2>Таблица USERS</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>USER_ID</th>
                        <th>BANK_DEPT_ID</th>
                        <th>DEPT_ID</th>
                        <th>OKONX_ID</th>
                        <th>USER_TYPE_ID</th>
                        <th>ACCOUNT</th>
                        <th>NAME</th>
                        <th>INN</th>
                        <th>DATE_BEGIN</th>
                        <th>DATE_END</th>
                        <th>FLAT</th>
                        <th>ISCORP</th>
                        <th>COMMENTARY</th>
                        <th>BANK_ACCOUNT</th>
                        <th>OKPO</th>
                        <th>J_PHONE</th>
                        <th>F_PHONE</th>
                        <th>DOCUMENT_TEXT</th>
                        <th>HOUSE_ID</th>
                        <th>CHIEF_USER_ID</th>
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
                        $bank_dept_id = $_POST['bank_dept_id'];
                        $dept_id = $_POST['dept_id'];
                        $okonx_id = $_POST['okonx_id'];
                        $user_type_id = $_POST['user_type_id'];
                        $account = $_POST['account'];
                        $name = $_POST['name'];
                        $inn = $_POST['inn'];
                        $date_begin = $_POST['date_begin'];
                        $date_end = $_POST['date_end'];
                        $flat = $_POST['flat'];
                        $iscorp = $_POST['iscorp'];
                        $commentary = $_POST['commentary'];
                        $bank_account = $_POST['bank_account'];
                        $okpo = $_POST['okpo'];
                        $j_phone = $_POST['j_phone'];
                        $f_phone = $_POST['f_phone'];
                        $document_text = $_POST['document_text'];
                        $house_id = $_POST['house_id'];
                        $chief_user_id = $_POST['chief_user_id'];

                        $sql = "UPDATE USERS SET BANK_DEPT_ID=$bank_dept_id, DEPT_ID=$dept_id, OKONX_ID=$okonx_id, USER_TYPE_ID=$user_type_id, ACCOUNT='$account', NAME='$name', INN='$inn', DATE_BEGIN='$date_begin', DATE_END='$date_end', FLAT='$flat', ISCORP='$iscorp', COMMENTARY='$commentary', BANK_ACCOUNT='$bank_account', OKPO='$okpo', J_PHONE='$j_phone', F_PHONE='$f_phone', DOCUMENT_TEXT='$document_text', HOUSE_ID=$house_id, CHIEF_USER_ID=$chief_user_id WHERE USER_ID=$user_id";

                        if ($conn->query($sql) === TRUE) {
                            echo "Запись успешно обновлена";
                        } else {
                            echo "Ошибка при обновлении записи: " . $conn->error;
                        }
                    }

                    // SQL запрос для выборки данных из таблицы USERS
                    $sql = "SELECT USER_ID, BANK_DEPT_ID, DEPT_ID, OKONX_ID, USER_TYPE_ID, ACCOUNT, NAME, INN, DATE_BEGIN, DATE_END, FLAT, ISCORP, COMMENTARY, BANK_ACCOUNT, OKPO, J_PHONE, F_PHONE, DOCUMENT_TEXT, HOUSE_ID, CHIEF_USER_ID FROM USERS";
                    $result = $conn->query($sql);

                    // Вывод данных из таблицы с формой редактирования
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["USER_ID"] . "</td>";
                            echo "<td><input type='text' name='bank_dept_id' value='" . $row["BANK_DEPT_ID"] . "'></td>";
                            echo "<td><input type='text' name='dept_id' value='" . $row["DEPT_ID"] . "'></td>";
                            echo "<td><input type='text' name='okonx_id' value='" . $row["OKONX_ID"] . "'></td>";
                            echo "<td><input type='text' name='user_type_id' value='" . $row["USER_TYPE_ID"] . "'></td>";
                            echo "<td><input type='text' name='account' value='" . $row["ACCOUNT"] . "'></td>";
                            echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                            echo "<td><input type='text' name='inn' value='" . $row["INN"] . "'></td>";
                            echo "<td><input type='date' name='date_begin' value='" . $row["DATE_BEGIN"] . "'></td>";
                            echo "<td><input type='date' name='date_end' value='" . $row["DATE_END"] . "'></td>";
                            echo "<td><input type='text' name='flat' value='" . $row["FLAT"] . "'></td>";
                            echo "<td><input type='text' name='iscorp' value='" . $row["ISCORP"] . "'></td>";
                            echo "<td><input type='text' name='commentary' value='" . $row["COMMENTARY"] . "'></td>";
                            echo "<td><input type='text' name='commentary' value='" . $row["COMMENTARY"] . "'></td>";
                            echo "<td><input type='text' name='bank_account' value='" . $row["BANK_ACCOUNT"] . "'></td>";
                            echo "<td><input type='text' name='okpo' value='" . $row["OKPO"] . "'></td>";
                            echo "<td><input type='text' name='j_phone' value='" . $row["J_PHONE"] . "'></td>";
                            echo "<td><input type='text' name='f_phone' value='" . $row["F_PHONE"] . "'></td>";
                            echo "<td><input type='text' name='document_text' value='" . $row["DOCUMENT_TEXT"] . "'></td>";
                            echo "<td><input type='text' name='house_id' value='" . $row["HOUSE_ID"] . "'></td>";
                            echo "<td><input type='text' name='chief_user_id' value='" . $row["CHIEF_USER_ID"] . "'></td>";
                            echo "<td><form action='' method='post'><input type='hidden' name='user_id' value='" . $row["USER_ID"] . "'><input type='submit' name='edit' value='Редактировать'></form></td>";
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

