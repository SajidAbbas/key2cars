<!DOCTYPE html>

    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/login/css/demo.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/login/css/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/login/css/animate-custom.css')}}" />
       <script src="{{URL ::asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <div class="container">
            
            <header>
                <h1>KEY2CAR </h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method="GET" id="login" autocomplete="on"> 
                                {{ csrf_field() }}
            
                                
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email  </label>
                                    <input id="emaillogin" name="emaillogin" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="passwordlogin" name="passwordlogin" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                                               
                                <p class="login button"> 
                                    <input type="button" onclick="login()" class="login" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                           <form  method="POST" id="signup" autocomplete="off"> 
                                
                                <h1> Sign up </h1> 
                                {{ csrf_field() }}
            
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your Name</label>
                                    <input id="usernamesign" name="usernamesign" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsign" name="emailsign" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
								 <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your Number</label>
                                    <input id="numbersign" name="numbersign" required="required" type="number" placeholder="03123456789"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsign" name="passwordsign" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                               
                                <p class="signin button"> 
									<input type="button" class="signup" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>

<script> 
    $(document).ready(function () { 
        $('body').on('click', '.signup', function(){
            
            /*$(document).ajaxStart(function(){
            $("#wait").css("display", "block");
            });
            $(document).ajaxComplete(function(){
            $("#wait").css("display", "none");
            });
     */
    
    var data = new FormData($('#signup')[0]);
    $.ajax({
            url:'/SignupAccount',
            type:'POST',
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:data,
            success:function(data){
             // console.log(data);
               if(data.result==1){
                   swal ( "Congratulation!" ,  "Your account created Successfully." ,  "success" );
                   location.href="#tologin";
	                }else{
	          swal ( "Oops!" ,  "Number or Email Already Exit." ,  "error" );
                 
	                }
            }
        });
        
    });
    }); 
    
    
    
    function login(){
    
    var data = {'emaillogin':$("#emaillogin").val(),'passwordlogin':$("#passwordlogin").val()};
    console.log(data);
    $.ajax({
            url:'loginAccount',
            type:'GET',
            
            data:data,
            success:function(data){
              console.log(data);
               if(data.result==1){
                   swal ( "Congratulation!" ,  "Successfully Login" ,  "success" );
                  // window.location = "{{ url('/admin') }}";
	                }else{
	          swal ( "Oops!" ,  "Wrong Email and Password" ,  "error" );
                 
	                }
            }
        });
        
    }
            
</script>
            
    </body>
</html>