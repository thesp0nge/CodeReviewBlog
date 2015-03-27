<?php
require_once( __DIR__ . '/CMySQL.php');
function showComments( $blogId ) {

    $outputComments = '';
    $comments = $GLOBALS['MySQL']->getAll("SELECT * FROM `items_cmts` WHERE `c_item_id` = '{$blogId}' ORDER BY `c_when` DESC LIMIT 5");
    foreach ($comments as $i => $commentInfo) {
        $ts = date('F j, Y H:i', $commentInfo['c_when']);
	$commentInfo['c_name'] = strtr($commentInfo['c_name'],'"','&quot;');
        $outputComments .= <<<EOF
<div class="comment" id="{$commentInfo['c_id']}" data-name="{$commentInfo['c_name']}">
    <p class="commenthead">Comment from {$commentInfo['c_name']} <span>({$ts})</span>:</p>
    <p>{$commentInfo['c_text']}</p>
</div>
EOF;
    }

$outputCommentsBlock = <<<BLOCK
    <div class="container" id="comments">
        <h2>Comments</h2>
        <script type="text/javascript">
        function submitComment(e) {
            var sName = $('#name').val();
            var sText = $('#text').val();

            if (sName && sText) {
                $.post('comments/comment.php', { name: sName, text: sText, id: $blogId },
                    function(data){
                        if (data != '1') {
                          $('#comments_list').fadeOut(1000, function () {
                            $(this).html(data);
                            $(this).fadeIn(1000);
                          });
                        } else {
                          $('#comments_warning2').fadeIn(1000, function () {
                            $(this).fadeOut(1000);
                          });
                        }
                    }
                );
            } else {
              $('#comments_warning1').fadeIn(1000, function () {
                $(this).fadeOut(1000);
              });
            }
        };
        </script>

        <div id="comments_warning1" style="display:none">Don`t forget to fill both fields (Name and Comment)</div>
        <div id="comments_warning2" style="display:none">You can post no more than one comment every 10 minutes (spam protection)</div>
        <div id="comments_list">$outputComments</div>
        <form onsubmit="submitComment(this); return false;">
            <table>
                <tr><td class="label"><label>Your name: </label></td><td class="field"><input type="text" value="" title="Please enter your name" id="name" /></td></tr>
                <tr><td class="label"><label>Comment: </label></td><td class="field"><textarea name="text" id="text"></textarea></td></tr>
                <tr><td class="label">&nbsp;</td><td class="field"><input type="submit" value="Post comment" /></td></tr>
            </table>
        </form>
    </div>
BLOCK;

	echo $outputCommentsBlock;

}

