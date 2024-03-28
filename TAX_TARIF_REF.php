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
<body style="background-color: #000000">
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
                <!-- <button class="btn btn-primary" onclick="document.location='TAX_TARIF_REF.php'">Таблица TAX_TARIF_REF</button> -->
                <button class="btn btn-primary" onclick="document.location='TERRITORY_CONSTITUTE.php'">Таблица TERRITORY_CONSTITUTE</button>
                <button class="btn btn-primary" onclick="document.location='TERRITORY_TYPE.php'">Таблица TERRITORY_TYPE</button>

                <button class="btn btn-primary" onclick="document.location='TOWN.php'">Таблица TOWN</button>
                <button class="btn btn-primary" onclick="document.location='T_TOWN_TYPE.php'">Таблица T_TOWN_TYPE</button>
                <button class="btn btn-primary" onclick="document.location='USER_TYPE_REF.php'">Таблица USER_TYPE_REF</button>
                <button class="btn btn-primary" onclick="document.location='USERS.php'">Таблица USERS</button>
            </div>
            <div class="col-md-8">
                <h2>Таблица TAX_TARIF_REF</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>Действия</th>
                        <th>USER_TYPE_ID</th>
                        <th>TAX_ID</th>
                        <th>VALUE</th>
                        <th>LTAXIN</th>
                        <th>DATE_BEGIN</th>
                        <th>DATE_END</th>
                    </tr>

                    <?php
                    $sql=mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
                    mysqli_select_db($sql, "student1") or die("Нет такой таблицы!");
                    

                    $req = "SELECT USER_TYPE_ID, TAX_ID, VALUE, LTAXIN, DATE_BEGIN, DATE_END FROM TAX_TARIF_REF";
                    $rows=mysqli_query($sql, $req);

                    echo "<tr><form action='TAX_TARIF_REF.php' method='get'>";
                    echo "<td><input type='submit' name='add' value='Добавить запись'></td>";
                    echo "<td><input type='text' name='user_type_id'></td>";
                    echo "<td><input type='text' name='tax_id'></td>";
                    echo "<td><input type='text' name='value'></td>";
                    echo "<td><input type='text' name='ltaxin'></td>";
                    echo "<td><input type='date' name='date_begin'></td>";
                    echo "<td><input type='date' name='date_end'></td>";
                    echo "</form></tr>";
                    
                    if ($rows->num_rows > 0) {
                        while($row=mysqli_fetch_array($rows)) {
                            echo "<tr><form action='' method='get'><input type='hidden' name='user_type_id_p' value='" . $row["USER_TYPE_ID"] . "'><input type='hidden' name='tax_id_p' value='" . $row["TAX_ID"] . "'><input type='hidden' name='date_begin_p' value='" . $row["DATE_BEGIN"] . "'>";
                            echo "<td><input type='submit' name='edit' value='Редактировать'><br>";
                            echo "<input type='submit' name='del' value='Удалить'></td>";
                            echo "<td><input type='text' name='user_type_id' value='" . $row["USER_TYPE_ID"] . "'></td>";
                            echo "<td><input type='text' name='tax_id' value='" . $row["TAX_ID"] . "'></td>";
                            echo "<td><input type='text' name='value' value='" . $row["VALUE"] . "'></td>";
                            echo "<td><input type='text' name='ltaxin' value='" . $row["LTAXIN"] . "'></td>";
                            echo "<td><input type='date' name='date_begin' value='" . $row["DATE_BEGIN"] . "'></td>";
                            echo "<td><input type='date' name='date_end' value='" . $row["DATE_END"] . "'></td>";
                            echo "</form></tr>";
                        }
                    } else {
                        echo "0 результатов";
                    }
                    if(isset($_GET['edit'])) {
                        $user_type_id_p = $_GET['user_type_id_p'];
                        $user_type_id = $_GET['user_type_id'];
                        $tax_id_p = $_GET['tax_id_p'];
                        $tax_id = $_GET['tax_id'];
                        $value = $_GET['value'];
                        $ltaxin = $_GET['ltaxin'];
                        $date_begin_p = preg_replace('/(\d{4}).(\d{2}).(\d{2})/', '$1-$2-$3', $_GET['date_begin_p']);
                        $date_begin = preg_replace('/(\d{4}).(\d{2}).(\d{2})/', '$1-$2-$3', $_GET['date_begin']);
                        $date_end = preg_replace('/(\d{4}).(\d{2}).(\d{2})/', '$1-$2-$3', $_GET['date_end']);
                        
                        $req = "UPDATE TAX_TARIF_REF SET VALUE=$value, LTAXIN='$ltaxin', DATE_END='$date_end', USER_TYPE_ID=$user_type_id, TAX_ID=$tax_id, DATE_BEGIN='$date_begin' WHERE USER_TYPE_ID=$user_type_id_p AND TAX_ID=$tax_id_p AND DATE_BEGIN='$date_begin_p'";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_GET['del'])) {
                        $user_type_id = $_GET['user_type_id'];
                        $tax_id = $_GET['tax_id'];
                        $date_begin = preg_replace('/(\d{4}).(\d{2}).(\d{2})/', '$1-$2-$3', $_GET['date_begin']);
                        $req = "DELETE FROM TAX_TARIF_REF WHERE USER_TYPE_ID=$user_type_id AND TAX_ID=$tax_id AND DATE_BEGIN='$date_begin'";
                        mysqli_query($sql, $req);
                    }
                    if (isset($_GET['add'])) {
                        $user_type_id = $_GET['user_type_id'];
                        $tax_id = $_GET['tax_id'];
                        $value = $_GET['value'];
                        $ltaxin = $_GET['ltaxin'];
                        $date_begin = preg_replace('/(\d{4}).(\d{2}).(\d{2})/', '$1-$2-$3', $_GET['date_begin']);
                        $date_end = preg_replace('/(\d{4}).(\d{2}).(\d{2})/', '$1-$2-$3', $_GET['date_end']);
                        $req = "INSERT INTO TAX_TARIF_REF (USER_TYPE_ID, TAX_ID, VALUE, LTAXIN, DATE_BEGIN, DATE_END) VALUES ($user_type_id, $tax_id, $value, '$ltaxin', '$date_begin', '$date_end')";
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
