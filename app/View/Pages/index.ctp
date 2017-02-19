<div id="wrapper">
<?php $userData =$this->Session->read('User'); ?>
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                <?php if (empty($userData[id]) ){ ?>
                        <h2>Login</h2>
                <?php } else { ?>
                    <h2><a href="<?php echo ABSOLUTE_URL;?>/logout">Logout</a></h2>
                    <h2><a href="<?php echo ABSOLUTE_URL;?>/pages/productList"> Products</a></h2>
                <?php } ?>
                </a>
            </li>
            
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="tab-content">
    <?php  if (empty($userData[id]) ){ 

        ?>
            <div class="col-md-5 col-md-offset-3"  style="margin-top:120px;">
            <?php echo $this->Session->flash(); ?>
                <div id="birth" class="card active well">
                <h1 class="text-info" style="margin-top:0px;"><strong>Login</strong></h1>
                <div class="clearfix"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="">
                                <form id="login-form" method="post" action="<?php echo ABSOLUTE_URL;?>/logins">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User Name</label>
                                        <input type="text" class="form-control" name="email" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="text" class="form-control" name="password" id="password">
                                    </div>
                                    <div class=" controls text-center form-group control-group">
                                        <button type="submit" class="btn btn-default btn-primary btn-lg margin-left-62" >Login</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else {?>
        <style type="text/css">
            .controls{margin-top: 20px;}
        </style>
        <div class="col-md-8 col-md-offset-2"  >
            <?php echo $this->Session->flash(); ?>
            <div id="birth" class="card active well">
            <h1 class="text-info" style="margin-bottom:30px;"><strong>Add New</strong></h1>
            <div class="clearfix"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="">
                            <form enctype="multipart/form-data" id="product-form" method="post" action="<?php echo ABSOLUTE_URL;?>/pages/saveData">
                                <div class=" controls form-group ">
                                    <label for="input1" class="control-label">Barcode</label>
                                    <input type="text" class="form-control shoper required padding-right-0" name="data[Product][barcode]" id="barcode">
                                    
                                </div>
                                <div class=" controls form-group ">
                                    <label for="input1" class="control-label">Product Name</label>
                                    <input type="text" class="form-control required padding-right-0" name="data[Product][name]" id="name">
                                </div>
                                <div class=" controls form-group ">
                                    <label for="input1" class="control-label">Product Description</label>
                                    <input type="text" class="form-control required padding-right-0" name="data[Product][description]" id="description">
                                </div>
                                <div class=" controls form-group ">
                                    <label for="input1" class="control-label">Price</label>
                                    <input type="text" class="form-control padding-right-0" name="data[Product][price]" id="price">
                                </div>
                                <div class=" controls form-group">
                                    <label for="file" class="control-label">Image</label>
                                   <?php echo $this->Form->input('upload', array('type'=>'file')); ?>
                                </div>
                               
                                <div class=" controls form-group text-center  control-group">
                                        <button type="submit" class="btn btn-default btn-lg margin-left-62" >Submit</button>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<script>

$(".menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
$(document).ready(function() {
    $('#upload').bind('change', function() {

  //this.files[0].size gets the size of your file.
  alert(this.files[0].size);

});
    $("#login-form").bootstrapValidator({
    live: false,
    trigger: 'blur',
    fields: {
            "email": {
                validators: {
                    notEmpty: {
                        enabled: true,
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        enabled: true,
                        message: 'This is not a valid email address'
                    }
                }
            },
            "password": {
                validators: {
                    notEmpty: {
                        enabled: true,
                        message: 'Please enter password'
                    }
                }
            }
    }
    }).on('success.form.bv', function(e) {
        // Prevent form submission
        e.preventDefault();
       $('#login-form').unbind('submit').submit();
    });
    $("#product-form").bootstrapValidator({
    live: false,
    trigger: 'blur',
    fields: {
        "data[Product][barcode]": {
            selector : '#barcode',
            validators: {
                notEmpty: {
                    enabled: true,
                    message: 'Please enter product barcode'
                }
            }
        },
        "data[Product][name]": {
            selector : '#name',
            validators: {
                notEmpty: {
                    enabled: true,
                    message: 'Please enter product name'
                }
            }
        },
        "data[Product][description]": {
            selector : '#description',
            validators: {
                notEmpty: {
                    enabled: true,
                    message: 'Please enter description'
                }
            }
        },
        "data[Product][price]": {
            selector : '#price',
            validators: {
                notEmpty: {
                    enabled: true,
                    message: 'Please enter product price'
                }
            }
        },
        "upload": {
            selector: '#upload',
            validators: {
                notEmpty: {
                    enabled: true,
                    message: 'Please upload an Image'
                }
            }
        }
    }
    }).on('success.form.bv', function(e) {
        // Prevent form submission
        e.preventDefault();
       $('#product-form').unbind('submit').submit();
    });
});
</script>
</body>
</html>
