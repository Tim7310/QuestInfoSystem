<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <div class="card card-chart">
        <div class="card-header card-header-info">
          <canvas id="myChart"></canvas>
        </div>
        <div class="card-body">
          <h4 class="card-title">Daily Sales</h4>
          <p class="card-category">
            <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> updated 4 minutes ago
          </div>
        </div>
      </div>
    </div>
      <div class="col-lg-6 col-md-12" >
      <div class="card">
        <div class="card-header card-header-info">
          <h4 class="card-title">Transaction List</h4>
          <p class="card-category">Transaction List on 30th January, 2019</p>
        </div>
        <div class="card-body table-responsive" style="max-height: 300px;overflow-x: auto">
          <table class="table table-hover">
            <thead class="text-info">
              <th>ID</th>
              <th>Name</th>
              <th>Type</th>
              <th>Price</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Dakota Rice</td>
                <td>$36,738</td>
                <td>Niger</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Minerva Hooper</td>
                <td>$23,789</td>
                <td>Curaçao</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Sage Rodriguez</td>
                <td>$56,142</td>
                <td>Netherlands</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
              </tr><tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
      var ctx = document.getElementById('myChart').getContext('2d');
      Chart.defaults.global.defaultFontColor = 'white';
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'line',

          // The data for our dataset
          data: {
              labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
              datasets: [{
                  label: "My First dataset",
                  backgroundColor: 'rgb(255, 255, 255)',
                  borderColor: 'rgb(64, 142, 255)',
                  data: [0, 10, 5, 2, 20, 30],
                  stepped: true,
              }]
          },

          // Configuration options go here
          options: {}
      });
    });
    // $("#sales").click(function(){
    //   $("#content").load("sales.php",{},function(){});
    // });
</script>