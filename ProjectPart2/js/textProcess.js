function preProcess(){
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var emailConfirm = document.getElementById("emailConfirm").value;
    var message = document.getElementById("message").value;

    if(email.trim() == emailConfirm.trim()){
        var dataString = 'name='+ name + '&email=' + email +'&message=' + message;
        $.ajax({
            type:"post",
            url: "contact.php",
            data:dataString,
            cache:false,
            success: function(){
                $('#success').html("<br><br>Submission Success!");
            }
        });
    }
    else{
        $('#success').html("<br><br>Your email addresses don't match, please try again");
        console.log("HI");
    }
}
function clearName(s){
    if (s.value.trim()=="Enter your name"){
        s.value="";
    }
    document.getElementById("showName").style.display="block";
}
function clearEmail(s){
    if (s.value.trim()=="Enter your e-mail"){
        s.value="";
    }
    document.getElementById("showEmail").style.display='block';
}
function clearEmail2(s){
    if (s.value.trim()=="Please confirm e-mail"){
        s.value="";
    }
    document.getElementById("showEmail2").style.display='block';
}
function clearMessage(s){
    if (s.value.trim()=="Enter your message"){
        s.value="";
    }
    document.getElementById("showMessage").style.display='block';
}