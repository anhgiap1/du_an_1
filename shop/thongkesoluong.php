
<?php 
  $maShop = $_SESSION['khachhang']['ma_kh'] ; 
  //  $dsthongke=load_thongke_luotban_shop();
    ?>
<div class="row2">
         <div class="row2 font_title">
         </div>
         <div class="row2 form_content ">
         <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php  
          $sql="SELECT chi_tiet_hang_hoa.*,hang_hoa.* FROM `hang_hoa` INNER join chi_tiet_hang_hoa on chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh  where hang_hoa.ma_shop = $maShop  GROUP BY chi_tiet_hang_hoa.ma_hh ";
          $dsthongke = pdo_query($sql);

                                        foreach ($dsthongke as  $value) 
                                       
                                        {    
                                            echo "['".$value['ten_hh']."',".$value['so_luong']."],";
                                            ?>

                                          
                                     <?php   }
                                        ?>
        ]);

        var options = {
          title: 'Biểu đồ thống kê số lượng sản phẩm  ',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>

</div>