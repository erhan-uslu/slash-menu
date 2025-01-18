<?php 
 
if(!isset($kullanici_user_idSS)){ 


       $slidercon1=$db->prepare("SELECT * FROM `slider` where kat_id=".$kat_id." and slide_turu=1 ");  

       $slidercon1->execute(array(  ));

                                       while ( $slidercek1=$slidercon1 -> fetch(PDO:: FETCH_ASSOC)){  ?>
  
<style>
 
/* The Modal (background) */
.modal {
  display: block; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: +1111111111111111; /* Sit on top */
  padding-top: 10%; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
   margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: auto;
  background-color: none;
  max-width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  z-index: +111111;
  margin-bottom: 5px;
 }

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>



<!-- Trigger/Open The Modal -->
<button id="myBtn" style='display:none'>Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

    <span class="close">&times;</span>
    
 
          <img src="<?php echo $siteyolu; ?><?php echo $slidercek1['slider_resim']; ?>" style="width: 100%;" >
 
     </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  var vid = document.getElementById("myVideo"); 
  vid.pause(); 

}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
     var vid = document.getElementById("myVideo"); 
  vid.pause();
  }
}
</script>

<?php }  }    ?>
