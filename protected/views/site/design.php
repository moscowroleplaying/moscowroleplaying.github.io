<script src="<?=Yii::app()->baseUrl?>/js/codemirror/lib/codemirror.js"></script>
<link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/js/codemirror/lib/codemirror.css">
<script src="<?=Yii::app()->baseUrl?>/js/codemirror/mode/javascript/javascript.js"></script>
<script src="<?=Yii::app()->baseUrl?>/js/codemirror/mode/clike/clike.js"></script>

<h3>Настройка внешнего вида панели</h3>
<hr>
<div class="btn-group btn-group-justified">
	<a href="<?=Yii::app()->baseUrl?>/site/design/1" class="btn btn-info">Стили главной страницы</button>
	<a href="<?=Yii::app()->baseUrl?>/site/design/2" class="btn btn-info">Стили основной страницы</button>
	<a href="<?=Yii::app()->baseUrl?>/site/design/4" class="btn btn-info">HTML главной страницы</a>
	<a href="<?=Yii::app()->baseUrl?>/site/design/3" class="btn btn-info">HTML основной страницы</a>
</div>
<hr>
<?
	$this->pageTitle = 'Настройка внешнего вида панели - '.Yii::app()->params->sitename;
	switch($id) {
		case 1:
		case 2: {
			echo '
				<script src="'.Yii::app()->baseUrl.'/js/codemirror/mode/css/css.js"></script>
				<script>
					window.onload = function() {
						window.editor = CodeMirror.fromTextArea(code, {
							mode: "text/css",
							lineNumbers: true,
							lineWrapping: true,
							matchBrackets: true,
						});
						editor.setSize(970,700);
					};
				</script>
			';
			break;
		}
		case 3:
		case 4: {
			echo '
				<script src="'.Yii::app()->baseUrl.'/js/codemirror/mode/xml/xml.js"></script>
				<script src="'.Yii::app()->baseUrl.'/js/codemirror/mode/css/css.js"></script>
				<script src="'.Yii::app()->baseUrl.'/js/codemirror/mode/vbscript/vbscript.js"></script>
				<script src="'.Yii::app()->baseUrl.'/js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
				<script>
					window.onload = function() {
						window.editor = CodeMirror.fromTextArea(code, {
							mode: "text/html",
							lineNumbers: true,
							lineWrapping: true,
							matchBrackets: true,
						});
						editor.setSize(970,700);
					};
				</script>
			';
			break;
		}		
	}


?>
<form method="POST" action="">
	<textarea id="code" name="code" style="width: 100%;height:900px;"><?=$content?></textarea>
	<hr>
	<button type="submit" class="btn btn-block btn-primary">Сохранить файл</button>
</form>
<hr>