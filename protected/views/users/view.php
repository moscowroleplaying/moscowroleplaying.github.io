<? $this->pageTitle = 'Просмотр профиля '.$data->{$field['username']['alias']}.' - '.Yii::app()->params->sitename; ?>
<div class="row">
	<div class="col-md-3">	
		<center>
			<img src="<? echo Yii::app()->baseUrl; ?>/images/skins/var_1/<? echo $data->{$field['skin']['alias']}; ?>.png" alt="Внешний вид игрока">
			<hr>
		</center>
	</div><h3><p align="center" class="title">Личный кабинет</p></h3><h5><p align="center" class="muted">Здесь вся информация о вашем аккаунте</p></h5>
	<div class="col-md-9">
		<? 
		$tabs[] = array('label'=>'Информация об аккаунте','content'=>$this->renderPartial('_osnovnoe',array('data'=>$data,'field'=>$field,'names'=>$names),true),'active'=>true);
		if($data->{$field['id']['alias']} == Yii::app()->user->userid) {
			if(!empty($team)) {
				$tabs[] = array('label'=>'Организация','content'=>$this->renderPartial('_team',array('data'=>$data,'field'=>$field,'team'=>$team),true));
			}
			$tabs[] = array('label'=>'Сменить ник','content'=>$this->renderPartial('_change',array('data'=>$data,'field'=>$field),true));			$tabs[] = array('label'=>'Инвентарь','content'=>$this->renderPartial('_inv',array('data'=>$data,'field'=>$field),true));
		}
		$this->widget('bootstrap.widgets.TbTabs',array(
			'type'=>'tabs',
			'tabs'=>$tabs,
		)); ?>
	</div>
</div>