//function to reveal the user login or register form
function show(id) {
    /*hide all forms
    select the html element with the id within the parentheses and hide it*/
    document.getElementById('registerForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'none';

    /*show the requested form
    select the html element whose id mathches the id parameter passed into the function and set its css display property to block*/
    document.getElementById(id).style.display = 'block';
}