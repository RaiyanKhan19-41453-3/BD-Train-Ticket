function validFname()
{
    var fname = document.getElementById("fname").value;
    const pattern = /(?=.*[a-zA-Z])(?!.*[^a-zA-Z0-9_]).+/;
    
    if(fname != "")
    {
        if(pattern.test(fname))
        {
            document.getElementById("fname-error").innerHTML = "Name is Acceptable";
            return true;
        }
        else
        {
            document.getElementById("fname-error").innerHTML = "Name should contain letters not the specials";
            return false;
        }
    }
    else
    {
        document.getElementById("fname-error").innerHTML = "Name Can't Be Empty";
        return false;
    }
    
}

function validLname()
{
    var lname = document.getElementById("lname").value;
    const pattern = /(?=.*[a-zA-Z])(?!.*[^a-zA-Z0-9_]).+/;
    
    if(lname != "")
    {
        if(pattern.test(lname))
        {
            document.getElementById("lname-error").innerHTML = "Name is Acceptable";
            return true;
        }
        else
        {
            document.getElementById("lname-error").innerHTML = "Name should contain letters not the specials";
            return false;
        }
    }
    else
    {
        document.getElementById("lname-error").innerHTML = "Name Can't Be Empty";
        return false;
    }
    
}

function validAge()
{
    var age = document.getElementById("age").value;
    const pattern = /^(?!.*[^0-9]+).{1,3}$/;

    if(pattern.test(age) && age != "")
    {
        document.getElementById("age-error").innerHTML = "Age is valid";
        return true;
    }
    else
    {
        document.getElementById("age-error").innerHTML = "It should not contain letter and max age is 999";
        return false;
    }
}

function validAddress()
{
    var address = document.getElementById("address").value;
    const pattern = /^[A-Za-z0-9:\.\-_]+$/;

    if(pattern.test(address) && address != "")
    {
        document.getElementById("address-error").innerHTML = "Acceptable address";
        return true;
    }
    else
    {
        document.getElementById("address-error").innerHTML = "Acceptable symbols are capital,small letters, ':', '.', '-', '_'";
        return false;
    }
}

function validEmail()
{
    var email = document.getElementById("email").value;
    const pattern = /^[A-Za-z0-9_]+@[A-Za-z]+\.com$/;

    if(pattern.test(email) && email != "")
    {
        document.getElementById("email-error").innerHTML = "Acceptable Email";
        return true;
    }
    else
    {
        document.getElementById("email-error").innerHTML = "Invalid Email";
        return false;
    }
}

function validMobile()
{
    var mobile = document.getElementById("mobile").value;
    const pattern = /^(?!.*[^0-9]+).{11}$/;

    if(pattern.test(mobile) && mobile != "")
    {
        document.getElementById("mobile-error").innerHTML = "Mobile number is valid";
        return true;
    }
    else
    {
        document.getElementById("mobile-error").innerHTML = "It's length should be 11 and can only contain numbers";
        return false;
    }
}

function validConfirmedMobile()
{
    var mobile = document.getElementById("mobile").value;
    var con_mobile = document.getElementById("confirmed_mobile").value;

    if(mobile == con_mobile && con_mobile != "")
    {
        document.getElementById("confirmedMobile-error").innerHTML = "Mobile number is valid";
        return true;
    }
    else
    {
        document.getElementById("confirmedMobile-error").innerHTML = "Mobile number doesn't match";
        return false;
    }
}

function validateForm()
{
    if(validFname() && validLname() && validAge() && validAddress() && validEmail() && validMobile() && validConfirmedMobile())
    {
        if(confirmation())
        {
            myajax();
            return true;
        }
        else
        {
            return false;
        }
    }
    {
        document.getElementById("submit-error").innerHTML = "Fill out the form properly";
        return false;
    }
}

function confirmation()
{
    if (confirm("Are you sure?") == true) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

function validOldPassword()
{
    var pass = document.getElementById("hidden_password").innerHTML;
    if(pass == document.getElementById("oldpassword").value && document.getElementById("oldpassword").value != "")
    {
        document.getElementById("oldpassword-error").innerHTML = "Password is matching with old password";
        return true;
    }
    else
    {
        document.getElementById("oldpassword-error").innerHTML = "Password is not matching with old password";
        return false;
    }
}

function validPassword()
{
    var pass = document.getElementById("new_password").value;
    const pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?!.*[^A-Za-z0-9_\- ]).{8,}$/;

    if(pattern.test(pass) && pass != "")
    {
        document.getElementById("new_password-error").innerHTML = "Password is valid";
        return true;
    }
    else
    {
        document.getElementById("new_password-error").innerHTML = "It's length should be greater than 8 with minimum 1 capital and small letter and number, but no special characters";
        return false;
    }
}

function validConfirmedPassword()
{
    var pass = document.getElementById("confirmed_password").value;
    if(pass == document.getElementById("new_password").value && pass != "")
    {
        document.getElementById("confirmed_password-error").innerHTML = "Password is equal";
        return true;
    }
    else
    {
        document.getElementById("confirmed_password-error").innerHTML = "Password is not equal";
        return false;
    }
}

