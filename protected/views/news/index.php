<? $this->pageTitle = 'Новости - '.Yii::app()->params->sitename; ?><center><h3 class="title">Новости</h3><h5 class="muted">Будь вкурсе новостей проекта</h5></center>
<? $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view_news',
)); ?>

