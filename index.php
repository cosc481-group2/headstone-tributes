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
            <div class="text-white w-50 p-3">
                <h1 class="mb-3">Search for Deceased:</h1>
                <div class ="d-flex">
                    <input type="text" class="form-control search-deceased-field rounded-0" id="searchForDeceased" >
                    <button class = "btn btn-success search-obituary-button rounded-0"> Submit </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-5">
    <div class="col">
    <div class="card shadow rounded-0">
        <div class="card-body p-5">
            <div class=" h3 m-2 m-3 d-flex text-center"> Headstones.com allows people to create pages for their loved ones for all to see, after the page has been created other loved ones can come by and leave tributes which let them talk about what that person meant to them and share fond memories.</div>
            <div class="row border p-2 border-dark m-3">
                <div class="col-3"><img src="/public/img/guy.jpg" class="img-fluid" alt="/public/img/guy.jpg"></div>
                <div class="col m-2 text-start">
                    <div class="row h5 ">John smith</div>
                    <div class="row h5">Detroit Michigan</div>
                    <div class="row h5">Date of Birth: 10/26/1954 - Date of Death 4-16-2022</div>
                    <div class="row">John was an amazing husband father and mentor he brought wisdom to all that crossed his path. He will be greatly missed by his 3 sons and 2 daughters and his many students. He was taken from us much sooner than he should have been, but he is in a much better place now.</div>
                </div>
            </div>
            <div class="border p-2 border-dark d-flex justify-content-left align-items-left h-100">
                <div class="fw-bold ">Dan Johnson:  </div>
                <div class="text ">John was like a brother to me he taught me so many fasinating things and the fishing trips we took together were some of my happiest moments. I will miss you</div>        
            </div>
        </div>
    </div>
    </div>
    </div>    
</div>
<div class="container">
    <div class="row my-5">
        <div class="col-xl-6 col-lg-12 p-3">
            <div class="card rounded-0 shadow" style="min-height:60vh;">
                <div class="card-header rounded-0 bg-success text-light">
                    <h3 class="h3">Burial Planning and Information:</h3>
                </div>
                <div class="card-body">
                    <img src="/public/img/graveside.jpg" class="img-fluid w-100" alt="/public/img/guy.jpg">
                    <p class="p-3">
                        Burial is simply a ritual act of placing the deceased into the ground. The earliest human burial dates back 100,000 years making it one of the longest-lived and most widespread of traditions. Burial is often seen as a sign of respect for the deceased. It has been used to prevent the odor of decay, to give family members closure and prevent them from witnessing the decomposition of their loved ones, and in many cultures it has been seen as a necessary step for the deceased to enter the afterlife or to give back to the cycle of life.
                    </p>
                    <h5 class="text-center">More Information on Burial Planning, click the link below:</h5>
                </div>
                <div class="card-footer d-flex justify-content-center bg-light">
                    <button class="btn btn-outline-primary" onclick="window.location.href='view/burial_info.php'">Burial Planning and Information</button>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 p-3">
            <div class="card rounded-0 shadow" style="min-height:60vh;">
                <div class="card-header rounded-0 bg-success text-light">
                    <h3 class="h3">Will Advice:</h3>
                </div>
                <div class="card-body">
                    <img src="/public/img/Last-Will.jpeg" class="img-fluid w-100" alt="/public/img/guy.jpg">
                    <p class="px-3 py-2">
                        A will is a legal document that says who should have your property or care for your children after your death. If you own any property or have children under 18, you may want to create a will. If you don’t have a will, those decisions will be made for you according to state law.
                        <br><br>
                        Wills can take many forms. There are several requirements a will has to meet to be considered valid after your death. Planning for the end of your life can be complicated. You may want to talk to a lawyer to ensure that your wishes are carried out.
                    </p>
                    <h5 class="text-center">More Information on Will Advice, click the link below:</h5>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button class="btn btn-outline-primary" onclick="window.location.href='view/will_advice.php'">Will Advice</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5">
        <div class="col" style="min-height:60vh;">
            <div class="row">
                <div class="col">
                    <h2 class="text-center display-5">Headstones.com is located in the Southfield, MI area</h2>
                </div>
            </div>
            <div class="ratio ratio-16x9">
                <iframe class="shadow" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2050.7985877690107!2d-83.28532757803637!3d42.48192544372566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8824b9e143a6b8b1%3A0xa3f2ec1e8a53b0c2!2sSouthfield%2C%20MI!5e0!3m2!1sen!2sus!4v1680441399981!5m2!1sen!2sus"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).on('click','.search-obituary-button', function() {
            window.location.href = "view/results.php?search=" + $(".search-deceased-field").val();
        });
        $(document).on('keypress','#searchForDeceased',function(e) {
            if(e.which == 13) {
                window.location.href = "view/results.php?search=" + $(".search-deceased-field").val();
            }
        });
    </script>

<!------------------------CODE ENDS------------------------------->
<?php include 'view/html_footer.php';?>