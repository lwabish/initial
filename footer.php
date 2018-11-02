<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div>
</div>
<footer id="footer">
<div class="container">
<?php if (!empty($this->options->ShowLinks) && in_array('footer', $this->options->ShowLinks)): ?>
<ul class="links">
<?php Links($this->options->IndexLinksSort); ?>
</ul>
<?php endif; ?>
<p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.<?php _e('由 <a href="http://www.typecho.org" target="_blank">Typecho</a> 强力驱动'); ?>.<?php _e('使用 <a href="https://github.com/jielive/initial" target="_blank">Initial</a> 主题'); ?>.</p>
<?php if ($this->options->ICPbeian): ?>
<p><a href="http://www.miitbeian.gov.cn" class="icpnum" target="_blank" rel="nofollow"><?php $this->options->ICPbeian(); ?></a></p>
<?php endif; ?>
</div>
</footer>
<?php if ($this->options->scrollTop == 'able' || ($this->options->MusicSet == 'able' && $this->options->MusicUrl)): ?>
<div id="cornertool">
<ul>
<?php if ($this->options->scrollTop == 'able'): ?>
<li id="top"><a></a></li>
<?php endif; ?>
<?php if ($this->options->MusicSet == 'able' && $this->options->MusicUrl): ?>
<li id="music" class="pause">
<a></a>
<audio id="audio" preload="none"></audio>
</li>
<?php endif; ?>
</ul>
</div>
<?php endif; ?>
<?php if ($this->options->PjaxOption == 'able'): ?>
<script src="//<?php if ($this->options->cjCDN == 'bc'): ?>cdn.bootcss.com/jquery/2.1.4/jquery.min.js<?php elseif ($this->options->cjCDN == 'cf'): ?>cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js<?php else: ?>cdn.jsdelivr.net/npm/jquery@2.1.4/dist/jquery.min.js<?php endif; ?>"></script>
<script src="//<?php if ($this->options->cjCDN == 'bc'): ?>cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js<?php elseif ($this->options->cjCDN == 'cf'): ?>cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js<?php else: ?>cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js<?php endif; ?>"></script>
<script>jQuery.fn.Shake=function(n,d){this.each(function(){var jSelf=$(this);jSelf.css({position:'relative'});for(var x=1;x<=n;x++){jSelf.animate({left:(-d)},50).animate({left:d},50).animate({left:0},50)}});return this};$(document).pjax('a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"], a[no-pjax])',{container:'#main',fragment:'#main',timeout:10000}).on('submit','form[id=search]',function(event){$.pjax.submit(event,{container:'#main',fragment:'#main',timeout:10000})}).on('pjax:send',function(){$("#header").prepend("<div id='bar'></div>")}).on('pjax:complete',function(){ac();ap();setTimeout(function(){$("#bar").remove()},300);$('#header').removeClass("on");$('#s').val("");<?php if ($this->options->CustomContent): ?>if(typeof _hmt!=='undefined'){_hmt.push(['_trackPageview',location.pathname+location.search])};if(typeof ga!=='undefined'){ga('send','pageview',location.pathname+location.search)}<?php endif; ?>});function ac(){function c(){$(i+' a').click(function(){n=$(this).parent().parent().attr("id");$(l).focus()});$('#cancel-comment-reply-link').click(function(){n=''})};$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');var g='.comment-list',h='.comment-num',i='.comment-reply',j='#comment-form',k='#comments',l='#textarea',m='',n='';c();$(j).submit(function(){$.ajax({url:$(this).attr('action'),type:$(this).attr('method'),data:$(this).serializeArray(),error:function(){alert("提交失败，请检查网络并重试或者联系管理员。");return false},success:function(d){try{if(!$(g,d).length){alert("您输入的内容不符合规则或者回复太频繁，请修改内容或者稍等片刻。");return false}else{m=$(g,d).html().match(/id=\"?comment-\d+/g).join().match(/\d+/g).sort(function(a,b){return a-b}).pop();if($('.page-navigator .prev').length&&n==""){m=''}if(n){d=$('#comment-'+m,d).hide();if($('#'+n).find(".comment-children").length<=0){$('#'+n).append("<div class='comment-children' itemprop='discusses'><ol class='comment-list'><\/ol><\/div>")}if(m)$('#'+n+" .comment-children .comment-list").prepend(d);n=''}else{d=$('#comment-'+m,d).hide();if(!$(g).length)$(k).prepend("<h3>已有 <span class='comment-num'>0<\/span> 条评论<\/h3><ol class='comment-list'><\/ol>");$(g).prepend(d)}$('#comment-'+m).fadeIn();var f;$(h).length?(f=parseInt($(h).text().match(/\d+/)),$(h).html($(h).html().replace(f,f+1))):0;TypechoComment.cancelReply();$(l).val('');$(i+' a, #cancel-comment-reply-link').unbind('click');c();if(m){$body.animate({scrollTop:$('#comment-'+m).offset().top-50},300)}else{$body.animate({scrollTop:$('#comments').offset().top-50},300)}}}catch(e){window.location.reload()}}});return false})}ac();function ap(){if($("#protected").length>0){$(function(){$.ajax({url:window.location.href,success:function(d){try{var a=[];$('#protected .post-title a').each(function(i){a[i]=$(this).attr("href")});b=$('form.protected[action^="'+a[0]+'"]',d).attr("action").replace(a[0],"");$('form.protected').each(function(i){$('form.protected[action^="'+a[i]+'"]').attr("action",a[i]+b)})}catch(e){window.location.reload()}}});return false});$('#protected .post-title a, #protected .more a').click(function(){a=$(this).parent().parent();a.find('.word').Shake(2,10).css('color','red');a.find(':password').focus();return false});$('form.protected').submit(function(){$.ajax({url:$(this).attr("action"),type:$(this).attr("method"),data:$(this).serializeArray(),error:function(){alert("提交失败，请检查网络并重试或者联系管理员。");return false},success:function(b){try{if(!$('.post',b).length){alert("对不起,您输入的密码错误。");$(":password").val("");return false}else{$.pjax.reload({container:'#main',fragment:'#main',timeout:10000})}}catch(e){window.location.reload()}}});return false})}}ap()</script>
<?php endif; ?>
<script>document.getElementById("nav-swith").onclick=function(){document.getElementById("header").classList.toggle("on")}</script>
<?php $this->footer(); ?>
<?php if ($this->options->scrollTop == 'able' || $this->options->HeadFixed == 'able'): ?>
<script>window.onscroll=function(){var a=document.documentElement.scrollTop||document.body.scrollTop;<?php if ($this->options->scrollTop == 'able'): ?>var b=document.getElementById("top");if(a>=200){b.style.display="block"}else{b.style.display="none"}b.onclick=function c(){var a=document.documentElement.scrollTop||document.body.scrollTop;if(a>0){requestAnimationFrame(c);window.scrollTo(0,a-(a/5))}else{cancelAnimationFrame(c)}};<?php endif; if ($this->options->HeadFixed == 'able'): ?>var d=document.getElementById("header");if(a<=30){d.style.padding=(15-a/2)+"px 0"}else{d.style.padding=0}<?php endif; ?>}</script>
<?php endif; ?>
<?php if ($this->options->MusicSet == 'able' && $this->options->MusicUrl): ?>
<script>window.onload=function(){var a=document.getElementById("audio");var b=document.getElementById("music");var c=<?php Playlist() ?>;a.src=c.shift();<?php if($this->options->MusicVol): ?>var e=<?php $this->options->MusicVol(); ?>;if(e>=0&&e<=1){a.volume=e}<?php endif; ?>a.addEventListener('play',g);a.addEventListener('pause',h);a.addEventListener('ended',f);a.addEventListener('error',f);a.addEventListener('canplay',j);function f(){if(!c.length){a.removeEventListener('play',g);a.removeEventListener('pause',h);a.removeEventListener('ended',f);a.removeEventListener('error',f);a.removeEventListener('canplay',j);b.setAttribute("style","display:none");alert("本站的背景音乐好像有问题了，希望您可以通过留言等方式通知管理员，谢谢您的帮助。")}else{a.src=c.shift();a.play()}}function g(){b.setAttribute("class","play")}function h(){b.setAttribute("class","pause")}function j(){c.push(a.src)}b.onclick=function(){if(a.canPlayType("audio/mp3")!==""){if(a.paused){if(a.error){f()}else{a.play()}}else{a.pause()}}else{alert("对不起，您的浏览器不支持HTML5音频播放，请升级您的浏览器。")}}}</script>
<?php endif; ?>
<?php if ($this->options->CustomContent): $this->options->CustomContent(); ?>

<?php endif; ?>
</body>
</html><?php if ($this->options->compressHtml == 'able'): $html_source = ob_get_contents(); ob_clean(); print compressHtml($html_source); ob_end_flush(); endif; ?>