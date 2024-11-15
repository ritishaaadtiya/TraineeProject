function checkvalidation(){
    let UserEmail = document.getElementById('email').value;
    let password = document.getElementById('psw').value;
        // Clear previous messages
        document.getElementById('emailMessage').textContent = "";
        document.getElementById('passwordMessage').textContent = "";
        const emailPattern = /^[^\s@]+@[^\s@]+\.(com|org)$/;
        let validemail = emailPattern.test(UserEmail);
    if(UserEmail == "" || password == ""){
        document.getElementById('emailMessage').textContent = "Please Fill the value";
        document.getElementById('passwordMessage').textContent = "Please Fill the value";
    
       
        return false;
    }
    else if(!validemail){
        document.getElementById('emailMessage').textContent = "Invali Email Format!";
        return false;
    }
    else{        
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
        let Validpass = validatePassword(password);
        if(!Validpass || password.length < 8){
            document.getElementById('passwordMessage').textContent = "Invalid Password";
            return false;
        }
      
    }
 
    return true;
}