<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр и редактирование таблицы CALLS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="btn-group-vertical">
                <button class="btn btn-primary" onclick="document.location='APUS.php'">Таблица APUS_PLAN</button>
                <!-- <button class="btn btn-primary" onclick="document.location='CALLS.php'">Таблица CALLS</button> -->
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
                <h2>Таблица CALLS</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>Действия</th>
                        <th>ID_CONNECT</th>
                        <th>BILLING_ID</th>
                        <th>USER_ID</th>
                        <th>PHONEA</th>
                        <th>PHONEB</th>
                        <th>TALKDATE</th>
                        <th>DLIT</th>
                        <th>SUMMP</th>
                        <th>PLAN_ID</th>
                        <th>TARIF_DLIT</th>
                        <th>ADDITIONAL_INFO</th>
                        <th>SERVICE_ID</th>
                        <th>SUMM_TAR</th>
                    </tr>

                    <?php
                        echo "<tr><form action='' method='get'><input type='hidden' name='id_connect' value='" . $row["ID_CONNECT"] . "'>";
                        echo "<td><input type='submit' name='add' value='Добавить запись'>\n";
                        echo "<td><input type='text' name='id_connect' value='" . $row["ID_CONNECT"] . "'</td>";
                        echo "<td><input type='text' name='billing_id' value='" . $row["BILLING_ID"] . "'></td>";
                        echo "<td><input type='text' name='user_id' value='" . $row["USER_ID"] . "'></td>";
                        echo "<td><input type='text' name='phonea' value='" . $row["PHONEA"] . "'></td>";
                        echo "<td><input type='text' name='phoneb' value='" . $row["PHONEB"] . "'></td>";
                        echo "<td><input type='text' name='talkdate' value='" . $row["TALKDATE"] . "'></td>";
                        echo "<td><input type='text' name='dlit' value='" . $row["DLIT"] . "'></td>";
                        echo "<td><input type='text' name='summp' value='" . $row["SUMMP"] . "'></td>";
                        echo "<td><input type='text' name='plan_id' value='" . $row["PLAN_ID"] . "'></td>";
                        echo "<td><input type='text' name='tarif_dlit' value='" . $row["TARIF_DLIT"] . "'></td>";
                        echo "<td><input type='text' name='additional_info' value='" . $row["ADDITIONAL_INFO"] . "'></td>";
                        echo "<td><input type='text' name='service_id' value='" . $row["SERVICE_ID"] . "'></td>";
                        echo "<td><input type='text' name='summ_tar' value='" . $row["SUMM_TAR"] . "'></td>";
                        echo "</form></tr>";
                    
                        $sql=mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
                        mysqli_select_db($sql, "student1") or die("Нет такой таблицы!");
                        $req = "SELECT ID_CONNECT, BILLING_ID, USER_ID, PHONEA, PHONEB, TALKDATE, DLIT, SUMMP, PLAN_ID, TARIF_DLIT, ADDITIONAL_INFO, SERVICE_ID, SUMM_TAR FROM CALLS";
                        $rows=mysqli_query($sql, $req);
                        
                        // Вывод данных из таблицы с формой редактирования
                        if ($rows->num_rows > 0) {
                            while($row=mysqli_fetch_array($rows)) {
                                echo "<tr><form action='' method='get'><input type='hidden' name='id_connect_p' value='" . $row["ID_CONNECT"] . "'>";
                                echo "<td><input type='submit' name='edit' value='Редактировать'><br>";
                                echo "<input type='submit' name='del' value='Удалить'></td>";
                                echo "<td><input type='text' name='id_connect' value='" . $row["ID_CONNECT"] . "'</td>";
                                echo "<td><input type='text' name='billing_id' value='" . $row["BILLING_ID"] . "'></td>";
                                echo "<td><input type='text' name='user_id' value='" . $row["USER_ID"] . "'></td>";
                                echo "<td><input type='text' name='phonea' value='" . $row["PHONEA"] . "'></td>";
                                echo "<td><input type='text' name='phoneb' value='" . $row["PHONEB"] . "'></td>";
                                echo "<td><input type='text' name='talkdate' value='" . $row["TALKDATE"] . "'></td>";
                                echo "<td><input type='text' name='dlit' value='" . $row["DLIT"] . "'></td>";
                                echo "<td><input type='text' name='summp' value='" . $row["SUMMP"] . "'></td>";
                                echo "<td><input type='text' name='plan_id' value='" . $row["PLAN_ID"] . "'></td>";
                                echo "<td><input type='text' name='tarif_dlit' value='" . $row["TARIF_DLIT"] . "'></td>";
                                echo "<td><input type='text' name='additional_info' value='" . $row["ADDITIONAL_INFO"] . "'></td>";
                                echo "<td><input type='text' name='service_id' value='" . $row["SERVICE_ID"] . "'></td>";
                                echo "<td><input type='text' name='summ_tar' value='" . $row["SUMM_TAR"] . "'></td>";
                                echo "</form></tr>";
                            }
                        } else {
                            echo "0 результатов";
                        }
                        if(isset($_GET['edit'])) {
                            $id_connect_p = $_GET['id_connect_p'];
                            $id_connect = $_GET['id_connect'];
                            $billing_id = $_GET['billing_id'];
                            $user_id = $_GET['user_id'];
                            $phonea = $_GET['phonea'];
                            $phoneb = $_GET['phoneb'];
                            $talkdate = $_GET['talkdate'];
                            $dlit = $_GET['dlit'];
                            $summp = $_GET['summp'];
                            $plan_id = $_GET['plan_id'];
                            $tarif_dlit = $_GET['tarif_dlit'];
                            $additional_info = $_GET['additional_info'];
                            $service_id = $_GET['service_id'];
                            $summ_tar = $_GET['summ_tar'];
                            $zap = "UPDATE CALLS SET ID_CONNECT=$id_connect, BILLING_ID=$billing_id, USER_ID=$user_id, PHONEA='$phonea', PHONEB='$phoneb', DLIT=$dlit, SUMMP=$summp, PLAN_ID=$plan_id, TARIF_DLIT=$tarif_dlit, ADDITIONAL_INFO='$additional_info', SERVICE_ID=$service_id, SUMM_TAR=$summ_tar WHERE ID_CONNECT=$id_connect_p";
                            mysqli_query($sql, $zap);
                        }
                        if(isset($_GET['del'])) {
                            $id_connect = $_GET['id_connect'];
                            $zap = "DELETE FROM CALLS  WHERE ID_CONNECT=$id_connect";
                            mysqli_query($sql, $zap);
                        }
                        if(isset($_GET['add'])) {
                            $id_connect = $_GET['id_connect'];
                            $billing_id = $_GET['billing_id'];
                            $user_id = $_GET['user_id'];
                            $phonea = $_GET['phonea'];
                            $phoneb = $_GET['phoneb'];
                            $talkdate = $_GET['talkdate'];
                            $dlit = $_GET['dlit'];
                            $summp = $_GET['summp'];
                            $plan_id = $_GET['plan_id'];
                            $tarif_dlit = $_GET['tarif_dlit'];
                            $additional_info = $_GET['additional_info'];
                            $service_id = $_GET['service_id'];
                            $summ_tar = $_GET['summ_tar'];
                            echo "all parametrs = $id_connect, $billing_id, $user_id, $phonea, $phoneb, $talkdate, $dlit, $summp, $plan_id, $tarif_dlit, $additional_info, $service_id, $summ_tar";
                            $zap = "INSERT INTO CALLS SET ID_CONNECT=$id_connect, BILLING_ID=$billing_id, USER_ID=$user_id, PHONEA='$phonea', PHONEB='$phoneb', DLIT=$dlit, SUMMP=$summp, PLAN_ID=$plan_id, TARIF_DLIT=$tarif_dlit, ADDITIONAL_INFO='$additional_info', SERVICE_ID=$service_id, SUMM_TAR=$summ_tar";
                            mysqli_query($sql, $zap);
                        }
                        $sql->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
