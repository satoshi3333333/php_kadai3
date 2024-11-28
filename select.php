<?php
//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM php_kadai2_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">

    <table>
      <?php foreach($values as $v){ ?>
        <tr>
          <td><?=h($v["q1_manzokudo"])?></td>
          <td><?=h($v["q2_reason"])?></td>
          <td><?=h($v["q3_quality"])?></td>
          <td><?=h($v["q3_usability"])?></td>
          <td><?=h($v["q3_price"])?></td>
          <td><?=h($v["q3_support"])?></td>
          <td><?=h($v["q4_recommend"])?></td>
          <td><?=h($v["q5_q4reason"])?></td>
          <td><?=h($v["q6_review"])?></td>
          <td><?=h($v["name"])?></td>
          <td><?=h($v["age"])?></td>
          <td><?=h($v["seibetsu"])?></td>
          <td><?=h($v["kikkake"])?></td>
          <td><?=h($v["hindo"])?></td>
          <td><a href="detail.php?id=<?=h($v["id"])?>">[更新]</a></td>
          <td><a href="delete.php?id=<?=h($v["id"])?>">[削除]</a></td>
      
        </tr>
      <?php } ?>
      </table>

      
<!-- <table>
<?php foreach($values as $v){ ?>
  <tr>
    <td>q1サービスに対する満足度<?=$v["q1_manzokudo"]?></td>
    <td>q1の理由<?=$v["q2_reason"]?></td>
    <td>品質の良さ<?=$v["q3_quality"]?></td>
    <td>使いやすさ<?=$v["q3_usability"]?></td>
    <td>価格<?=$v["q3_price"]?></td>
    <td>サポート<?=$v["q3_support"]?></td>
    <td>人に勧めたいか<?=$v["q4_recommend"]?></td>
    <td>勧めたい理由<?=$v["q5_q4reason"]?></td>
    <td>感想<?=$v["q6_review"]?></td>
    <td>名前<?=$v["name"]?></td>
    <td>年齢<?=$v["age"]?></td>
    <td>性別<?=$v["seibetsu"]?></td>
    <td>きっかけ<?=$v["kikkake"]?></td>
    <td>頻度<?=$v["hindo"]?></td>
  </tr>
<?php } ?>
</table> -->


  </div>
</div>
<!-- Main[End] -->
<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>
