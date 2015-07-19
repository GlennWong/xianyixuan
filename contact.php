<?php
/*
 * Template Name:  联系我们
 *
 * @file           contact.php
 * @package        闲逸轩
 * @author         Legstrong
 * @copyright      2014 Legstrong
 * @version        Release: 1.0
 */get_header(); ?>
<?php breadcrumb();?>
<div class="mapbanner" id="dituContent"></div>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
<script type="text/javascript">
	//创建和初始化地图函数：
	function initMap(){
		createMap();//创建地图
		setMapEvent();//设置地图事件
		addMapControl();//向地图添加控件
		addRemark();//向地图中添加文字标注
	}

	//创建地图函数：
	function createMap(){
		var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
		var point = new BMap.Point(116.372272,39.997002);//定义一个中心点坐标
		map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
		window.map = map;//将map变量存储在全局
	}

	//地图事件设置函数：
	function setMapEvent(){
		map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
		map.enableScrollWheelZoom();//启用地图滚轮放大缩小
		map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
		map.enableKeyboard();//启用键盘上下左右键移动地图
	}

	//地图控件添加函数：
	function addMapControl(){
		//向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
	map.addControl(ctrl_nav);
		//向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
	map.addControl(ctrl_ove);
		//向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
	}

	//文字标注数组
	var lbPoints = [{point:"116.372223|39.997161",content:"创知营销"}
	 ];
	//向地图中添加文字标注函数
	function addRemark(){
		for(var i=0;i<lbPoints.length;i++){
			var json = lbPoints[i];
			var p1 = json.point.split("|")[0];
			var p2 = json.point.split("|")[1];
			var label = new BMap.Label("<div style='padding:2px;'>"+json.content+"</div>",{point:new BMap.Point(p1,p2),offset:new BMap.Size(3,-6)});
			map.addOverlay(label);
			label.setStyle({borderColor:"#999"});
		}
	}

	initMap();//创建和初始化地图

</script>

<div class="container contact">
	<div class="row">
		<div class="col-4 contact-info">
			<div class="col-3 contact-icon">
				<span class="fa-stack fa-3x">
					<i class="fa fa-circle fa-stack-2x" style="color:#F5C63A;"></i>
					<i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
				</span>
			</div>
			<div class="col-9 contact-desc">
				<dt>主教学点</dt>
				<dd>北京市海淀区中关村南大街乙12号天作商城一层北区闲艺轩</dd>
			</div>
			<div class="col-3 contact-icon">
				<span class="fa-stack fa-3x">
					<i class="fa fa-circle fa-stack-2x" style="color:#6FC8E8;"></i>
					<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
				</span>
			</div>
			<div class="col-9 contact-desc">
				<dt>咨询电话</dt>
				<dd>153-4005-8648 010-82101245</dd>
			</div>
			<div class="col-3 contact-icon">
				<span class="fa-stack fa-3x">
					<i class="fa fa-circle fa-stack-2x" style="color:#9BC73E;"></i>
					<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
				</span>
			</div>
			<div class="col-9 contact-desc">
				<dt>公司邮箱</dt>
				<dd>Sanqiandichan@sina.com</dd>
			</div>
		</div>
		<form class="col-8 contact-form">
			<fieldset>
				<legend>给我们留言，保持随时联系！</legend>
				<div class="col-6">
					<input type="text" placeholder="姓名">
				</div>
				<div class="col-6">
					<input type="text" placeholder="邮箱">
				</div>
				<div class="col-12">
					<textarea name="" id="" placeholder="留言…" cols="100%" rows="10"></textarea>
				</div>
				<div class="col-12">
					<input type="submit" value="提交">
				</div>
			</fieldset>
		</form>
	</div>
</div>

<?php get_footer(); ?>