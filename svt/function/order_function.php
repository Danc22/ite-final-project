<?php

function displayInputs()
{

    echo '<div class="text">
    <label for="car">Car</label>
    <input type="text" id="car" name="car" ';
    if (isset($_POST['car'])) {
        echo 'value="' . $_POST['car'] . '"';
    }elseif(isset($_SESSION['car'])){
        echo 'value="' . $_SESSION['car'] . '"';
    }
    echo 'required pattern ="Honda CR-V|Nissan Sentra|Suzuki Swift Sport" list="carOptions"/>
        <datalist id="carOptions">
        <option value="Honda CR-V"></option>
        <option value="Nissan Sentra"></option>
        <option value="Suzuki Swift Sport"></option>
        </datalist>';

    echo '<span></span>
    </div>

    <div class="text">
    <label for="ploc">Pick-up Location</label>
    <input type="text" id="ploc" name="ploc" placeholder="GAIA, Seawell, Christ Church" maxlength="256" required ';
    if (isset($_SESSION['error'])) {
        echo 'value="' .$_SESSION['ploc'] . '"';
    }
    echo  '/>
    <span></span>
    </div>

    <div class="text">
    <label for="dloc">Destination Location</label>
    <input type="text" id="dloc" name="dloc" placeholder="Cave Shepherd Mall, Broad Street, Bridgetown" maxlength="256" required ';
    if (isset($_SESSION['error'])) {
        echo 'value="' . $_SESSION['dloc'] . '"';
    }
    echo  '/> 
    <span></span>
    </div>
    <div class="text">
    <label for="ptime">Pick-up Date and Time</label>
    <input type="datetime-local" id="ptime" name="ptime" maxlength="256" required/>
    <span></span>
    </div>';
    if (isset($_SESSION['error'])) {
        unset($_SESSION['ploc']);
        unset($_SESSION['dloc']);
    }
}

