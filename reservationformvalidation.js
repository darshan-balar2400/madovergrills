function Submit() {

    var name = document.getElementById('name');
    var email = document.getElementById("email");
    var branch = document.getElementById("branch");
    var phno = document.getElementById('phno');
    var people = document.getElementById("person");
    var error = document.getElementsByName('error');
    var date = document.getElementById("date");
    var time = document.getElementById("time");

    if (name.value == "") {
        error[0].innerHTML = "** Filed Is Required !";
        name.focus();
        return false;
    } else {
        if (name.value.length <= 2 || name.value.length >= 20) {
            error[0].innerHTML = "** Name Length Should Be Between 2 And 20";
            name.focus();
            return false;
        }
        if (!isNaN(name.value) == true) {
            error[0].innerHTML = "** Name is not valid !";
            name.focus();
            return false;
        }

        var d = 0;
        var s = 0;

        for (var i = 0; i < name.value.length; i++) {
            if ((name.value[i] >= 'a' && name.value[i] <= 'z') || (name.value[i] >= 'A' && name.value[i] <= 'Z')) {
                continue;
            } else if (name.value[i] == " ") {
                continue;
            } else if (name.value[i] >= '0' && name.value[i] < '9') {
                d++;
            } else {
                s++;
            }
        }

        if (d > 0) {
            error[0].innerHTML = "** Digits Are Not Allowed !";
            name.focus();
            return false;
        }

        if (s > 0) {
            error[0].innerHTML = "** Special Character Are Not Allowed !";
            name.focus();
            return false;
        } else {
            error[0].innerHTML = "";
        }

    }

    if (email.value == "") {
        error[1].innerHTML = "** Filed Is Required !";
        email.focus();
        return false;
    } else {
        if (!isNaN(email.value) == true) {
            error[1].innerHTML = "** Email Is Valid!";
            email.focus();
            return false;
        }

        var at_pos = email.value.indexOf("@");
        var dot_pos = email.value.lastIndexOf(".");

        if (at_pos < 1 || dot_pos < at_pos + 2 || dot_pos + 2 >= email.value.length) {
            error[1].innerHTML = '** Invalid Email';
            email.focus();
            return false;
        } else {
            error[1].innerHTML = "";
        }

    }

    if (phno.value == "") {
        error[2].innerHTML = "** Field Is Empty!";
        phno.focus();
        return false;
    } else {
        if (phno.value.length < 10 || phno.value.length > 10) {
            error[2].innerHTML = "** Phone No is Not Valid!";
            phno.focus();
            return false;
        }
        if (isNaN(phno.value)) {
            error[2].innerHTML = "** Phone No Is Not Valid !";
            phno.focus();
            return false;
        } else {
            error[2].innerHTML = "";
        }
    }
    // for date

    if (date.value == "") {
        error[3].innerHTML = "** Please select date";
        date.focus();
        return false;
    } else {
        error[3].innerHTML = "";
    }
    if (time.value == "") {
        error[4].innerHTML = "** Please select time ";
        time.focus();
        return false;
    } else {
        error[4].innerHTML = ``;
    }

    return true;
}

function showMenu() {
    let mobile_navbar = document.querySelector('.mobile_navbar');
    mobile_navbar.style.width="10rem";
    mobile_navbar.style.padding="2rem";
}

function closeMenu() {
    let mobile_navbar = document.querySelector('.mobile_navbar');
    mobile_navbar.style.width="0rem";
    mobile_navbar.style.padding="0rem";
}