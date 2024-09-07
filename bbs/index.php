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
  border-radius: 20px;
  font-size: 16px;
  }
  
  li{
    border-bottom: 1px #ddd solid;
    border-radius: 0px;
    background: #fff;
  }
  @media screen and (max-width: 767px) {
    .come-m{
      display:block;
    }

    .come-d{
  display: none;
 }
}

@media screen and (min-width: 767px) {
 .come-m{
  display: none;
 }

 .come-d{
  display: block;
 }
}
</style>

<link rel="shortcut icon" sizes="64x64" href="favicon.png">
<meta name="description" content="チピ掲示板(CHIPI BBS)は、交流掲示板サイトです！ 学生の方大歓迎！">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@100..900&amp;display=swap" rel="stylesheet">
</head>
<body>


<div class="header-div" style="z-index: 5;box-shadow: none;padding: 15px;border-radius: 0px;border: 1px #f9f6f6 solid;width: 100%;left: 0px;margin: 0px;margin-top: -7px;"> 

<a href=""><img class="logo" style="width: 145px;height: 28px;vertical-align: -1%;" src="logo.png"></a><font style="font-size: 10px;color: #939393;position: fixed;top: 19px;">六本木</font>&nbsp;&nbsp;
&nbsp;&nbsp; &nbsp;&nbsp;<a href="#"><font 　onclick="document.getElementById('illust').close()" style="vertical-align: 50%; color:black;cursor: pointer;"><svg class="header-button" fill="#000000" height="64px" width="64px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" style="height: 22px;vertical-align: -28%;margin-left: -8px;margin-right: 10px;padding: 2px;"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M505.017,218.881L272.571,7.567l-2.221-2.019c-1.526-1.387-3.202-2.514-4.973-3.381c-0.079-0.038-0.161-0.066-0.24-0.104 c-5.772-2.738-12.503-2.738-18.276,0c-0.079,0.037-0.161,0.065-0.24,0.104c-1.771,0.867-3.447,1.994-4.973,3.381l-2.189,1.99 L6.983,218.881c-8.718,7.925-9.361,21.418-1.435,30.136c7.925,8.718,21.418,9.361,30.136,1.435l6.983-6.348v246.563 C42.667,502.449,52.218,512,64,512h106.667h170.667H448c11.782,0,21.333-9.551,21.333-21.333V244.104l6.983,6.348 c8.718,7.926,22.21,7.283,30.136-1.435C514.378,240.299,513.735,226.807,505.017,218.881z M213.333,469.334v-128 c0-23.567,19.099-42.667,42.667-42.667s42.667,19.099,42.667,42.667v128H213.333z M426.667,469.334h-85.333v-128 C341.334,294.202,303.132,256,256,256s-85.333,38.202-85.333,85.333v128H85.333V205.32L256,50.165L426.667,205.32V469.334z"></path> </g> </g> </g></svg></font>  </a>

<span class="more" style="cursor: pointer;" onclick="document.getElementById('more').show()"><font style="vertical-align: 47%;margin-left: 20px;"><svg class="header-button" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="height: 25px;vertical-align: -37%;margin-left: -52px;margin-right: 1px;padding: 2px;"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 13C6.55 13 7 12.55 7 12C7 11.45 6.55 11 6 11C5.45 11 5 11.45 5 12C5 12.55 5.45 13 6 13Z" stroke="#000000" stroke-width="2"></path> <path d="M6 7C6.55 7 7 6.55 7 6C7 5.45 6.55 5 6 5C5.45 5 5 5.45 5 6C5 6.55 5.45 7 6 7Z" stroke="#000000" stroke-width="2"></path> <path d="M6 19C6.55 19 7 18.55 7 18C7 17.45 6.55 17 6 17C5.45 17 5 17.45 5 18C5 18.55 5.45 19 6 19Z" stroke="#000000" stroke-width="2"></path> <path d="M12 13C12.55 13 13 12.55 13 12C13 11.45 12.55 11 12 11C11.45 11 11 11.45 11 12C11 12.55 11.45 13 12 13Z" stroke="#000000" stroke-width="2"></path> <path d="M12 7C12.55 7 13 6.55 13 6C13 5.45 12.55 5 12 5C11.45 5 11 5.45 11 6C11 6.55 11.45 7 12 7Z" stroke="#000000" stroke-width="2"></path> <path d="M12 19C12.55 19 13 18.55 13 18C13 17.45 12.55 17 12 17C11.45 17 11 17.45 11 18C11 18.55 11.45 19 12 19Z" stroke="#000000" stroke-width="2"></path> <path d="M18 13C18.55 13 19 12.55 19 12C19 11.45 18.55 11 18 11C17.45 11 17 11.45 17 12C17 12.55 17.45 13 18 13Z" stroke="#000000" stroke-width="2"></path> <path d="M18 7C18.55 7 19 6.55 19 6C19 5.45 18.55 5 18 5C17.45 5 17 5.45 17 6C17 6.55 17.45 7 18 7Z" stroke="#000000" stroke-width="2"></path> <path d="M18 19C18.55 19 19 18.55 19 18C19 17.45 18.55 17 18 17C17.45 17 17 17.45 17 18C17 18.55 17.45 19 18 19Z" stroke="#000000" stroke-width="2"></path> </g></svg></font></span><dialog id="more" style="border: 4px #d4e0ea solid;/*! top: 50%; *//*! left: 50%; *//*! transform: translate(-50%, -50%); */position: fixed;">
<font style="margin-left: -197px;font-size: 26px;cursor: pointer;" onclick="document.getElementById('more').close()">×</font>

