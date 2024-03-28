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
            <div class="btn-group-vertical" style="height: 800px">
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
                <!-- <button class="btn btn-primary" onclick="document.location='T_TOWN_TYPE.php'">Таблица T_TOWN_TYPE</button> -->
                <button class="btn btn-primary" onclick="document.location='USER_TYPE_REF.php'">Таблица USER_TYPE_REF</button>
                <button class="btn btn-primary" onclick="document.location='USERS.php'">Таблица USERS</button>
            </div>
            <div class="col-md-8">
                <h2>Таблица T_TOWN_TYPE</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>Действия</th>
                        <th>TYPE_TOWN_ID</th>
                        <th>NAME</th>
                        <th>SHORTNAME</th>
                        <th>IS_CITY</th>
                    </tr>

                    <?php
                    $sql=mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
                    mysqli_select_db($sql, "student1") or die("Нет такой таблицы!");
                    

                    $req = "SELECT TYPE_TOWN_ID, NAME, SHORTNAME, IS_CITY FROM T_TOWN_TYPE";
                    $rows=mysqli_query($sql, $req);
                    echo "<tr><form action='' method='get'>";
                    echo "<td><input type='submit' name='add' value='Добавить запись'>";
                    echo "<td><input type='text' name='type_town_id' value='" . $row["TYPE_TOWN_ID"] . "'></td>";
                    echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                    echo "<td><input type='text' name='shortname' value='" . $row["SHORTNAME"] . "'></td>";
                    echo "<td><input type='text' name='is_city' value='" . $row["IS_CITY"] . "'></td>";
                    echo "</form></tr>";

                    if ($rows->num_rows > 0) {
                        while($row=mysqli_fetch_array($rows)) {
                            echo "<tr><form action='' method='get'><input type='hidden' name='type_town_id_p' value='" . $row["TYPE_TOWN_ID"] . "'>";
                            echo "<td><input type='submit' name='edit' value='Редактировать'><br>";
                            echo "<input type='submit' name='del' value='Удалить'></td>";
                            echo "<td><input type='text' name='type_town_id' value='" . $row["TYPE_TOWN_ID"] . "'></td>";
                            echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                            echo "<td><input type='text' name='shortname' value='" . $row["SHORTNAME"] . "'></td>";
                            echo "<td><input type='text' name='is_city' value='" . $row["IS_CITY"] . "'></td>";
                            echo "</form></tr>";
                        }
                    } else {
                        echo "0 результатов";
                    }
                    if(isset($_GET['edit'])) {
                        $type_town_id_p = $_GET['type_town_id_p'];
                        $type_town_id = $_GET['type_town_id'];
                        $name = $_GET['name'];
                        $shortname = $_GET['shortname'];
                        $is_city = $_GET['is_city'];

                        $req = "UPDATE T_TOWN_TYPE SET TYPE_TOWN_ID=$type_town_id, NAME='$name', SHORTNAME='$shortname', IS_CITY=$is_city WHERE TYPE_TOWN_ID=$type_town_id_p";
                        mysqli_query($sql, $req);
                    }
                    
                    if (isset($_GET['del'])) {
                        $type_town_id = $_GET['type_town_id'];
                        $req = "DELETE FROM T_TOWN_TYPE WHERE TYPE_TOWN_ID=$type_town_id";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_GET['add'])) {
                        $type_town_id = $_GET['type_town_id'];
                        $name = $_GET['name'];
                        $shortname = $_GET['shortname'];
                        $is_city = $_GET['is_city'];

                        $req = "INSERT INTO T_TOWN_TYPE VALUES ($type_town_id, '$name', '$shortname', $is_city)";
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
