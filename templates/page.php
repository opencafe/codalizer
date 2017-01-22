<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?lang=php&amp;skin=sons-of-obsidian"></script>
    <title>Page</title>
</head>
<body>

<?=$this->section('content')?>
<div class='container'>

  <?php  foreach($details as $item) { ?>

    <?php if($item['id'] == $_REQUEST['id'] ) { ?>

      <style>
      li:nth-child(<?php echo $item['start'][0] ?>)
      { background-color: rgba(255, 87, 34, 0.32); }
      </style>

    <div class='violations'>
    <a href="page.php?id=<?php echo $item['id'] ?>"><?php  echo $item['where'][0]; ?></a>
    <br>
    <?php echo $item['description'][0] ?>
    <br>
    line: <?php echo $item['start'][0] ?>
    </div>
    <br>

    <pre class="prettyprint linenums">
    <?php

    echo htmlentities(file_get_contents($item['where'][0]));

     ?>
   </pre>

  <?php  } ?>
  <?php } ?>
</div>
</body>
</html>
