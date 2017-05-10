// PAGINATION 
$.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 12,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pager');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
  	pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
      	pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
    
    }
};

$(document).ready(function(){
    
  $('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:12});
    
});

// SEARCH

function myFunction(){
  var input, filter, table, tr, td, i;	
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
function JumptoDate(){ 
  var input, filter, table, tr, td, i;	
  input = document.getElementById("myDate").value;
  table = document.getElementById("myTable");
  td = table.getElementsByTagName("td");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

// PASSWORD STRENGTH
function CheckPasswordStrength(password){
        var password_strength = document.getElementById("password_strength");
 
        if (password.length == 0) {
            password_strength.innerHTML = "";
            return;
        }
 
        var regex = new Array();
        regex.push("[A-Z]"); 
        regex.push("[a-z]"); 
        regex.push("[0-9]"); 
        regex.push("[$@$!%*#?&]");
 
        var passed = 0;
		var color = "";
        var strength = "";
		
		if (password.length > 0 && password.length < 8){
			strength = "Too Short";
			color = "#ff6666";
		}else{
			for (var i = 0; i < regex.length; i++) {
				if (new RegExp(regex[i]).test(password)) {
					passed++;
				}
			}
			if (passed > 2) {
				passed++;
			}
			switch (passed) {
            case 0:
            case 1:
                strength = "Weak";
                color = "#ff6666";
                break;
            case 2:
                strength = "Good";
                color = "#ff8c00";
                break;
            case 3:
            case 4:
                strength = "Strong";
                color = "#66cc66";
                break;
            case 5:
                strength = "Very Strong";
                color = "#008000";
                break;
			}
		}
        password_strength.innerHTML = strength;
        password_strength.style.color = color;
    }
function CheckPass(){
    var NewPass = document.getElementById('NewPass');
    var ConfirmPass = document.getElementById('ConfirmPass');
    var message = document.getElementById('confirmMessage');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
	if(ConfirmPass.value == ""){
		message.style.color = "#fff";
        message.innerHTML = ""
	}
	else if(NewPass.value == ConfirmPass.value){
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match! <i class='fa fa-check'></i>"
	}else{
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match! &nbsp&nbsp&nbsp<i class='fa fa-times'></i>"
	}
}
function CheckCurrentPass(){
	var err = document.getElementById("errorMsg");
	var CurrentPass = document.getElementById("currentpass");
	if (err.innerHTML.value != ""){
		err.style.color = badColor;
        err.innerHTML = "Incorrect Current Password! &nbsp&nbsp&nbsp<i class='fa fa-times'></i>"
	}
}