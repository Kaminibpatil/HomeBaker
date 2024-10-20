function user_login() {
  var email = user_email();
  var password = user_password1();
  if (email == true && password == true) {
    return true;
  } else return false;
}
function user_email() {
  var email = document.getElementById("email").value;
  var atposition = email.indexOf("@");
  var dotposition = email.lastIndexOf(".");

  if (email === "") {
    document.getElementById("email").classList.add("is-invalid");
    document.getElementById("email-error").innerHTML = "Email is required";
    return false;
  } else if (
    atposition < 1 ||
    dotposition < atposition + 2 ||
    dotposition + 2 >= email.length
  ) {
    document.getElementById("email").classList.add("is-invalid");
    document.getElementById("email-error").innerHTML =
      "Please enter a valid email address";
    return false;
  } else {
    document.getElementById("email").classList.remove("is-invalid");
    document.getElementById("email-error").innerHTML = "";
    return true;
  }
}
function user_password1() {
  var password = document.getElementById("password").value;

  if (password === "") {
    document.getElementById("password").classList.add("is-invalid");
    document.getElementById("pass-error").innerHTML = "Password is required";
    return false;
  } else if (password.length < 8) {
    document.getElementById("password").classList.add("is-invalid");
    document.getElementById("pass-error").innerHTML =
      "Password must be at least 8 characters long";
    return false;
  } else {
    document.getElementById("password").classList.remove("is-invalid");
    document.getElementById("pass-error").innerHTML = "";
    return true;
  }
}

function new_account_validation() {
  var x1 = user_name();
  var x2 = user_phone();
  var x3 = user_emails();
  var x4 = user_password();
  var x5 = user_password2();
  if (x1 == true && x2 == true && x3 == true && x4 == true && x5 == true) {
    return true;
  } else return false;
}

function user_name() {
  var name = document.getElementById("name").value.trim();

  if (name === "") {
    document.getElementById("name").classList.add("is-invalid");
    document.getElementById("name-error").innerHTML = "Name is required";
    return false;
  } else {
    document.getElementById("name").classList.remove("is-invalid");
    document.getElementById("name-error").innerHTML = "";
    return true;
  }
}
function user_phone() {
  var phone = document.getElementById("phone").value;

  if (phone === "") {
    document.getElementById("phone").classList.add("is-invalid");
    document.getElementById("phone-error").innerHTML =
      "Mobile No. is required ";
    return false;
  } else if (phone.length < 10 || isNaN(phone)) {
    document.getElementById("phone").classList.add("is-invalid");
    document.getElementById("phone-error").innerHTML =
      "Please enter a valid phone number";
    return false;
  } else {
    document.getElementById("phone").classList.remove("is-invalid");
    document.getElementById("phone-error").innerHTML = "";
    return true;
  }
}

function user_emails() {
  var email = document.getElementById("cemail").value;
  var atposition = email.indexOf("@");
  var dotposition = email.lastIndexOf(".");

  if (email === "") {
    document.getElementById("cemail").classList.add("is-invalid");
    document.getElementById("cemail-error").innerHTML = "Email is required";
    return false;
  } else if (
    atposition < 1 ||
    dotposition < atposition + 2 ||
    dotposition + 2 >= email.length
  ) {
    document.getElementById("cemail").classList.add("is-invalid");
    document.getElementById("cemail-error").innerHTML =
      "Please enter a valid email address";
    return false;
  } else {
    document.getElementById("cemail").classList.remove("is-invalid");
    document.getElementById("cemail-error").innerHTML = "";
    return true;
  }
}

function user_password() {
  var password = document.getElementById("pass").value;

  if (password === "") {
    document.getElementById("pass").classList.add("is-invalid");
    document.getElementById("pass2-error").innerHTML = "Password is required";
    return false;
  } else if (password.length < 8) {
    document.getElementById("pass").classList.add("is-invalid");
    document.getElementById("pass2-error").innerHTML =
      "Password must be at least 8 characters long";
    return false;
  } else {
    document.getElementById("pass").classList.remove("is-invalid");
    document.getElementById("pass2-error").innerHTML = "";
    return true;
  }
}
function user_password2() {
  var password1 = document.getElementById("pass").value.trim();
  var password2 = document.getElementById("cpass").value.trim();

  if (password2 === "") {
    document.getElementById("cpass").classList.add("is-invalid");
    document.getElementById("pass1-error").innerHTML =
      "Confirm password is required";
    return false;
  } else if (password2 !== password1) {
    document.getElementById("cpass").classList.add("is-invalid");
    document.getElementById("pass1-error").innerHTML = "Passwords does not match";
    return false;
  } else {
    document.getElementById("cpass").classList.remove("is-invalid");
    document.getElementById("pass1-error").innerHTML = "";
    return true;
  }
}

