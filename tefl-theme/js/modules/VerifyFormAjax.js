import $ from 'jquery';

class VerifyFormAjax{
  constructor(){
    this.form = document.getElementById('verify-form');
    if(!this.form) return;
    this.code = document.getElementById('verify-code');
    this.invalid = document.getElementById('verify-invalid');
    this.verifyTarget = document.getElementById('verify-target');
    this.nameTarget = document.getElementById('verify-name');
    this.dateTarget= document.getElementById('verify-date');
    this.invalidTarget= document.getElementById('verify-invalid');
    this.events();
  }

  events(){
    let _this=this;
    this.form.addEventListener('submit',function(event){
      event.preventDefault();
      _this.sendCode(_this);
    });
  }

  sendCode(_this){
    _this.invalidTarget.style.display='none';
    _this.verifyTarget.style.display='none';
        let verifyCode = _this.code.value;
    if(verifyCode.length!=8){
      _this.invalid.style.diplay='block';
      return;
    }

      $.ajax({
        /*
        beforeSend:(xhr)=>{
          xhr.setRequestHeader('X-WP-Nonce', kanjiAppData.nonce)
        },
        */
        url: AppData.root_url + '/wp-json/user/v1/verifyCode',
        type:'POST',
        data:{
            'code':verifyCode
        },
        success:(response)=>{
          let userData = JSON.parse(response);
          if(userData && userData.sucess=='1'){
            // console.log("sucess status 1");
            // console.log(userData.user_name);
            // console.log(userData.date);
            _this.verifyTarget.style.display='block';
            _this.nameTarget.innerHTML=userData.user_name;
            _this.dateTarget.innerHTML=userData.date;
          }else{
            //console.log("sucess no status")
            _this.invalidTarget.style.display='block';
          }
          //console.log(response);
          //console.log(response.responseText);
        },
        error:(response)=>{
          //console.log("error in ajax");
          _this.invalidTarget.style.display='block';
        //  console.log(response);
        //  console.log(response.responseText);
        }
      });

  }
}








export default VerifyFormAjax;
