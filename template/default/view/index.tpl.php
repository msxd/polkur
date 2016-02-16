<!DOCTYPE html>
<html>
    <head>

        <title><?php echo $title; ?></title>
        <meta charset="UTF-8" />
        <meta name="description" content="Projekt zaliczeniowy na zajęcia PAI 2016" />
        <meta name="keywords" content="PAI" />

        <script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />

        <?php foreach($styles as $style) {?>
            <link rel="stylesheet" href="<?php echo $style?>" />
        <?php } ?>
        <?php foreach($scripts as $script) {?>
            <script src="<?php echo $script?>"></script>
        <?php } ?>

    </head>
    <body>
<!--    --><?php //var_dump(get_defined_vars())?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
<!--            <div class="navbar-header">-->
<!--                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">-->
<!--                    <span class="sr-only">Toggle navigation</span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                </button>-->
<!--                <a class="navbar-brand" href="#">Brand</a>-->
<!--            </div>-->
<!--            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">-->
<!--                <ul class="nav navbar-nav">-->
<!--                    <li class="active">-->
<!--                        <a href="#">Home</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Link</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Link</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--                <form class="navbar-form navbar-right" role="search">-->
<!--                    <div class="form-group">-->
<!--                        <input type="text" class="form-control" placeholder="Search">-->
<!--                    </div>-->
<!--                    <button type="submit" class="btn btn-default">Submit</button>-->
<!--                </form>-->
<!--            </div>-->
        </div>
    </nav>
        
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php foreach($views['column_right'] as $view) echo $view?>
                </div>
            </div>
        </div>

    </body>
</html>
