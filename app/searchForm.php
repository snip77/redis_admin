<?php use language\language; ?>
<!DOCTYPE html>
<html>
  <head>
      <title><?php echo language::get_string('Search'); ?></title>
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="assets/css/SearchForm.css">
  </head>
  <body>
      <?php if ( ! isset($_GET['server'])) { ?>
              <div class="container jumbotron PartTwo">
                  <span class="btn btn-outline-danger PartOne">
                    <?php echo language::get_string('Errors'); ?>
                  </span>
                  <div class="alert alert-danger" role="alert">
                    <?php  echo language::get_string('Please set server_id in header !'); ?>
                  </div>
              </div>
      <?php } else { ?>
        <div class="container partTwo">
          <div class=" container card text-white bg-dark mb-3" >
            <form action="../Search" method="post">
              <div class="card-header">
                <?php echo language::get_string('Search'); ?>
                <a href="../keys?server=<?php echo $_GET['server']; ?>" class="btn btn-warning partOne"><?php echo language::get_string('Main Page'); ?></a>
              </div>
              <div class="form-group row partThree">
                <label for="key" class="col-sm-2 col-form-label"><?php echo language::get_string('Key To Search'); ?></label>
                <div class="col-sm-10">
                  <input type="hidden" name="server" value="<?php echo $_GET['server']?>">
                  <input type="text" required width="100%" class="form-control" name="key">
                </div>
              </div>
                  <button type="submit" class="btn btn-primary partOne PartFour PartFive">
                    <?php echo language::get_string('Search'); ?>
                  </button>
            </form>
          </div>
        </div>
      <?php } ?>
  </body>
</html>