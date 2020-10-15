# typecho

># 准备创建一个基于typecho最新开发版的改版本

> ## day 1
>>2020.05.13
除了评论以外的QQ头像已经完全修改。

>## day 2
>>2020.05.14
基于QQ头像的头像系统已经完成。
>>2020.07.15
评论随机QQ头像已完成
<<<<<<< HEAD

1. 在主题方面，显示QQ输入框需要在主题包的comments.php中
添加以下代码：
~~~
<p>
    <label for="qqnum"<?php if ($this->options->commentsRequireqqnum): ?> class="required"<?php endif; ?>><?php _e('QQ号'); ?></label>
    <input type="text" name="qqnum" id="qqnum" class="text" placeholder="<?php _e('QQ号用于显示头像,空白即不显示'); ?>" value="<?php $this->remember('qqnum'); ?>"<?php if ($this->options->commentsRequireqqnum): ?> required <?php endif; ?> />
</p>
~~~


欢迎提交bug
=======
欢迎提交bug
>>>>>>> 2c75207c895db6754be51b3d0399533af2895654
