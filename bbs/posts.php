<?php

// ファイルの指定
$dataFile = 'datafile.dat';

//エスケープする関数
function h($s){
return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}

//name="send_message"のPOST送信があった時
if(isset($_POST["send_message"])){
    //送信されたname="message"とname="user_name"の値を取得する
    $message = trim($_POST['message']);
    $user = trim($_POST['user_name']);

    //messageが空じゃなかったら
    if(!empty($message)){

        //userが空の場合、名無しにする
        if(empty($user)){
          $user = "匿名";
        }
        //日付を取得する
        $postDate = date('Y-m-d H:i:s');
        //ファイルに書き込むメッセージを作成する
        $newData  = $user." | ".$message." | ".$postDate."\n";
        //ファイルを開く
        $fp = fopen($dataFile,'a');
        //ファイルに書き込む
        fwrite($fp,$newData);
        //ファイルを閉じる
        fclose($fp);
    }
}
//一行ずつデータを取り出して配列に入れる
$post_list = file($dataFile,FILE_IGNORE_NEW_LINES);
//逆順に並べ替える
$post_list = array_reverse($post_list);
?>


<!DOCTYPE html>
<html>
<head lang="ja">
<meta charset="utf-8">
<title>【掲示板】チピ掲示板 - CHIPI BBS （六本木）</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--CSS-->
<link rel="stylesheet" type="text/css" href="https://umaidango.github.io/kabegami/new.css">
<link rel="stylesheet" type="text/css" href="https://umaidango.github.io/kabegami/modal.css">
<!--CSSはここまで-->
<!--ライブラリ-->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/tippy.js@5.0.3/animations/shift-toward-subtle.css">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/tippy.js@5.0.3/themes/light-border.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!--jqueryは得意ですか？得意な人はチピ掲示板に教えて！！-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script><!--くっきぃ！-->
<!--ライブラリはここまで-->
<meta http-equiv="refresh" content="4.5;URL=">
<style>
*{
 margin-right: auto;
margin-left: auto;
 text-align:center;
 scroll-behavior: smooth;
}

@media screen and (max-width: 475px) {
  .mobi-page{
    display: block;
  }
}

@media screen and (min-width: 475px) {
   .mobi-page{
    display: none;
   }
}

@media screen and (max-width: 1800px) {

.fgjd{
  margin-top: 20px;
}


}

@media screen and (min-width: 1800px) {


.fgjd{
  margin-top: -20px;
}

.adsimg1c{
  display: inline-block;
}
}

@media screen and (max-width: 1600px) {
  .adsimg1c{
  display: none;
}


}

.sw:hover{
 font-weight:bold;
 text-decoration:underline;
 }

.header-button:hover{
 background-color: aliceblue;
border-radius: 4px;
}

button:hover{
 box-shadow: 2px 10px 13px #f0f0f0;
font-weight: bold;
color: #e8e8e8;
}


.banana1:not(:target) {
opacity: 0;
visibility: hidden;
transition: opacity 0.5s, visibility 0.5s;
}

.banana1 {
width: 100%;
height: 100%;
position: fixed;
top: 0;
left: 0;
}


#page-top a{
background:#942D2F;
color:#fff;
text-align: center;
display: block;
text-decoration: none;
padding:20px;
text-transform: uppercase;
letter-spacing: 0.05em;
font-size: 0.8rem;
transition: all 0.3s;
}

#page-top a:hover{
background: #777;
}

  dialog{
    z-index:3;
  }


.loop-area {
  display: flex;
  animation: loop-slide 20s infinite linear 1s both;
  list-style: none;
  margin: 0;
  padding: 0;
}
.loop-area .content {
  width: 500px;
}
@keyframes loop-slide {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-100%);
  }
}
  
  
  li{
    list-style:none;
    
  }
  
  details {
  margin: 14px;
  padding: 10px;
  height: 10px;
  transition: .5s;
}
details[open] {
  height: 166px;
  background: #ffffff8a;
  padding: 11px;
  border-radius: 0px;
  border-top-left-radius: 18px;
}


.loader2 {
  width: 22px;
  aspect-ratio: 1;
  border-radius: 50%;
  border: 4px solid lightblue;
  border-right-color: #1b9b89;
  animation: l2 1s infinite linear;
}
@keyframes l2 {to{transform: rotate(1turn)}}
.sample01 {
  margin: 0 auto 40px;
  width: 568px;
  font-size: 28px;
  text-align: center;
  overflow: hidden;
  position: fixed;
  text-shadow: 3px 3px 0 #fff, -3px 3px 0 #fff, -3px -3px 0 #fff, 3px -3px 0 #fff;
  font-weight: bold;
  margin-left: 25px;
  height: 323px;
}
.sample01 p{
margin:0;
display : inline-block;
padding-left: 100%;
white-space : nowrap;
line-height : 1em;
animation : scrollSample01 20s linear infinite;
}
@keyframes scrollSample01{
0% { transform: translateX(0)}
100% { transform: translateX(-100%)}
}

  
.sample02 {
margin : 0 auto 40px;
text-align : center;
overflow : hidden;
  width: 568px;
  font-size: 28px;
  position: fixed;
  text-shadow: 3px 3px 0 #fff, -3px 3px 0 #fff, -3px -3px 0 #fff, 3px -3px 0 #fff;
  font-weight: bold;
  margin-left: 25px;
  height: 323px;
}
.sample02 ul{
margin:0;
display : inline-block;
padding-left: 100%;
white-space : nowrap;
line-height : 1em;
animation : scrollSample02 15s linear infinite;
}
.sample02 ul li{
display:inline;
margin:0 100px 0 0;
}
.sample02 ul li:nth-child(1){
font-weight:bold;
}
.sample02 ul li:nth-child(2){
color:#F00;
}
.sample02 ul li:nth-child(3){

}
.sample02 ul li:last-child{
color:#F90;
margin:0;
}
@keyframes scrollSample02{
0% { transform: translateX(0)}
100% { transform: translateX(-100%)}
}

