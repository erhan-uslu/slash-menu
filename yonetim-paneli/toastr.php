<?php  
if ($_GET['durum']=='okey') {   ?>

<div id="toast">
    <div id="img">
	<i class="fa fa-check-circle"></i></div>
	<div id="desc">İşlem Başarı ile Tamamlandı.</div>
</div> 



<style type="text/css">
    #toast { 
     bottom: 20px;
    visibility: hidden;
    max-width: 50px;
    height: 50px;
    margin: auto;
    float: right;
    background-color: #639008;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    position: fixed;
    z-index: +1000000000000000000000000000000;
     right:20px;
    
  
    font-size: 17px;
    white-space: nowrap;
}
#toast #img{
    width: 50px;
    height: 50px;
    
    float: left;
    
    padding-top: 16px;
    padding-bottom: 16px;
    
    box-sizing: border-box;

    
    background-color: #486807;
    color: #fff;
}
#toast #desc{

    
    color: #fff;
   
    padding: 10px;
    
    overflow: hidden;
    white-space: nowrap;
}

#toast.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
}

@-webkit-keyframes fadein {
    from {top: 0; opacity: 0;} 
    to { bottom: 20px; opacity: 1;}
}

@keyframes fadein {
    from {top: 0; opacity: 0;}
    to { bottom: 20px; opacity: 1;}
}

@-webkit-keyframes expand {
    from {min-width: 50px} 
    to {min-width: 350px}
}

@keyframes expand {
    from {min-width: 50px}
    to {min-width: 350px}
}
@-webkit-keyframes stay {
    from {min-width: 350px} 
    to {min-width: 350px}
}

@keyframes stay {
    from {min-width: 350px}
    to {min-width: 350px}
}
@-webkit-keyframes shrink {
    from {min-width: 350px;} 
    to {min-width: 50px;}
}

@keyframes shrink {
    from {min-width: 350px;} 
    to {min-width: 50px;}
}

@-webkit-keyframes fadeout {
    from { bottom: 20px; opacity: 1;} 
    to { bottom: 20px; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 20px; opacity: 1;}
    to { bottom: 20px; opacity: 0;}
}
</style>
<script type="text/javascript">

    var x = document.getElementById("toast")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);

</script>
<?php  } ?>

<?php  
if ($_GET['durum']=='error') {   ?>

<div id="toast"><div id="img">
    <i class="fa fa-check-circle"></i></div>
    <div id="desc">İşlem Başarısız Oldu.</div>
</div> 



<style type="text/css">
    #toast {
             bottom: 20px;
 float: right;
  right:20px;

    visibility: hidden;
    max-width: 50px;
    height: 50px;
    margin-left: -125px;
    margin: auto;
    background-color: #D10101;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    position: fixed;
    z-index: +1000000000000000000000000000000;
      
    font-size: 17px;
    white-space: nowrap;
}
#toast #img{
    width: 50px;
    height: 50px;
    
    float: left;
    
    padding-top: 16px;
    padding-bottom: 16px;
    
    box-sizing: border-box;

    
    background-color: #E70000;
    color: #fff;
}
#toast #desc{

    
    color: #fff;
   
    padding: 10px;
    
    overflow: hidden;
    white-space: nowrap;
}

#toast.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
}


@-webkit-keyframes fadein {
    from {top: 0; opacity: 0;} 
    to { bottom: 20px; opacity: 1;}
}

@keyframes fadein {
    from {top: 0; opacity: 0;}
    to { bottom: 20px; opacity: 1;}
}

@-webkit-keyframes expand {
    from {min-width: 50px} 
    to {min-width: 350px}
}

@keyframes expand {
    from {min-width: 50px}
    to {min-width: 350px}
}
@-webkit-keyframes stay {
    from {min-width: 350px} 
    to {min-width: 350px}
}

@keyframes stay {
    from {min-width: 350px}
    to {min-width: 350px}
}
@-webkit-keyframes shrink {
    from {min-width: 350px;} 
    to {min-width: 50px;}
}

@keyframes shrink {
    from {min-width: 350px;} 
    to {min-width: 50px;}
}

@-webkit-keyframes fadeout {
    from { bottom: 20px; opacity: 1;} 
    to { bottom: 20px; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 20px; opacity: 1;}
    to { bottom: 20px; opacity: 0;}
}
</style>
<script type="text/javascript">

    var x = document.getElementById("toast")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);

</script>
<?php  } ?>