import $ from 'jquery';

class RegistrationFormAjax{

    constructor(){
      //console.log("inside constructor");
      this.form = document.getElementById("registration-form");
      if(!this.form) return;
      this.passNotMatch = document.getElementById("pass-not-match");
      this.usernameTaken = document.getElementById("username-taken");
      this.emailTaken = document.getElementById("email-taken");
      this.passNotValid = document.getElementById("pass-invalid");
      this.usernameNotValid = document.getElementById("username-invalid");
      this.emailNotValid = document.getElementById("email-invalid");
      this.firstNameNotValid = document.getElementById("first-name-invalid");
      this.lastNameNotValid = document.getElementById("last-name-invalid");

      this.failed = document.getElementById("failed");
      this.success = document.getElementById("success");

      this.username = document.getElementById("username");
      this.firstName = document.getElementById("first_name");
      this.lastName = document.getElementById("last_name");
      this.email = document.getElementById("email");
      this.newPass = document.getElementById("new_pass");
      this.repPass = document.getElementById("rep_pass");
      this.events();
    }

    events(){
      let _this = this;
      this.form.addEventListener("submit", function (event) {
        event.preventDefault();
        _this.passNotMatch.style.display="none";
        _this.usernameTaken.style.display="none";
        _this.emailTaken.style.display="none";
        _this.passNotValid.style.display="none";
        _this.emailNotValid.style.display="none";
        _this.firstNameNotValid.style.display="none";
        _this.lastNameNotValid.style.display="none";
        _this.usernameNotValid.style.display="none";
        _this.failed.style.display="none"
        _this.success.style.display="none"

        if(!_this.checkPasswords(_this)) return false;
        if(!_this.checkEmail(_this)) return false;
        if(!_this.checkUsername(_this)) return false;
        if(!_this.checkFirstName(_this)) return false;
        if(!_this.checkLastName(_this)) return false;

        _this.createUser(_this);

       });
    }

    checkPasswords(_this){
      if( !_this.newPass.value || !_this.repPass.value || _this.newPass.value.length<1 || _this.newPass.length>20){
        _this.passNotValid.style.display="block";
        return false;
      }
        if(_this.newPass.value!=_this.repPass.value){
          _this.passNotMatch.style.display="block";
          return false;
        }

        return true;
    }

    checkEmail(_this){
      let email = _this.email.value;
      if(email===null || email===''){
        _this.emailNotValid.style.display="block";
        return false;
      }
      let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(!re.test(String(email).toLowerCase())){
        _this.emailNotValid.style.display="block";
        return false;
      }
      return true;
    }

    checkUsername(_this){
      let username = _this.username.value;
      if(username===null){
        _this.usernameNotValid.style.display="block";
        return false;
      }
      let match = username.match(/([A-Z]|[a-z]|[0-9])+/);
      if(match===null || match[0].length!==username.length){
        _this.usernameNotValid.style.display="block";
        return false;
      }
      return true;
    }


    checkFirstName(_this){
      let first_name = _this.firstName.value;
      if(first_name===null || first_name===""){
        _this.firstNameNotValid.style.display="block";
        return false;
      }
      return true;
    }

    checkLastName(_this){
      let last_name = _this.lastName.value;
      if(last_name===null || last_name===""){
        _this.lastNameNotValid.style.display="block";
        return false;
      }
      return true;
    }


    createUser(_this){
      $.ajax({
        /*
        beforeSend:(xhr)=>{
          xhr.setRequestHeader('X-WP-Nonce', kanjiAppData.nonce)
        },
        */
        url: AppData.root_url + '/wp-json/user/v1/registerUser',
        type:'POST',
        data:{
          'user_name': _this.username.value,
          'email' : _this.email.value,
          'first_name' : _this.firstName.value,
          'last_name' : _this.lastName.value,
          'new_password' :_this.newPass.value,
          'rep_password' : _this.repPass.value
        },
        success:(response)=>{//this is never reached regardless of succes or failure
          console.log(response);
          console.log(response.responseText);
          if(response.responseText.includes('@@registrationSuccess@@')){
            console.log("sucess from sendRegData");
            _this.failed.style.display="none";
            _this.success.style.display="block";
            (function(){
            window.location.href=AppData.root_url + '/wp-login.php';
          }())
          }else{
            if(response.responseText.includes("**emailTaken**")){
              _this.emailTaken.style.display="block";
            }
            if(response.responseText.includes("**usernameTaken**")){
              _this.usernameTaken.style.display="block";
            }
          console.log("error from sendRegData");
          _this.success.style.display="none";
          _this.failed.style.display="block";
          }
        },
        error:(response)=>{
          console.log(response);
          console.log(response.responseText);
          if(response.responseText.includes('@@registrationSuccess@@')){
            console.log("sucess from sendRegData");
            _this.failed.style.display="none";
            _this.success.style.display="block";
            (function(){
            window.location.href=AppData.root_url + '/wp-login.php';
          }())
          }else{
            if(response.responseText.includes("**emailTaken**")){
              _this.emailTaken.style.display="block";
            }
            if(response.responseText.includes("**usernameTaken**")){
              _this.usernameTaken.style.display="block";
            }
          console.log("error from sendRegData");
          _this.success.style.display="none";
          _this.failed.style.display="block";
          }
        }

      });
    }

}

export default RegistrationFormAjax;
