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
                <!-- <button class="btn btn-primary" onclick="document.location='STREETS_REF.php'">Таблица STREETS_REF</button> -->
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
                <h2>Таблица STREETS_REF</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>Действия</th>
                        <th>STREET_ID</th>
                        <th>TOWN_ID</th>
                        <th>NAME</th>
                        <th>TYPE_STREET_ID</th>
                    </tr>

                    <?php
                    $sql=mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
                    mysqli_select_db($sql, "student1") or die("Нет такой таблицы!");
                    echo "<tr><form action='' method='get'>";
                    echo "<td><input type='submit' name='add' value='Добавить запись'>";
                    echo "<td><input type='text' name='street_id' value='" . $row["STREET_ID"] . "'></td>";
                    echo "<td><input type='text' name='town_id' value='" . $row["TOWN_ID"] . "'></td>";
                    echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                    echo "<td><input type='text' name='type_street_id' value='" . $row["TYPE_STREET_ID"] . "'></td>";
                    echo "</tr>";
                    

                    $req = "SELECT STREET_ID, TOWN_ID, NAME, TYPE_STREET_ID FROM STREETS_REF";
                    $rows=mysqli_query($sql, $req);

                    if ($rows->num_rows > 0) {
                        while($row=mysqli_fetch_array($rows)) {
                            echo "<tr><form action='' method='get'><input type='hidden' name='street_id_p' value='" . $row["STREET_ID"] . "'>";
                            echo "<td><input type='submit' name='edit' value='Редактировать'><br>";
                            echo "<input type='submit' name='del' value='Удалить'></td>";
                            echo "<td><input type='text' name='street_id' value='" . $row["STREET_ID"] . "'></td>";
                            echo "<td><input type='text' name='town_id' value='" . $row["TOWN_ID"] . "'></td>";
                            echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                            echo "<td><input type='text' name='type_street_id' value='" . $row["TYPE_STREET_ID"] . "'></td>";
                            echo "</form></tr>";
                        }
                    } else {
                        echo "0 результатов";
                    }
                    if(isset($_GET['edit'])) {
                        $street_id_p = $_GET['street_id_p'];
                        $street_id = $_GET['street_id'];
                        $town_id = $_GET['town_id'];
                        $name = $_GET['name'];
                        $type_street_id = $_GET['type_street_id'];

                        $req = "UPDATE STREETS_REF SET STREET_ID=$street_id, TOWN_ID=$town_id, NAME='$name', TYPE_STREET_ID=$type_street_id WHERE STREET_ID=$street_id_p";
                        mysqli_query($sql, $req);
                        echo $req;
                    }
                    if (isset($_GET['del'])) {
                        $street_id = $_GET['street_id'];
                        $req = "DELETE FROM STREETS_REF WHERE STREET_ID=$street_id";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_GET['add'])) {
                        $street_id = $_GET['street_id'];
                        $town_id = $_GET['town_id'];
                        $name = $_GET['name'];
                        $type_street_id = $_GET['type_street_id'];

                        $req = "INSERT INTO STREETS_REF (STREET_ID, TOWN_ID, NAME, TYPE_STREET_ID) VALUES ($street_id, $town_id, '$name', $type_street_id)";
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
