<?php


function getEndResults($input){

try{

global $wpdb;
$prefix = $wpdb->prefix;

$end_score = $wpdb->get_results("
select
max(res.correct_score) score
from
".$prefix."mlw_results res
where
res.quiz_id = 5
and res.deleted = 0
and res.user =" .  get_current_user_id()
);
if($input['debug']==true){
echo "<br>this the is score:";
print_r($end_score[0]->score);
echo "<br>";
}
$percentage = (int)$end_score[0]->score;
if($percentage > 0) return $percentage;
else return 0;
}catch(Error $e){
  if($input['debug']==true){
  print_r($e);
  echo "<br> in the catch";
}
  wp_reset_postdata();
  return 0;
}

}
