<?php

require_once 'DbManager.php';


try {
  $db = getDb();
  $sql = "SELECT id,name,date(date,'localtime') as date,ip,time(time,'localtime') as time,path FROM upload ORDER BY id DESC";

  $res = $db->query($sql);

} catch (PDOException $e) {
  echo $e->getMessage();
}

?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PDF投稿フォーム</title>
  </head>
  <body>
    <h1>PDF共有画面</h1>

    <table class="table table-striped table-hove table-responsiver">
      <thead>
        <tr>
          <th>No.</th>
          <th>NAME</th>
          <th>DATE</th>
          <th>TIME</th>
          <th>IP</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($res as $value) :?>
          <tr>
            <th><?php echo $value['id'] ?></th>
            <th><a href="<?php echo $value['path'] ?>"><?php echo $value['name'] ?></a></th>
            <th><?php echo $value['date'] ?></th>
            <th><?php echo $value['time'] ?></th>
            <th><?php echo $value['ip'] ?></th>
            <th>編集</th>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

    <a href="upload.html">アップロードフォームへ移動</a>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>