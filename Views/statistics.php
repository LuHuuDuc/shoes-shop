<?php
    if(isset($_POST['exportExcel'])){
        $data = [
            ['NAME PRODUCT', 'QUANTITY', 'FROM', 'TO']
        ];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $result = $cart -> Statistics($start, $end);
        while($set = $result -> fetch()){
            array_push($data, [$set['NAME_PRODUCT'], $set['QUANTITY'], $start, $end]);
        }
        $xlsx = Shuchkin\SimpleXLSXGen::fromArray( $data );
        $xlsx->saveAs('export/thongke.xlsx');
    }
?>
<script>
google.charts.load('current', {'packages': ['corechart']});

google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Product');
    data.addColumn('number', 'Quantity');

    var item = new Array();
    <?php
        if(isset($_POST['exportExcel'])){
            $start = $_POST['start'];
            $end = $_POST['end'];
            $check = 0;
            $result = $cart -> Statistics($start, $end);
            if($start > $end){
                echo 'alert("Vui lòng nhập lại ngày");';
            }
            else{
                while($set = $result -> fetch()){
                    $check += 1;
                    echo 'item.push(["'.$set["NAME_PRODUCT"].'", '.$set["QUANTITY"].']);';
                }
                if($check == 0){
                    echo 'alert("Không tìm thấy kết quả");';
                }
            }
            echo 'alert("Export Success");';
        }
        if(isset($_POST['submitStatistic'])){
            $start = $_POST['start'];
            $end = $_POST['end'];
            $check = 0;
            $result = $cart -> Statistics($start, $end);
            if($start > $end){
                echo 'alert("Vui lòng nhập lại ngày");';
            }
            else{
                while($set = $result -> fetch()){
                    $check += 1;
                echo 'item.push(["'.$set["NAME_PRODUCT"].'", '.$set["QUANTITY"].']);';
                }
                if($check == 0){
                    echo 'alert("Không tìm thấy kết quả");';
                }
            }
        }
    ?>
    data.addRows(item);

    var options = {
        'title': 'Thống kê sản phẩm',
        'width': 1000,
        'height': 800,
        'is3D' : true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
</script>
<div class="statistics">
    <div class="heading">
        <h1>Statistics</h1>
        <form method="post">
            <label for="">From:</label>
            <input type="date" required max="<?php echo date('Y-m-d') ?>" name="start" value="<?php echo isset($start) ? $start : "" ?>">

            <label for="">To:</label>
            <input type="date" required name="end" value="<?php echo isset($end) ? $end : "" ?>">

            <button name="submitStatistic">Submit</button>
            
            <?php echo isset($start) && $check != 0 ? '<button name="exportExcel">Export</button>' : "";  ?>
        </form>
    </div>
    <?php
        echo isset($start) && $check != 0 ? '<div class="chart_div" id="chart_div"></div>' : "";
    ?>
</div>
