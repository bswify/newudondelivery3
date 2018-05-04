<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$projectname  = Yii::getAlias('@web/');

$script = <<< JS

		$(document).ready(function() {

		    // Javascript method's body can be found in assets/js/demos.js
		    // demo.initDashboardPageCharts();




		    //chec First load
		    // get current URL path and assign 'active' class

				/* tag a ตัวไหน มี path ตรงกับปัจจุบัน ให้เพิ่มคลาส active เข้าไปที่ li */
		    var pathnamef = window.location.pathname;
				var projectname = "$projectname";
		    $('.nav > li > a[href="' + pathnamef + '"]').parent().addClass('active');



		    // alert("__" + pathnamef + "__ : __" + pp + "__");
		    // alert(typeof pathnamef);
		    // alert(typeof pp);

				/* ถ้าเปิดหน้าแรก โหลดครั้งแรก */
		    if (pathnamef == projectname) {
		        $('#fdash').addClass('active');
		        // alert("matching")
		    } else {
		        // alert("notmatch")
		    }

				// $(function(){
				// 	$('#sidebar').delegate('a', 'click', function(e) {
	      //       e.preventDefault();
				// 			var ptext = $(this).find("p").text();
				// 	    document.getElementById("navbarbrand").textContent = ptext;
				// 	});
				// });




		    // $(function() {
		    //     /* เพิ่มฟังก์ชันที่จะเรียก Ajax เมื่อมีการคลิกลิงค์ที่อยู่ภายใต้ div ที่มี id="sidebar" */
		    //     $('#sidebar').delegate('a', 'click', function(e) {
		    //         e.preventDefault();
		    //         var link = this.href;
				//
		    //         var ptext = $(this).find("p").text();
		    //         document.getElementById("navbarbrand").textContent = ptext;
				//
		    //         /* ดึงเนื้อหาจากลิงค์ด้วย Ajax เมื่อผู้ใช้กดลิงค์ */
		    //         $.get(link, function(res) {
				// 					var parser      = new DOMParser ();
    		// 					var resDoc = parser.parseFromString (res, "text/html");
				// 					 // h = $.parseHTML(res);
				//
				// 					 // $('.content').html($(h).find('#mycontent').innerHTML());
				//
				//
				// 					// var resText = responseDoc.getElementById('mycontent')
				// 					// console.log (responseDoc.getElementsByTagName('div'));
				// 					// var As = $('a', responseDoc);
				// 					var po = resDoc.getElementById('mycontent');
				// 					// var poo = resDoc.getElementsByTagName("script");
				// 					// var pooResult = poo[1].innerHTML;
				// 					// console.log(res);
				// 					// alert(typeof res);
				//
		    //             /* อัพเดทเนื้อหาที่ได้จาก Ajax ไปที่ div ที่มี id="content" */
		    //             // $('#mycontent').html(po);
				// 						//
				// 						// $('#mybody').getElementsByTagName('script');
				// 						// eval(scripts[0]);
				//
				// 						// $('#mybody').find('script').each(function(){
				// 						//
				// 						// 	console.log(res);
				// 						// 	demo.initDashboardPageCharts();
				// 						//
				// 						//
				// 					  //    eval($(this).text());
				// 					  //  });
				//
		    //             /* หลังจากอัพเดทเนื้อหาเสร็จ เปลี่ยน URL ของเบราว์เซอร์ */
		    //             // window.history.replaceState(null, null, link);
		    //         },
				// 				'html'
				// 			);
		    //     });
		    // });


				// $('#mycontent').find("script").each(function(){
				// 	 eval($(this).text());
				//  });

		    // $(function(){
		    //     $('.nav li a').filter(function()
		    //     {
		    //       return this.href==location.href
		    //     }).parent().addClass('active').siblings().removeClass('active')
		    //     // $('.nav li a').click(function(){
		    //     //      $(this).parent().addClass('active').siblings().removeClass('active')
		    //     // })
		    //  })




		});


JS;
$this->registerJs($script, View::POS_LOAD, 'myOption'); ?>

<div class = "sidebar-wrapper" >
    <ul class = "nav" id = "sidebar" >
<?php
if (Yii::$app->user->isGuest){
?>



    <?php
}else{
?>


        <li>
            <a href = "<?= Url::to(['/restaurant/index'])?>">
                <i class = "material-icons" > store </i>
                <p> ข้อมูลร้านอาหาร </p>
            </a>
        </li>
        <li>
            <a href = "<?= Url::to(['/food/index'])?>">
                <i class = "material-icons" >local_dining</i>
                <p> ข้อมูลเมนูอาหาร </p>
            </a>
        </li>
        <!--			<li>-->
        <!--         <a href = "<= Url::to(['/fooddetails/index'])?>">-->
        <!--            <i class = "material-icons" > local_activity </i>-->
        <!--            <p> ข้อมูลรายละเอียดอาหาร </p>-->
        <!--         </a>-->
        <!--      </li>-->

        <li>
            <a href = "<?= Url::to(['/respromotion/index'])?>">
                <i class = "material-icons" > stars </i>
                <p> ข้อมูลโปรโมชั่นร้านอาหาร </p>
            </a>
        </li>


    <?php
} //else
?>


			<!-- <li>
         <a href = "<= Url::to(['/map/map'])?>">
            <i class = "material-icons" > stars </i>
            <p> แผนที่ </p>
         </a>
			</li> -->
			
      <!-- <li id = "fdash">
         <a href = "<= Url::to(['/site/index'])?>">
            <i class = "material-icons" > dashboard </i>
            <p> Dashboard </p>
         </a >
      </li>
      <li>
         <a href = "<= Url::to(['/article/index'])?>">
            <i class = "material-icons" > person </i>
            <p> Blog </p>
         </a>
      </li>
      <li>
         <a href = "<= Url::to(['/site/about'])?>" >
            <i class = "material-icons" > content_paste </i>
            <p> About </p>
         </a>
      </li>
      <li>
         <a href = "<= Url::to(['/site/contact'])?>" >
            <i class = "material-icons" > library_books </i>
            <p> contact </p>
         </a>
      </li> -->
      <!-- <li>
         <a href = "<= Url::to(['/site/login'])?>" >
            <i class = "material-icons" > bubble_chart </i>
            <p> Login </p>
         </a >
      </li>
      <li>
         <a href = "<= Url::to(['/site/signup'])?>" >
            <i class = "material-icons" > location_on </i>
            <p> Signup </p>
         </a>
      </li> -->
   </ul>
</div>
