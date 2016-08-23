<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-3-26
 * Time: 上午10:43
 * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
 */


/**
 * send_weibo  发布动态
 * @param $content
 * @param $type
 * @param string $feed_data
 * @param string $from
 * @return bool
 * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
 */
function send_weibo($content,$type,$feed_data = '', $from = ''){

    $uid = is_login();

    D('Weibo/Topic')->addTopic($content);
    $weibo_id = D('Weibo')->addWeibo($uid, $content, $type, $feed_data,$from);
    if (!$weibo_id) {
       return false;
    }
    action_log('add_weibo', 'weibo', $weibo_id, $uid);
    $uids = get_at_uids($content);
    send_at_message($uids, $weibo_id, $content);
    clean_query_user_cache(is_login(), array('weibocount'));
    return $weibo_id;

}

/**
 * send_comment  发布评论
 * @param $weibo_id
 * @param $content
 * @param int $comment_id
 * @return bool
 * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
 */
function send_comment($weibo_id, $content, $comment_id = 0){
    $uid = is_login();
    $result = D('WeiboComment')->addComment($uid, $weibo_id, $content, $comment_id);
    if (!$result) {
        return false;
    }
    //行为日志
    action_log('add_weibo_comment', 'weibo_comment', $result, $uid);
    //通知动态作者
    $weibo = D('Weibo')->getWeiboDetail($weibo_id);
    $message_content=array(
        'keyword1'=>  parse_content_for_message($content),
        'keyword2'=>'评论我的微博：',
        'keyword3'=>$weibo['type']=='repost'?"转发微博":parse_content_for_message($weibo['content'])
    );
    send_comment_message($weibo['uid'], $weibo_id, $message_content);
    //通知回复的人
    if ($comment_id) {
        $comment = D('WeiboComment')->getComment($comment_id);
        if ($comment['uid'] != $weibo['uid']) {
            send_comment_message($comment['uid'], $weibo_id, $message_content);
        }
    }

    $uids = get_at_uids($content);
    $uids = array_subtract($uids, array($weibo['uid'], $comment['uid']));
    $message_at_content=array(
        'keyword1'=>  parse_content_for_message($content),
        'keyword2'=>'评论微博时@了你：',
        'keyword3'=>$weibo['type']=='repost'?"转发微博":parse_content_for_message($weibo['content'])
    );
    send_at_message($uids, $weibo_id, $message_at_content);
    return $result;
}

/**
 * send_comment_message 发送评论消息
 * @param $uid
 * @param $weibo_id
 * @param $message
 * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
 */
function send_comment_message($uid, $weibo_id, $message){
    $title = L('_COMMENT_MESSAGE_');
    $from_uid = is_login();
    send_message($uid,$title, $message,  'Weibo/Index/weiboDetail',array('id' => $weibo_id), $from_uid, 'Weibo','Common_comment');
}


/**
 * send_at_message  发送@消息
 * @param $uids
 * @param $weibo_id
 * @param $content
 * @author:xjw129xjt(肖骏涛) xjt@ourstu.com
 */
function send_at_message($uids, $weibo_id, $content)
{
    $my_username = get_nickname();
    $title = $my_username . '@了您';
    $fromUid = get_uid();
    send_message($uids, $title, $content, 'Weibo/Index/weiboDetail',array('id' => $weibo_id), $fromUid, 'Weibo','Common_comment');
}

function parse_topic($content){
    //找出话题
    $topic = get_topic($content);

    //将##替换成链接
    foreach ($topic as $e) {
        $tik = D('Weibo/Topic')->where(array('name' => $e))->find();

        //没有这个话题的时候创建这个话题
        if($tik){
            //D('Weibo/Topic')->add(array('name'=> $e));
            $space_url = U('Weibo/Topic/index',array('topk'=>urlencode($e)));
            if(modC('HIGH_LIGHT_TOPIC',1,'Weibo')) {
                $content = str_replace("#$e#", " <a class='label label-badge label-info'  href=\"$space_url\" target=\"_blank\">#$e# </a> ", $content);
            }else{
                $content = str_replace("#$e#", " <a href=\"$space_url\" target=\"_blank\">#$e# </a> ", $content);
            }
        }
    }

    //返回替换的文本
    return $content;
}

function get_topic($content){
    //正则表达式匹配
    $topic_pattern = "/#([^\\#|.]+)#/";
    preg_match_all($topic_pattern, $content, $users);

    //返回话题列表
    return array_unique($users[1]);
}



function use_topic(){
    $topic = modC('USE_TOPIC');

    if(empty($topic)){
       return;
    }
    $topics =explode(',',$topic);
    $html = '';
    foreach($topics as $k=>$v){
        $v  = '#'.$v.'#';
        $html .= '<a href="javascript:" class="recom-topic" data-role="chose_topic">'.$v.'</a> ';
    }
    unset($k,$v);

    return $html;

}


function parse_content_for_message($content)
{
    $content = shorten_white_space($content);
    $content = op_t($content, false);
    $content = parse_url_link($content);

    $content = parse_expression($content);
    return $content;
}

