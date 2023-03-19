<?php include 'view/html_header.php';?>
    <?php include 'view/header.php';?>
<!------------------------CODE STARTS------------------------------->
      
<div class="p-5 text-center bg-image rounded-0" style="
    background-image: url('./public/img/graveyard.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 500px;
  ">
    <div class="mask py-3" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-3">search for a deceased</h1>
           
                <label for="searchForDeceased" class="form-label">enter their last name then first name.</label>
                <div class ="d-flex gap-4">
            <input type="text" class="form-control search-deceased-field" id="searchForDeceased" >
            <button class = "btn btn-success search-obituary-button"> Submit </button>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class=" h3 m-2 m-3 d-flex justify-content-left align-items-left ">headstones.com allows people to create pages for their loved ones for all to see, after the page has been created other loved ones can come by and leave tributes which let them talk about what that person meant to them and share fond memories.</div>

<div class="row border p-2 border-dark m-3">
    <div class="col-3 border "><img src="/public/img/guy.jpg" class="img-fluid" alt="/public/img/guy.jpg"></div>
    <div class="col m-2 text-start">
        <div class="row h5 ">John smith</div>
        <div class="row h5">Detroit Michigan</div>
        <div class="row h5">Date of Birth: 10/26/1954 - Date of Death 4-16-2022</div>
        <div class="row">John was an amazing husband father and mentor he brought wisdom to all that crossed his path. He will be greatly missed by his 3 sons and 2 daughters and his many students. He was taken from us much sooner than he should have been, but he is in a much better place now.</div>
    </div>
   
</div>

<div class = "border p-2 border-dark d-flex justify-content-left align-items-left h-100">
    <div class="fw-bold ">Dan Johnson:  </div>
    <div class="text ">John was like a brother to me he taught me so many fasinating things and the fishing trips we took together were some of my happiest moments. I will miss you</div>
    
        
</div>

        <div class="row"> 
        <div class="btn-group" role="group" aria-label="Basic example">
        <a href ="contact.php" role="button" class="btn btn-success ">contact info</a>
  <a href ="burial_info.php" role="button" class="btn btn-success">burial info</a>
  <a href ="will_advice.php" role="button" class="btn btn-success">will advice</a>
</div>
        </div>
        <div class="row">
            <div class="col-4 m-2">
                

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click','.search-obituary-button', function() {
            //var id = $(".search-deceased-field").val();
            window.location.href = "view/results.php?search=" + $(".search-deceased-field").val();
        });
    </script>

<!------------------------CODE ENDS------------------------------->
<?php include 'view/html_footer.php';?>