<!DOCTYPE html>
<html>
<head>
    <title>redis console</title>
    <style type="text/css">
        body{ background-image: linear-gradient(to left,#FC5252,#F237FE) }
    </style>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <script type="text/javascript" src="assets/vue.js"></script>
</head>
<body>
    <?php
    if (isset($_GET['error'])) {?>
        <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
        </div>
    <?php } ?>

    <?php
    if (isset($_GET['message'])) {?>
        <div class="alert alert-success" role="alert">
              <?php echo $_GET['message']; ?>
        </div>
    <?php } ?>
    

    <?php
        require 'config.php';
        $config=new Config();
        $client=$config->connect();
        if (is_string($client)) { ?>
            <div class="container jumbotron" style="margin-top: 100px">
                <span style="height: 50px;width: 150px;font-size: 20px; margin-bottom:10px " class="btn btn-outline-danger">errors</span>
                <div class="alert alert-danger" role="alert">
                  <?php echo $client ?>
                </div>
            </div>
        <?php }else{ ?>
            <div class="container jumbotron" style="margin-top: 100px">
                <div style="display:flex;justify-content: space-around;">
                    <div style="display: flex;width: 100%;justify-content: space-between;">
                        <a href="../insertForm.php" style="margin-bottom: 1%"  class="btn btn-success">Insert</a>
                    <a href="../searchForm.php"  style="margin-bottom: 1%" class="btn btn-primary">Search</a>
                    </div>
                </div>    
                <div class="alert alert-primary" role="alert" style="">
                        <?php echo $config->getHost().':'.$config->getPort() ?>
                        <div style="float: right;"><?php echo $client->dbsize()." Key" ?></div>
                </div>
                <div class="alert alert-dark" role="alert" style="text-align:center;">
                        keys
                </div>
            <?php
            foreach ($client->keys('*') as $key => $value) {  ?>
                <a href="show.php?key=<?php echo $value?>" style="text-decoration: none;">
                    <div class="alert alert-success" role="alert" style="text-align:center;">
                            <?php echo $value ?>
                    </div>
                </a>
        <?php } } ?>
        </div>
</body>
</html>