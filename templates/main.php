<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <title><?=$this->e($title)?></title>
</head>
<body>

<?= $this->section('content'); ?>

<div class='container'>
    <div id="file-violations">
        Violation has been found on
        <span class='red'><?= $this->e($fileViolations); ?></span> files!
    </div>
    <div id="violations">
        All Violations: <span class='red'>#<?= $this->e($violations); ?></span>
    </div>
    <div id="code-size">
        Code Size: <span class='red'><?= $this->e($codeSize); ?></span>
    </div>
    <div id="naming">
        Naming: <span class='red'><?= $this->e($naming); ?></span>
    </div>
    <div id="unused">
        Unused Code: <span class='red'><?= $this->e($unused); ?></span>
    </div>

    Violations:
    <br>
    <div class='violations'>

        <?php foreach($details as $item): ?>
            <a href="page_<?php echo $item['id']; ?>.html"><?php
                echo trim($item['where'][0]); ?></a>
            <br>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
