<header><title>Login - AlikExpress</title></header>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
                <div class="col-sm-9 col-sm-offset-1" id="loginAlert"></div>
				<div class="col-sm-4 col-sm-offset-1">

					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="post" id="signInForm">
							<input type="text" name='username'placeholder="Name" />
							<input type="password" name='userpass' placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="button" class="btn" id="signInBtn" style="background: #fe980f;color:#fff">Login</button>
                        </form>
					</div><!--/login form-->

				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">

					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form id="signUpForm" method="post">
							<input type="text" name='name'placeholder="Name"/>
							<input type="email"name='email' aria-describedby="emailHelp" placeholder="Email Address" style="margin-bottom:0"/>
                            <small id="emailHelp" class="form-text text-danger" style="padding-left: 6px">You'll confirm registration with this email.</small>
							<input type="password" name='pass' placeholder="Password" style="margin-top: 5px"/>
							<div id="signUpBtn" class="btn" style="background: #fe980f;color:#fff">Signup</div>
                        </form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

