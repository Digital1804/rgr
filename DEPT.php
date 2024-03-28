<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр и редактирование таблицы CALLS</title>
    <style>
        table {
            background-color: #fff;
        }
    </style>
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
                <!-- <button class="btn btn-primary" onclick="document.location='DEPT.php'">Таблица DEPT</button> -->

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
                <button class="btn btn-primary" onclick="document.location='USERS.php'">Таблица USERS</button>
                <button class="btn btn-primary" onclick="document.location='USER_TYPE_REF.php'">Таблица USER_TYPE_REF</button>
            </div>
            <div class="col-md-8">
                <h2>Таблица DEPT</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>Действия</th>
                        <th>DEPT_ID</th>
                        <th>NAME</th>
                        <th>DEPT_MANAGES</th>
                        <th>MAIN_DEPT</th>
                        <th>FULL_NAME</th>
                        <th>FILIAL_COD</th>
                    </tr>

                    <?php
                    $sql=mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
                    mysqli_select_db($sql, "student1") or die("Нет такой таблицы!");

                    $req = "SELECT DEPT_ID, NAME, DEPT_MANAGES, MAIN_DEPT, FULL_NAME, FILIAL_COD FROM DEPT";
                    $rows=mysqli_query($sql, $req);
                    echo "<tr><form action='' method='post'><input type='hidden' name='dept_id_p' value='" . $row["DEPT_ID"] . "'>";
                    echo "<td><input type='submit' name='add' value='Добавить запись'></td>";
                    echo "<td><input type='text' name='dept_id' value='" . $row["DEPT_ID"] . "'></td>";
                    echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                    echo "<td><input type='text' name='dept_manages' value='" . $row["DEPT_MANAGES"] . "'></td>";
                    echo "<td><input type='text' name='main_dept' value='" . $row["MAIN_DEPT"] . "'></td>";
                    echo "<td><input type='text' name='full_name' value='" . $row["FULL_NAME"] . "'></td>";
                    echo "<td><input type='text' name='filial_cod' value='" . $row["FILIAL_COD"] . "'></td>";
                    echo "</form></tr>";


                    if ($rows->num_rows > 0) {
                        while($row=mysqli_fetch_array($rows)) {
                            echo "<tr><form action='' method='post'><input type='hidden' name='dept_id_p' value='" . $row["DEPT_ID"] . "'>";
                            echo "<td><input type='submit' name='edit' value='Редактировать'><br>";
                            echo "<input type='submit' name='del' value='Удалить'></td>";
                            echo "<td><input type='text' name='dept_id' value='" . $row["DEPT_ID"] . "'></td>";
                            echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                            echo "<td><input type='text' name='dept_manages' value='" . $row["DEPT_MANAGES"] . "'></td>";
                            echo "<td><input type='text' name='main_dept' value='" . $row["MAIN_DEPT"] . "'></td>";
                            echo "<td><input type='text' name='full_name' value='" . $row["FULL_NAME"] . "'></td>";
                            echo "<td><input type='text' name='filial_cod' value='" . $row["FILIAL_COD"] . "'></td>";
                            echo "</form></tr>";
                        }
                    } else {
                        echo "0 результатов";
                    }
                    if(isset($_POST['edit'])) {
                        $dept_id_p = $_POST['dept_id_p'];
                        $dept_id = $_POST['dept_id'];
                        $name = $_POST['name'];
                        $dept_manages = $_POST['dept_manages'];
                        $main_dept = $_POST['main_dept'];
                        $full_name = $_POST['full_name'];
                        $filial_cod = $_POST['filial_cod'];

                        $req = "UPDATE DEPT SET DEPT_ID=$dept_id, NAME='$name', DEPT_MANAGES=$dept_manages, MAIN_DEPT=$main_dept, FULL_NAME='$full_name', FILIAL_COD='$filial_cod' WHERE DEPT_ID=$dept_id_p";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_POST['del'])) {
                        $dept_id_p = $_POST['dept_id_p'];
                        $req = "DELETE FROM DEPT WHERE DEPT_ID=$dept_id_p";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_POST['add'])) {
                        $dept_id = $_POST['dept_id'];
                        $name = $_POST['name'];
                        $dept_manages = $_POST['dept_manages'];
                        $main_dept = $_POST['main_dept'];
                        $full_name = $_POST['full_name'];
                        $filial_cod = $_POST['filial_cod'];

                        $req = "INSERT INTO DEPT (DEPT_ID, NAME, DEPT_MANAGES, MAIN_DEPT, FULL_NAME, FILIAL_COD) VALUES ($dept_id, '$name', $dept_manages, $main_dept, '$full_name', '$filial_cod')";
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
