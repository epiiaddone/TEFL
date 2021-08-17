import $ from 'jquery';

class MailContent{
  constructor(){
    this.exitButton = $('#mail-content--close');
    if(!this.exitButton) return;
    this.mailContent = $('#mail-content');
    this.setTimeForMail(this.mailContent);
    this.events();
  }

  events(){
    this.exitButton.click(this.removeFixed.bind(this));
  }

  removeFixed(){
    this.exitButton.css('display', 'none');
    this.mailContent.css('position', 'relative');
    this.mailContent.css('margin-bottom', '50px');
  }

  setTimeForMail(mailContent){
    setTimeout(function(){
      mailContent.css('display','flex');
    },5000);
  }
}

export default MailContent;
