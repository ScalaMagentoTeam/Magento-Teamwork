<?php if (isset($_POST['exp'])) {

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    $output = fopen('php://output', 'w');

    fputcsv($output, array('SKU', 'ItemName', 'Color', 'Size', 'TC'));
    $con = mysqli_connect('localhost', 'root', '', 'Products');
    $rows = mysqli_query($con, 'SELECT * FROM prodData');

    while ($row = mysqli_fetch_assoc($rows)) {
      fputcsv($output, $row);
    }
    fclose($output);
    mysqli_close($con);
    exit();
  }
?>

<div>
  <form action="#" method="post">
    <input type="submit" value="Export" name="exp" />
  </form>
</div>
