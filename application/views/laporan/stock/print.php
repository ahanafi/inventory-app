<style>
  body{
    font-family: Arial, Sans-serif, Helvetica;
    padding-right: 40px;
    padding-left: 40px;
  }
  header{
    font-size: 20px;
    text-align: center !important;
    margin:0 auto !important;
  }
  h3, h4{
    text-align: center !important;
  }
  .ctr{
    text-align: center;
  }
  .table{
    border:1px solid red;
    font-size: 13px;
    border-color: #dedede;
    width: 100%;
    border-collapse: collapse;
  }
  .table thead{
    background-color: #00a65a;
    border-color: #008d4c;
    color: #fff;
  }
  .table tbody tr td{
    border-collapse: collapse;
  }
  tbody tr:nth-child(even){
    background: #F6F5FA;
  }

  .on{    
    float: right;
    font-size: 13px;
    font-style: italic;
  }
</style>
<body>
  <div id="main-content">
    <h3>
      PT. PZ CUSSONS INDONESIA
    </h3>
    <h4>LAPORAN DATA ASET</h4>
    <table class="table" border="" cellpadding="10" cellspacing="0">
      <thead>
          <tr class="bg-green">
              <th width="5%">No</th>
              <th width="35%">Nama Barang</th>
              <th width="25%">Unit</th>
              <th width="15%">Stock</th>
          </tr>
      </thead>
      <tbody>
        <?php
          $number = 1;
        ?>
        <?php foreach($stock as $row):?>
          <tr>
            <td><?php echo $number++;?></td>
            <td><?php echo $row['barang'];?></td>
            <td><?php echo $row['unit'];?></td>
            <td><?php echo $row['stock'];?></td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</body>
</html>