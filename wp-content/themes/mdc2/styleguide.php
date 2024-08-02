<?php
/*
 * styleguide template with all elements.
 * Template Name: Styleguide
*/
?>

<?php get_header(); ?>

<style>
    #buttons a {
        margin: 10px;
    }
    #inputs form {
        margin: 10px auto;
    }
</style>

<!-- headers -->

<h1>Nagłówek 1</h1>
<h2>Nagłówek 2</h2>
<h3>Nagłówek 3</h3>
<h4>Nagłówek 4</h4>
<h5>Nagłówek 5</h5>

<h2 class="--big-label">Nagłówek 2 big label</h2>

<!-- Text block -->

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deserunt distinctio doloremque, facere fugiat labore
    laborum minima natus nulla quia, quo repudiandae sit voluptatum. Dolorum minima officiis optio tempora
    voluptatibus.</p>

<!-- links -->

<a href="#">Zobacz</a>

<!-- buttons -->

<div id="buttons">

    <a class="btn">Zobacz</a>
    <a class="btn --solid">Zobacz</a>
    <a class="btn --outline">Zobacz</a>

    <a class="btn --icon-left">Zobacz</a>
    <a class="btn --icon-right">Zobacz</a>

    <a class="btn --solid">Zobacz</a>
    <a class="btn --solid --icon-left">Zobacz</a>
    <a class="btn --solid --icon-right">Zobacz</a>

    <a class="btn --solid">Zobacz</a>
    <a class="btn --solid --icon-left">Zobacz</a>
    <a class="btn --solid --icon-right">Zobacz</a>

    <a class="btn --solid --small">Zobacz</a>
    <a class="btn --solid --icon-left --small">Zobacz</a>
    <a class="btn --solid --icon-right --small">Zobacz</a>

    <a class="btn --solid --medium">Zobacz</a>
    <a class="btn --solid --icon-left --medium">Zobacz</a>
    <a class="btn --solid --icon-right --medium">Zobacz</a>

    <a class="btn --solid --large">Zobacz</a>
    <a class="btn --solid --icon-left --large">Zobacz</a>
    <a class="btn --solid --icon-right --large">Zobacz</a>

    <a class="btn --outline">Zobacz</a>
    <a class="btn --outline --icon-left">Zobacz</a>
    <a class="btn --outline --icon-right">Zobacz</a>

    <a class="btn --outline">Zobacz</a>
    <a class="btn --outline --icon-left">Zobacz</a>
    <a class="btn --outline --icon-right">Zobacz</a>

    <a class="btn --outline --small">Zobacz</a>
    <a class="btn --outline --icon-left --small">Zobacz</a>
    <a class="btn --outline --icon-right --small">Zobacz</a>

    <a class="btn --outline --medium">Zobacz</a>
    <a class="btn --outline --icon-left --medium">Zobacz</a>
    <a class="btn --outline --icon-right --medium">Zobacz</a>

    <a class="btn --outline --large">Zobacz</a>
    <a class="btn --outline --icon-left --large">Zobacz</a>
    <a class="btn --outline --icon-right --large">Zobacz</a>

    <button>button</button>
    <button class="--small">button</button>
    <button class="--medium">button</button>
    <button class="--large">button</button>

</div>

<!-- inputs -->

<div id="inputs">

    <!-- text -->
    <form>
        <div class="relative_wrapper">
            <input type="text" id="fname" name="fname">
            <label class="control-label" for="fname">First name:</label>
        </div>
        <div class="relative_wrapper">
            <input type="text" id="lname" name="lname">
            <label class="control-label" for="lname">Last name:</label>
        </div>
        <input type="submit">
    </form>
    <!-- password -->
    <form>
        <div class="relative_wrapper">
            <input type="password" id="pass" name="pass">
            <label class="control-label" for="pass">Password:</label>
        </div>
            <input type="submit">
    </form>
    <!-- radio -->
    <form>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>
    </form>
    <!-- checkbox -->
    <form>
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
        <label for="vehicle1"> I have a bike</label><br>
        <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
        <label for="vehicle2"> I have a car</label><br>
        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
        <label for="vehicle3"> I have a boat</label>
    </form>
    <!-- color -->
    <form>
        <label for="favcolor">Select your favorite color:</label>
        <input type="color" id="favcolor" name="favcolor">
    </form>
    <!-- date -->
    <form>
        <label for="datemax">Enter a date before 1980-01-01:</label>
        <input type="date" id="datemax" name="datemax" max="1979-12-31"><br><br>
        <label for="datemin">Enter a date after 2000-01-01:</label>
        <input type="date" id="datemin" name="datemin" min="2000-01-02">
    </form>
    <!-- datetime-local -->
    <form>
        <label for="birthdaytime">Birthday (date and time):</label>
        <input type="datetime-local" id="birthdaytime" name="birthdaytime">
    </form>
    <!-- email -->
    <form>
        <div class="relative_wrapper">
            <input type="email" id="email" name="email">
            <label class="control-label" for="email">Enter your email:</label>
        </div>
    </form>
    <!-- file -->
    <form>
        <label for="myfile">Select a file:</label>
        <input type="file" id="myfile" name="myfile">
    </form>
    <!-- month -->
    <form>
        <label for="bdaymonth">Birthday (month and year):</label>
        <input type="month" id="bdaymonth" name="bdaymonth">
    </form>
    <!-- number -->
    <form>
        <label for="quantity">Quantity (between 1 and 5):</label>
        <input type="number" id="quantity" name="quantity" min="1" max="5">
    </form>
</div>

<div class="options">
    <label for="cars">Choose a car:</label>

    <select id="cars">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="opel">Opel</option>
        <option value="audi">Audi</option>
    </select>
</div>



<?php get_footer(); ?>
