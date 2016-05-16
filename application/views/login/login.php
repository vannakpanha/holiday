<?php 
	$this->load->view('partail/header');
?>
	<div class="container">
        <div class="card card-container">
           
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />

            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="<?php echo base_url('logins/check');?>" method="POST">

                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?php echo set_value('email'); ?>" autofocus>
                <span><?php echo form_error('email'); ?></span>

                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                <span><?php echo form_error('password'); ?></span>

                <img id="loading" src="<?php echo base_url('assets/loading.gif'); ?>" style="width: 98%;"/>

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#loading').hide();

//this function will run when validation success 
            $.validator.setDefaults({
                submitHandler:function(){
                    $('#loading').show();
                    $('.btn-signin').hide();

                    var email = $('#inputEmail').val();
                    var password = $('#inputPassword').val();
                    $.ajax({
                        //set the url when you submit data 
                        url:"<?php echo base_url('logins/check'); ?>",
                        //method of transfering data 
                        type:"POST",
                        data:{
                            "email":email,
                            "password":password
                        },
                        //data will return in json format 
                        dataType:"json",
                        success:function(data){
                            if(data.status){
                               $.notify(data.message,'success');
                               //delay redirect 
                               setTimeout(function(){
                                    window.location.replace('<?php echo base_url('logins/profile');?>');
                               },2000);
                               
                            }else{
                               $.notify(data.message,'error');
                                $('#loading').hide();
                                $('.btn-signin').show();
                            }
                        }
                    });
                }
            });

//to validate form 
            $('.form-signin').validate({
                rules:{
                    //set rule for email field in form
                    email:{
                        required:true,
                        //must be email format 
                        email:true
                    },
                    //set rule for password field in form 
                    password:{
                        required:true,
                        minlength:5
                    }
                },
                messages:{
                    email:{
                        required:"Email field is required!",
                        email:"Email field must be valid email!"
                    },
                    password:{
                        required:"Password field is required!",
                        minlength:"Password field must be 5 character length!"
                    }
                }
            });
        });
    </script>
<?php
	$this->load->view('partail/footer');
?>