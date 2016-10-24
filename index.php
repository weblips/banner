<?php
header('Content-Type: text/html; charset=cp-1251');
$path_class = __DIR__ . DIRECTORY_SEPARATOR;
if(file_exists($path_class . 'uploadtobanner.php')){
    include $path_class . 'uploadtobanner.php';
}
$iterator = new UploadToBanner($path_class . 'img');
echo '<pre>';
$arr_img = $iterator->arr_info;
if(file_exists($iterator->path_img . DIRECTORY_SEPARATOR . 'data.txt'))
  include $iterator->path_img . DIRECTORY_SEPARATOR . 'data.txt';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['coll1']){
   print_r($_POST);
    $iterator->createNewData($_POST);
}
$count_arr = count($arr_img)+1;
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="cp-1251">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Banner</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <h2>Диспетчер картинок:</h2>
  
      <table class="table table-bordered table-responsive">
        <thead>
            <tr class="row">
              <th>Картинка</th>
              <th>Имя</th>
              <th>ССылка</th>
             <th>Файл</th>
             <th>Удаление</th>
             </tr>
        </thead>
        <tbody>
          <?php $i = $count_arr; ?>
           <form  name="form" action="" method="POST" ENCTYPE="multipart/form-data">
        <?php foreach ($arr_img as $k => $v): ?>
            <tr class="row">
             <td scope="row" class="col-sm-2"> <?php echo '<a href=""><img src="' . 'img/' . $k . '" class="img-thumbnail" alt="Responsive image"></a>'; ?></td>
             <td> <input type="text" class="form-control col-sm-2 " name="name<?=$k?>" value="<?php echo $k; ?>"></td>
              <td><input type="text" class="form-control col-sm-2 " name="link<?=$k?>" value=""></td>
             <td><input type="file" class="form-control col-sm-2" name="fileload<?=$k?>" value=""></td>
              <td><input type="checkbox" class="form-control col-sm-2" name="del<?=$k?>">Удалить </td>
              <input type="hidden" name="coll<?=$i?>" value="<?=$i?>">
             </tr>
              <?php $i--;?>
      <?php endforeach?>
            <tr class="row">
             <td scope="row" class="col-sm-2"></td>
             <td> <input type="text" class="form-control col-sm-2 " name="name<?=$k?>" value="name"></td>
              <td><input type="text" class="form-control col-sm-2 centring" name="link<?=$k?>" value="link"></td>
             <td><input type="file" class="form-control col-sm-2" name="fileload<?=$k?>" value=""></td>
              <td></td>
              <input type="hidden" name="coll<?=$i?>" value="<?=$i?>">
             </tr>
      </tbody>
      </table>
      <br />
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-2">
                <button type="submit" class="btn btn-primary" name="sub">Загрузить</button>
            </div>
        </div>
     </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>