ul li.remove span {
  color: rgb(255, 251, 0);
  
}

.osu3{
  border-radius: 10px;
  background-color: rgb(185, 222, 255);
  width: 348px;
  display: inline-block;
  margin: 10px;
  height: 10px;
  height: 237px;
  border: 1px #9ec8cc solid;
  box-shadow: 0 2px 3px 0 #cdcedb;
}

.osu3frame{
  display: inline-block;
  width: 290px;
  height: 165px;
  background: #0040ff3d;
}

.osu3wf{
  width: 180px;
  height: 85px;
  position: relative;
  z-index: 0;
  display: inline-block;
  background: #0040ff3d;
  margin-top: 12px;

}

.popup{
  padding:4px;
  padding-left: 5px;
  padding-right:5px;
  border:1px #0000007a solid;
  background: #fff;
  position: fixed;
  z-index: 10;
  
}

@keyframes fadeInAnime{
  from {
    opacity: 0;
    transform: translateX(-100%);
    
  }

  to {
    opacity: 1;
    transform: translateX(0%);
    
  }
  
}

@keyframes fadeoutAnime{
  from {
    opacity: 1;
    transform: translateX(0%);
  }

  to {
    opacity: 0;
    transform: translateX(-100%);
  }
}


.fadein{
  animation-name: fadeInAnime;
  animation-duration: 0.35s;
  animation-fill-mode: forwards;
  opacity: 0;
  animation-delay: 0s;
   

  
}

.fadeout{
  animation-name: fadeoutAnime;
  animation-duration: 0.35s;
  animation-fill-mode: forwards;
  opacity: 1;
  animation-delay: 0s;

  
}


@keyframes fadeIn2a{
  from {
    opacity: 0;
    transform: translateX(100%);
  }

  to {
    opacity: 1;
    transform: translateX(0%);
  }
}

@keyframes ichiosi-anime{
  from {
    opacity: 0;
    transform: translateX(-500%);
  }

  to {
    opacity: 1;
    transform: translateX(0%);
  }
}

@keyframes f1{
  from {
    
    transform: translateY(-50%);
  }

  to {
    
    transform: translateY(0%);
  }
}

.f1c{
  animation-name: f1;
  animation-duration: 0.3s;
  animation-fill-mode: forwards;
}

.fadein2{
  animation-name: fadeIn2a;
  animation-duration: 0.8s;
  animation-fill-mode: forwards;
  opacity: 0;
  animation-delay: 0s;
}
  
  .poti:hover{
    background:gray;
    padding:2px;
    border-radius:4px;
    color:white;
  }

  /*やっぱコメント入れた方がいいねぇー*/

    /*ユーザーアカウント*/
  
    @keyframes  f-u1a{
  0% {
    opacity:0;
  }
  100% {
    opacity: 0.94;
  }
}
  
  .chipi-ui-f-u{
    animation-name: f-u1a;
  animation-duration: 0.32s;
  animation-fill-mode: forwards;
  }
  
  
  /*ユーザーアカウントここまで*/
  .rotate-box img{
    transition: transform 0.4s;
  }
  .rotate-box:hover img{
      
  transform: rotate(20deg);
  }
  .banana div{
    transition: transform 1s;
  }
  .bananaa:hover div{
    
  transform: rotate(360deg);
  }
  
  .search:focus{
    outline: none;
  }
  
  .rotate-2 font{
    transition: transform 0.8s;
  }
  
  .rotate-2:hover font{
    transform: rotate(-30deg);
  }

  ul{
    list-style: none;
    
  }

  .bbs-main{
    background: aliceblue;
  padding: 20px;
  width: 80%;
  min-width: 250px;
  border-radius: 20px;
  font-size: 16px;
  }
  
  li{
    border-top: 1px #ddd solid;
    border-radius: 0px;
    background: #fff;
    border-right: 1px #ddd solid;
    border-left: 1px #ddd solid;
    padding:4px;
    font-size: 18px;
  }

  
  @media screen and (max-width: 767px) {
/* ここに横幅が767px以下の時に発動するスタイルを記述 */
}

@media screen and (min-width: 767px) {
/* ここに横幅が767pxより大きい時に発動するスタイルを記述 */
}
  
</style>

<link rel="shortcut icon" sizes="64x64" href="favicon.png">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@100..900&amp;display=swap" rel="stylesheet">
<meta http-equiv="refresh" content="4.35;URL=">

</head>
<body>

<div style="height:5vh;"></div>
<ul class="bbs-main">
<!--post_listがある場合-->
<?php if (!empty($post_list)){ ?>
    <!--post_listの中身をひとつづつ取り出し表示する-->
    <?php foreach ($post_list as $post){ ?>
    <li><?php echo h($post); ?></li>
    <?php } ?>
<?php }else { ?>
    <li>まだ投稿はありません。</li>
<?php } ?>
</ul>

<footer>(c) U Software Group</footer>
<div style="height:10vh;"></div>
</body>
</html>
