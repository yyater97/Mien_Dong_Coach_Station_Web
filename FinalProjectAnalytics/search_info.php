<?php
include('controller/controller.php');
$c = new controller();

if(isset($_POST['tukhoa'])){
	$key = $_POST['tukhoa'];
	$content = $c->search($key);
	$route = $content['route'];
	$carcollector = $content['carcollector'];
}

?>

<article class="content">
			<h2 id="notification">Có <?=count($route)?> tuyến đường và <?=count($carcollector)?> nhà xe trả về với từ khóa "<?=$key?>"</h2>
			<div class="container">
				<div class="row route">
					<img class="row title img-responsive" src="view/img/images/title_route.png">
					<div class="row route-content">
						<?php
						foreach($route as $image){
							?>
							<img class="col-md-4" src="<?=$image->ANH?>">
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="row car-manufacturer container-fuild">
				<img class="row title img-responsive" src="view/img/images/title_car.png">
				<div class="row car-manufacturer-content">
					<div class="row">
						<?php
						for($i=0; $i<count($carcollector); $i++){
							?>
							<div class="car-manufacturer-item col-md-6 col-sm-12 col-xs-12">						
								<div class="car-manufacturer-text-content">
									<div class="evaluate">
										<?php
										for($j=0; $j<$carcollector[$i]->DANHGIA; $j++){
											?>
											<img class="star-icon" src="view/img/star_icon_active.png"/>
											<?php
										}
										for($j=0; $j<5-$carcollector[$i]->DANHGIA; $j++){
											?>
											<img class="star-icon" src="view/img/star_icon_unactive.png"/>
											<?php
										}
										?>												
									</div>
									<div class="clear"></div>
									<p class="line car-manufacturer-name"><?=$carcollector[$i]->TEN_NX?></p>
									<p class="line car-manufacturer-text"><?=$carcollector[$i]->TOMTAT?></p>
									<form>
										<a href="detail.php?MANX=<?=$carcollector[$i]->MANX?>" class="car-manufacturer-button" type="submit" name="btnSeeMore" value=""></a>
									</form>
								</div>
							</div>
							<?php
						}
						?>	
					</div>
				</div>
			</div>
		</article>