<!DOCTYPE html>
<html>
    <head>

        <title><?php echo $page->title; ?></title>

        <meta charset="UTF-8" />
        <meta name="description" content="Projekt zaliczeniowy na zajęcia PAI 2016" />
        <meta name="keywords" content="PAI" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />

    </head>
    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Hello World!</h1>
                </div>
            </div>
        </div>

        <?php foreach ($views as $view) echo $view; ?>

    </body>
</html>