function review_name() {
  var reviewName = document.getElementById("reviewName").value;
  if (reviewName === "") {
    document.getElementById("reviewName").classList.add("is-invalid");
    document.getElementById("reviewName-error").innerHTML = "Name is required";
    return false;
  } else {
    document.getElementById("reviewName").classList.remove("is-invalid");
    document.getElementById("reviewName-error").innerHTML = "";
    return true;
  }
}

function review_desc() {
  var reviewDescription = document.getElementById("reviewDescription").value;
  if (reviewDescription === "") {
    document.getElementById("reviewDescription").classList.add("is-invalid");
    document.getElementById("reviewDescription-error").innerHTML =
      "Review description is required";
    return false;
  } else if (reviewDescription.length < 10) {
    document.getElementById("reviewDescription").classList.add("is-invalid");
    document.getElementById("reviewDescription-error").innerHTML =
      "Review description must be at least 10 characters long.";
    return false;
  } else {
    document.getElementById("reviewDescription").classList.remove("is-invalid");
    document.getElementById("reviewDescription-error").innerHTML = "";
    return true;
  }
}

function review_image() {
  var fileInput = document.getElementById("reviewProfilePic");
  var filePath = fileInput.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

  if (filePath === "") {
    fileInput.classList.add("is-invalid");
    document.getElementById("reviewProfilePic-error").innerHTML =
      "Profile picture is required";
    return false;
  } else if (!allowedExtensions.exec(filePath)) {
    fileInput.classList.add("is-invalid");
    document.getElementById("reviewProfilePic-error").innerHTML =
      "Only JPG, JPEG, and PNG files are allowed";
    fileInput.value = "";
    return false;
  } else {
    fileInput.classList.remove("is-invalid");
    document.getElementById("reviewProfilePic-error").innerHTML = "";
    return true;
  }
}

function review_mob() {
  var reviewmob = document.getElementById("reviewmob").value;
  if (reviewmob === "") {
    document.getElementById("reviewmob").classList.add("is-invalid");
    document.getElementById("reviewmob-error").innerHTML =
      "Mobile No. is required";
    return false;
  } else {
    document.getElementById("reviewmob").classList.remove("is-invalid");
    document.getElementById("reviewmob-error").innerHTML = "";
    return true;
  }
}
function review_rating() {
  var reviewRating = $("#reviewRating .fa-star.checked").length;
  if (reviewRating === 0) {
    $("#reviewRating").addClass("is-invalid");
    $("#reviewRating-error").text("Rating is required");
    return false;
  } else {
    $("#reviewRating").removeClass("is-invalid");
    $("#reviewRating-error").text("");
    return true;
  }
}

function user_review() {
  var x1 = review_name();
  var x2 = review_desc();
  var x3 = review_image();
  var x4 = review_mob();
  var x5 = review_rating();

  if (x1 && x2 && x3 && x4 && x5) {
    return true;
  } else {
    return false;
  }
}


function usermail(){
  var femail = document.getElementById("femail").value;
  var atposition = femail.indexOf("@");
  var dotposition = femail.lastIndexOf(".");

  if (femail === "") {
    document.getElementById("femail").classList.add("is-invalid");
    document.getElementById("femail-error").innerHTML = "Email Id is required";
    return false;
  } else if (
    atposition < 1 ||
    dotposition < atposition + 2 ||
    dotposition + 2 >= femail.length
  ) {
    document.getElementById("femail").classList.add("is-invalid");
    document.getElementById("femail-error").innerHTML =
      "Please enter a valid email address";
    return false;
  } else {
    document.getElementById("femail").classList.remove("is-invalid");
    document.getElementById("femail-error").innerHTML = "";
    return true;
  }
}

function mail(){
  var x1 = usermail();
  if (x1) {
    return true;
  } else {
    return false;
  }
}

