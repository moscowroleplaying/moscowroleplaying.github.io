<? $this->pageTitle = Yii::app()->params->sitename.' - лучший SAMP проект!'; ?>
<div class="row">
	<center>
		<div class="col-md-4">
			<a href="<?=Yii::app()->params->forum_url?>" title="Перейти на форум">
				<div class="block-color-blue img-circle">
					<div class="block-color-content">
						<i class="fa fa-comments fa-fw fa-5x"></i>
					</div>				
				</div>
			</a>
			<h3>Форум</h3>
		</div>
		<div class="col-md-4">
			<a href="<?=Yii::app()->baseUrl?>/site/login/" title="Войти в личный кабинет">
				<div class="block-color-red img-circle">
					<div class="block-color-content">
						<i class="fa fa-cogs fa-fw fa-5x"></i>
					</div>
				</div>
			</a>
			<h3>Личный кабинет</h3>
		</div>
		<div class="col-md-4">
			<a href="<?=Yii::app()->baseUrl?>/donate/" title="Купить донат">
				<div class="block-color-yellow img-circle">
					<div class="block-color-content">
						<i class="fa fa-rub fa-fw fa-5x"></i>
					</div>				
				</div>
			</a>
			<h3>Донат</h3>
		</div>
	</center>		
</div>
