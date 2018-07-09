<?php
// 入职培训要求重新看一遍官方英文文档，为了方便我就收集一些中英文文档差异

// 基础语法部分

// PHP 标记
/**
 * php的标记语法，目前只推荐 <?php ?>（纯php脚本时，后半部分建议省略）
 */
// 英文文档：增加了7.0.0与5.4.0的更新说明
// 7.0.0    从PHP中删除ASP标记<％，％>，<％=和脚本标记<script language ="php">。
// 5.4.0    无论short_open_tag在ini中如何设置，标签<?=始终可用。

// 从 HTML 中分离
/**
 * php的四种标记，PHP 7删除了对ASP标记和<script language ="php">标记的支持，推荐 <?php ?>与 <?= ?>增加兼容性
 */
//英文文档：增加了7.0.0的更新说明

// 指令分隔符
/**
 * 有以下三种方式
<?php
echo "This is a test";
?>

<?php echo "This is a test" ?>

<?php echo 'We omitted the last closing tag';
 */

// 注释
/**
 * 三种注释风格，#与//相同
 */
