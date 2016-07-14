<?php //ドロップの制御をするファイルは拡張子をphpにした方がいい。

 ?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
$(function(){
  /*================================================
    ファイルをドロップした時の処理
  =================================================*/
  $('#drag-area').bind('drop', function(e){
    // デフォルトの挙動を停止
    e.preventDefault();
 
    // ファイル情報を取得
    var files = e.originalEvent.dataTransfer.files;
 
    uploadFiles(files);
 
  }).bind('dragenter', function(){
    // デフォルトの挙動を停止
    return false;
  }).bind('dragover', function(){
    // デフォルトの挙動を停止
    return false;
  });
 
  /*================================================
    ダミーボタンを押した時の処理
  =================================================*/
  $('#btn').click(function() {
    // ダミーボタンとinput[type="file"]を連動
    $('input[type="file"]').click();
  });
 
  $('input[type="file"]').change(function(){
    // ファイル情報を取得
    var files = this.files;
 
    uploadFiles(files);
  });
 
});
 
/*================================================
  アップロード処理
=================================================*/
function uploadFiles(files) {
  // FormDataオブジェクトを用意
  var fd = new FormData();
 
  // ファイルの個数を取得
  var filesLength = files.length;
 
  // ファイル情報を追加
  for (var i = 0; i < filesLength; i++) {
    alert(files[i]["name"]);
    fd.append("files[]", files[i]);
  }
 
  // Ajaxでアップロード処理をするファイルへ内容渡す
  $.ajax({
    url: 'http://localhost/wp-content/plugins/csv-uploader-plugin/upload.php',
    type: 'POST',
    data: fd,
    processData: false,
    contentType: false,
    success: function(data) {
    document.write(data);
    }
  });
}
</script>

<div id="drag-area" >
	<div class="yz">
	  <p class="drop">アップロードするファイルをドロップ</p>
	  <p>または</p>
	  <div class="btn-group">
	    <input type="file" multiple="multiple" style="display:none;" name="csv"/>
	    <button id="btn">ファイルを選択</button>
    </div>
  </div>
</div>
