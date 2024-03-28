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
                <!-- <button class="btn btn-primary" onclick="document.location='SALDO.php'">Таблица SALDO</button> -->

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
                <h2>Таблица SALDO</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>Действия</th>
                        <th>BILLING_ID</th>
                        <th>USER_ID</th>
                        <th>SALDO</th>
                        <th>USER_TYPE_ID</th>
                        <th>DEPT_ID</th>
                    </tr>

                    <?php
                    $sql=mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
                    mysqli_select_db($sql, "student1") or die("Нет такой таблицы!");
                    
                    $req = "SELECT BILLING_ID, USER_ID, SALDO, USER_TYPE_ID, DEPT_ID FROM SALDO";
                    $rows=mysqli_query($sql, $req);
                    echo "<tr><form action='' method='get'><input type='hidden' name='id_connect' value='" . $row["TYPE_TOWN_ID"] . "'>";
                    echo "<td><input type='submit' name='add' value='Добавить запись'>";
                    echo "<td><input type='text' name='billing_id' value='" . $row["BILLING_ID"] . "'></td>";
                    echo "<td><input type='text' name='user_id' value='" . $row["USER_ID"] . "'></td>";
                    echo "<td><input type='text' name='saldo' value='" . $row["SALDO"] . "'></td>";
                    echo "<td><input type='text' name='user_type_id' value='" . $row["USER_TYPE_ID"] . "'></td>";
                    echo "<td><input type='text' name='dept_id' value='" . $row["DEPT_ID"] . "'></td>";
                    echo "</form></tr>";
                    
                    // Вывод данных из таблицы с формой редактирования
                    if ($rows->num_rows > 0) {
                        while($row=mysqli_fetch_array($rows)) {
                            echo "<tr><form action='' method='post'><input type='hidden' name='billing_id_p' value='" . $row["BILLING_ID"] . "'>";
                            echo "<td><input type='submit' name='edit' value='Редактировать'><br>";
                            echo "<input type='submit' name='del' value='Удалить'></td>";
                            echo "<td><input type='text' name='billing_id' value='" . $row["BILLING_ID"] . "'></td>";
                            echo "<td><input type='text' name='user_id' value='" . $row["USER_ID"] . "'></td>";
                            echo "<td><input type='text' name='saldo' value='" . $row["SALDO"] . "'></td>";
                            echo "<td><input type='text' name='user_type_id' value='" . $row["USER_TYPE_ID"] . "'></td>";
                            echo "<td><input type='text' name='dept_id' value='" . $row["DEPT_ID"] . "'></td>";
                            echo "</form></tr>";
                        }
                    } else {
                        echo "0 результатов";
                    }

                    if(isset($_POST['edit'])) {
                        $billing_id_p = $_POST['billing_id_p'];
                        $billing_id = $_POST['billing_id'];
                        $user_id = $_POST['user_id'];
                        $saldo = $_POST['saldo'];
                        $user_type_id = $_POST['user_type_id'];
                        $dept_id = $_POST['dept_id'];

                        $req = "UPDATE SALDO SET BILLING_ID=$billing_id, USER_ID=$user_id, SALDO=$saldo, USER_TYPE_ID=$user_type_id, DEPT_ID=$dept_id WHERE BILLING_ID=$billing_id_p";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_POST['del'])) {
                        $billing_id = $_POST['billing_id'];
                        $req = "DELETE FROM SALDO WHERE BILLING_ID=$billing_id";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_POST['add'])) {
                        $billing_id = $_POST['billing_id'];
                        $user_id = $_POST['user_id'];
                        $saldo = $_POST['saldo'];
                        $user_type_id = $_POST['user_type_id'];
                        $dept_id = $_POST['dept_id'];

                        $req = "INSERT INTO SALDO (BILLING_ID, USER_ID, SALDO, USER_TYPE_ID, DEPT_ID) VALUES ($billing_id, $user_id, $saldo, $user_type_id, $dept_id)";
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
