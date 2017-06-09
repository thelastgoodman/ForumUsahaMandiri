<html>
	<head>
		<title>ss</title>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
		<link rel="stylesheet" href="assets2/css/bootstrap.css">
        <link rel="stylesheet" href="assets2/css/bootstrap.min.css">
          <script type="text/javascript" src="assets2/js/bootstrap.js"></script>
            <script type="text/javascript" src="assets2/js/jquery.js"></script>
	</head>
<body>
<button class="btn btn-default" data-toggle="modal" data-target="#loginModal">Login</button>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Login</h4>

            </div>
            <div class="modal-body">
                <form id="loginForm" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Username</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <button type="submit" class="btn btn-default">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    $('#loginForm')
        .formValidation({
    
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    }
                }
            }
        }
    })
    .on('success.form.fv', function (e) {
        // Prevent form submission
        e.preventDefault();

        $('#loginModal').modal('hide');
    });

    $('#loginModal')
       .on('shown.bs.modal', function () {
           $('#loginForm').find('[name="username"]').focus();
        })
        .on('hidden.bs.modal', function () {
            $('#loginForm').formValidation('resetForm', true);
        });
});
</script>
</body>
</html>
