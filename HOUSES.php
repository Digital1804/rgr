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

                <!-- <button class="btn btn-primary" onclick="document.location='HOUSES.php'">Таблица HOUSES</button> -->
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
                <h2>Таблица HOUSES</h2>

            <table class="table table-bordered">
                <tr>
                    <th>Действия</th>
                    <th>HOUSE_ID</th>
                    <th>STREET_ID</th>
                    <th>HOUSE</th>
                    <th>CORPUS</th>
                    <th>NOTE</th>
                    <th>LETTER</th>
                    <th>BUILDING</th>
                </tr>

                <?php
                $sql=mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
                mysqli_select_db($sql, "student1") or die("Нет такой таблицы!");

                $req = "SELECT HOUSE_ID, STREET_ID, HOUSE, CORPUS, NOTE, LETTER, BUILDING FROM HOUSES";
                $rows=mysqli_query($sql, $req);
                echo "<tr><form action='' method='post'><input type='hidden' name='house_id_p' value='" . $row["HOUSE_ID"] . "'>";
                echo "<td><input type='submit' name='add' value='Добавить запись'>\n";
                echo "<td><input type='text' name='house_id' value='" . $row["HOUSE_ID"] . "'></td>";
                echo "<td><input type='text' name='street_id' value='" . $row["STREET_ID"] . "'></td>";
                echo "<td><input type='text' name='house' value='" . $row["HOUSE"] . "'></td>";
                echo "<td><input type='text' name='corpus' value='" . $row["CORPUS"] . "'></td>";
                echo "<td><input type='text' name='note' value='" . $row["NOTE"] . "'></td>";
                echo "<td><input type='text' name='letter' value='" . $row["LETTER"] . "'></td>";
                echo "<td><input type='text' name='building' value='" . $row["BUILDING"] . "'></td>";
                echo "</form></tr>";

                if ($rows->num_rows > 0) {
                    while($row=mysqli_fetch_array($rows)) {
                        echo "<tr><form action='' method='post'><input type='hidden' name='house_id_p' value='" . $row["HOUSE_ID"] . "'>";
                        echo "<td><input type='submit' name='edit' value='Редактировать'><br>";
                        echo "<input type='submit' name='del' value='Удалить'></td>";
                        echo "<td><input type='text' name='street_id' value='" . $row["HOUSE_ID"] . "'></td>";
                        echo "<td><input type='text' name='street_id' value='" . $row["STREET_ID"] . "'></td>";
                        echo "<td><input type='text' name='house' value='" . $row["HOUSE"] . "'></td>";
                        echo "<td><input type='text' name='corpus' value='" . $row["CORPUS"] . "'></td>";
                        echo "<td><input type='text' name='note' value='" . $row["NOTE"] . "'></td>";
                        echo "<td><input type='text' name='letter' value='" . $row["LETTER"] . "'></td>";
                        echo "<td><input type='text' name='building' value='" . $row["BUILDING"] . "'></td>";
                        echo "</form></tr>";
                    }
                } else {
                    echo "0 результатов";
                }
                if (isset($_POST['edit'])) {
                    $house_id_p = $_POST['house_id_p'];
                    $house_id = $_POST['house_id'];
                    $street_id = $_POST['street_id'];
                    $house = $_POST['house'];
                    $corpus = $_POST['corpus'];
                    $note = $_POST['note'];
                    $letter = $_POST['letter'];
                    $building = $_POST['building'];

                    $req = "UPDATE HOUSES SET STREET_ID=$street_id, HOUSE='$house', CORPUS='$corpus', NOTE='$note', LETTER='$letter', BUILDING='$building' WHERE HOUSE_ID=$house_id_p";
                    mysqli_query($sql, $req);
                }
                if (isset($_POST['del'])) {
                    $house_id = $_POST['house_id'];
                    $req = "DELETE FROM HOUSES WHERE HOUSE_ID=$house_id";
                    mysqli_query($sql, $req);
                }
                if (isset($_POST['add'])) {
                    $house_id = $_POST['house_id'];
                    $street_id = $_POST['street_id'];
                    $house = $_POST['house'];
                    $corpus = $_POST['corpus'];
                    $note = $_POST['note'];
                    $letter = $_POST['letter'];
                    $building = $_POST['building'];

                    $req = "INSERT INTO HOUSES (HOUSE_ID, STREET_ID, HOUSE, CORPUS, NOTE, LETTER, BUILDING) VALUES ($house_id, $street_id, '$house', '$corpus', '$note', '$letter', '$building')";
                    mysqli_query($sql, $req);
                }
                $sql->close();
                ?>
            </table>
            </div>
        </div>
    </div>
</body>
</html>
