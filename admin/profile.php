<!-- Titlebar====================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Mi perfil</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Inicio</a></li>
						<li>Mi perfil</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">
		<!-- Widget -->
		<?php
		require_once($_SERVER["DOCUMENT_ROOT"]."/admin/sideNav.php");
		?>

		<div class="col-md-8">
			<div class="row">

			<form method="post" enctype="multipart/form-data">
				<div class="col-md-8 my-profile">
					<h4 class="margin-top-0 margin-bottom-30">My Account</h4>

					<label>Your Name</label>
					<input name="nombre" value="<?php echo($UserData['nombre']); ?>" type="text">

					<label>Your Title</label>
					<input name="intro" value="<?php echo($UserData['intro']); ?>" type="text">

					<label>Phone</label>
					<input name="telefono" value="<?php echo($UserData['telefono']); ?>" type="text">

					<label>Email</label>
					<input name="email" value="<?php echo($UserData['email']); ?>" type="text">


					<h4 class="margin-top-50 margin-bottom-25">About Me</h4>
					<textarea name="descripcion" id="about" cols="30" rows="10">
					<?php echo ($UserData['descripcion']); ?>
					</textarea>


					<h4 class="margin-top-50 margin-bottom-0">Social</h4>

					<button type="submit" name="submit" value="submit" class="button margin-top-20 margin-bottom-20">
						Guardar
					</button>
				</div>
			</form>
				<div class="col-md-4">
					<!-- Avatar -->
					<div class="edit-profile-photo">
						<img src="/upload/user/<?php echo($UserData['foto']); ?>.jpg" alt="">
						<div class="change-photo-btn">
							<div class="photoUpload">
								<span><i class="fa fa-upload"></i> Subir foto</span>
								<input name="thumb" type="file" class="upload" />
							</div>
						</div>
					</div>

				</div>


			</div>
		</div>

	</div>
</div>