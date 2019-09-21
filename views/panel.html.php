<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>panel</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../theme/css/bootstrap.min.css'>  

</head>
<body>
    <div class="container">
        <div class="jumbotron mt-3 bg-light">
                <div class="row">
                    <div class="col">

                        <?php if ($valid['valid_proccess']):?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $valid['message']; ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger" role="alert">
                                    <p><?php echo $valid['message']; ?></p>
                                <ul>
                                    <li> <?php echo $valid['file']; ?> </li>
                                    <li> <?php echo $valid['line']; ?> </li>
                                </ul>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
        </div>
    </div>
    <script src='../theme/css/bootstrap.min.css'></script>
</body>
</html>