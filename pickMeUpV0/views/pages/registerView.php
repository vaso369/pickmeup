<main class="mainView backgrd">
    <div class="wrapper">
        <article class="homeView" id="registerView">
            <div id="feedback"></div>
            <form id="registerForm" method="POST">
            <input type="text" name="fname" id="tbFname" placeholder="Please enter your first name..."/>
            <div class="nevidljiv">Your name has to be in a regular format!</div>
            <input type="text" name="lname" id="tbLname" placeholder="Please enter your last name..."/>
            <div class="nevidljiv">Your last name has to be in a regular format!!</div>
            <select id="ddlCity" name="ddlCity">
                <option value="0" class="others">Choose your city</option>
            <?php
                include "models/getCities.php";
             ?>
     
            </select>
            <div class="nevidljiv">You have to choose city!</div>
            <select id="ddlUniversity">
            <option value="0" class="others">Choose your university</option>
     

            </select>             
            <div class="nevidljiv">You have to choose university!</div>
            <input type="text" name="username" id="tbUsername" placeholder="Please enter your username..."/>
            <div class="nevidljiv">Please choose properly username with all lowercase!</div>
            <input type="password" name="password" id="tbPass" placeholder="Please enter your password..."/>
            <div class="nevidljiv">Password must be at least 8 charachters long!</div>
            <input type="text" name="email" id="tbEmail" placeholder="Please enter your email..."/>
            <div class="nevidljiv">You have to enter a valid email format!</div>
            <input type="button" id="btnRegister" name="Register" value="Register"/></a>
            </form>
        </article>
    </div>
</main>