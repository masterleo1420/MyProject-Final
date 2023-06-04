<link rel="stylesheet" href="dist/css/adminlte.css">
<?php

function getTitle($v){
    $ret = "FaceAI" . $v;
    return $ret;
}

function getFooter(){

    $ret = '
    <!-- Main Footer -->
    <footer class="main-footer">
    <position = fixed>
        <!-- To the right -->
        
        <!-- Default to the left -->
       
    </footer>
    ';

    return $ret;
}


function MainMenu(){
    $ret = '
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashborad.php" class="nav-link activeM1">
              <i class="nav-icon fas fa-th-large"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
 
          <li class="nav-item">
          <a href="checkstatus.php" class="nav-link activeM2">
          <i class="nav-icon fas fa-user-check"></i>
            <p>สถานะการขอเข้าตึก</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="uploadimg.php" class="nav-link activeM3">
          <i class="nav-icon far fa-clipboard"></i>
            <p>ลงทะเบียนขอเข้าตึก</p>
          </a>
        </li>
       

          <li class="nav-item openM5">
            <a href="#" class="nav-link activeM5">
              <i class="nav-icon fas fas fa-tools"></i>
              <p>
					Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="account.php" class="nav-link activeM51">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="reset_password.php" class="nav-link activeM52">
                <i class="far fa-circle nav-icon"></i>
                <p>Password</p>
              </a>
            </li>
            </ul>
          </li>

        


        


         
          <li class="nav-item">
            <a href="../../Backend/logout_Process.php" class="nav-link activeM7">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p><b>Log out</b></p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
    ';

    return $ret;
}


function getMainMenu($a='1')
	{
		$arry = explode(',', trim($a));
	
		if(!is_array($arry)){
			$arry[0] = $a;
		}
		
		$arry_active = array(
		'activeM1'=>'',  
		'openM2'=>'', 
    'activeM2'=>'', 
    'activeM22'=>'', 
    'activeM23'=>'',
    'activeM24'=>'',
		'openM3'=>'', 
		'activeM3'=>'', 
		'activeM31'=>'', 
		'activeM32'=>'', 
		'openM4'=>'', 
		'activeM4'=>'', 
		'activeM41'=>'', 
		'activeM42'=>'',
    'activeM43'=>'', 
    'openM5'=>'', 
		'activeM5'=>'', 
    'activeM51'=>'', 
    'activeM52'=>'',
    'activeM53'=>'',
    'activeM6'=>'', 
    'activeM7'=>'', 
  
    
		);
	
		for($i=0;$i<count($arry);$i++){
		$key = 'activeM' . trim($arry[$i]);
			if(isset($arry_active[$key])){
				$arry_active[$key] = 'active';
				
			}

		  $val = (int)trim($arry[$i]);
		  if($val <= 5){
			$key = 'openM' . $val;
			if(isset($arry_active[$key])){
			  $arry_active[$key] = 'menu-open';				
			}
		  }

		}
		
		$tmp_url = MainMenu();
		$url = strtr($tmp_url, $arry_active);
		
		return $url;
	}

?>