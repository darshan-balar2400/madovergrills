<!-- reservation table -->
<div class="reservation-table container">
                <div class="row">
                    <div class="col-sm-6 left_side col_">
                        <div class="logo">
                            <img src="images/Logo.png" alt="Logo" />
                        </div>
                        <h1 class="title">+91 7623919269</h1>
                        <h5 class="small-title">balardarshan40@gmail.com</h5>
                        <a href="branches.php"><button class="button mt-4">All Branches</button></a>

                        <div class="social-media">
                            <a href="#">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                            <a href="#">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                            <a href="#">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                            <a href="#">
                                <ion-icon name="logo-youtube"></ion-icon>
                            </a>
                            <a href="#">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 right_side col_">
                        <div class="title">
                            Make a reservation
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return Submit();" method="POST" autocomplete="false" id="reservationForm" enctype="multipart/form-data">
                            <!-- no of person -->
                            <div class="input">
                                <p>select no of person</p>
                                <select name="person" id="person">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>

                            <!-- select branch -->
                            <div class="input">
                                <p>select branch</p>
                                <select name="branch" id="branch">
                                   <?php 
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<option value='$row[0]'>$row[0] | $row[1] | $row[2] | $row[3]</option>";
                                        }
                                   ?>
                                </select>
                               
                            </div>
                           
                            <!-- name -->
                            <div class="input">
                                <p>name</p>
                                <input type="text" name="name" id="name" >
                                <span class="error" name="error"></span>
                            </div>
                            <!-- email -->
                            <div class="input">
                                <p>email</p>
                                <input type="email" name="email" id="email" >
                                <span class="error" name="error"></span>
                            </div>

                            <!-- phno -->
                            <div class="input">
                                <p>phone no</p>
                                <input type="number" name="phno" id="phno" >
                                <span class="error" name="error"></span>
                            </div>

                             <!-- date -->
                             <div class="input">
                                <p>select date</p>
                                <input type="date" name="date" id="date" >
                                <span class="error" name="error"></span>
                            </div>
                            <!-- time -->
                            <div class="input">
                                <p>select time</p>
                                <input type="time" name="time" id="time" >
                                <span class="error" name="error"></span>
                            </div>

                            <button class="button mt-4" name="reservationbtn">Make reservation</button>
                        </form>
                    </div>
                </div>
            </div>