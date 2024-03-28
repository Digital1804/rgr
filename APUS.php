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
                <button class="btn btn-primary" onclick="document.location='USERS.php'">Таблица USERS</button>
                <button class="btn btn-primary" onclick="document.location='USER_TYPE_REF.php'">Таблица USER_TYPE_REF</button>
            </div>
            <div class="col-md-8">
                <h2>Таблица APUS_PLAN</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>Действия</th>
                        <th>ID_PLAN</th>
                        <th>NAME</th>
                        <th>SVC_ID</th>
                        <th>C_SVC_ID</th>
                        <th>IS_FIX_SUMM</th>
                        <th>FULLNAME</th>
                    </tr>

                    <?php
                    $sql=mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
                    mysqli_select_db($sql, "student1") or die("Нет такой таблицы!");
                    

                    $req = "SELECT ID_PLAN, NAME, SVC_ID, C_SVC_ID, IS_FIX_SUMM, FULLNAME FROM APUS_PLAN";
                    $rows=mysqli_query($sql, $req);
                    echo "<tr><form action='' method='get'>";
                    echo "<td><input type='submit' name='add' value='Добавить запись'>";
                    echo "<td><input type='text' name='id_plan' value='" . $row["ID_PLAN"] . "'></td>";
                    echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                    echo "<td><input type='text' name='svc_id' value='" . $row["SVC_ID"] . "'></td>";
                    echo "<td><input type='text' name='c_svc_id' value='" . $row["C_SVC_ID"] . "'></td>";
                    echo "<td><input type='text' name='is_fix_summ' value='" . $row["IS_FIX_SUMM"] . "'></td>";
                    echo "<td><input type='text' name='fullname' value='" . $row["FULLNAME"] . "'></td>";
                    echo "</form></tr>";
                        
                    if ($rows->num_rows > 0) {
                        while($row=mysqli_fetch_array($rows)) {
                            echo "<tr><form action='' method='get'><input type='hidden' name='id_plan_p' value='" . $row["ID_PLAN"] . "'>";
                            echo "<td><input type='submit' name='edit' value='Редактировать'><br>";
                            echo "<input type='submit' name='del' value='Удалить'></td>";
                            echo "<td><input type='text' name='id_plan' value='" . $row["ID_PLAN"] . "'></td>";
                            echo "<td><input type='text' name='name' value='" . $row["NAME"] . "'></td>";
                            echo "<td><input type='text' name='svc_id' value='" . $row["SVC_ID"] . "'></td>";
                            echo "<td><input type='text' name='c_svc_id' value='" . $row["C_SVC_ID"] . "'></td>";
                            echo "<td><input type='text' name='is_fix_summ' value='" . $row["IS_FIX_SUMM"] . "'></td>";
                            echo "<td><input type='text' name='fullname' value='" . $row["FULLNAME"] . "'></td>";
                            echo "</form></tr>";
                        }
                        }else {
                            echo "0 результатов";
                        }

                        if(isset($_GET['edit'])) {
                            $id_plan_p = $_GET['id_plan_p'];
                            $id_plan = $_GET['id_plan'];
                            $name = $_GET['name'];
                            $svc_id = $_GET['svc_id'];
                            $c_svc_id = $_GET['c_svc_id'];
                            $is_fix_summ = $_GET['is_fix_summ'];
                            $fullname = $_GET['fullname'];
                    
                            $req = "UPDATE APUS_PLAN SET ID_PLAN=$id_plan, NAME='$name', SVC_ID=$svc_id, C_SVC_ID=$c_svc_id, IS_FIX_SUMM='$is_fix_summ', FULLNAME='$fullname' WHERE ID_PLAN=$id_plan_p";
                            mysqli_query($sql, $req);
                        }
                        if(isset($_GET['del'])) {
                            $id_plan_p = $_GET['id_plan_p'];
                            $req = "DELETE FROM APUS_PLAN WHERE ID_PLAN=$id_plan_p";
                            mysqli_query($sql, $req);
                        }
                        if(isset($_GET['add'])) {
                            $id_plan = $_GET['id_plan'];
                            $name = $_GET['name'];
                            $svc_id = $_GET['svc_id'];
                            $c_svc_id = $_GET['c_svc_id'];
                            $is_fix_summ = $_GET['is_fix_summ'];
                            $fullname = $_GET['fullname'];
                            $req = "INSERT INTO APUS_PLAN (ID_PLAN, NAME, SVC_ID, C_SVC_ID, IS_FIX_SUMM, FULLNAME) VALUES ($id_plan, '$name', $svc_id, $c_svc_id, '$is_fix_summ', '$fullname')";
                            mysqli_query($sql, $req);
                            echo $req;
                        }
                    
                        $sql->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
