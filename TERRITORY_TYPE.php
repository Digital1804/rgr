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
                <!-- <button class="btn btn-primary" onclick="document.location='TERRITORY_TYPE.php'">Таблица TERRITORY_TYPE</button> -->

                <button class="btn btn-primary" onclick="document.location='TOWN.php'">Таблица TOWN</button>
                <button class="btn btn-primary" onclick="document.location='T_TOWN_TYPE.php'">Таблица T_TOWN_TYPE</button>
                <button class="btn btn-primary" onclick="document.location='USER_TYPE_REF.php'">Таблица USER_TYPE_REF</button>
                <button class="btn btn-primary" onclick="document.location='USERS.php'">Таблица USERS</button>
            </div>
            <div class="col-md-8">
                <h2>Таблица TERRITORY_TYPE</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>Действия</th>
                        <th>ID_TERRITORY_TYPE</th>
                        <th>NAME</th>
                        <th>SHORTNAME</th>
                    </tr>

                    <?php
                    $sql=mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
                    mysqli_select_db($sql, "student1") or die("Нет такой таблицы!");
                    
                    echo "<tr><form action='' method='get'>";
                    echo "<td><input type='submit' name='add' value='Добавить запись'>";
                    echo "<td><input type='text' name='id_territory_type' value='" . $row["ID_TERRITORY_TYPE"] . "'></td>";
                    echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                    echo "<td><input type='text' name='shortname' value='" . $row["SHORTNAME"] . "'></td>";
                    echo "</form></tr>";
                    
                    $req = "SELECT ID_TERRITORY_TYPE, NAME, SHORTNAME FROM TERRITORY_TYPE";
                    $rows=mysqli_query($sql, $req);

                    if ($rows->num_rows > 0) {
                        while($row=mysqli_fetch_array($rows)) {
                            echo "<tr><form action='' method='get'><input type='hidden' name='id_territory_type_p' value='" . $row["ID_TERRITORY_TYPE"] . "'>";
                            echo "<td><input type='submit' name='edit' value='Редактировать'><br>";
                            echo "<input type='submit' name='del' value='Удалить'></td>";
                            echo "<td><input type='text' name='id_territory_type' value='" . $row["ID_TERRITORY_TYPE"] . "'></td>";
                            echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                            echo "<td><input type='text' name='shortname' value='" . $row["SHORTNAME"] . "'></td>";
                            echo "</form></tr>";
                        }
                    } else {
                        echo "0 результатов";
                    }
                    if(isset($_GET['edit'])) {
                        $id_territory_type_p = $_GET['id_territory_type_p'];
                        $id_territory_type = $_GET['id_territory_type'];
                        $name = $_GET['name'];
                        $shortname = $_GET['shortname'];

                        $req = "UPDATE TERRITORY_TYPE SET ID_TERRITORY_TYPE=$id_territory_type, NAME='$name', SHORTNAME='$shortname' WHERE ID_TERRITORY_TYPE=$id_territory_type_p";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_GET['del'])) {
                        $id_territory_type = $_GET['id_territory_type'];
                        $req = "DELETE FROM TERRITORY_TYPE WHERE ID_TERRITORY_TYPE=$id_territory_type";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_GET['add'])) {
                        $id_territory_type = $_GET['id_territory_type'];
                        $name = $_GET['name'];
                        $shortname = $_GET['shortname'];

                        $req = "INSERT INTO TERRITORY_TYPE (ID_TERRITORY_TYPE, NAME, SHORTNAME) VALUES ($id_territory_type, '$name', '$shortname')";
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
