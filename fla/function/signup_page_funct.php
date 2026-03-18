<?php
function displayInputs(){
    echo '<div class="text">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" autocomplete="off" placeholder="John" maxlength="20" required ';
    if (isset($_SESSION['error'])) echo 'value=' .$_SESSION['fname'];
    echo  '/>
    <span></span>
    </div>

    <div class="text">
    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lname" autocomplete="off" placeholder="Doe" maxlength="20" required ';
    if (isset($_SESSION['error'])) echo 'value=' .$_SESSION['lname'] ;
    echo  '/>
    <span></span>
    </div>

    <div class="text">
    <label for="tele" class="lbl">Telephone Number</label>
    <input type="text" id="tele" name="tele" onKeyPress="if(this.value.length==8) return false;" autocomplete="off" pattern="[\d]{3}-[\d]{4}" placeholder="XXX-XXXX" required ';
    if (isset($_SESSION['error'])) echo 'value="' . $_SESSION['tele'] . '"';
    echo  '/>
    <span></span>
    </div>

    <div class="text">
    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="johndoe@mail.com" autocomplete="off" required />
    <span></span>
    </div>

    <div class="text">
    <label for="pword1">Password</label>
    <input type="password" id="pword1" name="pword1" placeholder="Password must be 6 or more characters" pattern=".{6,}" maxlength="256" onkeyup="active()" required />
    <span></span>
    </div>

    <div class="text">
    <label for="pword2">Confirm Password</label>
    <input type="password" id="pword2" name="pword2" placeholder="Re-enter password" disabled required pattern=".{6,}" />
    <span></span>
    </div>';
}
if(isset($_SESSION['error'])){
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);
    unset($_SESSION['telephone']);
}

?>
