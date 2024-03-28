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

                <button class="btn btn-primary" onclick="document.location='T_TOWN_TYPE.php'">Таблица T_TOWN_TYPE</button>
                <!-- <button class="btn btn-primary" onclick="document.location='TOWN.php'">Таблица TOWN</button> -->
                <button class="btn btn-primary" onclick="document.location='USER_TYPE_REF.php'">Таблица USER_TYPE_REF</button>
                <button class="btn btn-primary" onclick="document.location='USERS.php'">Таблица USERS</button>
            </div>
            <div class="col-md-8">
                <h2>Таблица TOWN</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>TOWN_ID</th>
                        <th>NAME</th>
                        <th>TYPE_TOWN_ID</th>
                        <th>ID_TERRITORY</th>
                        <th>TARIF_ZONE_ID</th>
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
                        $town_id = $_POST['town_id'];
                        $name = $_POST['name'];
                        $type_town_id = $_POST['type_town_id'];
                        $id_territory = $_POST['id_territory'];
                        $tarif_zone_id = $_POST['tarif_zone_id'];

                        $sql = "UPDATE TOWN SET NAME='$name', TYPE_TOWN_ID=$type_town_id, ID_TERRITORY=$id_territory, TARIF_ZONE_ID=$tarif_zone_id WHERE TOWN_ID=$town_id";

                        if ($conn->query($sql) === TRUE) {
                            echo "Запись успешно обновлена";
                        } else {
                            echo "Ошибка при обновлении записи: " . $conn->error;
                        }
                    }

                    // SQL запрос для выборки данных из таблицы TOWN
                    $sql = "SELECT TOWN_ID, NAME, TYPE_TOWN_ID, ID_TERRITORY, TARIF_ZONE_ID FROM TOWN";
                    $result = $conn->query($sql);

                    // Вывод данных из таблицы с формой редактирования
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["TOWN_ID"] . "</td>";
                            echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                            echo "<td><input type='text' name='type_town_id' value='" . $row["TYPE_TOWN_ID"] . "'></td>";
                            echo "<td><input type='text' name='id_territory' value='" . $row["ID_TERRITORY"] . "'></td>";
                            echo "<td><input type='text' name='tarif_zone_id' value='" . $row["TARIF_ZONE_ID"] . "'></td>";
                            echo "<td><form action='' method='post'><input type='hidden' name='town_id' value='" . $row["TOWN_ID"] . "'><input type='submit' name='edit' value='Редактировать'></form></td>";
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
