$(document).ready(function () {
    $('.btn').click(function () {
        let email = $("#email").val();
        let psw = $("#psw").val();
        let confirmpsw = $("#confirm-psw").val();
        $(".error-msg").remove();
        let isvalid = true;
       $("input").each(function(){
        if($(this).val()==""){
           const  id = $(this).next().attr("id");
                $(`#${id}`).html("<span class = 'error-msg'  style = 'color :red;'>Please fill the values!</span>");
                isvalid = false;
             

        }
       })
        const emailPattern = /^[^\s@]+@[^\s@]+\.(com|org)$/;
        const validEmail = emailPattern.test(email);
        // valid password conditons start 
        function validatePassword(password) {
    let hasDigit = false;
    let hasUppercase = false;
    let hasLowercase = false;
    let hasSpecialChar = false;
    const specialChars = "!@#$%^&*()_+-=[]{}|;:'\",.<>?/`~";

    // Iterate through each character in the password
    for (const char of password) {
        // Check if the character is a digit
        if (char >= '0' && char <= '9') {
            hasDigit = true;
        }
        // Check if the character is an uppercase letter
        else if (char >= 'A' && char <= 'Z') {
            hasUppercase = true;
        }
        // Check if the character is a lowercase letter
        else if (char >= 'a' && char <= 'z') {
            hasLowercase = true;
        }
        // Check if the character is a special character
        else if (specialChars.includes(char)) {
            hasSpecialChar = true;
        }
    }

    // Return true if all conditions are met
    return hasDigit && hasUppercase && hasLowercase && hasSpecialChar;
}
        // end valid password conditons
        let validpass = validatePassword(psw);
        let confrmpassvalid = validatePassword(confirmpsw)
       if(!validEmail && email != ""){
           $("#emailres").html("<span style = 'color :red;'>Invalid email format!</span>");
           return false;
       }
       else if(((!validpass  || psw.length < 8 )&& psw != "")){
            $("#pass").html("<span class = 'error-msg' style = 'color :red;'>Invalid password!</span>")
            isvalid = false;
       }
       if((!confrmpassvalid  || confirmpsw.length < 8 )&& confirmpsw != ""){
        $("#confirmpsw").html("<span class = 'error-msg' style = 'color :red;'>Invalid password!</span>")
        isvalid = false;
       }
       else if(psw != confirmpsw){
        $("#confirmpsw").html("<span class = 'error-msg' style = 'color :red;'>password should be match!</span>")
        isvalid = false;
       }
      if(isvalid){
        $(".error-msg").remove();
        alert("sucessfully register!");
      }


    });

});






