<?php

add_action('rest_api_init', 'verifyCode');

function verifyCode(){
  register_rest_route('user/v1/', 'verifyCode',array(
    'methods' =>'POST',
    'callback' => 'verifyCodeData'
  ));
}

function verifyCodeData($data){
  $codeQuery = new Wp_Query(array(
    'post_type'=>'userCodes',
    'meta_query'=>array(
      array(
        'key'=>'code',
        'value'=>$data['code'],
        'compare'=>'=',
      ),
    ),
  ));


  $userId = 0;
  $date = '';
  while($codeQuery->have_posts()){
    $codeQuery->the_post();
    $userId=get_the_author_id();
    $date=get_field('date');
  }

  if($userId==0) return;

  $user_info = get_userdata($userId);
  $user_name = $user_info->first_name . ' ' . $user_info->last_name;

  //echo "//user_name:" . $user_name;
  //echo "//date:" . $date;

  $sendData = array(
    'user_name'=>$user_name,
    'date'=>$date,
    'sucess'=>1,
  );



  return json_encode($sendData);

}
