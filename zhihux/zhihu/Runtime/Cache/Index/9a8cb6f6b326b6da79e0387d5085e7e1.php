<?php if (!defined('THINK_PATH')) exit(); if(is_array($qList)): foreach($qList as $key=>$q): ?><div class="q-c-each">
		<div class="q-c-each-top">
			<div class="left"><a href="<?php echo U('Index/Index/qsearch',array('n'=>$q['category'],'c'=>$q['categoryName']));?>"><i class="icon-th-list"></i> <?php echo ($q["categoryName"]); ?></a>(<?php echo ($q["questionTypeName"]); ?>)</div>
			<div class="right"><a href="<?php echo U('Index/User/infocenter',array('id'=>$q['questionUserID']));?>"><i class="icon-user"></i> <?php echo ($q["userName"]); ?></a>发布于 <span class="time"><?php echo (showfriendlytime($q["entityUpdateVersion"])); ?></span></div>
		</div>
		<div class="q-c-each-content">
			<?php echo ($q["questionContent"]); ?>
			<div class="tag">
				<?php if(is_array($q['tag'])): foreach($q['tag'] as $key=>$t): ?><a href="<?php echo U('Index/Index/qsearch',array('t'=>$t));?>"><i class="icon-tags"></i> <?php echo ($t); ?></a><?php endforeach; endif; ?>
			</div>
		</div>
		<div class="q-c-each-link" vel="<?php echo ($q["id"]); ?>">
			<a href="javascript:void(0)" for="addAnswer"><i class="icon-pencil"></i> 我知道答案(已有<span for="answerCount"><?php echo ($q["answerCount"]); ?></span>人回答)</a>
			<a href="javascript:void(0)" for="addFollow"><i class="icon-plus-sign"></i> 关注(<span for="followCount"><?php echo ($q["followCount"]); ?></span>)</a>
			<a href="javascript:void(0)" for="comment"><i class="icon-comment"></i> 评论(<span for="commentCount"><?php echo ($q["commentCount"]); ?></span>)</a>
			<a href="javascript:void(0)" for="addGoodReputation"><i class="icon-thumbs-up"></i> 赞(<span for="goodReputation"><?php echo ($q["goodReputation"]); ?></span>)</a>
			<a href="javascript:void(0)" for="addBadReputation"><i class="icon-thumbs-down"></i> 鄙(<span for="badReputation"><?php echo ($q["badReputation"]); ?></span>)</a>
		</div>
		<div class="q-c-each-comment">
			<!-- <?php if(is_array($q['commentList'])): foreach($q['commentList'] as $key=>$c): ?><div class="q-c-each-comment-v">
					<a for="user" href="<?php echo U('Index/User/infocenter',array('id'=>$c['userId']));?>"><?php echo ($c["userName"]); ?></a>
					<?php echo ($c["commentContent"]); ?>
					<span class="time"><?php echo (showfriendlytime($c["entityUpdateVersion"])); ?></span><a for="replyComment" rel="<?php echo ($c["userName"]); ?>" href="javascript:void(0)">回复</a>
				</div><?php endforeach; endif; ?> -->
			<div class="commentEntities">
			</div>
			<div class="q-c-each-comment-v">
				<textarea for="comment" class="span6 c"></textarea>
				<input type="button" vel="<?php echo ($q["id"]); ?>" class="btn btn-info" value="评论" />
			</div>
		</div>
	</div><?php endforeach; endif; ?>