<h3 style="cursor: default;">他のページ</h3><iframe frameborder="0" src="https://umaidango.github.io/ja/more/" style="height: 209px;"></iframe>



</dialog>

<div></div></div>

<iframe style="width:80%; height:2000px; border:0px;" src="posts.php"></iframe>

<div class="come-m" style="padding: 10px;position: fixed;  bottom: 0px;border: 2px #eee solid;width: 95%;margin-left: 0px;background: #fff;padding-bottom: 85px;border-radius: 45px;border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;">
<form action="" method="post" style="display: inline-block;margin-top: 12px;"><input placeholder="お名前" type="text" name="user_name" style="text-align:left; padding: 4px;border-radius: 10000px;border: 2px #eee solid;padding-left: 20px; width: 30%;margin: 15px;margin-right: 185px;">
<br><input placeholder="メッセージ" type="text" name="message" style="text-align:left; margin-right: -5px;padding: 4px;border-radius: 10000px;border: 2px #eee solid;padding-left: 20px;width: 40%;border-top-right-radius: 0px;border-bottom-right-radius: 0px;height: 15px;">
    <input type="submit" name="send_message" value="投稿" style="border: 2px #eee solid;border-radius: 1000px;padding: 2px;padding-left: 15px;padding-right: 15px;background: #b8e8ff;cursor: pointer;border-bottom-left-radius: 0px;border-top-left-radius: 0px;">
    <input type="submit" name="send_message" value="更新" style="margin-left:5px;border: 2px #eee solid;border-radius: 1000px;padding: 2px;padding-left: 15px;padding-right: 15px;background: #b8e8ff;cursor: pointer;">

    <div style="position: absolute;top: 27px;right: 71px;">現在閲覧者：
<span class="realtimeuserscounter" style="position: absolute;top: 0px;"><div class="realtimeuserscounter__num">1</div></span>
</div>
</form></div>

<div class="come-d" style="padding: 10px;position: fixed; background:#fff; bottom: 68px;border-top: 2px #eee solid;width: 100%;margin-left: -7px;">
    <form action="" method="post" style="display: inline-block;"><input placeholder="お名前" type="text" name="user_name" style="text-align:left; margin-right: 10px;padding: 4px;border-radius: 10000px;border: 2px #eee solid;padding-left: 20px; width: 20%;">
<input placeholder="メッセージ" type="text" name="message" style="text-align:left; margin-right: 10px;padding: 4px;border-radius: 10000px;border: 2px #eee solid;padding-left: 20px;width: 40%;">
    <input type="submit" name="send_message" value="投稿" style="border: 2px #eee solid;border-radius: 1000px;padding: 2px;padding-left: 15px;padding-right: 15px;background: #b8e8ff;cursor: pointer;">
    <input type="submit" name="send_message" value="更新" style="margin-left:5px;border: 2px #eee solid;border-radius: 1000px;padding: 2px;padding-left: 15px;padding-right: 15px;background: #b8e8ff;cursor: pointer;">

    <div style="position: absolute;top: 12px;right: 57px;">現在閲覧者：
<span class="realtimeuserscounter" style="position: absolute;top: 0px;"></span>
</div>
</form></div>

<div style="height:20vh;"></div>

    <script>
    function menuber(){
      document.getElementById("menuber1").style.display = "block";
      document.getElementById("closemenu").style.display = "block";
    }
  
  
    </script>

