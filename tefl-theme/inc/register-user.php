<?php

add_action('rest_api_init', 'registerUser');

function registerUser(){
  register_rest_route('user/v1/', 'registerUser',array(
    'methods' =>'POST',
    'callback' => 'registerUserProcess'
  ));
}

function registerUserProcess($data){
  $username = $data['user_name'];
  $email = $data['email'];
  $first_name = $data['first_name'];
  $last_name = $data['last_name'];
  $second_name = $data['second_name'];
  $new_pass = $data['new_password'];
  $rep_pass = $data['rep_password'];


  if(!validateUsername($username)){
    echo "**invalidUsername**";
    return false;
  }
  if(!validateEmail($email)){
    echo "**invalidEmail**";
    return false;
  }
  if(!validateFirstName($first_name)){
    echo "**invalidFirstName**";
    return false;
  }
  if(!validateLastName($last_name)){
    echo "**invalidLastName**";
    return false;
  }
  if(!validatePassword($new_pass, $rep_pass)){
    echo "**invalidPassword**";
    return false;
  }

  if(usernameTaken($username)) return false;
  if(emailTaken($email)) return false;

  if(!createUser(array('user_pass'=> $new_pass, 'user_login'=> $username, 'user_email'=>$email, 'first_name'=>$first_name, 'last_name'=>$last_name))) return false;

  echo "@@registrationSuccess@@";
  return true;
}

function validateEmail($email){
    if($email==null || $email =="") return false;
    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
      return false;
    }
    if(strlen($email)>100) return false;
    return true;
  }

function validateUsername($username){
    if($username==null || $username =="") return false;
    $chars= str_split($username);
    for($i=0; $i<sizeof($chars) ; $i++){
      if(!preg_match("/([A-Z]|[a-z]|[0-9])+/", $chars[$i])) return false;
    }
    return true;
  }

function validateFirstName($first_name){
    if($first_name==null || $first_name=="" || $first_name==" ") return false;
    if(strlen($first_name) > 30) return false;
    return true;
  }

function validateLastName($last_name){
    if($last_name==null || $last_name=="" || $last_name==" ") return false;
    if(strlen($last_name) > 30) return false;
    return true;
  }

function validatePassword($new_pass, $rep_pass){
    if($new_pass==null || $rep_pass==null) return false;
    if($new_pass != $rep_pass) return false;
    if($new_pass > 50 ) return false;
    return true;
  }

function usernameTaken($username){

        $user = get_user_by( 'login', $username);

        if(!empty( $user )){
          echo "**usernameTaken**";
          return true;
        }
        echo " username okay ";
      return false;

  }

function emailTaken($email){

    $user = get_user_by( 'email', $email);

    if(!empty( $user )){
      echo "**emailTaken**";
      return true;
    }
    echo "email ok ";
  return false;

  }

function createUser($user_data){
    $user_id = wp_insert_user($user_data);
    if ( is_wp_error( $user_id ) ) {
      echo "**errorInInsertion**";
      print_r($user_id);
      return false;
  }
  return true;
}
