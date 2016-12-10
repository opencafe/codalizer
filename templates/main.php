<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <title><?=$this->e($title)?></title>
</head>
<body>

<?=$this->section('content')?>
<div class='container'>
  <div id="file-violations">Violation has been found on <?=$this->e($fileViolations); ?> files!</div>
  <div id="violations">All Violations: <?=$this->e($violations); ?></div>
  <div id="code-size">Code Size: <?=$this->e($codeSize); ?></div>
  <div id="naming">Naming: <?=$this->e($naming); ?></div>
  <div id="unused">Unused Code: <?=$this->e($unused); ?></div>
  <?php foreach($items as $item) { ?>

    <?php echo $item->attributes()->name; ?>
    <br>

  <?php } ?>
</div>
</body>
</html>