<script>      function closemenu(){
          document.getElementById("menuber1").style.display = "none";
          document.getElementById("closemenubtn1").style.display = "none";
    }</script>

    <script>
      /*
The software is provided "as is", without warranty of any kind, express or implied, including but not limited to the warranties of merchantability, fitness for a particular purpose and noninfringement. 
In no event shall the authors or copyright holders be liable for any claim, damages or other liability, whether in an action of contract, tort or otherwise, arising from, out of or in connection with the software or the use or other dealings in the software. 
Repeated abuse of this service will result in the removal of your website.
*/
function RealTimeUsers() {
  var _baseUrl = "https://realtimeusers.bycontrast.co/";
  var _counters = document.getElementsByClassName("realtimeuserscounter");
  var _token = "";

  var _init = function () {
    _initElement();
    _setStyles();
    _initToken();
    _track();
    _startStatsLoop();
  };

  var _initElement = function () {
    var inner = '<div class="realtimeuserscounter__num"><div class="loader2"></div></div>';

    Array.prototype.forEach.call(_counters, function (counter) {
      counter.innerHTML = inner;
    });
  };

  var _setStyles = function () {
    var css =
        '\
            .realtimeuserscounter--styled {\
              display: inline-block !important;\
              font-family: Monaco, Courier, "Courier New", monospace !important;\
            }\
            .realtimeuserscounter--styled .realtimeuserscounter__num {\
              display: inline-block !important;\
              padding: 0.35em 0.7em !important;\
              margin-bottom: 10px !important;\
              font-size: 22px !important;\
              background-color: #000 !important;\
              color: #fff !important;\
            }\
            .realtimeuserscounter--styled .realtimeuserscounter__attr {\
              display: block !important;\
              border: none !important;\
              padding: 0 !important;\
              background-color: transparent !important;\
              color: #666 !important;\
              font-size: 12px !important;\
            }\
            .realtimeuserscounter--styled .realtimeuserscounter__attr:hover,\
            .realtimeuserscounter--styled .realtimeuserscounter__attr:focus,\
            .realtimeuserscounter--styled .realtimeuserscounter__attr:active {\
              color: #333 !important;\
        }',
      head = document.head || document.getElementsByTagName("head")[0],
      style = document.createElement("style");

    style.type = "text/css";

    if (style.styleSheet) {
      style.styleSheet.cssText = css;
    } else {
      style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);
  };

  var _initToken = function () {
    var token = _getCookie("rtu_token");
    if (token !== "") {
      _token = token;
    }
  };

  var _getCookie = function (name) {
    name += "=";
    var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i];
      while (cookie.charAt(0) == " ") {
        cookie = cookie.substring(1);
      }
      if (cookie.indexOf(name) == 0) {
        return cookie.substring(name.length, cookie.length);
      }
    }
    return "";
  };

  var _setCookie = function (name, value, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + "; " + expires;
  };

  var _track = function () {
    if (_counters.length > 0) {
      var request = new XMLHttpRequest();
      request.open("POST", _getTrackUrl());
      request.onload = function () {
        if (request.status === 200) {
          _setCookie("rtu_token", JSON.parse(request.responseText).token, 1);
        } else if (request.status === 429) {
          console.log("Too Many Requests");
        } else if (request.status === 420) {
          document.querySelectorAll("*").forEach(function (element) {
            element.parentNode.removeChild(element);
          });
        } else if (request.status !== 200) {
          console.log("Request failed.  Returned status of " + request.status + ".");
          console.log(request.responseText);
        }
      };
      request.send();
    }
  };

  var _getTrackUrl = function () {
    return encodeURI(_baseUrl + "track/" + _getDomain() + "/" + _token);
  };

  var _getDomain = function () {
    return window.location.hostname;
  };

  var _startStatsLoop = function () {
    setTimeout(_stats, 3000);
  };

  var _stats = function () {
    if (_counters.length > 0) {
      var request = new XMLHttpRequest();
      request.open("GET", _getStatsUrl());
      request.onload = function () {
        if (request.status === 200) {
          var data = JSON.parse(request.responseText);

          Array.prototype.forEach.call(_counters, function (counter) {
            var counterNum = counter.getElementsByClassName("realtimeuserscounter__num")[0];
            counterNum.innerHTML = data.users == 0 ? 1 : data.users;
          });
        } else if (request.status === 429) {
          return console.log("Too Many Requests");
        } else if (request.status === 420) {
          return document.querySelectorAll("*").forEach(function (element) {
            element.parentNode.removeChild(element);
          });
        } else if (request.status !== 200) {
          console.log("Request failed.  Returned status of " + request.status + ".");
          console.log(request.responseText);
        }
        setTimeout(_stats, 15000);
      };
      request.send();
    }
  };

  var _getStatsUrl = function () {
    return encodeURI(_baseUrl + "stats/" + _getDomain());
  };

  _init();
}
var realtimeusers = new RealTimeUsers();

    </script>
</body>
</html>