function passwordForm()
{
    if(validPassword() && validConfirmedPassword() && validOldPassword())
    {    
        if(confirmation())
        {
            passwordajax();
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        document.getElementById("form_password_error").innerHTML = "Please follow the rules that is being present";
        return false;
    }
}

function testingId()
{
    
    var other_ticket = document.getElementById("other_ticket").value
    var other_user = document.getElementById("other_user").value
    if(other_ticket == "" || other_user == "")
    {
        document.getElementById("other_user_id_error").innerHTML = "Fil out Both boxes";
    }
    else
    {
        var myxhttp = new XMLHttpRequest();

        myxhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                if(this.responseText == "You did not buy the ticket id you mentioned")
                {
                    document.getElementById("other_user_id_error").innerHTML = "The other user did not purchase the id you mentioned";
                }
                else
                {
                    document.getElementById("other_user_id_error").innerHTML = this.responseText;
                }
                
            }
        }

        myxhttp.open("POST", "http://localhost/bangladesh_train_ticket/control/verify_ticket.php", true);
        myxhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        myxhttp.send("ticketid="+other_ticket+"&userid="+other_user);
    }
    
}

function refundRequestajax()
{
    var msg = document.getElementById("ticketid-error").innerHTML;
    var ticket_id = document.getElementById("ticketid").value;
    
    if(msg == "You can not refund ticket that are expired" || msg == "You did not buy the ticket id you mentioned" || msg == "You can't do that" || msg == "It will be done" || msg == "Only numbers" || msg == "" || msg == "You have aready requested it")
    {
        alert("You aen't qualified");
        return false;
    }
    else
    {
        //alert("It will be done");

        var myxhttp = new XMLHttpRequest();
        var ticket_id = document.getElementById("ticketid").value;

        myxhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                if(this.responseText == "Request Submitted Successfully")
                {
                    alert(this.responseText);
                    return true;
                }
                else
                {
                    alert(this.responseText);
                    return false;
                }
                
            }
        }

        myxhttp.open("POST", "http://localhost/bangladesh_train_ticket/control/validating_refund.php", true);
        myxhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        myxhttp.send("ticketid="+ticket_id);
    }
}

function refundajax()
{
    var myxhttp = new XMLHttpRequest();
    var id = document.getElementById("ticketid").value;
    const pattern = /^[0-9]+$/;

    myxhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            console.log(this.responseText);
            if(pattern.test(id))
            {
                if(this.responseText == "You are late")
                {
                    document.getElementById("ticketid-error").innerHTML = "You can not refund ticket that are expired";
                }
                else if(this.responseText == "You did not buy the ticket id you mentioned")
                {
                    document.getElementById("ticketid-error").innerHTML = "You did not buy the ticket id you mentioned";
                }
                else if(this.responseText == "get out")
                {
                    document.getElementById("ticketid-error").innerHTML = "You have aready requested it";
                }
                else
                {
                    document.getElementById("ticketid-error").innerHTML = this.responseText;
                }
            }
            else
            {
                document.getElementById("ticketid-error").innerHTML = "Only numbers";
            }
        }
    }

    myxhttp.open("POST", "http://localhost/bangladesh_train_ticket/control/request_refund.php", true);
    myxhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myxhttp.send("ida="+id);
}

function getajax()
{
    var myxhttp = new XMLHttpRequest();
    var table = document.getElementById("ticket_body");
    var ticket_count = Number(document.getElementById("ticket_count").innerHTML);

    myxhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            var data = JSON.parse(this.responseText);
            //console.log(this.responseText);
            table.innerHTML = "";

            data.forEach(function(item, index)
            {
                var row = table.insertRow(index);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);

                cell4.innerHTML = item.ticket_id;
                cell2.innerHTML = item._from;
                cell3.innerHTML = item._to;
                cell1.innerHTML = item._date;
                cell5.innerHTML = item.quantity;
                cell6.innerHTML = item.Printed;
            });
            ticket_count += 5;
            document.getElementById("ticket_count").innerHTML = ticket_count;
        }
    }

    myxhttp.open("POST", "http://localhost/bangladesh_train_ticket/control/ticket_history.php", true);
    myxhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myxhttp.send("&ticket_count="+ticket_count);
}

function passwordajax()
{
    var myxhttp = new XMLHttpRequest();
    var pass = document.getElementById("new_password").value;

    myxhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            alert(this.responseText);
        }
    }

    myxhttp.open("POST", "http://localhost/bangladesh_train_ticket/control/update_customer_password.php", true);
    myxhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myxhttp.send("password="+pass);
}

function myajax()
{
    var myxhttp = new XMLHttpRequest();
    var name = document.getElementById("fname").value+" "+document.getElementById("lname").value;
    var age = document.getElementById("age").value;
    var address = document.getElementById("address").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;

    myxhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            alert(this.responseText);
        }
    }

    myxhttp.open("POST", "http://localhost/bangladesh_train_ticket/control/validate_updated_profile.php", true);
    myxhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myxhttp.send("name="+name+"&age="+age+"&address="+address+"&email="+email+"&mobile="+mobile);
}





///*
if(window.history.replaceState) 
{
    window.history.replaceState( null, null, window.location.href );
}
//*/