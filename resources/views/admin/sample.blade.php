<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Product Id', 'Income', 'Payable'],

            @php
              foreach($products as $product) {
                  echo "['".$product->id."', ".$product->total_amount.", ".$product->payable_amount."],";
              }
            @endphp
        ]);

        var options = {
          chart: {
            title: 'Bar Graph | Sales',
            subtitle: 'Sales, and Quantity: @php echo $products[0]->created_at @endphp',
          },
          bars: 'vertical'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>