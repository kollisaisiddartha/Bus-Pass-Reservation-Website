<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../../fontawesome/css/all.min.css">
    <title>Dashboard</title>
   <style>
    
   </style>
</head>
<body>
    <input type="checkbox" id="nav-toggle">
<div class="sidebar">
<div class="sidebar-brand">
  <h2><span>Anits Bus Pass Management</span></h2>
</div>
     <nav>
     <div class="sidebar-menu">
   <ul>
   <li><a href="dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
   <li class="dropdown-1">
    <li><a href="add-category.php" style="padding:10px;">Add category</a></li>
    <li><a href="manage category.php" style="padding:10px;">Manage category</a></li>                     
   <li><a href="add pass.php" style="padding:10px;">Add Pass</a></li>                      
    <li><a href="manage pass.php" style="padding:10px;">Manage Pass</a></li>                                  
   <li><a href="readenq.php" style="padding:10px;">Read Enquires</a></li>                      
   <li><a href="search.php" style="padding:10px;"><span>Search Pass</span></a></li>
  </ul>
    </div>
    </div>  
      </nav>
   
<script>
    $(document).ready(function(){
    $('#category').click(function(){
        $('.category-show').toggle();
    });
    });
    </script>
</body>
</html>